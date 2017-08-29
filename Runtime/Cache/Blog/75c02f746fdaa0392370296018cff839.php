<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
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



    <meta name="author" content="Aidan Dai, webaidandai@gmail.com, www.aidandai.com"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/menu.css"/>
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Home/css/page.css">
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Blog/css/index-search.css">
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Blog/css/lists-atricale.css">

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
<div id="head-search">
    <div id="search">
        <div>
            <input  id="search-input" type="text" placeholder="&nbsp;&nbsp;搜索内容">
        </div>
        <div>
            <a href="/LSGOstudy/lsgo/index.php/Blog/Index/search" target="_self">
                <button type="button" id="search-button">
                    <img id="search-img" src="/LSGOstudy/lsgo/Public/Blog/images/search_img.png">
                </button>
            </a>
        </div>
    </div>
</div>
<div id="head-article-user">
    <div id="article-user">
        <ul id="article-user-ul">
            <a href="/LSGOstudy/lsgo/index.php/Blog/Index/search/type/article" target="_self"><li class="article-user-li">文章</li></a>
            <a href="/LSGOstudy/lsgo/index.php/Blog/Index/search/type/user" target="_self"><li class="article-user-li">用户</li></a>
        </ul>
    </div>
</div>
<div id="main">
<?php if($lists["type"] == art): ?><div id="main-order">
        <ul id="main-order-ul">
            <li class="main-order-li"><a href="/LSGOstudy/lsgo/index.php/Blog/Index/search/type/article/order/view" target="_self">热度排序</a></li>
            <li class="main-order-li"><a href="/LSGOstudy/lsgo/index.php/Blog/Index/search/type/article/order/time" target="_self">时间排序</a></li>
        </ul>
    </div>
    <div id="left">
        <div class="user-article">
	<!-- <span class="section-title">文章</span> -->
	<ul class="atricle-list">
		<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<div class="tags">
						<?php if(is_array($vo["tag_ids"])): $i = 0; $__LIST__ = $vo["tag_ids"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><span class="unique"><?php echo ($tags["$tag"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
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
    </div>
<?php else: ?>
    <div id="user-left">
        <ul>
            <li>
                <a href="/LSGOstudy/lsgo/index.php?s=/Home/User/index/uid/29.html" target="_self">
                    <!--<div class="user-img">-->
                    <img src="/LSGOstudy/lsgo/Public/Blog/images/search-right.jpg" width="70px" height="70px">
                    <!--</div>-->
                    <div class="userinfo">
                        <span class="user-name">大师兄李嘉图</span>
                        <span class="user-sign">速度飞速度读书多年辅导书点击个电饭锅</span>
                    </div>
                    <div class="user-art-and-num">
                        <span class="user-art">文章</span>
                        <span class="user-art-num">100</span>
                    </div>
                </a>
            </li>
        </ul>
    </div><?php endif; ?>
    <div id="right">
        <?php if($lists["type"] != art): ?><div id="empty"></div><?php endif; ?>
            <div id="more">
                <a href="/LSGOstudy/lsgo/index.php/Blog/Index/index" target="_self">去更多世界看看?></a>
            </div>
            <div id="picture">
                <img src="/LSGOstudy/lsgo/Public/Blog/images/search-right.jpg" width="270px" height="400px">
            </div>
    </div>
    
</div>
<div id="page">
    <ul>
        <li><span class="page-disabled">首页</span></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/2" target="_self">上一页</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/1" target="_self">1</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/2" target="_self">2</a></li>
        <li><a class="page-active" href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/3" target="_self">3</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/4" target="_self">4</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/5" target="_self">5</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/6" target="_self">6</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/7" target="_self">7</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/4" target="_self">下一页</a></li>
        <li><a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css/p/8" target="_self">尾页</a></li>
    </ul>
</div>
</body>
</html>