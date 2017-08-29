<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPFileInfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOGroup
 *  +----------------------------------------------------------------------
 *  | Author: AidanDai
 *  +----------------------------------------------------------------------
 *  | Date: 2015/10/16
 *  +----------------------------------------------------------------------
 *  | Time: 15:54
 *  +----------------------------------------------------------------------
 */
/**
 * LSGOPHPfunctioninfo
 * blog search
 * Author: aidan Dai
 * CreateTime: 15:54
 */
namespace Blog\Controller;

/**
 * Class SearchController
 * @package Blog\controller
 */
class SearchController extends BaseController
{

    /**
     * LSGOPHPFunctionInfo
     * function introduce:blog search
     * @param null
     * @return null
     * @author Aidan Dai
     */
    public function index(){
        //main menu
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");
        $this->assign('menu', $menu);

        $keyword = I("get.keyword");
        $type = I("get.type") ? I("get.type") : "article";
        $this->assign("keyword",$keyword);
        $this->assign("type",$type);

       if(I("get.type") && I("get.type") == "user"){
            if(I("get.order")){
                //echo 'only keyword at lsgoweb_member order by I("get.order")!';
            }else{
                //echo "only keyword at lsgoweb_member!";
            }
        }else{
            if(I("get.order")){
                //echo 'only keyword at lsgoweb_arcticle order by I("get.order")!';
            }else{
                //echo "only keyword at lsgoweb_arcticle!";
            }
        }

        $this->display('index');
    }


}