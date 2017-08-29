<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPFileInfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOGroup
 *  +----------------------------------------------------------------------
 *  | Author: AidanDai
 *  +----------------------------------------------------------------------
 *  | Date: 2015/10/21
 *  +----------------------------------------------------------------------
 *  | Time: 22:15
 *  +----------------------------------------------------------------------
 */
namespace Common\Model;
use Think\Model;

/**
 * Class ChannelClass
 * dispose channel(main menu)
 * @package Common\Model
 */
class ChannelModel extends Model{

    /**
     * LSGOPHPFunctionInfo
     * function introduce:
     * @param string $module
     * @return array $menu
     * @author Aidan Dai
     */
    public function getMenu($module = "Blog"){
        $map['status'] = 1;
        $menu = $this->where($map)->field('title,url')->order('sort')->select();
        foreach($menu as &$value){
            //strpos($value['url'],$module); return $module indexof from 0
            if(strpos($value['url'],$module) === 0){
                $value['class'] = "menu-active";
            }
        }
        return $menu;
    }
}