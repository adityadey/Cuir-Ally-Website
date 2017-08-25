<?php
	session_start();
	function getUserIP(){
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		return $ip;
	}
	$user_ip = getUserIP();
	$str = file_get_contents('http://ip-api.com/json/'.$user_ip.'');
	$json = json_decode($str, true);
	$ipdir = $json;
	if($ipdir['countryCode'] != 'IN'){
		$_SESSION['store_location'] = 'IS';
		$_SESSION['store_url'] = 'store';
	} else {
		$_SESSION['store_location'] = 'IN';
		$_SESSION['store_url'] = 'shop';
	}
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Ubuntu:400,500,700" rel="stylesheet">
    <title>Cuir Ally - Redefining the way you carry</title>
    <meta name="description" content="Technology enabled luxury leather goods that are Functional, Ergonomic and ofcourse better looking. When it comes to leather, we are your best Ally."/>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='css/animate.min.css'>
    <!--<link rel='stylesheet' type='text/css' href='css/ionicons.min.css' >
	  <link rel='stylesheet' type='text/css' href='css/linea.css' >
      <link rel='stylesheet' type='text/css' href='css/waves.min.css' >
      <link rel='stylesheet' type='text/css' href='css/owl.carousel.css' > -->
    <link rel='stylesheet' type='text/css' href='css/magnific-popup.css'>
    <link rel='stylesheet' type='text/css' href='css/jquery.flipster.min.css'>
	<link rel='stylesheet' type='text/css' href='css/formvalidation.css'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
	<link rel="stylesheet" type="text/css" href="flags/flags.css">
		<style>
		.voyager-bghome{
			background: rgba(4, 4, 4, 0.7);
			border-radius: 5px;
		}
		.voyager-bghomewhite{
			background: rgba(4, 4, 4, 0.7);
			border-radius: 5px;
		}
		.list-dash-heading{
		  margin-left: 20px;
		  font-weight: 700;
		  border-bottom: 1px solid #ccc;
		  display: inline-block;
		  margin-top: 14px;
		}
		.font700{
		  font-weight: 700 !important;
		}
		.fontweight600{
		  font-weight: 600 !important;
		}
		.fontweight300{
		  font-weight: 300 !important;
		}
		.fontubuntu{
		  font-family: 'Ubuntu', sans-serif;
		}
		.fontopensans{
		  font-family: 'Open Sans', sans-serif;
		}
		.stark-banner-footer {
			background: #ececec url('stark/img/stark-foot-header.png') left bottom no-repeat;
			padding: 30px;
			box-shadow: 10px 1px 5px #888888;
		}
		.pre-footer-heading {
			font-weight: 300;
			color: #0e2024;
			font-size: 48px;
			line-height: 48px;
			margin-bottom: 20px;
		}
		/* Funds Campaign */
		#test-form {
			background: #fff;
			padding: 5px 5px;
			max-width: 1200px;
			margin: 0 auto;
		}
		#test-form .smart-right,#test-form .smart-left {
			margin-top: -100px !important;
		}
		@media (max-width: 992px){
			#test-form .smart-right,#test-form .smart-left {
				margin-top: -70px !important;
			}
		}
		@media (max-width: 768px){
			#test-form .smart-right,#test-form .smart-left {
				display:none;
			}
		}
		/* Funds Campaign */
		.box-campaign {
			background: transparent;
			border-color: transparent;
			border-radius: 0 26px 26px 0;
			box-shadow: none;
			color: #fff;
			height: 441px;
			margin-bottom: 20px;
			position: relative;
			width: auto;
		}
		.box-campaign a {
			color: #fff;
			font-size: 24px;
			font-weight: 300;
		}
		.box-campaign a:hover{
			text-decoration: none;
		}
		.panel-rightbody i{
			font-size: 40px;
		}

		.panel-default > .panel-leftheading
		{
			background: #d31146;
		}

		.panel-leftheading
		{
			float: left;
			height: 245px;
			padding: 10px 15px;
			position: absolute;
			width: 42px;
			border-radius: 0 15px 15px 0;
		}

		.panel-lefttitle
		{
			position: absolute;
			-webkit-transform: rotate(270deg);
			-webkit-transform-origin: left top;
			-moz-transform: rotate(270deg);
			-moz-transform-origin: left top;
			-ms-transform: rotate(270deg);
			-ms-transform-origin: left top;
			-o-transform: rotate(270deg);
			-o-transform-origin: left top;
			transform: rotate(270deg);
			transform-origin: left top;
		}

		.panel-rightbody {
			background: #d31146 none repeat scroll 0 0;
			display: none;
			float: left;
			height: 245px;
			margin-left: 42px;
			padding: 0px 15px 25px;
			width: 580px;
			border-radius: 0 10px 10px 0;
		}
		.panel-rightbody > div {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		#leftSLideBar {
			left: -1px;
			position: fixed;
			top: 50%;
			margin-top: -170px;
			z-index: 999;
		}
		#leftSLideBar .panel-rightbody p {  line-height: 17px; }
		#leftSLideBar .panel-rightbody i.fa {  margin-bottom: 30px; }
		#leftSLideBar .panel-leftheading {  opacity:0.9;}
		#leftSLideBar .panel-lefttitle {
			bottom: -20px;
			font-size: 16px;
			font-weight: 300;
			left: 0;
			line-height: 28px;
			padding-left: 0px;
			white-space: nowrap;
		}
		#leftSLideBar .panel.panel-default > img:first-child {
			height: 64px;
			opacity: 0.7;
			position: absolute;
			right: 53px;
			top: 37px;
			width: 169px;
		}
		#leftSLideBar:hover .panel-rightbody {
			display: table;
		}
		#leftSLideBar:hover .panel-leftheading{
			border-radius: 1px 1px 1px 1px;
			opacity: 1;
		}
		a.popup-link {
			font-size: initial;
			color: #d9d9d9;
		}
		.indiegogo{
			background: rgba(255, 255, 255, 0.9);
			padding: 12px;
			color: #000;
		}
		a.popup-link:hover {
			color: #fff;
		}
		@media screen and (max-width: 768px) {
			.stark-banner-footer{
				text-align:center;
			}
		}
		@media screen and (max-width: 480px) {
			.panel-leftheading {
				height: 347px;
				width: 30px;
			}
			#leftSLideBar .panel-lefttitle {
				font-size: 16px;
				padding-left: 60px;
			}
			.panel-rightbody {
				height: 347px;
				margin-left: 20px;
				padding: 0px 15px 25px;
				width: 300px;
			}
		}
	</style>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-88286480-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '230821970450013'); // Insert your pixel ID here.
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=230821970450013&ev=PageView&noscript=1"
	/></noscript>
	<!-- DO NOT MODIFY -->
	 
	<!-- End Facebook Pixel Code -->

	
</head>
<style>
		/* Styles for dialog window */
#small-dialog {
    padding: 20px 30px 0;
    text-align: left;
    max-width: 526px;
    margin: 40px auto;
    min-height: 360px;
    position: relative;
    color: #fff;
}
h2, h3, #small-dialog{
	font-family:'Lato', sans-serif;
	font-weight:300;
}

/**
 * Fade-zoom animation for first dialog
 */

/* start state */
.my-mfp-zoom-in .zoom-anim-dialog {
	opacity: 0;

	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;



	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	-ms-transform: scale(0.8);
	-o-transform: scale(0.8);
	transform: scale(0.8);
}

/* animate in */
.my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
	opacity: 1;

	-webkit-transform: scale(1);
	-moz-transform: scale(1);
	-ms-transform: scale(1);
	-o-transform: scale(1);
	transform: scale(1);
}

/* animate out */
.my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	-ms-transform: scale(0.8);
	-o-transform: scale(0.8);
	transform: scale(0.8);

	opacity: 0;
}

/* Dark overlay, start state */
.my-mfp-zoom-in.mfp-bg {
	opacity: 0;
	-webkit-transition: opacity 0.3s ease-out;
	-moz-transition: opacity 0.3s ease-out;
	-o-transition: opacity 0.3s ease-out;
	transition: opacity 0.3s ease-out;
}
/* animate in */
.my-mfp-zoom-in.mfp-ready.mfp-bg {
	opacity: 0.8;
}
/* animate out */
.my-mfp-zoom-in.mfp-removing.mfp-bg {
	opacity: 0;
}
#valentine .has-error .help-block, #valentinefriends .has-error .help-block{
	color: #a94442!important;
    font-size: 12px;
}
#valentine .btn.disabled, .btn[disabled], fieldset[disabled] .btn, #valentinefriends .btn.disabled, .btn[disabled], fieldset[disabled] .btn {
	background-color: #d31146;
    border-color: #ccc;
    opacity: 0.65;
}

.mfp-close-btn-in .mfp-close {
    color: #6a3a31;
    padding-top: 35px;
    padding-right: 30px;
}
#valentine .form-control-feedback{
	top:6px;
}
#small-dialog{
	padding: 20px 0px 0;
}
.copycoupon{
	padding: 12px;
	background: #d31146;
	color: #fff;
	width: 120px;
}
.validity{
	background: #d31146;
	text-align: center;
	width: 180px;
	padding: 5px;
	border-top-left-radius: 15px;
	border-bottom-right-radius: 15px;
	margin: 10px auto 0;
	display:none;
}
span.app-btn.wow.bounceIn.voyager-btn-home.voyager-features {
    width: 195px;
    text-align: center;
    color: #ffffff;
    border: solid 1px #ffffff;
    cursor: pointer;
    margin: 10px 10px 10px;
}
span.app-btn.wow.bounceIn.voyager-btn-home.voyager-features:hover {
    color: #000000;
    background: #ffffff;
}
.nopara{
	background: url('img/para-bg.jpg') no-repeat center;
    background-size: cover;
}
.voyfea{
    padding: 15px;
    background: url(img/featuerd/featured_col_2.jpg) no-repeat fixed;
	background-size:cover;
    color: #fff;
	padding:120px;
}
.indiegogo-camp{
}
.indiegogo-bg{
    padding: 15px;
    background: url(/img/videos/bg-img1.jpg) no-repeat fixed;
	background-size: cover;
    color: #fff;
    padding: 40px 60px;
}
.voyfea-title{
    font-size: 36px;
    color: #FFF;
    margin-top: 10px;
    margin-bottom: 15px;
    font-style: italic;
    font-family: 'Playfair Display', serif;
}

.card {
	width: 100%;
	height: 300px;
	background: #30211e;
}

.card-grid {
  width: 100px;
  height: 100px;
  margin: 20px;
  display: inline-block;
}

.card-grid .front, .card-grid .back {
  padding: 10px;
  text-align: center;
  border: 1px #333 solid;
}

.card-grid .front {
  background-color: #eee, url('Holi-Po.jpg')no-repeat center;
}

.card-grid .back {
  background-color: #333;
  color: white;
}

.card .front{
    text-align: center;
	font-size: 30px;
    font-weight: 200;
    background: #fff url(Fathers-day-popup-front.jpg) no-repeat center;
    background-position: -4px 0px;
    padding-top: 220px;
    left: auto;
    padding-left: 25px;
}

.card .back{
	text-align: center;
    font-size: 30px;
    font-weight: 200;
	background: #fff url('Fathers-day-popup-back.jpg')no-repeat center;
    top: auto;
    left: auto;
    background-position: -5px -1px;
}
.txtcopide {
    font-size: 14px;
    font-weight: 300;
    padding: 5px;
    color: #d31146;
}
.indiegolrft{
	border:0;
	border-right: 1px solid #2f2f2f;
}
@media screen and (max-width: 480px){
	#valentine, .coupon-code-status {
		margin-top: -25px !important;
		padding-bottom: 0px;
	}
	.voyfea{
		margin-top:30px !important;
		background: url(img/featuerd/featured_col_2.jpg) no-repeat top center;
	}
	.card{
		height: 340px;
		background: url(Mobile-Popup-cover.jpg) no-repeat top center;
		background-size: cover;
	}
	.card .front {
		background: url(Mobile-Popup-Front.jpg) no-repeat top left;
		width: 100% !important;
		background-size: 100%;
		padding-top: 260px;
		background-position: 0 20px;
	}
	.card .back{
		background: url(Mobile-Popup-Back.jpg)no-repeat center;
		width: 100% !important;
		background-size: 100%;
		height: 280px !important;
		padding: 0;
		border: 0;
	}
	.indiegolrft{
		border:0;
		border-bottom: 1px solid #2f2f2f;
	}
	#small-dialog {
		top: 100px;
	}
	.validity{
		width: 90% !important;
	}
	.mfp-close-btn-in .mfp-close {
		margin-top: -15px;
	}
	small.help-block {
		display: none !important;
	}
	.mfp-close-btn-in .mfp-close {
		padding-top: 50px;
	}
}
div#card {
    overflow: hidden;
}
.mfp-close {
    width: 44px;
    height: 44px;
    line-height: 15px;
    position: absolute;
	right: 345px;
	top: -15px;
}
</style>
<body>
	<?php if($_SESSION['store_location'] == 'IN') { ?>
	<div id="leftSLideBar" class="hide">
		<div class="panel panel-default box-campaign">
			<div class="panel-leftheading">
				<h3 class="panel-lefttitle">Father's Day Discount Coupon</h3>
			</div>
			<div class="panel-rightbody">
				<h3>Father's Day Celebration Sale!</h3>
				<p>Pl follow below steps to claim Rs. 1499 Father's Day Discount:</p>
				<p>1. Add Voyager Smart Wallet to shopping cart by clicking <a href="https://cuirally.com/shop/voyager-smart-blue" class="popup-link">"Add to Cart"</a></p>
				<p>2. Add Stark RFID Secure Wallet to shopping cart by clicking <a href="https://cuirally.com/shop/stark-everglade-wallet" class="popup-link">"Add to Cart"</a></p>
				<p>3. Click Shopping cart and enter coupon code DDCA2017 to claim Rs. 1499 discount</p>
				<p>4. Click Checkout and follow steps to complete order!</p>
				<p>We will deliver your order in 2-4 Days!</p>
			</div>
			<div class="clearfix">
			</div>
		</div>
	</div>
	<?php } ?>
    <div id='preloader'>
        <div class='loader'>
            <img src='img/loader.gif' alt>
        </div>
    </div>
	<!-- Voyager Fund Campaign itself -->
	<a class="popup-with-form hide fund-campaign" href="#test-form">Open form</a>
	<div id="test-form" class="white-popup-block mfp-hide">
		<div class="campaign-box" style="margin-bottom:10px;">
			<div class="text-center">
				<h2 style="padding: 0 0 15px;">The World’s Most Functional Smart Wallet</h2>
			</div>
			<div class="text-center" style="padding: 0 0 15px;">
				<img src="https://cuirally.com/img/voyager-smart.png" alt="Voyager Smart Wallet" />
			</div>
			<div class="campaign text-center">
				<h4 style="text-align:center;">Now available for the first & only time at an unbelievable price of </h4>
				<h5><strike><b style="color:#e42525; font-size:16px;margin-left: 50px;">Rs. 3499</b></strike>   starting <b style="color:#2b862b; font-size:30px;">Rs. 2699*</b></h5>
				<p style="letter-spacing: 1px;">Buy Now only at</p>
			</div>
			<div class="clearfix"></div>
			
			<div class="col-xs-12 col-sm-3 col-md-4 smart-left"> <img src="https://cuirally.com/img/smart-iphone.png" class="img-responsive"> </div>	
			
			<div class="campaign col-xs-12 col-sm-6 col-md-4 text-center">
			<h5><img src="https://cuirally.com/img/fuel-logo.png"></h5>
			<p>Through Cuir Ally’s Crowdfunding Campaign Page</p>
			<div class="highlight">From 26th June 2017 to 10<sup>th</sup> Aug 2017 only</div>
			<div class="" style="margin-top:10px;">
				<a href="https://cuirally.com/crowdfunding-campaign-page" target="_blank"><b>Why this unbelievable price?</b></a>
			</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-4 text-center smart-right">
				<img src="https://cuirally.com/img/smart-wallet.png" class="img-responsive">	
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="text-center">
			<form id="pop-form">
				<div class="contactstatpop"></div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
					<div class="form-group">
						<input type="email" class="form-control" id="email" name="valentineemail" placeholder="Enter email address to receive details" autocomplete="off">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="text-center">
					<input type="submit" value="Submit" class="app-btn2 voyager-btn-home">
				</div>
			</form>
			<small>*Limited numbers available at this price. Grab yours soon as it’s a one time discount! </small>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- Voyager Fund Campaign itself -->
    <nav class='navbar navbar-fixed-top'>
		<?php
			$country_support = array("jp", "hu", "ch", "gr", "si", "ar", "es", "nz", "fi", "lv", "ro", "sk", "nl", "kw", "mt", "mx", "ru", "ca", "lu", "sg", "bh", "it", "lt", "mc", "at", "is", "pt", "gb", "ee", "li", "de", "qa", "tr", "om", "be", "au", "sa", "ie", "fr", "hk", "se", "cn", "br", "lk", "my", "dk", "ae", "no", "in");
			if (in_array(strtolower($ipdir['countryCode']), $country_support)){
				if(strtolower($ipdir['countryCode']) != 'in'){
					echo '<div class="text-right container" style="font-size:12px;"><span class="flag flag-'.strtolower($ipdir['countryCode']).'"></span> We deliver in '.$ipdir['country'].' 2-7 Days</div>';
				}
			}
		?>
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#nav-collapse' aria-expanded='false'>
               <span class='sr-only' >Toggle navigation</span>
               <span class='icon-bar' ></span>
               <span class='icon-bar' ></span>
               <span class='icon-bar' ></span>
               </button>
                <a href='https://cuirally.com' class='navbar-brand'>
                    <img class='logo-light' src='img/logo.png' alt>
                    <img class='logo-dark' src='img/logo.png' alt>
                </a>
            </div>
            <div class='collapse navbar-collapse' id='nav-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <li class='active'>
                        <a href='#voyager' data-scroll>Voyager</a>
                    </li>
                    <li>
                        <a target="_blank" href='about-voyager-smart' id="buy" class="disable-scroll">Voyager Smart</a>
                    </li>
                    <li>
                        <a href='#design' data-scroll>Design</a>
                    </li>
                    <li>
                        <a href='#colors' data-scroll>Colors</a>
                    </li>
					<li>
                        <a href='https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-smart-blue' class="disable-scroll">Buy</a>
                    </li>

					<?php
					$logged = $_SESSION['default']['customer_id'];
						if($logged > 0) {
						   echo '<li><a href="https://cuirally.com/'.$_SESSION['store_url'].'/index.php?route=account/account" class="disable-scroll">My Account</a></li>';
						}
					?>
                </ul>
            </div>
        </div>
    </nav>
    <section id='voyager' class='main-section parallax' data-parallax='scroll' data-image-src='img/slider1.jpg'>
        <div class='particle-bg' id='particles'></div>
        <div class='container'>
            <div class='row'>
                <div class='col-xs-12 col-sm-6 col-md-6 col-sm-offset-4 col-md-offset-6'>
                    <div class='intro-text'>
                        <h1 class='wow fadeInUp' data-wow-delay='.2s'>
                            World's Most Functional<br/> Smart Wallet.
                        </h1>
                        <p class='font-alt wow fadeInUp' data-wow-delay='.4s'>Never Lose your Wallet Ever Again</p>
                        <?php if(isset($_COOKIE['referral'])) { ?>
						<p class='font-alt wow fadeInUp' data-wow-delay='.4s'>Receive special invite for <span style="color: #eb1478;font-weight: 700;">Indiegogo</span> Secret Perk to get Voyager Smart wallet for 39$ only. </p>
							<form id="referalform" class="form-horizontal" action="https://cuirally.com/pre-launch/success/">
							<div class="almsg"></div>
							<div class="form-group">
								<div class="col-xs-12">
									<input type="text" class="form-control input-lg fontweight300" name="email" placeholder="Enter your Email Address" autocomplete="off"/>
									<input type="hidden" name="referral_code" value="<?php echo $_COOKIE['referral']; ?>"/>
								</div>
							</div>
							<div class="form-group text-center">
								<div class="col-xs-12">
									<button type="submit" class="app-btn wow bounceIn voyager-btn-home">Login / Signup</button>
								</div>
							</div>
						</form>
						<?php  } elseif ($_SESSION['store_location'] != 'IN') { ?>
							<p class='font-alt wow fadeInUp voyager-bghomewhite' data-wow-delay='.4s'>Receive special invite for <span style="color: #eb1478;font-weight: 700;">Indiegogo</span> Secret Perk to get Voyager Smart wallet for 39$ (80$ off MRP $119.99). </p>
								<form id="referalform" class="form-horizontal" action="https://cuirally.com/pre-launch/webapi/users/">
								<div class="almsg"></div>
								<div class="form-group">
									<div class="col-xs-12">
										<input type="text" class="form-control input-lg fontweight300" name="email" placeholder="Enter your Email Address" autocomplete="off"/>
										<input type="hidden" name="referral_code" value="<?php echo $_COOKIE['referral']; ?>"/>
									</div>
								</div>
								<div class="form-group text-center">
									<div class="col-xs-12">
										<button type="submit" class="app-btn wow bounceIn voyager-btn-home">Login / Signup</button>
									</div>
								</div>
							</form>
						<?php  } else { ?>
							<div class='btns'>
								<a target="_blank" href='https://cuirally.com/about-voyager-smart' class='app-btn wow bounceIn voyager-btn-home' data-wow-delay='.6s'>
							About Voyager Smart
							</a>
								<a href='https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-smart-blue' class='app-btn wow bounceIn voyager-btn-home' data-wow-delay='.6s'>
							Buy
							</a>
							</div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<a class="popup-with-zoom-anim" href="#small-dialog" style="display:none">Open with fade-zoom animation</a>
	<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="example">
			<div id="card" class="card"> 
			  <div class="front alert alert-info"> 
				<div class="validity hide" style="width: 94%;font-size: 14px;color: rgb(255, 255, 255);position: absolute;top: 5px;">Extending the HOLI sale due to popular demand</div>
				<form id="valentine">
					<div class='col-md-8'>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="valentineemail" placeholder="Enter email address">
						</div>
					</div>
					<div class='col-md-4 text-center'>
						<button type="submit" class="btn btn-default copycoupon">Get Coupon</button><br/>
					</div>
				</form>
			  </div> 
			  <div class="back well well-lg">
				<div class="coupon-code-status" style="margin-top: 0px !important;">
					<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
						<div class="text-center">
							<div class="input-group">
							  <input id="codecoupon" type="text" class="form-control" value="DDCA2017" disabled>
							  <!--<button class="input-group-addon btn btn-default copycoupon couvalue copy" data-clipboard-text="CAHO2017">Copy code</button>-->
							  <span class="btn input-group-addon btn btn-default copycoupon copycoupon_btn codecopy" data-clipboard-text="DDCA2017">Copy code</span>
							</div>
							<div class="txtcopide"></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<h3 class="hide" style="color:#363636;">Celebrate Holi with Friends!</h3>
					<h4 class="hide" style="color:#363636;font-size: 16px;line-height:1.5;">Refer a friend and get additional <b>Rs.250</b><br/> cashback when they buy</h4>
					<form class="hide" id="valentinefriends">
						<div class='col-md-8'>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="valentineemail" placeholder="Enter your Friend's Email">
							</div>
						</div>
						<div class='col-md-4 text-center'>
							<button type="submit" class="btn btn-default copycoupon">Send Coupon</button><br/>
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
			  </div> 
			</div>
		</div>
		<div class="validity">Coupon Valid till 17<sup>th</sup> Apr</div>
	</div>
	<section class='smart-section side' style="padding:40px 0 0px">
		 <div class='row'>
                <div class='container'>
            <div class='section-header text-center'>
                <h2 class='wow fadeInUp' data-wow-delay='.2s'>Featured on</h2>
               
            </div>
            </div>
				<div class='col-xs-12 col-sm-4 col-md-2 text-center'>
					<a target="_blank"href="http://www.thehindubusinessline.com/business-wire/worlds-most-functional-smart-wallet-launched-in-india-by-cuir-ally/article9408667.ece" target="_blank"><img src="img/features/f2.jpg"></a>
				</div>
				 <div class='col-xs-12 col-sm-4 col-md-2 text-center'>
					<a target="_blank"href="http://pixr8.com/smart-wallet-launched-in-india-by-cuir-ally/" target="_blank"><img src="img/features/f3.jpg"></a>
				</div>
				<div class='col-xs-12 col-sm-4 col-md-2 text-center'>
					<a target="_blank"href="http://www.telegraphindia.com/external/display.jsp?mode=details&id=51237" target="_blank"><img src="img/features/f1.jpg"></a>
				</div>
				<div class='col-xs-12 col-sm-4 col-md-2 text-center'>
					<a target="_blank" href="http://www.business-standard.com/article/news-ani/world-s-most-functional-smart-wallet-launched-in-india-by-cuir-ally-116120300215_1.html" target="_blank"><img src="img/features/f7.jpg"></a>
				</div>
				 <div class='col-xs-12 col-sm-4 col-md-2 text-center'>
					<a target="_blank"href="https://in.finance.yahoo.com/news/worlds-most-functional-smart-wallet-launched-india-cuir-055743151.html" target="_blank"><img src="img/features/f5.jpg"></a>
				</div> 
				 <div class='col-xs-12 col-sm-4 col-md-2 text-center'>
					<a target="_blank"href="http://ibtn9.com/2016/12/worlds-most-functional-smart-wallet-launched-in-india-by-cuir-ally/" target="_blank"><img src="img/features/f6.jpg"></a>
				</div>
				
				<div class="clearfix"></div>
		</div>
	</section>
    <section id='design' class='smart-section side' style="padding:40px 0 0px">
        <div class='container'>
            <div class='section-header text-center' style="border-top: 1px solid #f1f1f1;">
                <h2 class='wow fadeInUp' data-wow-delay='.2s'>Design</h2>
                <p class='wow fadeInUp' data-wow-delay='.4s'>Voyager's unique patent protected design helps fit a lot more with a lot less.</p>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-2 width100'>
                    <div class="featured_text_wallet_left left-1 wow fadeInLeft" data-wow-delay='.2s'>
                        <span class="featured_icons_sprite img-1"></span>
                        <p class="padding10">Elegant metallic finish pen so that you never face the embarrassment of asking for one to fill in your immigration / customs forms. </p>
                    </div>
                    <div class="featured_text_wallet_left left-2 wow fadeInLeft" data-wow-delay='.3s'>
                        <span class="featured_icons_sprite img-2"></span>
                        <p class="padding10">Long enough to hold your boarding pass, wide enough to hold all international currencies. </p>
                    </div>
					<div class="featured_text_wallet_left left-4 wow fadeInLeft" data-wow-delay='.4s'>
                        <span class="featured_icons_sprite img-8"></span>
                        <p class="padding10">A hidden secure slot for your ID Card. A standalone slot so that your ID card doesn't get mixed up; and out of sight because you won't be using it on daily bais.</p>
                    </div>
                    <div class="featured_text_wallet_left left-3 wow fadeInLeft" data-wow-delay='.5s'>
                        <span class="featured_icons_sprite img-3"></span>
                        <p class="padding10">Ergonomic and secure passport sleeve. Your passport slides in & out effortlessly, only when you want it to. </p>
                    </div>
                </div>
                <figure class="col-xs-12 col-sm-12 col-md-8 hidden-xs cd-image-container">
                    <div class='mockup'>
                        <img src="img/wireframe_wallet.jpg" alt="Original Image">
                        <span class="cd-image-label" data-type="original"></span>
                        <div class="cd-resize-img">
                            <!-- the resizable image on top -->
                            <img src="img/wallet-open.jpg" alt="Modified Image">
                            <span class="cd-image-label" data-type="modified"></span>
                        </div>
                        <span id="animatedElement" class="cd-handle animate pulse"></span>
                    </div>
                </figure>
                <div class='col-xs-12 col-sm-12 col-md-2 width100'>
                    <div class="featured_text_wallet_right right-1 wow fadeInRight" data-wow-delay='.2s'>
                        <span class="featured_icons_sprite img-4"></span>
                        <p class="padding10">A hidden sim card and sim tool slot, out of your sight but within your reach right when you need it. </p>
                    </div>
                    <div class="featured_text_wallet_right right-2 wow fadeInRight" data-wow-delay='.3s'>
                        <span class="featured_icons_sprite img-5"></span>
                        <p class="padding10">Two hidden rear card slots for cards that you seldom use or to store your visiting cards!</p>
                    </div>
                    <div class="featured_text_wallet_right right-3 wow fadeInRight" data-wow-delay='.4s'>
                        <span class="featured_icons_sprite img-6"></span>
                        <p class="padding10">Intuitive thumb friendly card slot design, no more fidgeting for your cards. Just Swipe up, Swipe down.</p>
                    </div>
                    <div class="featured_text_wallet_right right-4 wow fadeInRight" data-wow-delay='.5s'>
                        <span class="featured_icons_sprite img-7"></span>
                        <p class="padding10" style="padding-top:18px;">Smart Chip</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
		<div class="btns voyfea text-center" style="margin-top: 80px;">
			 <h2 class='wow fadeInUp voyfea-title' data-wow-delay='.2s'>Voyager <b>Smart</b> Wallet</h2>
            <span class="app-btn wow bounceIn voyager-btn-home voyager-features voyager-features-btn" data-wow-delay=".6s">Smart Features</span>
            <a href="https://cuirally.com/about-voyager-smart" target="_blank"><span class="app-btn wow bounceIn voyager-btn-home voyager-features" data-wow-delay=".6s">Realtime Videos</span></a><a href="https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-smart-blue" target="_blank"><span class="app-btn wow bounceIn voyager-btn-home voyager-features" data-wow-delay=".6s">Buy Now</span></a>
			<div class="clearfix"></div>
        </div>
		
		<div class="fluid-container" id="voyager-features" style="display:none;margin-top:40px;">
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/bluetooth.png" class="hvr-pop" width="64"> </div>
				<h4><b>Conectivity <i class="fa fa-android" aria-hidden="true"></i> & <i class="fa fa-apple" aria-hidden="true"></i></b></h4>
				<p>Bluetooth 4.0 (LTE)
				<br> <a href="https://cuirally.com/faq/faqs/officially-supported-devices">Check here</a> for list of compatible phones</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/wifi.png" class="hvr-bob" width="64"> </div>
				<h4><b>Range</b></h4>
				<p>Approximately 30-60m Within line of sight
					<br> (Varies based on environmental obstructions)</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/smartphone.png" class="hvr-buzz-out" width="64"> </div>
				<h4><b>Out of Range Notifications on your Smartphone</b></h4>
				<p><a href="https://cuirally.com/faq/chipolo-app/out-of-range-notifications">Check here</a> to learn how to setup/activate</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/alarm.png" class="hvr-wobble-skew" width="64"> </div>
				<h4><b>Ring phone to find it even when on silent</b></h4>
				<p>Double press wallet to ring phone, even when it is on silent mode</p>
			</div>
			<div class="clearfix"></div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/wallet.png" class="hvr-rotate" width="64"> </div>
				<h4><b>Ring wallet to find its location </b></h4>
				<p>Press ‘Ring’ on Chipolo app to ring wallet. With 92 decibel melody, its easy to hear it rooms away</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/camera.png" class="hvr-push" width="64"> </div>
				<h4><b>Take selfie on smart phone using wallet</b></h4>
				<p>Double press wallet to take selfie on smartphone.</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/battery.png" class="hvr-hang" width="64"> </div>
				<h4><b>Maintenance Free Battery</b></h4>
				<p>Designed to run a full year with zero upkeep. No battery replacement, no charging required. After 12 months, use <a href="https://chipolo.net/renewal">Chipolo Renewal Program</a> </p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/placeholder.png" class="hvr-float" width="64"> </div>
				<h4><b>Find last seen Voyager Smart Wallet Location on Map</b></h4>
				<p>Enable GPS on mobile to track exact location.</p>
			</div>
			<div class="clearfix"></div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/smartphone-login.png" class="hvr-shrink" width="64"> </div>
				<h4><b>Phone Finder</b></h4>
				<p>Use the Free Chipolo app to find/ring/send message to your phone via any web connected device using your unique login credentials. </p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out" style="padding-top:0;"> <img src="img/technical/warranty.png" class="hvr-pulse" style="padding-top: 24px;" width="90"> </div>
				<h4><b>Warranty</b></h4>
				<p>1 Year Limited Hardware warranty on Chipolo</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/eu.png" class="hvr-wobble-vertical" width="90" style="padding-top:20px;"> </div>
				<h4><b>Chipolo Product Qaulity</b></h4>
				<p>Chipolo is made in Slovenia, European Union thus ensuring European level of premium product quality</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
				<div class="circle-shape hvr-radial-out"> <img src="img/technical/wallet2.png" class="hvr-wobble-horizontal" width="64"> </div>
				<h4><b>Community search feature for your lost wallet</b></h4>
				<p>Put all Chipolo community users on the lookout for your wallet through Chipolo app automatically & anonymously. Get notification of the map location of your wallet, when any Chipolo community user is within rage of your wallet. </p>
			</div>
			<div class="clearfix"></div>
		</div>
    </section>
	<section id='comparision' class='comparision-wallet'>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="section-header text-center">
                    <h2 class="wow fadeInUp" data-wow-delay=".2s" style="text-transform: capitalize;padding-top: 20px;">Why Travel Clumsily with</h2>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <img src="img/featuerd/comparison_wallet_fat_wallet.jpg" class='wow fadeIn' data-wow-delay='.1s'>
                    <p>A fat wallet which gives you a backache<br/>Size: 12 x 9 x 2 cm<br/>Cost: $</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 text-center">
                    <span class="plus-sign wow fadeInRight" data-wow-delay='.1s'>+</span>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <img src="img/featuerd/comparison_wallet_long_passport_holder.jpg" class='wow fadeIn' data-wow-delay='.2s'>
                    <p>A long, bulky, pesky, passport-holder<br/>Size: 24 x 12.5 x 3 cm<br/>Cost: $$</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="section-header text-center">
                    <h2 class="wow fadeInUp" data-wow-delay=".2s" style="text-transform: capitalize;padding-top: 20px;">When you can travel in comfort & style with Cuir Ally's VOYAGER</h2>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 minus-center text-center equalto">
                    <span class="plus-sign">=</span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 text-center ">
                    <img src="img/featuerd/comparison_wallet_voyager.jpg" class='wow fadeIn' data-wow-delay='.2s'>
                    <p style="margin:5px 15px;">Fits Ergonomically in your pocket<br/>Size: 13.9 x 11 x 1.5 cm<br/>Cost: $$</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <ul class="features_list hidden-xs">
                        <li class='wow fadeInRight' data-wow-delay='.0.5s'>Fits</li>
                        <li class='wow fadeInRight' data-wow-delay='.1s'>Cash</li>
                        <li class='wow fadeInRight' data-wow-delay='.2s'>Passport</li>
                        <li class='wow fadeInRight' data-wow-delay='.3s'>Pen</li>
                        <li class='wow fadeInRight' data-wow-delay='.4s'>Boarding pass</li>
                        <li class='wow fadeInRight' data-wow-delay='.5s'>8 + Cards</li>
                        <li class='wow fadeInRight' data-wow-delay='.6s'>Voyager Book</li>
                        <li class='wow fadeInRight' data-wow-delay='.7s'>Sim card & Sim tool</li>
                        <li class='wow fadeInRight' data-wow-delay='.8s'>Ticket printouts</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
	<section id="voyagersmart" class="video-section parallax home-video" data-parallax="scroll" data-image-src="img/para-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="watch-video">
                        <a href="https://www.youtube.com/watch?v=uvL9RW-Rrig" class="play-btn wow bounceIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceIn;">
                            <img src="img/play-btn.png" alt="">
                        </a>
                        <h4 class="font-alt wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Experience<br/>Voyager Smart Wallet</h4>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <ul class="video-features-home">
                                <li>If you forget or misplace your wallet or your phone.</li>
                                <li>If you would like to see the future of wallet design. Right Now.</li>
                                <li>If you would like to see how even a wallet can surprise you!</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="divider-section">
		<div class="fluid-container text-center">
			<div class="row">
				<div class='section-header text-center' style="padding-bottom:20px;">
					<h2 class='wow fadeInUp' data-wow-delay='.2s'>Over 5700+ Happy Customers Worldwide</h2>
					<p class='wow fadeInUp' data-wow-delay='.4s'>Thank you for the love and trust</p>
				</div>
				<div class="col-md-12">
					<img src="img/Map.gif" alt="Over 5300+ Happy Customers Worldwide">
				</div>
			</div>
		</div>
	</section>
    <section id='#' class='comparision-wallet' style="padding:0;">
        <div class='fluid-container'>
            <div class="row">
                <div class="text-center">
                    <div class="col-md-6 featured_bg_bl" style="padding-right:0;">
                        <img src='img/featuerd/featured_col_1.jpg' class="img-respomsive wow fadeInLeft" data-wow-delay='.2s'>
                    </div>
                    <div class="border-right"></div>
                    <div class="col-md-6 featured_bg_br" style="padding-left:0;">
                        <img src='img/featuerd/featured_col_2.jpg' class="img-respomsive wow fadeInRight" data-wow-delay='.2s'>
						<div class="feature-text-compare">world's most functional smartwallet.</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <section id='colors' class='mockup-section'>
        <div class='container'>
            <div class='section-header text-center'>
                <h2 class='wow fadeInUp' data-wow-delay='.2s'>We offer 3 different colors</h2>
                <p class='wow fadeInUp' data-wow-delay='.4s'>It's not just a wallet but much more.</p>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='col-md-2'>
                        <div id="left-table" class='p-table standard wow bounceIn' data-wow-delay='.2s'>
                            <div class='header'>
                                <h4>Voyager Wallet</h4>
                                <div class='price'>
                                    <?php
									$location_ip = strtolower($ipdir['countryCode']);
									if (in_array(strtolower($ipdir['countryCode']), $country_support)){
										if($location_ip == 'jp'){
											echo '<span class="currency"><i class="fa fa-jpy"></i></span><span class="amount">7,924</span>';
										} elseif ($location_ip == 'hu'){
											echo '<span class="currency">HUF</span><span class="amount">19,014</span>';
										} elseif ($location_ip == 'ch' || $location_ip == 'li'){
											echo '<span class="currency">Swiss Franc</span><span class="amount">67</span>';
										} elseif ($location_ip == 'gr' || $location_ip == 'si' || $location_ip == 'es' || $location_ip == 'fi' || $location_ip == 'lv' || $location_ip == 'sk' || $location_ip == 'nl' || $location_ip == 'mt' || $location_ip == 'lu' || $location_ip == 'it' || $location_ip == 'lt' || $location_ip == 'mc' || $location_ip == 'at' || $location_ip == 'pt' || $location_ip == 'ee' || $location_ip == 'de' || $location_ip == 'be' || $location_ip == 'ie' || $location_ip == 'fr'){
											echo '<span class="currency"><i class="fa fa-eur"></i></span><span class="amount">61.59</span>';
										}  elseif ($location_ip == 'ar'){
											echo '<span class="currency">ARS</span><span class="amount">1163</span>';
										} elseif ($location_ip == 'ro'){
											echo '<span class="currency">RON</span><span class="amount">281</span>';
										} elseif ($location_ip == 'kw'){
											echo '<span class="currency">KWD</span><span class="amount">21</span>';
										} elseif ($location_ip == 'mx'){
											echo '<span class="currency">MXN</span><span class="amount">1274</span>';
										} elseif ($location_ip == 'ru'){
											echo '<span class="currency">RUB</span><span class="amount">4152</span>';
										} elseif ($location_ip == 'ca'){
											echo '<span class="currency">CAD</span><span class="amount">91</span>';
										} elseif ($location_ip == 'sg'){
											echo '<span class="currency">SGD</span><span class="amount">97</span>';
										} elseif ($location_ip == 'bh'){
											echo '<span class="currency">BHD</span><span class="amount">27</span>';
										} elseif ($location_ip == 'is'){
											echo '<span class="currency">ISK</span><span class="amount">7166</span>';
										} elseif ($location_ip == 'gb'){
											echo '<span class="currency">British Pound</span><span class="amount">54</span>';
										} elseif ($location_ip == 'qa'){
											echo '<span class="currency">QAR</span><span class="amount">255</span>';
										} elseif ($location_ip == 'tr'){
											echo '<span class="currency">TRY</span><span class="amount">249</span>';
										} elseif ($location_ip == 'om'){
											echo '<span class="currency">OMR</span><span class="amount">27</span>';
										} elseif ($location_ip == 'au'){
											echo '<span class="currency">AUD</span><span class="amount">92</span>';
										} elseif ($location_ip == 'sa'){
											echo '<span class="currency">SAR</span><span class="amount">262</span>';
										} elseif ($location_ip == 'hk'){
											echo '<span class="currency">HKD</span><span class="amount">547</span>';
										} elseif ($location_ip == 'se'){
											echo '<span class="currency">SEK</span><span class="amount">593</span>';
										} elseif ($location_ip == 'cn'){
											echo '<span class="currency">RMB</span><span class="amount">475</span>';
										} elseif ($location_ip == 'br'){
											echo '<span class="currency">BRL</span><span class="amount">231</span>';
										} elseif ($location_ip == 'lk'){
											echo '<span class="currency">LKR</span><span class="amount">10.746</span>';
										} elseif ($location_ip == 'my'){
											echo '<span class="currency">MYR</span><span class="amount">301</span>';
										} elseif ($location_ip == 'dk'){
											echo '<span class="currency">DKK</span><span class="amount">458</span>';
										} elseif ($location_ip == 'ae'){
											echo '<span class="currency">AED</span><span class="amount">257</span>';
										} elseif ($location_ip == 'eg'){
											echo '<span class="currency">EGP</span><span class="amount">1254</span>';
										} elseif ($location_ip == 'pl'){
											echo '<span class="currency">PLN</span><span class="amount">261</span>';
										} elseif ($location_ip == 'id'){
											echo '<span class="currency">IDR</span><span class="amount">9,37,096</span>';
										} elseif ($location_ip == 'ph'){
											echo '<span class="currency">PHP</span><span class="amount">3,540</span>';
										} elseif ($location_ip == 'ng'){
											echo '<span class="currency">NGN</span><span class="amount">22,064</span>';
										} elseif ($location_ip == 'za'){
											echo '<span class="currency">ZAR</span><span class="amount">925</span>';
										} elseif ($location_ip == 'mv'){
											echo '<span class="currency">MVR</span><span class="amount">1076</span>';
										} elseif ($location_ip == 'cz'){
											echo '<span class="currency">CZK</span><span class="amount">1608</span>';
										} elseif ($location_ip == 'hr'){
											echo '<span class="currency">HRK</span><span class="amount">457</span>';
										} elseif ($location_ip == 'np'){
											echo '<span class="currency">NPR</span><span class="amount">7,263</span>';
										} elseif ($location_ip == 'bd'){
											echo '<span class="currency">BDT</span><span class="amount">5,655</span>';
										} elseif ($location_ip == 'th'){
											echo '<span class="currency">THB</span><span class="amount">2,378</span>';
										} elseif ($location_ip == 'mu'){
											echo '<span class="currency">MUR</span><span class="amount">2415</span>';
										} elseif ($location_ip == 'ke'){
											echo '<span class="currency">KES</span><span class="amount">7,265</span>';
										} elseif ($location_ip == 'no'){
											echo '<span class="currency">NOK</span><span class="amount">585</span>';
										} elseif ($location_ip == 'kr'){
											echo '<span class="currency">KRW</span><span class="amount">80,388</span>';
										}  elseif ($location_ip == 'nz'){
											echo '<span class="currency">NZD</span><span class="amount">96</span>';
										}  elseif ($location_ip == 'in'){
											echo '<span class="currency">INR</span><span class="amount">2399</span>';
										}
									} else {
										 echo '<span class="currency"><i class="fa fa-usd"></i></span><span class="amount">94.99</span>';
									}
									?>
                                </div>
                            </div>
                            <p class="price-tab-des">Includes</p>
                            <ul class='items'>
                                <li>Sleek Metallic Pen</li>
                                <li>30 Page Voyager Booklet</li>
                            </ul>
                        </div>
                        <a href="https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-wallet-blue" class='btn-custom arrow-btn wow fadeInUp buy-wall mobile-show' data-wow-delay='.2s'>
                        Buy Voyager Wallet
                        </a>
                    </div>
                    <div class='col-md-8 screens-mockup'>
                        <div class="my-flipster">
                            <ul>
                                <li class="brown-color"><img src="img/wallet-brown.png" data-color="" data-url="" /></li>
                                <li class="blue-color"><img src="img/wallet-blue.png" data-color="" data-url="" /></li>
                                <li class="black-color"><img src="img/wallet-black.png" data-color="" data-url="" /></li>
                            </ul>
                        </div>
                        <br>
                        <br>
                        <div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2 text-center mobile-hide'>
                            <a href="https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-wallet-blue" class='btn-custom arrow-btn wow fadeInUp buy-wall' data-wow-delay='.2s'>
                        Buy Voyager Wallet
                        </a>
                            <a href="https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-smart-blue" class='btn-custom arrow-btn wow fadeInUp buy-wall buy-wall-smart' data-wow-delay='.2s'>
                        Buy Voyager Smart
                        </a>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div id="right-table" class='p-table standard wow bounceIn' data-wow-delay='.2s'>
                            <div class='header'>
                                <h4>Voyager SMART Wallet</h4>
                                <div class='price'>
									<?php
									if (in_array(strtolower($ipdir['countryCode']), $country_support)){
										if($location_ip == 'jp'){
											echo '<span class="currency"><i class="fa fa-jpy"></i></span><span class="amount">10,188</span>';
										} elseif ($location_ip == 'hu'){
											echo '<span class="currency">HUF</span><span class="amount">24,446</span>';
										} elseif ($location_ip == 'ch' || $location_ip == 'li'){
											echo '<span class="currency">Swiss Franc</span><span class="amount">86</span>';
										} elseif ($location_ip == 'gr' || $location_ip == 'si' || $location_ip == 'es' || $location_ip == 'fi' || $location_ip == 'lv' || $location_ip == 'sk' || $location_ip == 'nl' || $location_ip == 'mt' || $location_ip == 'lu' || $location_ip == 'it' || $location_ip == 'lt' || $location_ip == 'mc' || $location_ip == 'at' || $location_ip == 'pt' || $location_ip == 'ee' || $location_ip == 'de' || $location_ip == 'be' || $location_ip == 'ie' || $location_ip == 'fr'){
											echo '<span class="currency"><i class="fa fa-eur"></i></span><span class="amount">79</span>';
										}  elseif ($location_ip == 'ar'){
											echo '<span class="currency">ARS</span><span class="amount">1496</span>';
										} elseif ($location_ip == 'ro'){
											echo '<span class="currency">RON</span><span class="amount">362</span>';
										} elseif ($location_ip == 'kw'){
											echo '<span class="currency">KWD</span><span class="amount">27</span>';
										} elseif ($location_ip == 'mx'){
											echo '<span class="currency">MXN</span><span class="amount">1638</span>';
										} elseif ($location_ip == 'ru'){
											echo '<span class="currency">RUB</span><span class="amount">5338</span>';
										} elseif ($location_ip == 'ca'){
											echo '<span class="currency">CAD</span><span class="amount">117</span>';
										} elseif ($location_ip == 'sg'){
											echo '<span class="currency">SGD</span><span class="amount">124</span>';
										} elseif ($location_ip == 'bh'){
											echo '<span class="currency">BHD</span><span class="amount">34</span>';
										} elseif ($location_ip == 'is'){
											echo '<span class="currency">ISK</span><span class="amount">9213</span>';
										} elseif ($location_ip == 'gb'){
											echo '<span class="currency">British Pound</span><span class="amount">69</span>';
										} elseif ($location_ip == 'qa'){
											echo '<span class="currency">QAR</span><span class="amount">328</span>';
										} elseif ($location_ip == 'tr'){
											echo '<span class="currency">TRY</span><span class="amount">320</span>';
										} elseif ($location_ip == 'om'){
											echo '<span class="currency">OMR</span><span class="amount">35</span>';
										} elseif ($location_ip == 'au'){
											echo '<span class="currency">AUD</span><span class="amount">118</span>';
										} elseif ($location_ip == 'sa'){
											echo '<span class="currency">SAR</span><span class="amount">337</span>';
										} elseif ($location_ip == 'hk'){
											echo '<span class="currency">HKD</span><span class="amount">703</span>';
										} elseif ($location_ip == 'se'){
											echo '<span class="currency">SEK</span><span class="amount">762</span>';
										} elseif ($location_ip == 'cn'){
											echo '<span class="currency">RMB</span><span class="amount">611</span>';
										} elseif ($location_ip == 'br'){
											echo '<span class="currency">BRL</span><span class="amount">297</span>';
										} elseif ($location_ip == 'lk'){
											echo '<span class="currency">LKR</span><span class="amount">13,817</span>';
										} elseif ($location_ip == 'my'){
											echo '<span class="currency">MYR</span><span class="amount">387</span>';
										} elseif ($location_ip == 'dk'){
											echo '<span class="currency">DKK</span><span class="amount">589</span>';
										} elseif ($location_ip == 'ae'){
											echo '<span class="currency">AED</span><span class="amount">330</span>';
										} elseif ($location_ip == 'eg'){
											echo '<span class="currency">EGP</span><span class="amount">1612</span>';
										} elseif ($location_ip == 'pl'){
											echo '<span class="currency">PLN</span><span class="amount">336</span>';
										} elseif ($location_ip == 'id'){
											echo '<span class="currency">IDR</span><span class="amount">1,204,876</span>';
										} elseif ($location_ip == 'ph'){
											echo '<span class="currency">PHP</span><span class="amount">4552</span>';
										} elseif ($location_ip == 'ng'){
											echo '<span class="currency">NGN</span><span class="amount">28,369</span>';
										} elseif ($location_ip == 'za'){
											echo '<span class="currency">ZAR</span><span class="amount">1189</span>';
										} elseif ($location_ip == 'mv'){
											echo '<span class="currency">MVR</span><span class="amount">1383</span>';
										} elseif ($location_ip == 'cz'){
											echo '<span class="currency">CZK</span><span class="amount">2068</span>';
										} elseif ($location_ip == 'hr'){
											echo '<span class="currency">HRK</span><span class="amount">588</span>';
										} elseif ($location_ip == 'np'){
											echo '<span class="currency">NPR</span><span class="amount">9338</span>';
										} elseif ($location_ip == 'bd'){
											echo '<span class="currency">BDT</span><span class="amount">7271</span>';
										} elseif ($location_ip == 'th'){
											echo '<span class="currency">THB</span><span class="amount">3058</span>';
										} elseif ($location_ip == 'mu'){
											echo '<span class="currency">MUR</span><span class="amount">3,106</span>';
										} elseif ($location_ip == 'ke'){
											echo '<span class="currency">KES</span><span class="amount">9,341</span>';
										} elseif ($location_ip == 'no'){
											echo '<span class="currency">NOK</span><span class="amount">752</span>';
										} elseif ($location_ip == 'kr'){
											echo '<span class="currency">KRW</span><span class="amount">1,03,360</span>';
										} elseif ($location_ip == 'nz'){
											echo '<span class="currency">NZD</span><span class="amount">123</span>';
										} elseif ($location_ip == 'in'){
											echo '<span class="currency">INR</span><span class="amount">3499</span>';
										}
									} else {
										echo '<span class="currency"><i class="fa fa-usd"></i></span><span class="amount">119.99</span>';
									}
									?>
                                </div>
                            </div>
                            <p class="price-tab-des">Includes</p>
                            <ul class='items'>
                                <li>Chipolo Plus Smart Technology</li>
                                <li>Sleek Metallic Pen</li>
                                <li>30 Page Voyager Booklet</li>
                                <li>1 Year Warranty</li>
                                <li>Compatible with <i class="fa fa-android" aria-hidden="true"></i> & <i class="fa fa-apple" aria-hidden="true"></i> Phones</li>
                            </ul>
                        </div>
                        <a href="https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-smart-blue" class='btn-custom arrow-btn wow fadeInUp buy-wall buy-wall-smart mobile-show' data-wow-delay='.2s'>
                        Buy Voyager Smart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php if(isset($_COOKIE['referral']) || $_SESSION['store_location'] != 'IN') { ?>
	<div class="indiegogo-camp">
		<div class="btns indiegogo-bg text-center">
			<div class="row">
				<div class="voyager-bghome">
					<div class="col-md-6 text-center indiegolrft">
						<h1 class="fontubuntu">The World's Most Functional Smart Wallet <img src="https://cuirally.com/img/voyager-smart.png" class="img-responsive" style="display:block;margin:0 auto;padding-top: 15px;padding-bottom: 10px;" alt="Voyager Smart Wallet"> Is <br> Coming soon on <br>
							<div class="text-center"> 
								<img src="https://cuirally.com/pre-launch/assests/img/indigogo.png" alt="Indiegogo" style="padding-top:10px;">
							</div>
						</h1>
						<h3><span class="text-uppercase">At an unbelievable price </span></h3>
						<div class="price">
						  <span class="old-price"><b style="color:#e42525; font-size:18px;"><del>$ 89.99</del></b></span> Starting <span class="new-price"><b style="color:#2b862b; font-size:30px;">$ 44.99</b></span>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-6 text-center">
						<form id="contactForm" class="form-horizontal" action="https://cuirally.com/pre-launch/webapi/users/">
							<div class="almsg"></div>
							<h2 class="text-center fontopensans lineheight16">Receive special invite for <span class="fontweight600" style="color: #eb1478;">Indiegogo</span> Secret Perk<br>to get <br> Voyager Smart wallet for <span class="fontweight600">39$</span> (80$ off MRP $119.99)</h2>
							<div class="form-group">
								<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-ms-offset-2" style="margin-top:25px;">
									<input type="text" class="form-control input-lg fontweight300" name="email" placeholder="Enter your Email Address" autocomplete="off"/>
								</div>
							</div>
							<div class="form-group text-center">
								<div class="col-xs-12">
									<button type="submit" class="app-btn wow bounceIn voyager-btn-home">Login / Signup</button>
								</div>
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="stark-banner-footer text-right">
		<div class="container">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<span class="pre-footer-heading">Check our <img src="img/STARK-logo.png" style="    margin-top: -5px;"> wallet</span> 
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 text-center">
				<a href='https://cuirally.com/stark/' class='app-btn2 wow bounceIn voyager-btn-home' data-wow-delay='.6s'>
					About Stark
				</a> 
				<a href='https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-formula-one-wallet' class='app-btn2 wow bounceIn voyager-btn-home' data-wow-delay='.6s'>
					Buy Now
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
    <section id='footer-container' class='cta-section'>
        <div class='container'>
            <div class='col-md-3'>
                <ul class="footer-links">
                    <li><a href='https://cuirally.com/'>Home</a></li>
					<li><a href="https://cuirally.com/voyager-smart" title="Voyager Smart">Voyager Smart</a></li>
					<li><a href="https://cuirally.com/stark" title="Stark">STARK</a></li>
                    <li><a href="contact" title="Voyager Smart">Contact Us</a></li>
                </ul>
            </div>
            <div class='col-md-3'>
                <ul class="footer-links">
                    <li><a href="shipping-delivery-policy" title="Privacy Policy">Shipping & Delivery Policy</a></li>
                    <li><a href="refund-policy" title="Privacy Policy">Refund Policy</a></li>
                    <li><a href="privacy-policy" title="Privacy Policy">Privacy Policy</a></li>
                    <li><a href="terms" title="Terms & Conditions">Terms & Conditions</a></li>

                </ul>
            </div>
            <div class='col-md-3'>
                <ul class="footer-links">
                    <li><a href="about" title="About Us">About Us</a></li>
                    <li><a href="our-leather" title="Our Leather">Our Leather</a></li>
                    <li><a href="leather-care" title="Leather care">Leather care</a></li>
                    <li><a href="frequently-asked-question" title="FAQ">FAQ</a></li>
                </ul>
            </div>
            <div class='col-md-3'>
                <h4>Stay Connected</h4>
                <form id="newsletter-form" class="form-horizontal">
                    <div class='subscribe-input'>
                        <div class="contactstatus"></div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="email" name="email" id='newsletter-email' placeholder="Your Email" class='txt' autocomplete="off"/><span></span>
                            </div>
                            <input type='submit' class='subscribe' value="Subscribe">
                        </div>
                        <label for='newsletter-email'></label>
                    </div>
                </form>
				<ul class="footer-social wow fadeInRight" data-wow-delay=".2s">
					<li><a target="_blank" href="https://www.facebook.com/CuirAlly/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="https://www.instagram.com/cuir_ally/" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
					<li><a target="_blank" href="https://twitter.com/cuirally" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FCuirAlly%2F&width=73&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=1321487457928134" width="73" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>
				</ul>
            </div>
			<div class="clearfix"></div>
			<div class='col-md-6 col-sm-12 col-xs-12 text-left payment-mode'>
				<h5>Payment Method</h5>
				<?php if($_SESSION['store_location'] == 'IN') { ?>
					<img src="img/Payment-Options-India.png" alt="Payment IN">
				<?php } else { ?>
					<img src="img/Payment-Options-International.png"  alt="Payment IS">
				<?php } ?>
			</div>
        </div>
    </section>
    <footer>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-6'>
                    <p class='wow fadeInLeft' data-wow-delay='.2s'>
                        <p>Copyright &copy; <?php echo date('Y'); ?> Cuir Ally | a <a href="https://webdefy.com/" target="_blank">Webdefy</a> site</p>
                    </p>
                </div>
                <div class='col-sm-6'>
                    <ul class='footer-social wow fadeInRight' data-wow-delay='.2s'>
                        <p>Got a Question? <a href="mailto:support@cuirally.com" class="footer-mail">support@cuirally.com</a></p>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src='js/drag.js'></script>
    <script src='js/jquery.mobile.custom.min.js'></script>
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <script src='js/jquery.magnific-popup.min.js'></script>
    <script src='js/jquery.ajaxchimp.min.js'></script>
    <script src='js/parallax.min.js'></script>
    <script src='js/particles.min.js'></script>
    <!-- <script src='js/waves.min.js' ></script>
      <script src='js/owl.carousel.min.js' ></script> -->
    <script src='js/wow.min.js'></script>
    <script src='js/validator.min.js'></script>
    <script src='js/smooth-scroll.min.js'></script>
    <script src='js/jquery.flipster.min.js'></script>
	<script src='js/formvalidation.js'></script>
	<script src='https://clipboardjs.com/dist/clipboard.min.js'></script>
	<script>var store_url = '<?php echo $_SESSION['store_url']; ?>';</script>
	<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
    <script src='js/script.js'></script>
    <script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 0.5,
			mainClass: 'my-mfp-zoom-in'
		});
		
		$("#card").flip({
			axis: 'x',
		   trigger: 'manual'
		});
		
		<?php if($_SESSION['store_location'] == 'IN') { if($_SESSION['popup'] != '1') {
			$date_now = date("Y-m-d"); // this format is string comparable
			if ($date_now > '2017-08-10') { } else { ?>
			setTimeout(function(){ $(".fund-campaign").trigger("click"); }, 3000);
		<?php } } } else {}?>
		$('.popup-with-form').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#name',

			// When elemened is focused, some mobile browsers in some cases zoom in
			// It looks not nice, so we disable it:
			callbacks: {
				beforeOpen: function() {
					if($(window).width() < 700) {
						this.st.focus = false;
					} else {
						this.st.focus = '#name';
					}
				}
			}
		});
		
		$('#pop-form').formValidation({
			framework: 'bootstrap',
			resetForm: true,
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				valentineemail: {
					validators: {
						notEmpty: {
							message: 'The email address is required'
						},
						emailAddress: {
							message: 'The input is not a valid email address'
						}
					}
				}
			}
		})
		.on('success.form.fv', function(e) {
			console.log('');
			// Prevent form submission
			e.preventDefault();

			var $form = $(e.target),
				fv = $form.data('formValidation');

			$('.btn-unsubscribe').val('Please Wait..');
			// Use Ajax to submit form data
			$.ajax({
				url: 'https://cuirally.com/love.php',
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					// ... Process the result ...
					if (result == "success") {
						$('#pop-form').data('formValidation').resetForm(true);
						$('.contactstatpop').html('<div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Thanks! You will be redirected to the Campaign page. </div>');
						setTimeout(function(){
							window.location.href = "https://goo.gl/3Q2vWb";
						}, 3000);
						return false;
					} else {
						$('.contactstatpop').html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Something Went wron. Please try again. </div>');
						
						return false;
					}
				}
			});
		});


		"use strict";
		var scrollOffset = 100;
		$(window).on('scroll', function() {
			if ($(window).scrollTop() < scrollOffset) {
				$('body').removeClass('scrolled');
			} else {
				$('body').addClass('scrolled');
			}
			var scrollPos = $(document).scrollTop(),
				nav_height = $('#navbar').outerHeight();
			$('.navbar li a').each(function() {
				if ($(this).hasClass("disable-scroll")) {
					return false;
				} else {
					var currLink = $(this),
						refElement = $(currLink.attr('href'));
					if (refElement.size() > 0) {
						if ((refElement.position().top - nav_height) <= scrollPos) {
							$('.navbar li').removeClass('active');
							currLink.closest('li').addClass('active');
						} else {
							currLink.removeClass('active');
						}
					}
				}
			});
		});
		
		$('.my-flipster').flipster({
			itemContainer: 'ul',
			itemSelector: 'li',
			start: 'center',
			fadeIn: 400,
			loop: true,
			autoplay: false,
			pauseOnHover: true,
			style: 'coverflow',
			spacing: -0.6,
			click: true,
			keyboard: true,
			scrollwheel: false,
			touch: true,
			nav: false,
			buttons: true,
			buttonPrev: 'Previous',
			buttonNext: 'Next',
			onItemSwitch: false
		});
	});

		$('#valentine').formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				valentineemail: {
					validators: {
						notEmpty: {
							message: 'The email address is required'
						},
						emailAddress: {
							message: 'The input is not a valid email address'
						}
					}
				}
			}
		})
		.on('success.form.fv', function(e) {
			console.log('<?php echo $_SESSION['referallink']; ?>');
			// Prevent form submission
			e.preventDefault();

			var $form = $(e.target),
				fv = $form.data('formValidation');

			$('.btn-unsubscribe').val('Please Wait..');
			// Use Ajax to submit form data
			$.ajax({
				url: 'https://cuirally.com/love.php',
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					// ... Process the result ...
					if (result == "success") {
						$("#card").flip(true);
						return false;
					} else {
						$('.contactstat').html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Something Went wron. Please try again. </div>');
						return false;
					}
				}
			});
		});
		$('#valentinefriends').formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				valentineemail: {
					validators: {
						notEmpty: {
							message: 'Your friend email is required'
						},
						emailAddress: {
							message: 'The input is not a valid email address'
						}
					}
				}
			}
		})
		.on('success.form.fv', function(e) {
			// Prevent form submission
			e.preventDefault();

			var $form = $(e.target),
				fv = $form.data('formValidation');

			$('.btn-unsubscribe').val('Please Wait..');
			// Use Ajax to submit form data
			$.ajax({
				url: 'https://cuirally.com/friendrefer.php',
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					// ... Process the result ...
					if (result == "success") {
						$('.mfp-close').trigger("click");
					} else {
					}
				}
			});
		});
		$(document).ready(function(){
			$(".voyager-features-btn").bind( "click", function() {
				if ($(this).hasClass("voyager-features-active")) {
					$(this).removeClass('voyager-features-active');
					$('#voyagersmart').removeClass('nopara');
					$(this).html('Smart Features');
					$("#voyager-features").slideUp('500');
				} else {
					$('#voyagersmart').addClass('nopara');
					$(this).addClass('voyager-features-active');
					$(this).html('Hide Smart Features');
					$("#voyager-features").slideDown('500');
				}
			});
		});
		
		$(".codecopy").click(function(){
			$('.codecopy').html('Copied');
			$(this).css('background-color','#8DB654');
			new Clipboard('.codecopy');
		});
		
		$('#referalform')
          .formValidation({
              framework: 'bootstrap',
              icon: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  email: {
                    threshold: 8,
                    message: 'The email address is not valid',
                    delay: 2000,
                    validators: {
                      notEmpty: {
                          message: 'The username is required'
                      },
                      regexp: {
                          regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                          message: 'The value is not a valid email address'
                      }
                    }
                  }
              }
          })
          .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form = $(e.target),
                fv    = $form.data('formValidation');

            // Use Ajax to submit form data
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
          			var json_data = $.parseJSON(result);
                      $('.almsg').html('<div class="alert alert-success"<strong>Success!</strong> ' +json_data.msg+  '.</div>')
						setTimeout(function(){ window.location.href = json_data.redirect;  }, 3000);
        			  } 
            });
        });
		
		$('#contactForm')
          .formValidation({
              framework: 'bootstrap',
              icon: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  email: {
                    threshold: 8,
                    message: 'The email address is not valid',
                    delay: 2000,
                    validators: {
                      notEmpty: {
                          message: 'The username is required'
                      },
                      regexp: {
                          regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                          message: 'The value is not a valid email address'
                      }
                    }
                  }
              }
          })
          .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            var $form = $(e.target),
                fv    = $form.data('formValidation');

            // Use Ajax to submit form data
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
          				    var json_data = $.parseJSON(result);
                      $('.almsg').html('<div class="alert alert-success"<strong>Success!</strong> ' +json_data.msg+  '.</div>')
                      setTimeout(function(){ window.location.href = json_data.redirect;  }, 3000);
        			  }
            });
        });
    </script>
   
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/589c434eff923c0ab4168c86/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
	<script>
		var width = $( window ).width();
		if(width < 420){
			$('body').click(function(){
				$('.panel-rightbody').removeClass('show');
			});
			$('.panel-leftheading').click(function(){
				$('.panel-rightbody').addClass('show');
			});
		}
	</script>
	<!-- Google Code for Remarketing Tag -->
	<!--------------------------------------------------
	Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
	--------------------------------------------------->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 855953403;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/855953403/?guid=ON&amp;script=0"/>
	</div>
	</noscript>
</body>
</html>
