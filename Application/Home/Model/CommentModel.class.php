<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPfileinfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOgroup
 *  +----------------------------------------------------------------------
 *  | Author: 钟锦
 *  +----------------------------------------------------------------------
 *  | CreateTime: 2015/10/15 16:55
 *  +----------------------------------------------------------------------
 */

namespace Home\Model;
use Think\Model;

class CommentModel extends Model{
    //自动验证
    protected $_validate = array(
        array('relative_name','require','关联字段名不能为空！'),
        array('relative_content','require','关联字段内容不能为空！'),
        array('user_id','require','请登录后再评论！'),
        array('comment','require','评论内容不能为空！'),
        array('replay_comment','require','回复内容不能为空！'),
    );
    //自动完成
    protected $_auto = array(
        array('relative_table','lsgoweb_document'),
    );

}
?>

