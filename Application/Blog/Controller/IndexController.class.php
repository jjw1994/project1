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

namespace Blog\Controller;
header("Content-Type: text/html;charset=utf-8");
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends BaseController
{

    /**
     * LSGOPHPFunctionInfo
     * function introduce:系统首页
     * @param null
     * @return null
     * @author Aidan Dai
     */
    public function index()
    {
        //main menu
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");
        $this->assign('menu', $menu);

        $category = I('get.category') ? I('get.category') : 2;

        //category_name temp
        $category_name = D('category')->where('id=' . $category)->getField('title');
        $this->assign('category_name', $category_name);

        //blog category
        $cate = D("Category");
        $blogNav = $cate->getCategory($category);
        $this->assign('blogNav', $blogNav);

        //blog category defualt tag
        $catelogo = $cate->getCategoryIcon($category);
        $this->assign('catelogo', $catelogo);

        //blog tag
        $BlogArticleTag = D("BlogArticleTag");
        $tag = $BlogArticleTag->getTag($category);
        $this->assign('tags', $tag);

        //blog category tag defualt articles
        $document = D("Document");
        $article = $document->DefualtArticles($category);
        $this->assign('length', $article['count']);
        $this->assign('articles', $article['data']);

        //mouseover tag or click change(ajax)
        if (IS_POST) {
            $post = I('post.');

            $document = D("Document");
            $result = $document->changeArticle($post, 5);
            $this->ajaxReturn($result);
        }

        $this->assign("cate", I('get.category'));
        $this->display();
    }
// <<<<<<< .mine
//     /*
//     搜索功能
//     */
//     public function search(){
//         //搜索用户
//         $value = $_GET['keywords'];        
//         $username = M('ucenter_member');
//         $map1['username'] = array('like','%'.$value.'%');
//         //$id = M('ucenter_member');
//         $title = M('document');
//         //$data1 = $username->where($map1)->select();
        
//         $data1 = $username->table('lsgoweb_document a,lsgoweb_ucenter_member b')->where("a.uid==b.id" and $map1)->field('a.title,b.username')->order('b.id desc' )->limit(5)->select();
//         //dump($title->getLastSql()); //打印SQL语句


//         /*$data3 = array();
//         for($i=0;$i<count($data1);$i++) {
//             $id = $data1[$i]['id'];
//             $map4['uid'] = $id;
//             $article = $title->where($map4)->select;
//             $data3[$i]['uid'] = $id;
//             $data3[$i]['title'] = $article;
//             $data3[$i]['name'] = $data1[$i]['username'];
//         }
// //         foreach($msg as $k => $v){
// // 　　　　$ids[] = $id;
// //         $titles[] = $title;
// // 　　　　$names[] = $name;
// // 　　}
//         $ids = array_column($msg, 'id');
//         $names = array_column($msg, 'name');

        
//         dump($data4);
//         $data = $title->field($ids,$names,$titles)->select();
//         */
//         //$id = M('document')->table(array('lsgoweb_ucenter_member'=>'this0','lsgoweb_document'=>'this1'))->where('this0.id'=='this1.uid')->field('this0.id,this1.uid')->select();
//         $dataLength = count($data1);
//         $a = 0;
//         while($a<$dataLength) {
//             //$user_id['user_id'] = $data1[$a]['user_id'];
//             //$userdata = $username->where($user_id)->select();

//             $list["username"] = $userdata[$a]["username"];
//             $array1[$a] = $list;
//             $a++;
//         }
//          // var_dump($data1);
        
        
//         //搜索文章
//         $value2 = $_GET['keywords'];
//         $title = M('document');
//         $content = M('document_article');
//         $map2['title'] = array('like','%'.$value2.'%');
//         //$map3['content'] = array('like','%'.$value2.'%');
//         $data2 = $title->where($map2)->select();
//         //$data2 = $content->where($map3)->select()
//         $dataLength = count($data2);
//         $b = 0;
//         while($b<$dataLength) {
//             /*
//             $titledata = $title->where($title_id)->field('title')->select();
//             $content_id['content_id'] = $data2[$b]['content_id'];
//             $contentdata = $content->where($content_id)->field('content')->select();
//             */
//             //$list['title'] = $data2[$b]['title'];
//             $list['title'] = $titledata[$b]['title'];
//             $list['content'] = $contentdata[$b]['content'];
//             $array2[$b] = $list;
//             $b++;
//         }


//         $array = array(); 
//         $array[0] = $data1;
//         $array[1] = $data2;
//         dump($array);
//         // var_dump($data2);
//         $this->display();
//     }

// ||||||| .r125
// =======

    /**
     * LSGOPHPfunctioninfo
     * 函数功能:文章和作者的搜索
     * Author: 姜家稳
     * 参数 : 无
     * 返回值 : 无
     */
    public function search()
    {
        $data = I('get.');
        $keyword = (string)$data['keyword'];
        $type = (string)$data['type'] ? (string)$data['type'] : 'article';
        $document = D('Document');
        $member = D('UcenterMember');
        $list = array();
        if ($type == 'article' || ($type != 'article' && $type != 'user')) {
            $order = (string)$data['order'] ? (string)$data['order'] : 'view';
            $map_art['title'] = array('like', "%" . $keyword . "%");
            if ($order == 'view') {
                $arr_art = $document->where($map_art)->order('view DESC')->select();
            } else if ($order == 'time') {
                $arr_art = $document->where($map_art)->order('update_time DESC')->select();
            }
            for($i = 0; $i < count($arr_art); $i ++){
                $arr_art[$i]['tag_ids'] = explode(',',$arr_art[$i]['tag_ids']);
            }
            $list = $arr_art;+
            $list['type'] = 'art';
        } else {
            $map_user['username'] = array('like', "%" . $keyword . "%");
            $arr_user = $member->where($map_user)->select();
            $list = $arr_user;
            $list['type'] = 'user';
        }
        $tags = M("BlogArticleTag")->select();
        
        //dump($list);
        $this->assign('tags',$tags);
        $this->assign('lists',$list);
        $this->display();
    }

    /**
     * LSGOPHPfunctioninfo
     * 函数功能:根据tag_ids找出所拥有的标签
     * Author: 钟锦
     * 参数 : 标签id字符串
     * 返回值 : 标签数组
     */
    private function findtags($tag_ids)
    {
        $id_arr = explode(",", $tag_ids);
        $tags = D("BlogArticleTag");
        $data = array();
        for ($i = 0; $i < count($id_arr); $i++) {
            $map['id'] = $id_arr[$i];
            $tag_name = $tags->where($map)->getField('tag_name');
            $data[] = $tag_name;
        }
        return $data;
    }

    private function finduser($uid)
    {
        $ucentermember = M('UcenterMember');
        $map['id'] = $uid;
        $username = $ucentermember->where($map)->getField("username");
        return $username;
    }
// >>>>>>> .r156
}
