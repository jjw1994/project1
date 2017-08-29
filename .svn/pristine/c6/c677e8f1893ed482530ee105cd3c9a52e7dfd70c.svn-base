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
namespace Resource\Controller;
use Think\Controller;
/**
 * 系统学院模块控制器基类
 * 系统学院模块公共方法
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