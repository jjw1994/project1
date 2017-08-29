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
use Think\Controller;

/**
 * 系统默认模块控制器基类
 * 系统默认模块公共方法
 */
class BaseController extends Controller {

    /**
     * [__construct 屏蔽手机页面]
     */
    public function __construct(){
        parent::__construct();
        $result = is_mobile_phone();
        if($result){
            $this->redirect("/Mobile/Index/index");
        }
    }
    
    /**
     * LSGOPHPfunctioninfo
     * 函数功能：搜索功能（关键字：标签，标题）
     * Author: 钟锦
     * 参数 : string 关键字
     * 返回值 : array[][] 搜索结果
     */
    public function search($key){
        //$tag = M('BlogArticleTag');
        $title = M('Document');
        //$map1['tag_name'] = array('like','%'.$key.'%');
        $map2['title'] = array('LIKE',"%g%");
        $data = array();
        //$data1 = $tag->where($map1)->select();
        $data2 = $title->where($map2)->select();
        return $data2;
    }
    /**
     * LSGOPHPfunctioninfo
     * 函数功能:检测用户cookie是否存在以及是否与数据库对应，以免被伪造cookie
     * Author: 钟锦
     * 参数 : 无
     * 返回值 : bool true(cookie存在且对应数据库) false(cookie不存在或者与数据库不对应)
     */
    public function checkcookie(){
        $ret = false;
        $cookie_username = trim(cookie('username'));
        $cookie_userid = trim(cookie('userid'));
        if(!($cookie_username && $cookie_userid)){
            return $ret;
        }
        $where['id'] = $cookie_userid;
        $count = D('ucenter_member')->where($where)->count();
        if($count>0){
            $username = D('ucenter_member')->where($where)->getField('username');
            $username = trim($username);
            if($cookie_username == $username){
                $ret = true;
            }
        }
        return $ret;
    }
}