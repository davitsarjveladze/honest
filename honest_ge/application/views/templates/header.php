<html>
<head>
	<title><?php echo $title ?></title>
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
<!--	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">-->
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic%7CLato:300,300italic,400,400italic,700,900%7CMerriweather:700italic">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<!--[if lt IE 10]>
    <script src="<?php echo base_url("assets/js/html5shiv.min.js"); ?>"></script>
	<![endif]-->

</head>
<body>
<div class="preloader">
	<div class="preloader-body">
		<div class="cssload-container">
			<div class="cssload-speeding-wheel"> </div>
		</div>
		<p>Loading...</p>
	</div>
</div>
<div class="page">
	<header class="page-head">
		<div class="rd-navbar-wrap">
			<nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
				<div class="rd-navbar-inner">
					<div class="rd-navbar-aside-wrap">
						<div class="rd-navbar-aside">
							<div class="rd-navbar-aside-toggle" data-rd-navbar-toggle=".rd-navbar-aside"><span></span></div>
							<div class="rd-navbar-aside-content">
								<ul class="rd-navbar-aside-group list-units">
									<li>
										<div class="unit unit-horizontal unit-spacing-xs align-items-center">
											<div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span></div>
											<div class="unit-body"><a class="link-dusty-gray" href="mailtfo:#">behonesttoshine@gmail.com</a></div>
										</div>
									</li>
								</ul>
								<div class="rd-navbar-aside-group">
									<ul class="list-inline list-inline-reset">
										<li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-facebook" href="#"></a></li>
										<li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-twitter" href="#"></a></li>
										<li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-google-plus" href="#"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="rd-navbar-group">
						<div class="rd-navbar-panel">
							<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button><a style="font-size: 20px; margin-top: -8px;" class="rd-navbar-brand brand" href="/">
                                <img style="max-width:30px; max-height: 30px" src="<?php echo base_url('assets/images/honest_logo_min_extraXxX.jpg'); ?>" class="card-img" alt="...">
                                <B >Honest</B>
                            </a>
						</div>
						<div class="rd-navbar-nav-wrap">
							<div class="rd-navbar-nav-inner">
                                <?php if(!isset($User)) : ?>
								<div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="/registration">რეგისტრაცია</a></div>
								<div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="/login">შესვლა</a></div>
                                <?php else: ?>
                                    <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="/login">გასვლა</a></div>
                                    <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="javascript:void(0)">გამარჯობა <?php echo $User['login']?></a></div>

                                <?php endif;?>
								<ul class="rd-navbar-nav">
									<li class="active"><a href="/">მთავარი</a>
									</li>
                                    <?php if(isset($User) && $User['id'] == 1) : ?>
                                    <li class=""><a href="/elsata">სტატიების დამატება</a>
                                    <li class=""><a href="/adminchat">ადმინის ჩატი</a>

                                        <?php endif;?>
									</li>
<!--									<li><a href="/contact">კონტაქტები</a>-->
<!--									</li>-->
									<li ><a href="/about">ჩვენს შესახებ</a>
									<li><a href="/chat">ჩატი</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>




