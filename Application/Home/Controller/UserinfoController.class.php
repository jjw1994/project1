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
 * Ç°Ì¨Ê×Ò³¿ØÖÆÆ÷
 * Ö÷Òª»ñÈ¡Ê×Ò³¾ÛºÏÊý¾Ý
 */
class UserinfoController extends BaseController {
    /**
     * LSGOPHPfunctioninfo
     * º¯Êý¹¦ÄÜ:¸öÈËÉèÖÃ
     * Author: ÖÜÅô
     * ²ÎÊý : ÎÞ
     * ·µ»ØÖµ : ÎÞ
     */
    public function Index(){
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");
        $this->assign('menu', $menu);
        $uid = I('get.uid');
        $choice = I('get.type');
        if(!(session('username') || cookie('username'))){
            $this->redirect('User/login');
        }
        $this->assign('urlinfo',$this->getMenu($uid));
        $this->assign('judge',$this->showchoice($choice));
        $this->assign('info',D('user')->info($uid)); 
        $this->display();
    }

    private function getMenu($uid) {
        $baseUrl = __ROOT__."/index.php?s=/Home/Userinfo/index/uid/".$uid."/type/";
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


    public function Upload(){
        $this->display();
    }
    public function Setpwd(){
        $this->display();      
    }
    
}