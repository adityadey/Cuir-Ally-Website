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
	$site_url = 'https://cuirally.com/';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="msapplication-tap-highlight" content="no"/>
		<title>Stark Wallet</title>
		<meta name="description" content="The World’s Slimmest Unisex Wallet with RFID protection, just 6mm thick."/>
		<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css' >
		<link rel='stylesheet' type='text/css' href='css/animate.min.css' >
		<!--<link rel='stylesheet' type='text/css' href='css/ionicons.min.css' >-->
		<link rel='stylesheet' type='text/css' href='css/owl.carousel.css' >
		<link rel='stylesheet' type='text/css' href='css/magnific-popup.css' >
		<link rel='stylesheet' type='text/css' href='css/jquery.flipster.min.css' >
		<link rel='stylesheet' type='text/css' href='css/style.css' >
		<link rel='stylesheet' type='text/css' href='css/animate.css' >
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<link rel="stylesheet" type="text/css" href="../flags/flags.css">
		<!--<link href="../css/lity.min.css" rel="stylesheet">-->
		<!--<link href="css/hover-min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="css/jquery.animateSlider.css">
		<link rel="stylesheet" href="css/demo1.css">
		<style>
			.stark-banner-footer {
				background: #ececec;
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
    color: #fcc100;
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
	background:#fff;
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
    background: #fff url(../Fathers-day-popup-front.jpg) no-repeat center;
    background-position: -4px 0px;
    padding-top: 220px;
    left: auto;
    padding-left: 25px;
}

.card .back{
	text-align: center;
    font-size: 30px;
    font-weight: 200;
	background: #fff url('../Fathers-day-popup-back.jpg')no-repeat center;
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
}
div#card {
    overflow: hidden;
}
		</style>
			<style>
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
		a.popup-link:hover {
			color: #fff;
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
			.mfp-close {
				width: 44px;
				height: 44px;
				line-height: 15px;
				position: absolute;
				right: -12px;
				top: -8px;
			}
			
		.mfp-wrap {
			z-index: 10001;
		}
		.mfp-bg {
			z-index: 10000;
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

		<!-- Hotjar Tracking Code for https://cuirally.com/ -->
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:451013,hjsv:5};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
	</head>
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
		<div id='preloader' >
			<div class='loader' >
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
				<div class="coupon-code-status" style="margin-top: 10px !important;">
					<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
						<div class="text-center">
							<div class="input-group">
							  <input id="codecoupon" type="text" class="form-control" value="SACA2017" disabled>
							  <!--<button class="input-group-addon btn btn-default copycoupon couvalue copy" data-clipboard-text="CAHO2017">Copy code</button>-->
							  <span class="btn input-group-addon btn btn-default copycoupon copycoupon_btn codecopy" data-clipboard-text="SACA2017">Copy code</span>
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
		<nav class='navbar navbar-fixed-top' >
			<?php
				$country_support = array("jp", "hu", "ch", "gr", "si", "ar", "es", "nz", "fi", "lv", "ro", "sk", "nl", "kw", "mt", "mx", "ru", "ca", "lu", "sg", "bh", "it", "lt", "mc", "at", "is", "pt", "gb", "ee", "li", "de", "qa", "tr", "om", "be", "au", "sa", "ie", "fr", "hk", "se", "cn", "br", "lk", "my", "dk", "ae", "no", "in");
				if (in_array(strtolower($ipdir['countryCode']), $country_support)){
					if(strtolower($ipdir['countryCode']) != 'in'){
						echo '<div class="text-right container" style="font-size:12px;"><span class="flag flag-'.strtolower($ipdir['countryCode']).'"></span> We deliver in '.$ipdir['country'].' 2-7 Days</div>';
					}
				}
			?>
			<div class='container' >
				<div class='navbar-header' >
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#nav-collapse' aria-expanded='false'>
						<span class='sr-only' >Toggle navigation</span>
						<span class='icon-bar' ></span>
						<span class='icon-bar' ></span>
						<span class='icon-bar' ></span>
					</button>
					<a href='<?php echo $site_url; ?>' class='navbar-brand' >
						<img class='logo-light' src='img/logo.png' alt>
						<img class='logo-dark' src='img/logo.png' alt>
					</a>
				</div>
				<div class='collapse navbar-collapse' id='nav-collapse' >
					<ul class='nav navbar-nav navbar-right' >
						<li class='active'>
							<a href='#home' data-scroll>STARK</a>
						</li>

						<li>
							<a href='#design' data-scroll>Design</a>
						</li>

						<li>
							<a href='#RFID-secure' data-scroll>RFID Secure</a>
						</li>

						<li>
							<a href='#colors' data-scroll>Colours</a>
						</li>

						<li>
							<a href='https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-formula-one-wallet' class="disable-scroll">Buy</a>
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

		<section id='home' class='main-section parallax' data-parallax='scroll'>
		<div class='particle-bg' id='particles' ></div>
			<div class='container' >
				<div class='row' >
					<div class='col-md-2'></div>
					 <div class='col-md-8'>
						<div class="intro-text head-title text-center">
							<h1>
								World's Slimmest Unisex Wallet
							</h1>

							<h3>
							<img src="img/STARK-logo.png"/>
							<div class="clearfix"></div>
							<br>
							Slim <font class="blink-arrow-1" color="#0e2024">(</font><font class="blink-arrow-2"  color="#0e2024">( </font><small style="font-weight: 600;">RFID</small> Sec<font  color="#0e2024">ure<font class="blink-arrow-2"  color="#0e2024"> ) </font><font class="blink-arrow-1"  color="#0e2024">)</font></font>
							</h3>
					    </div>
					</div>
					<div class='col-md-2'></div>
					<div class="clearfix"></div>
					<div class="col-md-6 text-center left-img wow fadeInUp" data-wow-delay='.2s'>
						<img src="img/STARK.png" class="img-responsive" width="400" style="margin:0 auto;"/>
						<h3>8 Cards, Cash, Coins</h3>
						<img src="img/STARK-logo.png" width="100" style="padding:0;"/>
					</div>
					<div class="col-md-6 text-center right-img wow fadeInUp" data-wow-delay='.3s'>
						<img src="img/other-wallet.png" class="img-responsive" width="400" style="margin:0 auto;"/>
						<h3>6 Cards, Cash, Coins <br> Your fat bulky wallet</h3>
					</div>
				</div>
			</div>
		</section>
		<section id="design" class="slide-show">
				<h2 class="text-center">Beautiful contours, unique stitch lines form a design that appeals to both Men and Women alike.</h2>
				<ul class="anim-slider">

					<!-- Slide No1 -->
					<li class="anim-slide wallet-wide1">
					<!--<h3 id="todo">So what you can do ...</h3>-->

						<div class="first-slide">
						<p id="fade2" class="first-point">Finger friendly card slots. A card is intuitively held with a thumb and index finger, we have brought that continuity right into the card slot design for seamless usage experience.</p>
						<p id="fade3" class="second-point">Minimalistic Design. An average person uses no more than 4 cards daily(2 Debit cards, 2 Credit cards), so why clutter?</p>
						<img src="images/slide-view1.png" alt="slider1" class="wallet-img" id="todo">
						<img src="images/arrow-arrow.png" alt="slider1" class="arrow-img" id="arrow-mark">
						<p id="fade5" class="third-point">Premium fine grain leather, that oozes luxury. Delightful to hold and use on a daily basis.</p>
						<p id="fade1" class="fourth-point">Designed by reason. License, ID cards, club cards, extra credit/debit cards that you hardly use can be stored in the hidden rear card slot. Out of sight but always there when you need it.</p>
						<p id="fade4" class="fifth-point">Optimally designed to hold notes of all major currencies.</p>
						<p id="fade6" class="sixth-point">Coins. A coin slot covered with a pull flap for easy access and safe storage of coins. No buttons, no bulk just easy coin storage.</p>
						</div>
					</li>


					<!-- Slide No2 -->
					<li class="anim-slide wallet-wid2">
						<img src="images/slide-view1.png" alt="slider1" id="fixed">
						<div class="rupee-note-box">
							<div class="card5"><img id="fadeUp5" src="images/cards.png"/></div>
							<img id="coins-img" class="" width="250" src="img/coins.png"/>
						</div>
						<div class="card1"><img id="fadeUp1" src="images/gold-card.png"/></div>
						<div class="card2"><img id="fadeUp2" src="images/hdfc-card.png"/></div>
						<div class="card3"><img id="fadeUp3" src="images/life-style.png"/></div>
						<div class="card4"><img id="fadeUp4" src="images/hdfc-cardw.png"/></div>
					</li>
					<!-- Slide No2 -->
					<li class="anim-slide wallet-wid3">
						<img src="images/slide-view1.png" alt="slider1" id="fixed">
						<div class="rupee-note-box">
							<img id="rupee-img" class="" src="img/currency-five-hundred.png"/>
						</div>
						<div class="card1"><img id="fadeUp1" src="images/gold-card.png"/></div>
						<div class="card2"><img id="fadeUp2" src="images/hdfc-card.png"/></div>
						<div class="card3"><img id="fadeUp3" src="images/life-style.png"/></div>
						<div class="card4"><img id="fadeUp4" src="images/hdfc-cardw.png"/></div>

					</li>
					<!-- Slide No3 -->
					<li class="anim-slide wallet-close">
					<div class="second-slide">
						<img src="img/slider/everglade.png" alt="slider1" id="fade">
						<p id="fade7" class="seven-point">Beautiful contours, unique stitch lines form a design that appeals to both Men and Women alike.</p>
						<div class="tab-mobile-view margin-15">
						</div>
					</div>
					</li>

					<!-- Slide No5 -->
					<li class="anim-slide wallet-btm">
						<div class="second-slide">
						<img src="images/wallet-btm.png" alt="slider1" id="plugin">
						<p id="fade8" class="eight-point">The slimmest wallet yet. Freedom from fat &amp; bulky wallet problem.</p>
						<div class="tab-mobile-view margin-15">
						</div>
						</div>
					</li>

					<!-- Arrows -->
					<nav class="anim-arrows">
						<span class="anim-arrows-prev"></span>
						<span class="anim-arrows-next"></span>
					</nav>
					<!-- Dynamically created dots -->

				</ul>
				<h4 class="text-center bottom-head">SLIM</h4>
				<div class="stark-more-info text-center">
					<button class="read-more-btn hide">Read More</button>
					<ul class="tab-mobile-view">
							<li>Finger friendly card slots. A card is intuitively held with a thumb and index finger, we have brought that continuity right into the card slot design for seamless usage experience.</li>
							<li>Minimalistic Design. An average person uses no more than 4 cards daily(2 Debit cards, 2 Credit cards), so why clutter?</li>
							<li>Premium fine grain leather, that oozes luxury. Delightful to hold and use on a daily basis.</li>
							<li>Designed by reason. License, ID cards, club cards, extra credit/debit cards that you hardly use can be stored in the hidden rear card slot. Out of sight but always there when you need it.</li>
							<li>Optimally designed to hold notes of all major currencies.</li>
							<li>Coins. A coin slot covered with a pull flap for easy access and safe storage of coins. No buttons, no bulk just easy coin storage.</li>
							<li>Beautiful contours, unique stitch lines form a design that appeals to both Men and Women alike.</li>
							<li>The slimmest wallet yet. Freedom from fat &amp; bulky wallet problem.</li>
					</ul>
				</div>
		</section>

		<section id='RFID-secure' class='comparision-wallet' >
			<div class='fluid-container'>
			<div class="row">
					<div class="text-center">
					<h2 class='wow fadeInUp relative-heading' data-wow-delay='.2s' ><font class="blink-arrow-1">(</font><font class="blink-arrow-2">(</font>RFID<font class="white-text" color="#fff">Secure<font class="white-text blink-arrow-2">)</font><font class="white-text blink-arrow-1">)</font></font></h2>
					<div class="col-md-6 featured_bg_bl" style="margin-top: -48px;">
						<h3>RFID Card Theft</h3>
						<p>Radio Frequency Identification(RFID) theft happens when someone uses a RF scanner to extract sensitive card details from your wallet. Handheld scanners can scan your card details from several feet away, without your knowledge. STARK wallet is RFID theft protected by design. </p>
						<h3>How is <strong>STARK</strong> wallet RFID theft protected?</h3>
						<p>We have intelligently integrated a special material designed to block RFID signals in the wallet lining. RFID signals from scanners simply can’t enter STARK thus protecting you from RFID Theft. The beauty of our design is that you hardly feel this special material, its unobtrusive yet it protects you from RFID card theft always. </p>
					</div>
					</div>
					<div class="border-right"></div>
					<div class="col-md-6 padding-0 featured_bg_br" style="margin-top: -48px;">
						<!-- <img src="img/videos/video-feature.jpg" class="img-responsive"> -->

						<section id="video-section3" class="video-section3">
							<div class="video-gallery">
								<div class="close-you" data-section="3"></div>
								<iframe id="video3" width="100%" height="100%" src="https://www.youtube.com/watch?v=LecoGZ4t4d8" data-url="https://www.youtube.com/watch?v=LecoGZ4t4d8" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="overlay">

									<div class="description-smart-voyager des-left">
									</div>

								 <a href="//www.youtube.com/watch?v=-9Nd5i1xkE8" id="play-pryme_video" class="play-pryme_video" href="#" data-lity> <span class="play-icon">
								  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
									 <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
								  </svg>
							   </span> <span class="title">RFID Video</span> </a>
							</div>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>

			</div>
		</section>
		<section id='colors' class='mockup-section' >
			<div class='container' >
				<div class='section-header text-center' >

					<h3 class='wow fadeInUp' data-wow-delay='.2s' >6 Amazing Colours!</h3>
				<p class='wow fadeInUp' data-wow-delay='.4s' >Colourful. Beautiful. Functional</p>

				</div>
				<div class='row' >
					<div class='col-md-12' >

						<div class='col-md-10 screens-mockup' >
							<div class="my-flipster">
							<ul>
								<li class="btn-legion-blue-bg"><img src="img/slider/legion-blue.png" data-color="" data-url=""/></li>
								<li class="btn-brown-bg"><img src="img/slider/nutty-brown.png" data-color="" data-url=""/></li>
								<li class="btn-everglade-bg"><img src="img/slider/everglade.png" data-color="" data-url=""/></li>
								<li class="btn-formula-one-bg"><img src="img/slider/formula-one.png" data-color="" data-url=""/></li>
								<li class="btn-black-bg"><img src="img/slider/black-night.png" data-color="" data-url=""/></li>
								<li class="btn-fire-cracker-bg"><img src="img/slider/fire-cracker.png" data-color="" data-url=""/></li>
							</ul>
						</div>
						<br>
						<div class='col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 text-center' >
							<a href='https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-formula-one-wallet' class='btn-custom arrow-btn wow fadeInUp buy-wall formula-one-bg' data-wow-delay='.2s'>
								Buy STARK
							</a>
						</div>
						</div>
					<div class='col-md-2'>

						<div id="right-table" class='p-table standard wow bounceIn' data-wow-delay='.2s' >

							<div class='header' >

								<h4>STARK</h4>

								<div class='price' >
									<?php
									$location_ip = strtolower($ipdir['countryCode']);
									if (in_array(strtolower($ipdir['countryCode']), $country_support)){
										if($location_ip == 'jp'){
											echo '<span class="currency"><i class="fa fa-jpy"></i></span><span class="amount">4,023</span>';
										} elseif ($location_ip == 'hu'){
											echo '<span class="currency">HUF</span><span class="amount">10126</span>';
										} elseif ($location_ip == 'ch' || $location_ip == 'li'){
											echo '<span class="currency">CHF</span><span class="amount">35</span>';
										} elseif ($location_ip == 'gr' || $location_ip == 'si' || $location_ip == 'es' || $location_ip == 'fi' || $location_ip == 'lv' || $location_ip == 'sk' || $location_ip == 'nl' || $location_ip == 'mt' || $location_ip == 'lu' || $location_ip == 'it' || $location_ip == 'lt' || $location_ip == 'mc' || $location_ip == 'at' || $location_ip == 'pt' || $location_ip == 'ee' || $location_ip == 'de' || $location_ip == 'be' || $location_ip == 'ie' || $location_ip == 'fr'){
											echo '<span class="currency"><i class="fa fa-eur"></i></span><span class="amount">33</span>';
										}  elseif ($location_ip == 'ar'){
											echo '<span class="currency">ARS</span><span class="amount">556</span>';
										} elseif ($location_ip == 'ro'){
											echo '<span class="currency">RON</span><span class="amount">148</span>';
										} elseif ($location_ip == 'kw'){
											echo '<span class="currency">KWD</span><span class="amount">11</span>';
										} elseif ($location_ip == 'mx'){
											echo '<span class="currency">MXN</span><span class="amount">768</span>';
										} elseif ($location_ip == 'ru'){
											echo '<span class="currency">RUB</span><span class="amount">2086</span>';
										} elseif ($location_ip == 'ca'){
											echo '<span class="currency">CAD</span><span class="amount">47</span>';
										} elseif ($location_ip == 'sg'){
											echo '<span class="currency">SGD</span><span class="amount">50</span>';
										} elseif ($location_ip == 'bh'){
											echo '<span class="currency">BHD</span><span class="amount">13</span>';
										} elseif ($location_ip == 'is'){
											echo '<span class="currency">ISK</span><span class="amount">3955</span>';
										} elseif ($location_ip == 'gb'){
											echo '<span class="currency">British Pound</span><span class="amount">28</span>';
										} elseif ($location_ip == 'qa'){
											echo '<span class="currency">QAR</span><span class="amount">127</span>';
										} elseif ($location_ip == 'tr'){
											echo '<span class="currency">TRY</span><span class="amount">134</span>';
										} elseif ($location_ip == 'om'){
											echo '<span class="currency">OMR</span><span class="amount">13</span>';
										} elseif ($location_ip == 'au'){
											echo '<span class="currency">AUD</span><span class="amount">46</span>';
										} elseif ($location_ip == 'sa'){
											echo '<span class="currency">SAR</span><span class="amount">131</span>';
										} elseif ($location_ip == 'hk'){
											echo '<span class="currency">HKD</span><span class="amount">271</span>';
										} elseif ($location_ip == 'se'){
											echo '<span class="currency"SEK></span><span class="amount">312</span>';
										} elseif ($location_ip == 'cn'){
											echo '<span class="currency">RMB</span><span class="amount">241</span>';
										} elseif ($location_ip == 'br'){
											echo '<span class="currency">BRL</span><span class="amount">112</span>';
										} elseif ($location_ip == 'lk'){
											echo '<span class="currency">LKR</span><span class="amount">5,251</span>';
										} elseif ($location_ip == 'my'){
											echo '<span class="currency">MYR</span><span class="amount">156</span>';
										} elseif ($location_ip == 'dk'){
											echo '<span class="currency">DKK</span><span class="amount">244</span>';
										} elseif ($location_ip == 'ae'){
											echo '<span class="currency">AED</span><span class="amount">129</span>';
										} elseif ($location_ip == 'eg'){
											echo '<span class="currency">EGP</span><span class="amount">661</span>';
										} elseif ($location_ip == 'pl'){
											echo '<span class="currency">PLN</span><span class="amount">143</span>';
										} elseif ($location_ip == 'id'){
											echo '<span class="currency">IDR</span><span class="amount">4,69,222</span>';
										} elseif ($location_ip == 'ph'){
											echo '<span class="currency">PHP</span><span class="amount">1749</span>';
										} elseif ($location_ip == 'ng'){
											echo '<span class="currency">NGN</span><span class="amount">10,698</span>';
										} elseif ($location_ip == 'za'){
											echo '<span class="currency">ZAR</span><span class="amount">475</span>';
										} elseif ($location_ip == 'mv'){
											echo '<span class="currency">MVR</span><span class="amount">537</span>';
										} elseif ($location_ip == 'cz'){
											echo '<span class="currency">CZK</span><span class="amount">887</span>';
										} elseif ($location_ip == 'hr'){
											echo '<span class="currency">HRK</span><span class="amount">247</span>';
										} elseif ($location_ip == 'np'){
											echo '<span class="currency">NPR</span><span class="amount">38,142</span>';
										} elseif ($location_ip == 'bd'){
											echo '<span class="currency">BDT</span><span class="amount">2,768</span>';
										} elseif ($location_ip == 'th'){
											echo '<span class="currency">THB</span><span class="amount">1,238</span>';
										} elseif ($location_ip == 'mu'){
											echo '<span class="currency">MUR</span><span class="amount">1,260</span>';
										} elseif ($location_ip == 'ke'){
											echo '<span class="currency">KES</span><span class="amount">3,625</span>';
										} elseif ($location_ip == 'no'){
											echo '<span class="currency">NOK</span><span class="amount">34,877</span>';
										}  elseif ($location_ip == 'kr'){
											echo '<span class="currency">KRW</span><span class="amount">41,091</span>';
										}  elseif ($location_ip == 'nz'){
											echo '<span class="currency">NZD</span><span class="amount">49</span>';
										}  elseif ($location_ip == 'in'){
											echo '<span class="currency">INR</span><span class="amount">1499</span>';
										}
									} else {
										echo '<span class="currency"><i class="fa fa-usd"></i></span><span class="amount">34.99</span>';
									}
									?>
								</div>

							</div>
							<ul class='items' >
								<li>World's Slimmest Unisex Wallet</li>
								<li>Protects RFID Card Theft</li>
								<li>8 Cards, Cash & Coins</li>
								<li>Dimensions: <br>10.4 x 8.7 x 0.6 cm</li>
							</ul>
						</div>
					</div>
					</div>
				</div>
			</div>
		</section>
		<div class="stark-banner-footer text-right hide">
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
						<li><a href="https://cuirally.com/contact" title="Voyager Smart">Contact Us</a></li>
					</ul>
				</div>
				<div class='col-md-3'>
					<ul class="footer-links">
						<li><a href="https://cuirally.com/shipping-delivery-policy" title="Privacy Policy">Shipping & Delivery Policy</a></li>
						<li><a href="https://cuirally.com/refund-policy" title="Privacy Policy">Refund Policy</a></li>
						<li><a href="https://cuirally.com/privacy-policy" title="Privacy Policy">Privacy Policy</a></li>
						<li><a href="https://cuirally.com/terms" title="Terms & Conditions">Terms & Conditions</a></li>

					</ul>
				</div>
				<div class='col-md-3'>
					<ul class="footer-links">
						<li><a href="https://cuirally.com/about" title="About Us">About Us</a></li>
						<li><a href="https://cuirally.com/our-leather" title="Our Leather">Our Leather</a></li>
						<li><a href="https://cuirally.com/leather-care" title="Leather care">Leather care</a></li>
						<li><a href="https://cuirally.com/frequently-asked-question" title="FAQ">FAQ</a></li>
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
						<li><a target="_blank" href="#" class="icoPinterest" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FCuirAlly%2F&width=73&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=1321487457928134" width="73" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<div class='col-md-6 col-sm-12 col-xs-12 text-left payment-mode'>
					<h5 style="color: #ccc;padding-left: 8px;font-size: 12px;">Payment Method</h5>
					<?php if($_SESSION['store_location'] == 'IN') { ?>
						<img src="../img/Payment-Options-India.png" alt="Payment IN">
					<?php } else { ?>
						<img src="../img/Payment-Options-International.png"  alt="Payment IS">
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
		<script src='js/jquery.mobile.custom.min.js'></script>
		<script src='bootstrap/js/bootstrap.min.js' ></script>
		<script src='js/formvalidation.js' ></script>
		<script src='js/wow.min.js' ></script>
		<script src='../js/jquery.magnific-popup.min.js'></script>
		<script src='js/smooth-scroll.min.js' ></script>
		<script src='js/jquery.flipster.min.js' ></script>
		<!--<script src='../js/lity.min.js'></script>-->
		<script src='js/script.js'></script>
		<script src='../js/clipboard.min.js'></script>
		<script src='js/modernizr.custom.28468.js' ></script>
		<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
		<script src="js/jquery.animateSlider.js"></script>
		<script>
		var clipboard = new Clipboard('.btn');

		clipboard.on('success', function(e) {
			console.info('Accion:', e.action);
			console.info('Texto:', e.text);
			console.info('Trigger:', e.trigger);

			e.clearSelection();
		});

		clipboard.on('error', function(e) {
			console.error('Accion:', e.action);
			console.error('Trigger:', e.trigger);
		});
		</script>
		<script>
		$(document).ready(function() {
			$("#card").flip({
				axis: 'x',
			   trigger: 'manual'
			});
			$('.navbar-collapse a').click(function(){
				$(".navbar-collapse").collapse('hide');
			});

			new Clipboard('.btn');
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
			<?php if($_SESSION['store_location'] == 'IN') { if($_SESSION['popup'] != '1') {
				$date_now = date("Y-m-d"); // this format is string comparable
				if ($date_now > '2017-08-10') {  } else { ?>
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
			$(".codecopy").click(function(){
				$('.codecopy').html('Copied');
				$(this).css('background-color','#8DB654');
				
			});
		});
		$(document).ready(function() {
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

			$(".btn-brown-bg").bind( "click", function() {
					$('.buy-wall').attr("href","https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-nutty-brown-wallet");
					$("a.btn-custom").removeClass("black-bg legion-blue-bg formula-one-bg fire-cracker-bg everglade-bg").addClass("brown-bg");
				});
				$(".btn-legion-blue-bg").bind( "click", function() {
					$('.buy-wall').attr("href","https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-legion-blue-wallet");
					$("a.btn-custom").removeClass("black-bg brown-bg formula-one-bg fire-cracker-bg everglade-bg").addClass("legion-blue-bg");

				});
				$(".btn-black-bg").bind( "click", function() {
					$('.buy-wall').attr("href","https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-black-night-wallet");
					$("a.btn-custom").removeClass("legion-blue-bg brown-bg formula-one-bg fire-cracker-bg everglade-bg").addClass("black-bg");
				});
				$(".btn-everglade-bg").bind( "click", function() {
					$('.buy-wall').attr("href","https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-everglade-wallet");
					$("a.btn-custom").removeClass("legion-blue-bg brown-bg formula-one-bg fire-cracker-bg black-bg").addClass("everglade-bg");
				});
				$(".btn-formula-one-bg").bind( "click", function() {
					$('.buy-wall').attr("href","https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-formula-one-wallet");
					$("a.btn-custom").removeClass("legion-blue-bg brown-bg everglade-bg fire-cracker-bg black-bg").addClass("formula-one-bg");

				});
				$(".btn-fire-cracker-bg").bind( "click", function() {
					$('.buy-wall').attr("href","https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/stark-fire-cracker-wallet");
					$("a.btn-custom").removeClass("legion-blue-bg brown-bg everglade-bg formula-one-bg black-bg").addClass("fire-cracker-bg");
				});

			$('#animatedElement').click(function() {
				$(this).addClass("pulse");
			});

			$(".anim-slider").animateSlider({
				autoplay: true,
				interval: 5000,
				animations: {
					0: //Slide No1
					{
						"img#todo": {
							show: "fadeIn",
							hide: "fadeOut",
						},
						"#arrow-mark": {
							show: "fadeIn",
							hide: "fadeOut",
							delayShow: "delay0.5s"
						},
						"#fade1": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay1s"
						},
						"#fade2": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay1-5s"
						},
						"#fade3": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay2s"
						},
						"#fade4": {
							show: "fadeInLeft",
							hide: "fadeOutLeft",
							delayShow: "delay1s"
						},
						"#fade5": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay1-5s"
						},
						"#fade6": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay2s"
						}
					},
					1: //Slide No2
					{

						"img#fixed": {
							hide: "fadeOut",
						},
						"img#fadeUp1": {
							show: "fadeInUpBig",
							hide: "fadeOutUpBig",
							delayShow: "delay0.8s"
						},
						"img#fadeUp2": {
							show: "fadeInUpBig",
							hide: "fadeOutUpBig",
							delayShow: "delay0.5s"
						},
						"img#fadeUp4": {
							show: "fadeInUpBig",
							hide: "fadeOutUpBig",
							delayShow: "delay0.9s"
						},
						"img#fadeUp3": {
							show: "fadeInUpBig",
							hide: "fadeOutUpBig",
							delayShow: "delay0.6s"
						},
						"img#coins-img": {
							show: "animation-coins",
							delayShow: "delays0.2s"
						},
						"img#fadeUp5": {
							show: "animation-card",
							delayShow: "delay0.8s"
						}
					},
					2: //Slide No4
					{
						"img#fixed": {
							hide: "fadeOut",
						},
						"img#rupee-img": {
							show: "animation-rupees",
							delayShow: "delay0.6s"
						}

					},
					3: //Slide No4
					{

						"img#fade": {
							show: "fadeInLeft",
							hide: "flipOutX",
							delayShow: "delay0.5s"
						},
						"#fade7": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay0.6s"
							}
					},
					4: //Slide No5
					{
						"img#plugin": {
							show: "fadeInUpBig",
							hide: "fadeOutDownBig",
							delayShow: "delay0.5s"
						},
						"#fade8": {
							show: "fadeInRight",
							hide: "fadeOutRight",
							delayShow: "delay0.6s"
						}

					}
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
	<!--End of Tawk.to Script-->
	
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
