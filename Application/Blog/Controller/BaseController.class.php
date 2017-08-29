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

namespace Blog\Controller;
use Think\Controller;

/**
 * blog公共控制器
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
     * 函数功能:生成验证码
     * Author: 钟锦
     * 参数 : 无
     * 返回值 : 无
     */
    public function verify(){
        $verify = new \Think\Verify();

    }

}
