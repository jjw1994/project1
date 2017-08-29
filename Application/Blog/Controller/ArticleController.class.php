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

/**
 * Class ArticleController
 * article controller
 * @package Blog\Controller
 */
class ArticleController extends BaseController {

    /**
     * LSGOPHPFunctionInfo
     * function introduce:article home
     * @param null
     * @return null
     * @author Aidan Dai
     */
    public function index(){

        //main menu 主菜单
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");
        $this->assign('menu', $menu);

        $category = I('get.category');
        //blog category 博客种类
        $cate= D("Category");
        $blogNav = $cate->getCategory($category);
        $this->assign('blogNav', $blogNav);

        $document = D('Document');
        //article content
        $id = I("get.id");
        $article = $document->content($id);
        $this->assign('article',$article["info"]);
        $this->assign('arr_tag_name',$article["tag"]);

        //article nav
        $article_nav = $document->articleNav($id);
        $this->assign("article_nav",$article_nav);

        //relative author
        $relative = $document->relativeAuthor($article["info"]['uid']);
        $this->assign('user',$relative["info"]);
        $this->assign('list',$relative["list"]);

        //comment
        $comment = new \Common\Model\CommentModel();
        $comment_data =  $comment->comment($id,"lsgoweb_document");
        $this->assign('comment',$comment_data);

        //view
        $map["id"] = $id;
        $data["view"] = $document->where($map)->getField("view") + 1;
        $document->where($map)->save($data);

        $this->assign('id',$id);
        if(session("userid") || cookie("userid")){
            $this->assign('islogin',session("userid") ? session("userid") : cookie("userid"));
        }

        $this->assign('article_user_id',$article["info"]['uid']);

        $this->display('index');
    }

    /**
     * LSGOPHPFunctionInfo
     * function introduce:cllect article
     * @param number $id
     * @return boolean $bool
     * @author Aidan Dai
     */
    public function cllectArticle($id){

    }

    /**
     * LSGOPHPFunctionInfo
     * function introduce:like article
     * @param number $id
     * @return boolean $bool
     * @author Aidan Dai
     */
    public function likeArticle($id){

    }
    /**
     * LSGOPHPFunctionInfo
     * function introduce: 文章列表
     * @param null
     * @return null
     * @author 周鹏
     */
    public function lists(){
        $channel = new \Common\Model\ChannelModel();
        $menu = $channel->getMenu("Blog");

        $document = D('document');
        $category = I('get.category');
        $tagId = I('get.tag');
        if ($category == null && $tagId == null) {
            $this->redirect('Index/index');
        } else if ($tagId == null) {
            $lists = $document->alias('bt')
                              ->field('bt.id,bt.uid,bt.title,bt.tag_ids,bt.view,bt.comment,bt.update_time,p.username')
                              ->join('left join lsgoweb_ucenter_member p on bt.uid = p.id')
                              ->where('bt.category_id='.$category.' AND bt.status = 1')
                              ->order('bt.update_time DESC')->select();
        } else {
            $category = M('blog_article_tag')->where('id='.$tagId.' AND status=1')->getField('category_id');
            $model = new \think\Model();
            $sql = 'SELECT bt.id,bt.uid,bt.title,bt.tag_ids,bt.view,bt.comment,bt.update_time,p.username FROM lsgoweb_document bt LEFT JOIN lsgoweb_ucenter_member p ON bt.uid=p.id WHERE bt.status=1 AND FIND_IN_SET('.$tagId.',bt.tag_ids) ORDER BY bt.update_time DESC'; 
            $lists = $model->query($sql);
        }
        $cate= D("Category");
        $tags = M('blog_article_tag')->where('status = 1')->field('id,tag_name')->select();
        $tagIds = array_column($tags,'tag_name','id');
        unset($tags['0']);
        foreach ($lists as &$val) {
            $val['tag_ids'] = explode(',',$val['tag_ids']);
        }
        $blogNav = $cate->getCategory($category);   
        $this->assign('menu', $menu);
        $this->assign('tags',$tagIds);
        $this->assign('len',count($tagIds));
        $this->assign('blogNav', $blogNav);
        $this->assign('lists',$lists);
        $this->assign('tag',$tagId);
        $this->display('lists');
    }

}
