<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPFileInfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOGroup
 *  +----------------------------------------------------------------------
 *  | Author: AidanDai
 *  +----------------------------------------------------------------------
 *  | Date: 2015/10/23
 *  +----------------------------------------------------------------------
 *  | Time: 8:31
 *  +----------------------------------------------------------------------
 */

namespace Common\Model;
use Think\Model;

/**
 * Class CommentModel
 * handel comment
 * @package Common\Model
 */
class CommentModel extends Model{

    /**
     * LSGOPHPFunctionInfo
     * function introduce:show comment data
     * @param number $article_id string $table_name
     * @return array 4 $comment_data
     * @author Aidan Dai
     */
    public function comment($article_id,$table_name){
        $comment = D('comment');
        $ucenter_member = D('ucenter_member');
        $picture = D('picture');

        $map['relative_content'] = $article_id;
        $map['status'] = 1;
        $map['pid'] = 0;
        $map['relative_table'] = $table_name;

        $comment_data = $comment->where($map)->field('id,user_id,create_time,comment,pid')->select();


        foreach($comment_data as $key => &$value){
            $map1['id'] = $value['user_id'];
            $comment_user = $ucenter_member->where($map1)->field('username,head_picture_id')->find();
            $value['username'] = $comment_user['username'];

            $map2['id'] = $comment_user['head_picture_id'];
            $value['user_headimg'] = $picture->where($map2)->getField('path');

            $map3['id'] = $value['replayed_user_id'];
            $value['replayed_username'] = $ucenter_member->where($map3)->getField('username');
            $value['create_time'] = date('Y-m-d H:i',$value['create_time']);
            if(!$value['pid']){
                $map4 = $map;
                $map4['pid'] = array('NEQ',0);
                $map4['pid'] = $value['id'];
                $value['child'] = $comment->where($map4)->field('id,user_id,create_time,replay_comment,pid,replayed_user_id')->select();
                foreach($value['child'] as &$value1){
                    $map1['id'] = $value1['user_id'];
                    $comment_user = $ucenter_member->where($map1)->field('username,head_picture_id')->find();
                    $value1['username'] = $comment_user['username'];

                    $map2['id'] = $comment_user['head_picture_id'];
                    $value1['user_headimg'] = $picture->where($map2)->getField('path');

                    $map3['id'] = $value1['replayed_user_id'];
                    $value1['replayed_username'] = $ucenter_member->where($map3)->getField('username');
                    $value1['create_time'] = date('Y-m-d H:i',$value['create_time']);
                }
            }
        }
        return $comment_data;
    }
}