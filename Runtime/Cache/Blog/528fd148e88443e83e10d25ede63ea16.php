<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ch-cmn-hans">
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
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/common/css/public.css">

    <!--private-->
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Blog/css/search.css">
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Blog/css/lists-atricale.css">
    <link rel="stylesheet" type="text/css" href="/LSGOstudy/lsgo/Public/Home/css/page.css">
    <!--/private-->
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

<!--search-->
<div id="blog-search">
    <div class="search-from">
        <input type="text" value="<?php echo ($keyword); ?>" name="keyword" id="search-keyword">
        <input type="button" value="搜 索" id="search-button">
    </div>
    <hr class="search-cut-line"/>
    <div class="search-type">
        <a class="search-article search-type-active" href="/LSGOstudy/lsgo/index.php/Blog/Search/index/type/article/keyword/<?php echo ($keyword); ?>" target="_self">文 章</a>
        <a class="search-user" href="/LSGOstudy/lsgo/index.php/Blog/Search/index/type/user/keyword/<?php echo ($keyword); ?>"  target="_self">用 户</a>
    </div>
    <hr class="serach-bottom-line"/>
</div>
<!--/search-->

<!--search-result-->
<section id="search-result">
    <div class="main">
        <div class="search-order">
            <a class="order-time order-active" href="/LSGOstudy/lsgo/index.php/Blog/Search/index/type/<?php echo ($type); ?>/order/time/keyword/<?php echo ($keyword); ?>"  target="_self">时间排序</a>
            <a class="order-view" href="/LSGOstudy/lsgo/index.php/Blog/Search/index/type/<?php echo ($type); ?>/order/view/keyword/<?php echo ($keyword); ?>"  target="_self">热度排序</a>
        </div>
        <div class="search-content">
            <?php if($get[t] == a): ?><div class="user-article">
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
                <?php else: ?>
                <ul class="user-list">
    <li>
        <img src="/LSGOstudy/lsgo/Public/Blog/images/author.jpg" alt="user"/>
        <div class="user-list-info">
            <p><a href="#" target="_self">AidanDai</a><p/>
            <p>以大多数人的努力程度之低，根本轮不到拼天赋……</p>
        </div>
        <div class="user-list-article">
            <div>
                <span>文章</span>
                <span>123</span>
            </div>
            <div class="cut-line"></div>
            <div>
                <span>浏览量</span>
                <span>235</span>
            </div>
        </div>
    </li>
    <li>
        <img src="/LSGOstudy/lsgo/Public/Blog/images/author.jpg" alt="user"/>
        <div class="user-list-info">
            <p><a href="#" target="_self">AidanDai</a><p/>
            <p>以大多数人的努力程度之低，根本轮不到拼天赋……</p>
        </div>
        <div class="user-list-article">
            <div>
                <span>文章</span>
                <span>123</span>
            </div>
            <div class="cut-line"></div>
            <div>
                <span>浏览量</span>
                <span>235</span>
            </div>
        </div>
    </li>
    <li>
        <img src="/LSGOstudy/lsgo/Public/Blog/images/author.jpg" alt="user"/>
        <div class="user-list-info">
            <p><a href="#" target="_self">AidanDai</a><p/>
            <p>以大多数人的努力程度之低，根本轮不到拼天赋……</p>
        </div>
        <div class="user-list-article">
            <div>
                <span>文章</span>
                <span>123</span>
            </div>
            <div class="cut-line"></div>
            <div>
                <span>浏览量</span>
                <span>235</span>
            </div>
        </div>
    </li>
    <li>
        <img src="/LSGOstudy/lsgo/Public/Blog/images/author.jpg" alt="user"/>
        <div class="user-list-info">
            <p><a href="#" target="_self">AidanDai</a><p/>
            <p>以大多数人的努力程度之低，根本轮不到拼天赋……</p>
        </div>
        <div class="user-list-article">
            <div>
                <span>文章</span>
                <span>123</span>
            </div>
            <div class="cut-line"></div>
            <div>
                <span>浏览量</span>
                <span>235</span>
            </div>
        </div>
    </li>
    <li>
        <img src="/LSGOstudy/lsgo/Public/Blog/images/author.jpg" alt="user"/>
        <div class="user-list-info">
            <p><a href="#" target="_self">AidanDai</a><p/>
            <p>以大多数人的努力程度之低，根本轮不到拼天赋……</p>
        </div>
        <div class="user-list-article">
            <div>
                <span>文章</span>
                <span>123</span>
            </div>
            <div class="cut-line"></div>
            <div>
                <span>浏览量</span>
                <span>235</span>
            </div>
        </div>
    </li>
    <li>
        <img src="/LSGOstudy/lsgo/Public/Blog/images/author.jpg" alt="user"/>
        <div class="user-list-info">
            <p><a href="#" target="_self">AidanDai</a><p/>
            <p>以大多数人的努力程度之低，根本轮不到拼天赋……</p>
        </div>
        <div class="user-list-article">
            <div>
                <span>文章</span>
                <span>123</span>
            </div>
            <div class="cut-line"></div>
            <div>
                <span>浏览量</span>
                <span>235</span>
            </div>
        </div>
    </li>
</ul><?php endif; ?>
        </div>
    </div>
    <div class="side">
        <div>热门搜索</div>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/css" target="_self">css</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/html" target="_self">html</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/javascript" target="_self">javascript</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/php" target="_self">php</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/mysql" target="_self">mysql</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/apache" target="_self">apache</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/linux" target="_self">linux</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/thinkphp" target="_self">thinkphp</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/onethink" target="_self">onethink</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/C#" target="_self">C#</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/C++" target="_self">C++</a>
        <a href="/LSGOstudy/lsgo/index.php?s=/Blog/Search/index/keyword/C" target="_self">C</a>
    </div>
</section>
<!--/search-result-->
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

<script type="text/javascript">
    $(function(){
        $("#search-button").click(function(){
            var url = window.location.href;
            url = url.substring(0, url.indexOf("keyword") + 8);
            window.location.href = url + $("#search-keyword").val();
        });
        $("body").keydown(function() {
            if (event.keyCode == "13") {
                $("#search-button").click();
            }
        });
    });
</script>
</body>
</html>