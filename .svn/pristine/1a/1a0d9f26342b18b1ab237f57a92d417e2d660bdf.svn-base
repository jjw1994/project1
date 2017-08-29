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
 *  | Time: 22:17
 *  +----------------------------------------------------------------------
 */

namespace Blog\Model;
use Think\Model;

/**
 * Class BlogArticleTag
 * handel blog article tag
 * @package Blog\Model
 */
class BlogArticleTagModel extends Model{

    /**
     * LSGOPHPFunctionInfo
     * function introduce:get blog article tag
     * @param number $cate
     * @return array $tag
     * @author Aidan Dai
     */
    public function getTag($cate = 2){

        $map['status'] = 1;
        $map['category_id'] = $cate;

        $picture = D('picture');
        $blog_article_tag = D('blog_article_tag');

        $tag = $blog_article_tag->where($map)->field('id,tag_name,tag_picture_id')->order('sort')->select();

        foreach ($tag as &$value) {
            $map1['id'] = $value['tag_picture_id'];

            $value['tag_icon'] = $picture->where($map1)->getField('path');
            unset($value['tag_picture_id']);
        }
       return $tag;
    }
}