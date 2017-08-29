<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPFileInfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOGroup
 *  +----------------------------------------------------------------------
 *  | Author: AidanDai
 *  +----------------------------------------------------------------------
 *  | Date: 2015/10/22
 *  +----------------------------------------------------------------------
 *  | Time: 20:24
 *  +----------------------------------------------------------------------
 */
namespace Blog\Model;
use Think\Model;

/**
 * Class CategoryModel
 * blog category model
 * @package Blog\Model
 */
class CategoryModel extends Model{

    /**
     * LSGOPHPFunctionInfo
     * function introduce:get category
     * @param number $cate
     * @return array $category
     * @author Aidan Dai
     */
    public function getCategory($cate = 2){

        $map['status'] = 1;
        $map['pid'] = 1;

        $category = $this->where($map)->field('id,title')->order('sort')->select();
        foreach($category as &$value){
            if($cate == $value['id']) {
                $value['class'] = 'blog-active';
            }
        }
        return $category;
    }

    /**
     * LSGOPHPFunctionInfo
     * function introduce:get category icon
     * @param number $cate
     * @return array $category
     * @author Aidan Dai
     */
    public function getCategoryIcon($cate = 2){

        $picture = D('picture');
        $category = D('category');

        $map4['id'] = $cate;

        $map5['id'] = $category->where($map4)->getfield('icon');
        $logourl = $picture->where($map5)->getField('path');
        $data = array(
            'id' => $cate,
            'icon' => $logourl
        );
        return $data;
    }
}
