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
class SetUserinfoController extends BaseController {
    /**
     * LSGOPHPfunctioninfo
     * 函数功能:个人设置
     * Author: 周鹏
     * 参数 : 无
     * 返回值 : 无
     */
    public function Base(){
        $this->display();
    }
    public function Upload(){
        $this->display();
    }
    public function Setpwd(){
        $this->display();      
    }
    
}