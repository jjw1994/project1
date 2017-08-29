<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="robots" content="all"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no"/>
<link type="image/x-icon" href="/LSGOstudy/lsgo/Public/favicon.ico" rel="shortcut icon"/>
<!--[if lt IE 9]>
<script type="text/javascript" src="/LSGOstudy/lsgo/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/LSGOstudy/lsgo/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<base target="_blank"/>
<meta name="description" content="lsgogroup团队技术网站"/>
<meta name="keywords" content="lsgo,lsgogroup,lsgogroup团队技术网站"/>
<title>LSGO - let us go!</title>




    <!--private head-->
    <meta name="author" content="Aidan Dai, webaidandai@gmail.com, www.aidandai.com"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/menu.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/blog-nav.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/public.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/comment.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Blog/css/article-index.css"/>
    <link rel="stylesheet" href="/LSGOstudy/lsgo/mdeditor/css/editormd.css" />
    <!--/private head-->
</head>
<body>
<!-- header-->
<header>
    <div class="header-warpper">
        <div id="logo">
            <a class="logo" href="/LSGOstudy/lsgo/index.php?s=/Blog/Index/index.html" target="_self"></a>
        </div>
        <nav class="all-nav">
            <ul id="menu">
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ($menu["class"]); ?>">
                        <a href="/LSGOstudy/lsgo/index.php?s=/<?php echo ($menu["url"]); ?>.html" target="_self"><?php echo ($menu["title"]); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php
 $uid = session('userid') ? session('userid') : cookie('userid'); $map["id"] = $uid; $ucenter_member = D('ucenter_member'); $picture = D('picture'); $userInfo = $ucenter_member->where($map)->field('id,head_picture_id,username')->find(); $map1['id'] = $userInfo['head_picture_id']; $userInfo['headimgurl'] = $picture->where($map1)->getField('path'); unset($userInfo['head_picture_id']); ?>
                <?php if(session('userid') or cookie('userid')): ?><div class="user-logo">
                        <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/index/uid/<?php echo ($uid); ?>.html" target="_self">
                            <img src="/LSGOstudy/lsgo<?php echo ($userInfo['headimgurl']); ?>" alt="userheadimg" />
                        </a>
                        <div class="user-info">
                            <ul>
                                <li class="user-home">
                                    <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/index/uid/<?php echo ($uid); ?>.html" target="_self">
                                        主页
                                    </a>
                                </li>
                               <!--  <li class="user-letter">
                                    <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/letter.html" target="_self">私信</a>
                               </li>
                                <li class="user-collect">
                                    <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/collect.html" target="_self">收藏</a>
                                </li> -->
                                <li class="user-set">
                                    <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/setprofile/uid/<?php echo ($uid); ?>/type/person-info.html" target="_self">设置</a>
                                </li>
                                <li class="login-out">
                                    <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/logout.html" target="_self">退出</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <li class="user">
                        <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/login.html" target="_self">登录 | 注册</a>
                    </li><?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<!-- /header -->
<!--blog-nav-->
<div class="big-blog-nav-warpper">
    <ul class="big-blog-nav">
        <li id="blog-logo">
            <a class="blog-logo" href="/LSGOstudy/lsgo/index.php?s=/Blog/Index/index.html" target="_self">lsgo 团队技术博客</a>
        </li>
        <?php if(is_array($blogNav)): $i = 0; $__LIST__ = $blogNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="<?php echo ($nav["class"]); ?>">
                <a id="<?php echo ($nav["id"]); ?>" href="/LSGOstudy/lsgo/index.php?s=/Blog/Article/lists/category/<?php echo ($nav["id"]); ?>.html" target="_self"><?php echo ($nav["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li class="blog-search">
            <div class="blog-search" name="blog-search" action="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index" methed="get">
                <lable class="blog-seo-tip">please type keywords</lable>
                <input id="search-submit" class="blog-search-input search-keyword" name="keyword" type="text">
            </div>
        </li>
    </ul>
</div>
<!--/blog-nav-->
<div class="article-nav">
    <?php if(is_array($article_nav)): $i = 0; $__LIST__ = $article_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(!empty($nav["url"])): ?><a href="/LSGOstudy/lsgo/index.php?s=/<?php echo ($nav["url"]); ?>.html" target="_self"><?php echo ($nav["name"]); ?></a>
            <span class="nav-parting-line"> \ </span>
            <?php else: ?>
            <span class="nav-last"><?php echo ($nav["name"]); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="content">
    <div id="article-box">
        <?php if($article["mdeditor"] == 1): ?><div class="article">
    <h1 class="article-title"><?php echo ($article["title"]); ?></h1>
    <div class="article-tag">
        <?php if(is_array($arr_tag_name)): $i = 0; $__LIST__ = $arr_tag_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag_name): $mod = ($i % 2 );++$i;?><span class="tag-item"><?php echo ($tag_name); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php if($article["description"] != ''): ?><p class="article-description">概述：<?php echo ($article["description"]); ?></p><?php endif; ?>
    <div class="author">
        <img src="/LSGOstudy/lsgo<?php echo ($article["userheadimg"]); ?>" alt="author"/>
        <span class="name"><?php echo ($article["username"]); ?></span>
        <span class="time"><?php echo ($article["time"]); ?></span>
    </div>
    <div class="article-content">
        <div id="test-editormd-view">
            <textarea style="display:none;"><?php echo ($article["content"]); ?></textarea>
        </div>
    </div>
    <div class="about-views">
        <span class="views">浏览：<?php echo ($article["view"]); ?></span>
        <span class="like">赞：<?php echo ($article["like"]); ?></span>
        <span class="collect">收藏：<?php echo ($article["bookmark"]); ?></span>
        <span class="replay">回复：<?php echo ($article["comment"]); ?></span>
    </div>
</div>
            <?php else: ?>
            <div class="article">
    <h1 class="article-title"><?php echo ($article["title"]); ?></h1>
    <div class="article-tag">
        <?php if(is_array($arr_tag_name)): $i = 0; $__LIST__ = $arr_tag_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag_name): $mod = ($i % 2 );++$i;?><span class="tag-item"><?php echo ($tag_name); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php if($article["description"] != ''): ?><p class="article-description">概述：<?php echo ($article["description"]); ?></p><?php endif; ?>
    <div class="author">
        <img src="/LSGOstudy/lsgo<?php echo ($article["userheadimg"]); ?>" alt="author"/>
        <span class="name"><?php echo ($article["username"]); ?></span>
        <span class="time"><?php echo ($article["time"]); ?></span>
    </div>
    <div class="article-content"><?php echo ($article["content"]); ?></div>
    <div class="about-views">
        <span class="views">浏览：<?php echo ($article["view"]); ?></span>
        <span class="like">赞：<?php echo ($article["like"]); ?></span>
        <span class="collect">收藏：<?php echo ($article["bookmark"]); ?></span>
        <span class="replay">回复：<?php echo ($article["comment"]); ?></span>
    </div>
</div><?php endif; ?>
    </div>
    <div id="article-list">
        <div class="article-list">
            <div class="article-user">
                <a href="#">
                    <img src="/LSGOstudy/lsgo<?php echo ($user['head']); ?>" alt="user"/>
                </a>
                <span class="laster-article">最新文章</span>
            </div>
            <div class="article-list-box">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><a class="list-article-item" href="/LSGOstudy/lsgo/index.php?s=/Blog/Article/index/id/<?php echo ($list["id"]); ?>.html" target="_self">
                <?php echo ($list["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="like-action-box">
    <div class="like-action">赞</div>
</div>
<div class="other-action-box">
    <div class="cllect-article">收藏</div>
    <div class="share-article">分享</div>
</div> -->

<div class="blog-comment-box">
    <!--view comment-->
<?php if(is_array($comment)): $k = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><div class="view-comment">
        <input type="hidden" name="comment-id" value="<?php echo ($data["id"]); ?>" />
        <div class="view-comment-item-title">
            <span class="comment-user-name">
                <a href="#" target="_self"><?php echo ($data["username"]); ?></a>
            </span>
            <span>于 <?php echo ($data["create_time"]); ?> 说：</span>
            <span class="show-comment-replay">回复</span>
            <img src="/LSGOstudy/lsgo<?php echo ($data["user_headimg"]); ?>" />
            <span class="view-conment-id"><?php echo ($k); ?> 楼</span>
        </div>
        <div class="view-comment-item" id="view-comment-item<?php echo ($k); ?>">
            <textarea style="display:none;"><?php echo ($data["comment"]); ?></textarea>
        </div>

        <!--replay comment-->
        <?php if(is_array($data["child"])): $k1 = 0; $__LIST__ = $data["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$replay_data): $mod = ($k1 % 2 );++$k1;?><div class="comment-replay-box">
                <div class="replay-item">
                    <div class="replay-item-title">
                        <img src="/LSGOstudy/lsgo<?php echo ($replay_data["user_headimg"]); ?>" />
                        <span class="replay-user-name">
                            <a href="#" target="_self"><?php echo ($replay_data["username"]); ?></a>
                            <span class="replay-user-name">
                                <span>(回复)</span>
                                <a href="#" target="_self"><?php echo ($replay_data["replayed_username"]); ?></a>
                            </span>
                        </span>
                        <span>于 <?php echo ($replay_data["create_time"]); ?> 说：</span>
                        <span class="show-replay">回复</span>
                    </div>
                    <div class="replay-content">
                        <?php echo ($replay_data["replay_comment"]); ?>
                    </div>
                    <div class="replay-box">
                        <input type="text" name="replay-comment" placeholder="回复 <?php echo ($replay_data["username"]); ?>">
                        <button class="replay-submit">回复</button>
                        <input type="hidden" value="<?php echo ($replay_data["user_id"]); ?>" name="replayed-user-id" />
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/replay comment-->

        <div class="comment-replay">
            <input type="text" name="replay-comment" placeholder="回复 <?php echo ($data["username"]); ?>">
            <button class="comment-replay-submit replay-submit">回复</button>
            <input type="hidden" value="<?php echo ($data["user_id"]); ?>" name="replayed-user-id" />
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<!--/view comment-->

<!--write comment-->
<div class="comment">
    <link rel="stylesheet" href="/LSGOstudy/lsgo/mdeditor/css/editormd.css" />
    <div id="comment-editormd"></div>
    <div class="coment-but-group">
        <button id="comment-submit" class="comment-but">评 论</button>
    </div>
    <script src="/LSGOstudy/lsgo/mdeditor/write/js/jquery.min.js"></script>
    <script src="/LSGOstudy/lsgo/mdeditor/editormd.js"></script>
    <script type="text/javascript">
        var testEditor;

        $(function() {
            testEditor = editormd("comment-editormd", {
                width: "100%",
                height: 240,
                path : '/LSGOstudy/lsgo/mdeditor/lib/',
                toolbarIcons : function() {
                    return [
                        "bold","|", "italic", "|",
                        "quote", "|", "h1",  "|", "link", "|",
                        "reference-link", "|","image",
                        "|","emoji","|", "fullscreen",
                        "|", "clear", "|", "help","|",
                        "info"];
                },
                placeholder : "写评论...",
                lineNumbers : false,
                autoFocus : false,
                watch : false,                // 关闭实时预览
                emoji : true,

                imageUpload : true,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : Think.ROOT + "/mdeditor/write/php/upload.php?test=dfdf",

                /*
                 上传的后台只需要返回一个 JSON 数据，结构如下：
                 {
                 success : 0 | 1,           // 0 表示上传失败，1 表示上传成功
                 message : "提示的信息，上传成功或上传失败及错误信息等。",
                 url     : "图片地址"        // 上传成功时才返回
                 }
                 */
            });
        });
        $(function(){
            $('.show-replay').bind('click',function(){
                $(this).parents('.replay-item').children('.replay-box').toggleClass('replay-box-show');
            });
            $('.show-comment-replay').bind('click',function(){
                $(this).parents('.view-comment').children('.comment-replay').toggleClass('comment-replay-show');
            });
        });
    </script>
</div>
<!--/write comment-->

</div>
<!--footer-->
<footer class="footer">
    Copyright © 冀ICP备15013326号-2 1998-2015 LSGOGroup. All Rights Reserved
</footer>
<!--/footer-->
<script type="text/javascript">
	var Think = {
		"ROOT"   : "/LSGOstudy/lsgo", //当前网站地址
		"APP"    : "/LSGOstudy/lsgo/index.php?s=", //当前项目地址
		"PUBLIC" : "/LSGOstudy/lsgo/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
</script>


<!-- <script src="js/zepto.min.js"></script>
<script>
    var jQuery = Zepto;  // 为了避免修改flowChart.js和sequence-diagram.js的源码，所以使用Zepto.js时想支持flowChart/sequenceDiagram就得加上这一句
</script> -->
<script src="/LSGOstudy/lsgo/mdeditor/write/js/jquery.min.js"></script>
<script src="/LSGOstudy/lsgo/mdeditor/lib/marked.min.js"></script>
<script src="/LSGOstudy/lsgo/mdeditor/lib/prettify.min.js"></script>

<script src="/LSGOstudy/lsgo/mdeditor/lib/raphael.min.js"></script>
<script src="/LSGOstudy/lsgo/mdeditor/lib/underscore.min.js"></script>
<script src="/LSGOstudy/lsgo/mdeditor/lib/sequence-diagram.min.js"></script>
<script src="/LSGOstudy/lsgo/mdeditor/lib/flowchart.min.js"></script>
<script src="/LSGOstudy/lsgo/mdeditor/lib/jquery.flowchart.min.js"></script>

<script src="/LSGOstudy/lsgo/mdeditor/editormd.js"></script>
<script type="text/javascript">
    $(function() {
        editormd.markdownToHTML("test-editormd-view", {
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });
    });
</script>
    <div><?php echo ($islogin); ?></div>
<div class="hidden-data">
    <input type="hidden" name="login" value="<?php echo ($islogin); ?>">
    <input type="hidden" name="article_id" value="<?php echo ($id); ?>">
    <input type="hidden" name="article_user_id" value="<?php echo ($article_user_id); ?>">
</div>
<script type="text/javascript" src="/LSGOstudy/lsgo/Public/common/static/layer-v2.0/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        $.each($('.view-comment-item'),function(index,comment){
            var id = $(comment).attr('id');
            editormd.markdownToHTML(id, {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });
        });
        function getCookie(c_name) {
            if (document.cookie.length > 0) {
                var c_start = document.cookie.indexOf(c_name + "=");
                if (c_start != -1) {
                    c_start = c_start + c_name.length + 1;
                    var c_end = document.cookie.indexOf(";",c_start);
                    if (c_end == -1){
                        c_end = document.cookie.length;
                    }
                    return unescape(document.cookie.substring(c_start,c_end));
                }
            }
            return null;
        }
        var user_id = getCookie('userid') ? getCookie('userid') : $("input[name=login]").val();

        $("input[type=text]").focus(function(){
            checkLogin(user_id);
        });
        $('#comment-submit').one('click',function(){
            var date = new Date();
            var post = {
                relative_content: $("input[name=article_id]").val(),
                relative_name: 'id',
                user_id: user_id,
                is_read: 0,
                create_time: date.getTime(),
                status: 1,
                comment: testEditor.getValue(),
                replayed_user_id: $("input[name=article_user_id]").val(),
            };
            var check = checkLogin(user_id);
            if(check){
                handleComment(post);
            }
        });

        $('.replay-submit').one('click',function(){
            var date = new Date();
            var post = {
                relative_content: $("input[name=article_id]").val(),
                relative_name: 'id',
                user_id: user_id,
                pid: $(this).parents(".view-comment").find("input[name=comment-id]").val(),
                is_read: 0,
                create_time: date.getTime(),
                status: 1,
                replay_comment: $(this).siblings('input[name=replay-comment]').val(),
                replayed_user_id: $(this).siblings('input[name=replayed-user-id]').val(),
            };
            console.log(post);
            var check = checkLogin(user_id);
            if(check){
                handleComment(post);
            }
        });

        /**
         * check user by cookie and session(ajax)
         * @param null
         */
        function checkLogin(cookie){
            if(!(cookie || $("input[name=login]"))){
                //询问框
                layer.confirm('请登录后在评论，现在去登录？', {
                    btn: ['马上登录','残忍拒绝'] //按钮
                }, function(){
                    window.location.href = "/LSGOstudy/lsgo/index.php?s=/Home/User/login.html";
                }, function(){
                    layer.msg("只有登录后才能评论呦！");
                });
                return false;
            }else{
                return true;
            }
        }
        /**
         * handel comment of ajax post
         * @param post
         */
        function handleComment(post){

            if('comment' in post){
                if(post.comment){
                    ajaxComment(post);
                }else{
                    layer.msg("评论内容不能为空");
                }
            }else{
                if(post.replay_comment){
                    ajaxComment(post);
                }else{
                    layer.msg("回复内容不能为空");
                }
            }
        }

        /**
         * ajax post comment
         * @param post
         */
        function ajaxComment(post){
            $.post(
                    "/LSGOstudy/lsgo/index.php?s=/Home/User/comment.html",
                    post,
                    function(data){
                        if(data.status){
                            layer.msg(data.msg);
                            window.location.reload();
                        }else{
                            layer.msg(data.msg);
                        }
                    }
            );
        }

        $("body").keydown(function () {
            if (event.keyCode == "13") {
                window.location.href = Think.ROOT + "/index.php?s=/Blog/Search/index/keyword/" + $(".search-keyword").val();
            }
        });

    });
</script>
</body>
</html>