<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="robots" content="all"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no"/>
<link type="image/x-icon" href="/WWWstudy/WWW/LSGOstudy/lsgo/Public/favicon.ico" rel="shortcut icon"/>
<!--[if lt IE 9]>
<script type="text/javascript" src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<base target="_blank"/>
<meta name="description" content="lsgogroup团队技术网站"/>
<meta name="keywords" content="lsgo,lsgogroup,lsgogroup团队技术网站"/>
<title>LSGO - let us go!</title>




    <!--private head-->
    <meta name="author" content="Aidan Dai, webaidandai@gmail.com, www.aidandai.com"/>
    <link rel="stylesheet" type="text/css" href="/WWWstudy/WWW/LSGOstudy/lsgo/Public/common/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/WWWstudy/WWW/LSGOstudy/lsgo/Public/common/css/menu.css"/>
    <link rel="stylesheet" type="text/css" href="/WWWstudy/WWW/LSGOstudy/lsgo/Public/common/css/blog-nav.css"/>
    <link rel="stylesheet" type="text/css" href="/WWWstudy/WWW/LSGOstudy/lsgo/Public/common/css/public.css"/>
    <link rel="stylesheet" type="text/css" href="/WWWstudy/WWW/LSGOstudy/lsgo/Public/Blog/css/index-index.css"/>
    
    <!-- Unslider -->
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="//unslider.com/unslider.js"></script>
    <!-- /Unslider -->
    <style type="text/css">
        .banner { position: relative; overflow: auto; }
        .banner li { list-style: none; }
        .banner ul li { float: left; }
        /*.has-docs ol{
            width: 120px;
            height: 30px;
            position: absolute;
            left: 50%;
            margin-left: -60px;
            bottom: 30px;
        }
        .has-docs ol li{
            float: left;
            width: 20px;
            height: 30px;
            margin: 5px 0;
        }
        .has-docs ol a{
            display: block;
            float: left;
            height: 10px;
            width: 10px;
            margin: 4px 0;
            border: 2px solid #fff;
            border-radius: 8px;
        }*/
    </style>
    <!--/private head-->
</head>
<body>
    <!-- header-->
<header>
    <div class="header-warpper">
        <div id="logo">
            <a class="logo" href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Index/index.html" target="_self"></a>
        </div>
        <nav class="all-nav">
            <ul id="menu">
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ($menu["class"]); ?>">
                        <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/<?php echo ($menu["url"]); ?>.html" target="_self"><?php echo ($menu["title"]); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php
 $uid = session('userid') ? session('userid') : cookie('userid'); $map["id"] = $uid; $ucenter_member = D('ucenter_member'); $picture = D('picture'); $userInfo = $ucenter_member->where($map)->field('id,head_picture_id,username')->find(); $map1['id'] = $userInfo['head_picture_id']; $userInfo['headimgurl'] = $picture->where($map1)->getField('path'); unset($userInfo['head_picture_id']); ?>
                <?php if(session('userid') or cookie('userid')): ?><div class="user-logo">
                        <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/index/uid/<?php echo ($uid); ?>.html" target="_self">
                            <img src="/WWWstudy/WWW/LSGOstudy/lsgo<?php echo ($userInfo['headimgurl']); ?>" alt="userheadimg" />
                        </a>
                        <div class="user-info">
                            <ul>
                                <li class="user-home">
                                    <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/index/uid/<?php echo ($uid); ?>.html" target="_self">
                                        主页
                                    </a>
                                </li>
                               <!--  <li class="user-letter">
                                    <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/letter.html" target="_self">私信</a>
                               </li>
                                <li class="user-collect">
                                    <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/collect.html" target="_self">收藏</a>
                                </li> -->
                                <li class="user-set">
                                    <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/setprofile/uid/<?php echo ($uid); ?>/type/person-info.html" target="_self">设置</a>
                                </li>
                                <li class="login-out">
                                    <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/logout.html" target="_self">退出</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <li class="user">
                        <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Home/User/login.html" target="_self">登录 | 注册</a>
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
            <a class="blog-logo" href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Index/index.html" target="_self">lsgo 团队技术博客</a>
        </li>
        <?php if(is_array($blogNav)): $i = 0; $__LIST__ = $blogNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="<?php echo ($nav["class"]); ?>">
                <a id="<?php echo ($nav["id"]); ?>" href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Index/index/category/<?php echo ($nav["id"]); ?>.html" target="_self"><?php echo ($nav["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li class="blog-search">
            <div class="blog-search" name="blog-search">
                <lable class="blog-seo-tip">please type keywords</lable>
                <input id="search-submit" class="blog-search-input search-keyword" name="search-input" type="text">
            </div>
        </li>
    </ul>
</div>
<!--/blog-nav-->

    <!--banner-->
    <div class="banner-bg">
        <!-- <div class="banner has-docs">
            <ul>
                <li><img src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/Blog/images/first.jpg" alt="focus-first" /></li>
                <li><img src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/Blog/images/second.jpg" alt="focus-second" /></li>
                <li><img src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/Blog/images/third.jpg" alt="focus-third" /></li>
                <li><img src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/Blog/images/fourth.jpg" alt="focus-fourth" /></li>
            </ul> -->
            <!-- <ol class="dots">
                <li class="dot"><a href="#" class="first"></a></li>
                <li class="dot"><a href="#" class="second"></a></li>
                <li class="dot"><a href="#" class="third"></a></li>
                <li class="dot"><a href="#" class="fourth"></a></li>
            </ol> -->
        <!-- </div> -->
        <img src="/WWWstudy/WWW/LSGOstudy/lsgo/Public/Blog/images/banner_3000_600.jpg" alt="banner" />
    </div>
    <!--/banner-->

    <!--blog main-->
    <div class="blog-content">
        <div class="blog-tag">
            <ul class="tag-box">
                <li class="tag-item" url="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Article/lists/category/<?php echo ((isset($cate ) && ($cate !== ""))?($cate ):"2"); ?>.html">
                    <?php if($catelogo): ?><img class="tag-active" src="/WWWstudy/WWW/LSGOstudy/lsgo<?php echo ($catelogo['icon']); ?>" alt="全部" title="全部"/>
                        <?php else: ?>
                        <img class="tag-active" src="/WWWstudy/WWW/LSGOstudy/lsgo/Uploads/Picture/blogArticleTag/web.jpg" alt="全部" title="全部"/><?php endif; ?>
                </li>
                <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i; if($cate): ?><li class="tag-item" url="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Article/lists/tag/<?php echo ($tag["id"]); ?>.html">
                            <img class="<?php echo ($tag["class"]); ?>" src="/WWWstudy/WWW/LSGOstudy/lsgo<?php echo ($tag["tag_icon"]); ?>" alt="<?php echo ($tag["tag_name"]); ?>" id="<?php echo ($tag["id"]); ?>" title="<?php echo ($tag["tag_name"]); ?>"/>
                        </li>
                        <?php else: ?>
                        <li class="tag-item" url="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Article/lists/tag/<?php echo ($tag["id"]); ?>.html">
                            <img class="<?php echo ($tag["class"]); ?>" src="/WWWstudy/WWW/LSGOstudy/lsgo<?php echo ($tag["tag_icon"]); ?>" alt="<?php echo ($tag["tag_name"]); ?>" id="<?php echo ($tag["id"]); ?>" title="<?php echo ($tag["tag_name"]); ?>"/>
                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="blog-artical">
            <div class="blog-articles-tag">
                <?php if($catelogo): ?><img class="current-articles-tag" src="/WWWstudy/WWW/LSGOstudy/lsgo<?php echo ($catelogo['icon']); ?>"  alt="全部"/>
                    <?php else: ?>
                    <img class="current-articles-tag" src="/WWWstudy/WWW/LSGOstudy/lsgo/Uploads/Picture/blogArticleTag/web.jpg" alt="全部" id="" /><?php endif; ?>
                <span class="current-articles-title" id="current-articles-title"><?php echo ($category_name); ?></span>
                <span class="article-change">换一换？</span>
            </div>
            <ul class="article-box">
                <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articles): $mod = ($i % 2 );++$i;?><li class="article-item">
                        <a href="/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=/Blog/Article/index/id/<?php echo ($articles["id"]); ?>.html" target="_self">
                            <span class="article-time"><?php echo ($articles["time"]); ?></span>
                            <span class="article-title"><?php echo ($articles["title"]); ?></span>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="tag-total">
                <?php if($length): ?>当前标签下共有<?php echo ($length); ?>篇文章
                    <?php else: ?>
                    当前标签下还没有文章<?php endif; ?>
            </div>
        </div>
    </div>
    <!--/blog main-->

    <!--footer-->
<footer class="footer">
    Copyright © 冀ICP备15013326号-2 1998-2015 LSGOGroup. All Rights Reserved
</footer>
<!--/footer-->
    <script type="text/javascript">
	var Think = {
		"ROOT"   : "/WWWstudy/WWW/LSGOstudy/lsgo", //当前网站地址
		"APP"    : "/WWWstudy/WWW/LSGOstudy/lsgo/index.php?s=", //当前项目地址
		"PUBLIC" : "/WWWstudy/WWW/LSGOstudy/lsgo/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
</script>

    <script type="text/javascript">
        $(function() {

            $('.banner').unslider();

            var post = {
                category: $('.blog-active>a').attr('id'),
            };
            //mouseover tag
            $('.tag-item>img').mouseover(function () {
                changeTag(this);
                //钟锦
                var current_article = document.getElementById("current-articles-title");
                current_article.firstChild.nodeValue = this.getAttribute('title');

                post.tag = $(this).attr('id') == undefined ? "" : $(this).attr('id');
                post.change = 0;

                ajaxPost(post);

            });
            //clcik tag
            $('.tag-item>img').click(function () {
                window.location.href = $(this).parents('.tag-item').attr('url');
            });
            //click change
            $('.article-change').click(function () {
                post.change = 1;
                post.tag = $(this).siblings('img').attr('id');

                ajaxPost(post);
            });

            /**
             * change aitilce list
             * @param post
             */
            function ajaxPost(post) {
                $.post(
                        Think.ROOT + '/index.php?s=/Blog/Index/index.html',
                        post,
                        function (data) {
                            $('.article-box').html(data["html"]);

                            if (data["count"]) {
                                $('.tag-total').text('当前标签下共有' + data["count"] + '篇文章');
                            } else {
                                $('.tag-total').text('当前标签下还没有文章');
                            }
                        }
                );
            }

            function changeTag(elememt) {
                $.each($('.tag-item>img'), function (index, img) {
                    $(img).removeClass('tag-active');
                });
                $(elememt).addClass('tag-active');
                $(".blog-artical img").attr({
                    src: $(elememt).attr('src'),
                    alt: $(elememt).attr('alt'),
                    id: $(elememt).attr('id')
                });
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