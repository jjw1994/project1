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

/**
 * 系统默认模块默认控制器
 * 主要展示系统首页（待扩展）
 */
class IndexController extends BaseController {

	//系统首页
    public function index(){
			if(cookie('have')){
				$this->redirect("/Blog/Index/index");
			}else{
				cookie('have',true);
				$member = M('ucenter_member');
				$len = $member->count('id');
				$start = rand(0,$len - 18);
				$arr = $member->alias('bt')
											->field('bt.username,p.path')
											->join('left join lsgoweb_picture p on p.id = bt.head_picture_id')
											->where('bt.status=1')
											->limit($start,18)
											->select();
				$this->assign('data',$arr);
				$this->display();
			}
    }

	/**
	 * LSGOPHPfunctioninfo
	 * 函数功能:实现文章换一换功能
	 * Author: 钟锦
	 * 参数 : 每页显示的个数，【大分类ID，标签ID】
	 * 返回值 : array随机的四个数据和总数
	 */
	public function change($num,$cate_id=1,$target_id=0){
		$document = M('Document');
		$map[`category_id`] = $cate_id;
		$map['group_id'] = $target_id;
		$list = $document->where($map)->field('title,view')->select();
		$count = count($list);
		if($count<$num){
			$arr = $list;
		}else{
			shuffle($list);
			$arr = array();
			for($i=0;$i<$num;$i++){
				$arr[$i] = $list[$i];
			}
		}
		$array = array(
			'count'=>$count,
			'list'=>$arr,
		);
		return $array;
	}

}