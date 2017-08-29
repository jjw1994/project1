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

/**
 * 系统默认学院默认控制器
 * 主要展示学院首页（待扩展）
 */
class IndexController extends BaseController {

	//学院首页
    public function index(){

        //main menu
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Community");
        $this->assign('menu', $menu);

        $this->display();
    }

}