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
namespace Community\Controller;
use Think\Controller;
/**
 *  学院基类控制器（待扩展）
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
}