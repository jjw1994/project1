<?php
/**
 *  +----------------------------------------------------------------------
 *  | LSGOPHPfileinfo
 *  +----------------------------------------------------------------------
 *  | Copyright (c) LSGOgroup
 *  +----------------------------------------------------------------------
 *  | Author: 周鹏
 *  +----------------------------------------------------------------------
 *  | CreateTime: 2015/10/27 13:55
 *  +----------------------------------------------------------------------
 */

namespace Home\Model;
use Think\Model\ViewModel;

class UserModel extends ViewModel{
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
// 	/**
// 	 * LSGOPHPfunctioninfo
// 	 * 函数功能:所在城市处理
// 	 * Author: 周鹏
// 	 * 参数 : int
// 	 * 返回值 : array
// 	 */
// 	public function region($uid){
// 	    $region=M('region');
// 	    $province=$region->where("parent=86")->select();
// // 	    $isset=M('userinfo')->where(array('user_id'=>$uid))->find();
// // 	    if($isset[region_id]!==0){
// // 	        $province['user']=$region->where(array('id'=>$isset['region_id']))->find();
// // 	    }
// 	    return $province;
// // 	    $province=$region->where(array('user_id'=>$uid))->find();
// 	}
}