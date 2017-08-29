<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
	<head>
	    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="robots" content="all"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no"/>
<link type="image/x-icon" href="/lsgo/Public/favicon.ico" rel="shortcut icon"/>
<!--[if lt IE 9]>
<script type="text/javascript" src="/lsgo/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/lsgo/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<base target="_blank"/>
<meta name="description" content="lsgogroup团队技术网站"/>
<meta name="keywords" content="lsgo,lsgogroup,lsgogroup团队技术网站"/>
<title>LSGO - let us go!</title>




	    <!--private head-->
	    <meta name="author" content="Aidan Dai, webaidandai@gmail.com, www.aidandai.com"/>
	    <link rel="stylesheet" type="text/css" href="/lsgo/Public/common/css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="/lsgo/Public/common/css/menu.css"/>
	    <link rel="stylesheet" type="text/css" href="/lsgo/Public/common/css/blog-nav.css"/>
	    <link rel="stylesheet" type="text/css" href="/lsgo/Public/common/css/public.css"/>
	    <link rel="stylesheet" type="text/css" href="/lsgo/Public/Blog/css/index-index.css"/>
	    <link rel="stylesheet" type="text/css" href="/lsgo/Public/Blog/css/lists-atricale.css"/>
	    <!--/private head-->
	</head>
	<body style="background-color: #fff;">
	<!-- header-->
<header>
    <div class="header-warpper">
        <div id="logo">
            <a class="logo" href="/lsgo/index.php?s=/Blog/Index/index.html" target="_self"></a>
        </div>
        <nav class="all-nav">
            <ul id="menu">
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ($menu["class"]); ?>">
                        <a href="/lsgo/index.php?s=/<?php echo ($menu["url"]); ?>.html" target="_self"><?php echo ($menu["title"]); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php
 $uid = session('userid') ? session('userid') : cookie('userid'); $map["id"] = $uid; $ucenter_member = D('ucenter_member'); $picture = D('picture'); $userInfo = $ucenter_member->where($map)->field('id,head_picture_id,username')->find(); $map1['id'] = $userInfo['head_picture_id']; $userInfo['headimgurl'] = $picture->where($map1)->getField('path'); unset($userInfo['head_picture_id']); ?>
                <?php if(session('userid') or cookie('userid')): ?><div class="user-logo">
                        <a href="/lsgo/index.php?s=/Home/User/index/uid/<?php echo ($uid); ?>.html" target="_self">
                            <img src="/lsgo<?php echo ($userInfo['headimgurl']); ?>" alt="userheadimg" />
                        </a>
                        <div class="user-info">
                            <ul>
                                <li class="user-home">
                                    <a href="/lsgo/index.php?s=/Home/User/index/uid/<?php echo ($uid); ?>.html" target="_self">
                                        主页
                                    </a>
                                </li>
                               <!--  <li class="user-letter">
                                    <a href="/lsgo/index.php?s=/Home/User/letter.html" target="_self">私信</a>
                               </li>
                                <li class="user-collect">
                                    <a href="/lsgo/index.php?s=/Home/User/collect.html" target="_self">收藏</a>
                                </li> -->
                                <li class="user-set">
                                    <a href="/lsgo/index.php?s=/Home/User/setprofile/uid/<?php echo ($uid); ?>/type/person-info.html" target="_self">设置</a>
                                </li>
                                <li class="login-out">
                                    <a href="/lsgo/index.php?s=/Home/User/logout.html" target="_self">退出</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <li class="user">
                        <a href="/lsgo/index.php?s=/Home/User/login.html" target="_self">登录 | 注册</a>
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
            <a class="blog-logo" href="/lsgo/index.php?s=/Blog/Index/index.html" target="_self">lsgo 团队技术博客</a>
        </li>
        <?php if(is_array($blogNav)): $i = 0; $__LIST__ = $blogNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="<?php echo ($nav["class"]); ?>">
                <a id="<?php echo ($nav["id"]); ?>" href="/lsgo/index.php?s=/Blog/Article/lists/category/<?php echo ($nav["id"]); ?>.html" target="_self"><?php echo ($nav["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li class="blog-search">
            <form class="blog-search" name="blog-search" action="/lsgo/index.php?s=/Blog/Search/index.html" methed="get">
                <lable class="blog-seo-tip">please type keywords</lable>
                <input class="blog-search-input" name="search-input" type="text">
            </form>
        </li>
    </ul>
</div>
<!--/blog-nav-->
	<script type="text/javascript">
	var Think = {
		"ROOT"   : "/lsgo", //当前网站地址
		"APP"    : "/lsgo/index.php?s=", //当前项目地址
		"PUBLIC" : "/lsgo/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
</script>

	<section>
		<div class="user-article">
	<!-- <span class="section-title">文章</span> -->
	<ul class="atricle-list">
		<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<div class="tags">
						<?php if(is_array($vo["tag_ids"])): $i = 0; $__LIST__ = $vo["tag_ids"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><span class="unique"><?php echo ($tags["$tag"]["tag_name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<a class="particular-head" href="<?php echo U("Article/index",array("id"=>$vo["id"]));?>" target="_self">
						<?php echo ($vo["title"]); ?>
					</a>
					<div class="articale-info">
						<span class="author-name">作者：<?php echo ($vo["username"]); ?></span>
						<span class="right-info">
							<span class="update-time">
								<?php echo date("Y-m-d H:i:s",$vo['update_time']);?>
							</span>
							<span class="view">
								阅读: <span class="number">(<?php echo ($vo["view"]); ?>)</span>
							</span>
							<span class="view">
								评论: <span class="number">(<?php echo ($vo["comment"]); ?>)</span>
							</span>
						</span>
					</div>
				</li>
<!-- 				<span class="read-number">
					231
				</span>
				<span class="particular-content">
					UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系UI设计师应掌握的
				</span> -->
			<!-- </a>	 --><?php endforeach; endif; else: echo "" ;endif; ?>
		<!-- <li>
			<a href="">
				<span class="particular-head">
					UI设计师应掌握的知识体系及职业规划
				</span>
				<span class="read-number">
					231
				</span>
				<span class="particular-content">
					UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系UI设计师应掌握的
				</span>
			</a>	
		</li>
		<li>
			<a href="">
				<span class="particular-head">
					UI设计师应掌握的知识体系及职业规划
				</span>
				<span class="read-number">
					231
				</span>
				<span class="particular-content">
					UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系及职业规划UI设计师应掌握的知识体系UI设计师应掌握的
				</span>
			</a>	
		</li> -->
	</ul>
</div>	
		<div class="right-tags">
	<?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U("Article/lists",array("tag"=>$vo["id"]));?>" class="unique" <?php if($vo["id"] == $tag): ?>id="active"<?php endif; ?> target="_self">
				<?php echo ($vo["tag_name"]); ?>
			</a>
		</if><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
	</section>
	<!--footer-->
<footer class="footer">
    Copyright © 冀ICP备15013326号-2 1998-2015 LSGOGroup. All Rights Reserved
</footer>
<!--/footer-->
	</body>
</html>