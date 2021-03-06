<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPFileInfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOGroup
 *  +----------------------------------------------------------------------
 *  | Author: AidanDai
 *  +----------------------------------------------------------------------
 *  | Date: 2015/9/12
 *  +----------------------------------------------------------------------
 *  | Time: 11:23
 *  +----------------------------------------------------------------------
 */

namespace Home\Controller;
use User\Api\UserApi;
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class UserController extends BaseController {

    /**
     * LSGOPHPfunctioninfo
     * 函数功能:个人主页
     * Author: 周鹏
     * 参数 : 无
     * 返回值 : 无
     */
    public function index(){
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");
        $this->assign('menu', $menu);
        $uid = I('get.uid');
        if(!(session('username') || cookie('username'))){
            $this->redirect('User/login');
        }
        $this->assign('urlArr',$this->getMenu($uid));
        $this->assign('info',D('user')->info($uid)); 
        $this->display();
    }

    /**
     * LSGOPHPfunctioninfo
     * 函数功能:取得菜单url
     * Author: 周鹏
     * 参数 : 用户id
     * 返回值 : 无
     */
    private function getMenu($uid) {
        $baseUrl = __ROOT__."/index.php?s=/Home/User/index/uid/".$uid."/type/";
        $arr = array(
            "home"      =>  $baseUrl."all.html",
            "at"        =>  $baseUrl."at.html",
            "articale"  =>  $baseUrl."articale.html",
            "collect"   =>  $baseUrl."collect.html",
            "note"      =>  $baseUrl."note.html",
            "greet"     =>  $baseUrl."greet.html",
            "comment"   =>  $baseUrl."comment.html"
        );
        return $arr;
    }
    /**
     * LSGOPHPfunctioninfo
     * 函数功能:生成验证码
     * Author: 钟锦
     * 参数 : 无
     * 返回值 : 无
     */
    public function verify(){
        ob_clean();//用来丢弃输出缓冲区中的内容，如果你的网站有许多生成的图片类文件，那么想要访问正确，就要经常清除缓冲区。
        $config = array(
            'fontSize'=>80,
            'length'=>3,
            'useNoise'=>false,
            'useCurve'=>false,
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    /**
     * LSGOPHPfunctioninfo
     * 函数功能:用户注册
     * Author: 钟锦
     * 参数 : 无
     * 返回值 : 无
     */
    public function register(){
        if(IS_POST){
            /* 检测验证码 */
            $verify = I('post.verify');
            $email = I('post.email');
            $username = I('post.username');
            $password = I('post.password');
            if(!check_verify($verify)){
                $result = array('status'=>0,'name'=>'verify','msg'=>"验证码有误，请重新输入！");
                $this->ajaxReturn($result,'json');
            }
            /* 调用注册接口注册用户 */
            $User = new UserApi;
            $uid = $User->register($username, $password, $email);
            $member = D('Member');

            if(0 < $uid){ //注册成功
                $user = array('uid' => $uid, 'nickname' => $username, 'status' => 1);
                if(!M('Member')->add($user)){
                    $result = array('status'=>0,'name'=>'register','msg'=>"注册失败！");
                } else {
                    $result = array('status'=>1,'name'=>'register','msg'=>"注册成功！");
                }
                session('username',null);
                session('username',$username);
                session('userid',$uid);

                $this->ajaxReturn($result,'json');
            } else { //注册失败，显示错误信息
                $msg = $this->showRegError($uid);
                $result = array('status'=>0,'name'=>'register','msg'=>$msg);
                $this->ajaxReturn($result,'json');
            }

        }else{
            $this->display();//显示注册表单
        }
    }
    /**
     * LSGOPHPfunctioninfo
     * 函数功能:用户登录
     * Author: 钟锦
     * 参数 : 无
     * 返回值 : 无
     */
    public function login(){
        if(IS_POST){
            $verify = I('post.verify');
            $email = I('post.email');
            $password = I('post.password');
            $auto_login = I('post.auto_login') ? 1 : 0;
            /* 检测验证码 */
            if(!check_verify($verify)){
                $result = array('status'=>0,'name'=>'verify','msg'=>"验证码有误，请重新输入！");
                $this->ajaxReturn($result,'json');
            }

            /* 调用UC登录接口登录 */
            $user = new UserApi;
            $uid = $user->login($email, $password, 2);//邮箱登录模式
            if(0 < $uid){ //UC登录成功
                /* 登录用户 */
                $Member = D('Member');
                if($Member->login($uid)){ //登录用户
                    //TODO:跳转到登录前页面
                    $username = D('ucenter_member')->where("id=$uid")->getField('username');
                    session('username',null);
                    session('username',$username);
                    session('userid',null);
                    session('userid',$uid);
                    if($auto_login){
                        cookie('username',null);
                        cookie('userid',null);
                        cookie('username',$username,7*24*60*60);
                        cookie('userid',$uid,7*24*60*60);
                    }
                    $result = array('status'=>1,'name'=>'login','msg'=>"登陆成功！");
                    $this->ajaxReturn($result,'json');
                } else {
                    $error = $Member->getError();
                    $result = array('status'=>0,'name'=>'login','msg'=>$error);
                    $this->ajaxReturn($result,'json');
                }

            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $result = array('status'=>0,'name'=>'login','msg'=>$error);
                $this->ajaxReturn($result,'json');
            }
        }else{
            $this->display();//显示登录表单
        }
    }



    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0){
        switch ($code) {
            case -1:  $error = '用户名长度必须在16个字符以内！'; break;
            case -2:  $error = '用户名被禁止注册！'; break;
            case -3:  $error = '用户名被占用！'; break;
            case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
            case -5:  $error = '邮箱格式不正确！'; break;
            case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
            case -7:  $error = '邮箱被禁止注册！'; break;
            case -8:  $error = '邮箱被占用！'; break;
            case -9:  $error = '手机格式不正确！'; break;
            case -10: $error = '手机被禁止注册！'; break;
            case -11: $error = '手机号被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }


    /**
     * LSGOPHPFunctionInfo
     * function introduce: user setprofile
     * @param null
     * @return null
     * @author Aidan Dai
     */
    public function setprofile(){
        
        
        
        $region=M('region');
        $user=D('user');
        $userinfo=M('userinfo');
        $ucenter_member=M('ucenter_member');
        $member=M('member');
        //main menu
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");
        $this->assign('menu', $menu);
        $uid = I('get.uid');
        $choice = I('get.type');
        if(!(session('username') || cookie('username'))){
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?s=/Home/User/login.html";
            header('Location:'.$url);
        }
        if(IS_POST){
            //判断是否已存在信息
            $isset=$userinfo->where("user_id=$uid")->find();
            $array=I('post.');
            $judge1=$ucenter_member->where("id=$uid")->setField('username',$array['nickname']);
            $judge2=$member->where("uid=$uid")->setField('nickname',$array['nickname']);
            $save['user_id']=$uid;
            $save['sex']=$array['sex'];
            $save['introduce']=$array['introduce'];
            $save['sign']=$array['sign'];
            $save['create_time']=$save['update_time']=time();
            if($array['town']){
                $save['region_id']=$array['town'];
            }else {
                $save['region_id']=$array['city'];
            }
            if($isset){
                $judge3=$userinfo->where("user_id=$uid")->save($save);
            }else {
                $judge3=$userinfo->add($save);
            }
        }
        
        //判断有没有填写过个人信息
        $user_info=M('ucenter_member')->alias('u')
                                      ->where("u.id=$uid")  
                                      ->join('lsgoweb_userinfo i on u.id=i.user_id','left')
                                      ->field('i.sex,i.introduce,i.sign,i.region_id,u.username')
                                      ->find();
        if($user_info['region_id']){
            $path=$region->where(array(id=>$user_info['region_id']))->find();
            $path_id=explode('.',$path['path_id']);
            $path_name=explode('.',$path['path_name']);
        }
        $province=$region->where("parent=86")->select();
        $this->assign('path_name',$path_name);
        $this->assign('path_id',$path_id);
        $this->assign('nickname',$user_info['username']);
        $this->assign('province',$province);
        $this->assign('sex',$user_info['sex']);
        $this->assign('introduce',$user_info['introduce']);
        $this->assign('sign',$user_info['sign']);
        $this->assign('urlinfo',$this->getMenu2($uid));
        $this->assign('judge',$this->showchoice($choice));
        $this->assign('info',$user->info($uid));
        
        $this->display('setprofile');
    }
    /**
     * LSGOPHPFuctionInfo
     * 函数功能 :商家新增
     * @param type null
     * @return type null
     * @author 朱嘉怡
     * @author Aidan Dai
     */
    
    public function address(){
        $region = M('region');
        $province = I('post.province');
        $city = I('post.city');
    
        //选取市
        if($province){
            $map1['parent'] = $province;
            $city = $region->where($map1)->select();
            $this->ajaxReturn($city);
        }
    
        //选取县
        if($city){
            $map2['parent'] = $city;
            $town = $region->where($map2)->select();
            $this->ajaxReturn($town);
        }
    }
    
    private function getMenu2($uid) {
        $baseUrl = __ROOT__."/index.php?s=/Home/User/setprofile/uid/".$uid."/type/";
        $arr = array(
            "personinfo"    =>  $baseUrl."person-info.html",
            "setpicture"    =>  $baseUrl."set-picture.html",
            "testmail"      =>  $baseUrl."mail-test.html",
            "changepwd"     =>  $baseUrl."change-pwd.html",
        );
        return $arr;
    }
    
    private function showchoice($choice) {
        switch ($choice) {
            case 'person-info':
                $num = 0;
                break;
            case 'set-picture':
                $num = 1;
                break;
            case 'mail-test':
                $num = 2;
                break;
            case 'change-pwd':
                $num = 3;
                break;
        }
        return $num;
    }

    /**
     * LSGOPHPfunctioninfo
     * 函数功能:用户注销
     * Author: 钟锦
     * 参数 : 无
     * 返回值 : 无
     */
    public function logout(){
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?s=/Blog/Index/index.html";
        cookie('username', null);
        cookie('userid', null);
        session('username', null);
        session('userid', null);
        header('Location:'.$url);
    }

    /**
     * LSGOPHPFunctionInfo
     * function introduce: 处理用户评论与回复
     * @param null
     * @return null
     * @author 钟锦
     */
    public function comment(){
        $post = I('post.');
        $comment = D('Comment');
        unset($data);
        if($comment->create($post)){
            $is = $comment->add();
            if($is){
                $document = D("document");
                $map["id"] = $post["relative_content"];
                $array["comment"] = $document->where($map)->getField("comment") + 1;
                $document->where($map)->save($array);
                $data = array(
                    'msg'    => "发表成功！",
                    'status' => 1,
                );
            }else{
                $data = array(
                    'msg'    => '发表失败！',
                    'status' => 0,
                );
            }
            //$this->ajaxReturn($data,'json');
        }else{
            $data = array(
                'msg'    => $comment->getError(),
                'status' => 0,
            );
        }
        $this->ajaxReturn($data,'json');
    }
    public function pwdChange(){
        $user = new UserApi;
        $lp=I('post.lp');
        $np=I('post.np');
        $arr=array(
            'password'=>$np
        );
        $uid=I('get.uid');
        $judge=$user->updateInfo($uid, $lp, $arr);
        if($judge['status']){
            $this->success("修改成功",U('index',array('uid'=>$uid)));
            
        }else{
            $this->error($judge['info']);
        }

        
    }
//     public function test(){
//             $array=I('post.');
//             var_dump($array);
//     }
}