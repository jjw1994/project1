<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPfileinfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOgroup
 *  +----------------------------------------------------------------------
 *  | Author: 朱剑
 *  +----------------------------------------------------------------------
 *  | CreateTime: 2015/10/30 16:46
 *  +----------------------------------------------------------------------
 */

namespace Home\Model;
use Think\Model\ViewModel;

class UserinfoModel extends ViewModel{
	/**
	 * LSGOPHPfunctioninfo
	 * 函数功能:用户数据
	 * Author: 周鹏
	 * 参数 : uid
	 * 返回值 : array
	 */
	public function info($uid) {
    	$user = M('ucenter_member');
    	$arr = $user->where('id='.$uid)->find();
    	$path = M('picture')->where('id='.$arr['head_picture_id'])->getField('path');
    	$arr['head_picture_id'] = $path;
    	return $arr;
	}
	/**
	 * LSGOPHPfunctioninfo
	 * 函数功能:取数据
	 * Author: 周鹏
	 * 参数 : type
	 * 返回值 : array
	 */
	public function getData($type) {
		switch ($type) {
			case 'at':
				$user = M('document')->select();
				break;
			
			default:
				# code...
				break;
		}
	}
}