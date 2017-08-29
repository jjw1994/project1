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
    <meta name="description" content="lsgogroup"/>
    <meta name="keywords" content="lsgogroup"/>
    <meta name="author" content="Aidan Dai, webaidandai@gmail.com, www.aidandai.com"/>
    <link rel="stylesheet" type="text/css" href="/lsgo/Public/common/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/lsgo/Public/Home/css/login-register.css"/>
    <!--/private head-->
</head>
<body>
    <div class="lr-bg1"></div>
    <div class="lr-big-title">
        <h1>这么晚才来注册</h1>
        <h1>你是去拯救地球了嘛！？</h1>
    </div>
    <!--login-register-->
    <div class="login-register-box">
        <div class="lr-title">
            <span class="login-open lr-title-on">登录</span>
            <span class="register-open">注册</span>
        </div>
        <div id="login">
            <div name="login" class="login-box">
                <p class="login-error-tip error"></p>
                <div class="group-input">
                    <input class='l-email' type="text" name="email" placeholder="请输入登录邮箱">
                    <p class="l-email-tip error">
                    </p>
                </div>
                <div class="group-input">
                    <input class='l-password' type="password" name="password" placeholder="请输入密码">
                    <p class="l-password-tip error">
                    </p>
                </div>
                <div class="group-input">
                    <div class="verify-box">
                        <input class='l-verify' type="text" name="verify" placeholder="请输入验证码">
                        <img class="verify-content js-verify-refresh" src="<?php echo U('User/verify');?>">
                        <span class="verify-reload js-verify-refresh">看不清？换一张</span>
                    </div>
                    <p class="l-verify-tip error">
                    </p>
                </div>
                <div class="login-tip">
                    <div class="auto-login-aigin">
                        <input type="checkbox" name="auto_login" value="1">
                        <p class="auto-login-tip">
                            下次自动登录
                        </p>
                    </div>
                    <p class="forget-pwd">
                        <a href="#" target="_self">忘记密码？</a>
                    </p>
                </div>
                <button class="login-action">登 录</button>
            </div>
        </div>
        <div id="register">
            <div name="login" class="login-box">
                <p class="register-error-tip error"></p>
                <div class="group-input">
                    <input class='r-email' type="text" name="email" placeholder="请输入电子邮箱地址">
                    <p class="r-email-tip error">
                    </p>
                </div>
                <div class="group-input">
                    <input class='r-password' type="password" name="password" placeholder="6-13位密码，区分大小写，不能用空格">
                    <p class="r-password-tip error">
                    </p>
                </div>
                <div class="group-input">
                    <input class='r-username' type="text" name="username" placeholder="昵称为2-18位，中英文、数字及下划线">
                    <p class="r-username-tip error">
                    </p>
                </div>
                <div class="group-input">
                    <div class="verify-box">
                        <input class='r-verify' type="text" name="verify" placeholder="请输入验证码">
                        <img class="verify-content js-verify-refresh"  src="<?php echo U('User/verify');?>">
                        <span class="verify-reload js-verify-refresh">看不清？换一张</span>
                    </div>
                    <p class="r-verify-tip error">
                    </p>
                </div>
                <button class="register-action">注 册</button>
            </div>
        </div>
    </div>
    <!--/login-register-->
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

    <script type="text/javascript" src="/lsgo/Public/Home/js/login-register.js"></script>
</body>
</html>