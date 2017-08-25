<?php 
	session_start(); 
	include ('flags.php');
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
    <title>Voyager Smart Wallet</title>
    <meta name="description" content="The World's Most Functional Smart Wallet, connects to your smartphone."/>
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='css/animate.min.css'>
    <link rel='stylesheet' type='text/css' href='css/ionicons.min.css'>
    <link rel='stylesheet' type='text/css' href='css/linea.css'>
    <link rel='stylesheet' type='text/css' href='css/waves.min.css'>
    <link rel='stylesheet' type='text/css' href='css/owl.carousel.css'>
    <link rel='stylesheet' type='text/css' href='css/magnific-popup.css'>
    <link rel='stylesheet' type='text/css' href='css/jquery.flipster.min.css'>
	<link rel='stylesheet' type='text/css' href='css/formvalidation.css'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel='stylesheet' type='text/css' href='css/hover-min.css'>
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
		<style>
		
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
	</style>
    <style>
        .mfp-title {
            position: absolute;
            color: #FFF;
            background: red;
        }
		.mobile-bn {
			margin-bottom: 10px;
			margin-top: 20px;
		}
    </style>
	<style>
		/* Styles for dialog window */
#small-dialog {
    padding: 20px 30px 0;
    text-align: left;
    max-width: 526px;
    margin: 40px auto;
	min-height:360px;
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
	background: #fff url(Fathers-day-popup-back.jpg)no-repeat center;
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
		display:none;
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
		.testimonials-section {
			margin-top: -70px;
		}
		.mfp-close {
    width: 44px;
    height: 44px;
    line-height: 15px;
    position: absolute;
    right: -12px;
    top: -8px;
}
		</style>
    <!-- End Facebook Pixel Code -->
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

    <div id='preloader'>
        <div class='loader'> <img src='img/loader.gif' alt> </div>
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
					<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2" style="margin-left:145px;">
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
    <nav class='navbar navbar-fixed-top'>
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#nav-collapse' aria-expanded='false'> <span class='sr-only'>Toggle navigation</span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
                <a href='https://cuirally.com/' class='navbar-brand'> <img class='logo-light' src='img/logo.png' alt> <img class='logo-dark' src='img/logo.png' alt> </a>
            </div>
            <div class='collapse navbar-collapse' id='nav-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <li> <a href='https://cuirally.com/voyager-smart'>Voyager Smart</a> </li>
					<li> <a href='https://cuirally.com/stark/'>STARK</a> </li>
                    <?php
					if($_SESSION['default']['customer_id'] != NULL){
						$logged = $_SESSION['default']['customer_id'];
						if($logged > 0) {
						   echo '<li><a href="https://cuirally.com/'.$_SESSION['store_url'].'/index.php?route=account/account" class="disable-scroll">My Account</a></li>';
						}
					}
					?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Section 1 -->
    <section id="video-section3" class="video-section1">
        <div class="video-gallery">
            <div class="close-you" data-section="1"></div>
            <iframe id="video1" width="100%" height="100%" src="//www.youtube.com/embed/uvL9RW-Rrig?rel=0" data-url="//www.youtube.com/embed/uvL9RW-Rrig?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="description-smart-voyager des-left">
					<h3 class='title wow fadeInUp'  data-wow-delay='.2s'>World's Most Functional Smart Wallet.</h3>
					 <p class='font-alt wow fadeInUp text-italic' data-wow-delay='.3s'>Never Lose your Wallets Ever Again</p>
                    <p>We, at <b><i>Cuir Ally</i></b> have designed, iterated and obssessed over the Smart Wallet concept for more than a year to bring Voyager Smart Wallet to you. </p>
                    <p>A Smart Wallet that connects to your smartphone opens up immense possibilities. We believe that the key to Smart Wallet design lies in retaining the look and feel of a traditional wallet while integrating technology in an unobtrusive manner and that's exactly what we have achieved with the Voyager Smart Wallet. </p>
                    <p>To see how amazing it is, click the play button, sit back and experience the magic happen yourself. </p>
                    <div class='mobile-bn app-btn wow bounceIn voyager-btn-home' data-wow-delay='.6s' title="Buy Now" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Buy Now</div>
					<div class="video-play-fun" title="Watch Video" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Watch Video</div>
                </div>
            </div>
            <a id="play-pryme_video" class="play-pryme_video" data-section="1" href="#"> <span class="play-icon">
                  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
                     <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
                  </svg>
               </span> <span class="title">Watch Video</span><!--  <span class="title buyvs">buy Now</span>  --></a>
        </div>
    </section>
    <!-- Section 2 -->
    <section id="video-section2" class="video-section2">
        <div class="video-gallery">
            <div class="close-you" data-section="2"></div>
            <iframe id="video2" width="100%" height="100%" src="//www.youtube.com/embed/Jznw8TT7_MI?rel=0" data-url="//www.youtube.com/embed/Jznw8TT7_MI?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="description-smart-voyager des-right">
                    <h3 class='title wow fadeInUp'  data-wow-delay='.3s'><span style="margin-right:10px;"><img src="img/notifications.png"/ style="margin-right:10px;"></span> Notification on Phone when Voyager Smart Wallet is left behind</h3>
                    <p>We all have forgotten our wallets at restaurants, offices, shops or even at our homes         only to lose them eventually. Now get a notification on your smartphone as soon as your wallet gets separated from you. Voila! No more lost wallets! </p>
					<div class="mobile-bn app-btn wow bounceIn voyager-btn-home" data-wow-delay='.6s' title="Buy Now" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Buy Now</div>
                    <div class="video-play-fun" title="Watch Video" href="https://www.youtube.com/watch?v=Jznw8TT7_MI">Watch Video</div>
                    <div id='testimonials' class='testimonials-section'>
                        <div class='testimonials-slider'>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>It was my First Date, left my Voyager wallet at home but as I got into the car luckily I got a notification on my iPhone reminding me to take it along. Imagine how embarrassing it would have been to show up for the date without the wallet.</p>
                                </div>
                                <div class='author'>
                                    <h4>Deepak</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>As the taxi dropped me at the airport and sped off, I immediately got a notification on my phone that I left my wallet in the taxi. Thankfully I called the taxi driver before he had exited the airport as the wallet had my passport, cash and boarding pass.</p>
                                </div>
                                <div class='author'>
                                    <h4>Arthi</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>I was taking my entire team out for lunch at office, as it happened earlier I left my wallet in my office bag only this time I got a notification on my phone when I reached the door to collect my wallet. Sigh, that saved me a ton of embarrassment</p>
                                </div>
                                <div class='author'>
                                    <h4>Rajesh</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a id="play-pryme_video" class="play-pryme_video" data-section="2" href="#"> <span class="play-icon">
                  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
                     <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
                  </svg>
               </span> <span class="title">Watch Video</span> </a>
        </div>
    </section>
    <!-- Section 3 -->
	<section class="divider-section">
		 <div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12 fea-lists">
					<img src="img/icons/Dollar.png"><span><h4>Money Back Guarantee</h4></span>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 fea-lists">
					<img src="img/icons/Shipping.png"><span><h4>International Shipping</h4></span>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 fea-lists">
					<img src="img/icons/24---7-Support.png"><span><h4>12 hour Customer issue resolution</h4></span>
				</div>
			</div>
		 </div>
	</section>
    <section id="video-section3" class="video-section3">
        <div class="video-gallery">
            <div class="close-you" data-section="3"></div>
            <iframe id="video3" width="100%" height="100%" src="//www.youtube.com/embed/Mj6CtdZ9Av8?rel=0" data-url="//www.youtube.com/embed/Mj6CtdZ9Av8?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="description-smart-voyager des-left">
                    <h3 class="title wow fadeInUp"  data-wow-delay='.3s'><span style="margin-right:10px;"><img src="img/map-location.png"/ style="margin-right:10px;"></span> Last seen location on map, accessible from any phone, tablet or computer</h3>
                    <p>We know what's in your mind right now. What if we leave both the phone and wallet behind and have no clue where we left it?</p>
					<p>Don't worry we have got you covered. Just login to your Chipolo account using Facebook or Google logins and see where you last left it. Even if you are countries apart it shows up exactly where. </p>
					<div class="mobile-bn app-btn wow bounceIn voyager-btn-home" data-wow-delay='.6s'  title="Buy Now" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Buy Now</div>
                    <div class="video-play-fun" title="Watch Video" href="https://www.youtube.com/watch?v=Mj6CtdZ9Av8">Watch Video</div>
                    <div id='testimonials' class='testimonials-section'>
                        <div class='testimonials-slider'>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>After leaving office I attended a marriage reception, followed by a party at a friend’s house upon reaching home I realised that I had misplaced my laptop bag with my mobile and voyager wallet in it at either of these locations, but Voyager saved the day as I could pin point that I had forgotten the bag at my friend’s house using the map feature from my home PC.</p>
                                </div>
                                <div class='author'>
                                    <h4>Russel</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>I’m so forgetful that I left both my voyager smart in my office drawer, after reaching home I realised it was missing and assumed the worst panicking that I was pickpocketed in the train. I quickly logged on to my PC and heaved a sigh of relief when I found it located in my office through the map feature</p>
                                </div>
                                <div class='author'>
                                    <h4>Pranav</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>My girlfriend was super mad at me for not picking up the call after dropping her home. What could have blown up into a huge fight ended with sheepish laughter once I found that she had put my phone in her bag by mistake. All thanks to the lovely map feature!</p>
                                </div>
                                <div class='author'>
                                    <h4>Ankit</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a id="play-pryme_video" class="play-pryme_video" data-section="3" href="#"> <span class="play-icon">
			  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
				 <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
			  </svg>
		   </span> <span class="title">Watch Video</span> </a>
        </div>
    </section>
	<section class="divider-section">
		 <div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 fea-lists">
					<a href="https://cuirally.com/leather-care"><img src="img/icons/Leather-Care.png"><span><h4>Leather Care</h4></span></a>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 fea-lists">
					<a href="https://cuirally.com/our-leather"><img src="img/icons/Our-Leather.png"><span><h4>Our Leather</h4></span></a>
				</div>
				<div class="col-md-2"></div>
			</div>
		 </div>
	</section>
    <!-- Section 4 -->
    <section id="video-section2" class="video-section4">
        <div class="video-gallery">
            <div class="close-you" data-section="4"></div>
            <iframe id="video4" width="100%" height="100%" src="//www.youtube.com/embed/9yUbm1nIpzg?rel=0" data-url="//www.youtube.com/embed/9yUbm1nIpzg?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="description-smart-voyager des-right">
                    <h3 class="title wow fadeInUp"  data-wow-delay='.4s'><span style="margin-right:10px;"><img src="img/camera-icon.png"/ style="margin-right:10px; margin-top:-30px;"></span> Take a selfie with your wallet</h3>
                    <p>Can you really take a selfie with Voyager? Why not it’s a Smart Wallet!!</p>
                    <p>Open Chipolo app on smartphone, choose selfie option & just double press on the bottom right portion of the wallet and say Cheese! Your wallet is your selfie remote! Now group selfies are fun and easy.</p>
					<div class="mobile-bn app-btn wow bounceIn voyager-btn-home" data-wow-delay='.6s'  title="Buy Now" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Buy Now</div>
                    <div class="video-play-fun" title="Watch Video" href="https://www.youtube.com/watch?v=9yUbm1nIpzg">Watch Video</div>
                    <div id='testimonials' class='testimonials-section'>
                        <div class='testimonials-slider'>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>I’ve never been the “tech” guy at my office, now after purchasing the Voyager Smart I’m their go to guy to take group photos at office gatherings using my Voyager Smart wallet, now they call me the smart wallet guy haha</p>
                                </div>
                                <div class='author'>
                                    <h4>Panscheel</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>On our honeymoon, it was such a trouble asking strangers all over Europe to take our perfect photos of us, now on our second trip there we are going prepared with a simple and efficient Voyager Smart wallet no need for those clumsy selfie sticks!</p>
                                </div>
                                <div class='author'>
                                    <h4>Pooja</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>I always loved taking selfies but the trouble of carrying a selfie stick around hampered my love but now with the selfie feature of the Voyager Smart I can carry it any time anywhere</p>
                                </div>
                                <div class='author'>
                                    <h4>Krithika</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a id="play-pryme_video" class="play-pryme_video" data-section="4" href="#"> <span class="play-icon">
                  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
                     <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
                  </svg>
               </span> <span class="title">Watch Video</span> </a>
        </div>
    </section>
    <section id="video-section3" class="video-section5">
        <div class="video-gallery">
            <div class="close-you" data-section="5"></div>
            <iframe id="video5" width="100%" height="100%" src="//www.youtube.com/embed/LecoGZ4t4d8?rel=0" data-url="//www.youtube.com/embed/LecoGZ4t4d8?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="description-smart-voyager des-left">
                    <h3 class="title wow fadeInUp"  data-wow-delay='.2s'><span style="margin-right:10px;"><img src="img/wallet-smrt.png"/ style="margin-right:10px; margin-top:-30px;"></span> Find your wallet using your smart phone</h3>
                    <p>Just like wallets, even phone have a knack of hiding themselves at the strangest of places, especially when they are on silent mode. We all have tried giving it a ring from another phone only to realise that it is in silent mode and searched for it with racing heartbeat wondering if we had lost our expensive smartphones.</p>
                    <p>Now with the Voyager Smart wallet just double press the bottom right cornet of the wallet and wait to see the magic happen! Your phone rings even when its on silent. How cool is that! </p>
					<div class="mobile-bn app-btn wow bounceIn voyager-btn-home" data-wow-delay='.6s'  title="Buy Now" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Buy Now</div>
                    <div class="video-play-fun" title="Watch Video" href="https://www.youtube.com/watch?v=LecoGZ4t4d8">Watch Video</div>
                    <div id='testimonials' class='testimonials-section'>
                        <div class='testimonials-slider'>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>I have this strange habit of checking if my wallet is in my bag, earlier I used to rummage through the entire bag to know if its there in my bag. Now I just press the ring button on the app to hear my wallet ring and tell me its there!!</p>
                                </div>
                                <div class='author'>
                                    <h4>Brendon</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>One of the troubles of have a tiny tot child in your house is that nothing is ever where it was last left. Wallet from my dining room ends up in my kitchen thanks to my kid, but I must thank Voyager Smart now I can ring and find my wallet anywhere in the house</p>
                                </div>
                                <div class='author'>
                                    <h4>Vandana</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>After a crazy night out with all my friends sloshed I woke up in the middle of night craving for a pizza but couldn’t find the wallet, but then I took out my phone and rang to find the wallet like a boss then rang up the pizza outlet.</p>
                                </div>
                                <div class='author'>
                                    <h4>Saravanan</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a id="play-pryme_video" class="play-pryme_video" data-section="5" href="#"> <span class="play-icon">
                  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
                     <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
                  </svg>
               </span> <span class="title">Watch Video</span> </a>
        </div>
    </section>
	<section class="divider-section">
		 <div class="container">
			<div class="row">
				<div class="col-md-3 text-center fea-lists2">
					<img src="img/Patents&Hardware-Icon-02.png">
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12 fea-lists2">
					<span><h4>Chipolo Plus Smart Chip is offered with 1 Year Limited Hardware Warranty. </h4></span>
				</div>
				
				<div class="col-md-2"></div>
			</div>
		 </div>
	</section>
    <!-- Section 4 -->
    <section id="video-section2" class="video-section6">
        <div class="video-gallery">
            <div class="close-you" data-section="6"></div>
            <iframe id="video6" width="100%" height="100%" src="//www.youtube.com/embed/SrTKi_xmU1o?rel=0" data-url="//www.youtube.com/embed/SrTKi_xmU1o?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="description-smart-voyager des-right">
                    <h3 class="title"><span style="margin-right:10px;"><img src="img/smart-phone.png"/ style="margin-right:10px;"></span> Find your phone using your smart wallet even when its on silent</h3>
                    <p>Phones also have a strange way of hiding themselves at the strangest of places worst part they do so when they are put on silent mode. So you have tried ringing it several times but its on silent mode & tried searching for it but no luck.<br/> Now with the Voyager Smart wallet jus double press the bottom right portion of the wallet and wait to see the magic happen! Your phone rings even when its on silent.</p>
					<div class="mobile-bn app-btn wow bounceIn voyager-btn-home" data-wow-delay='.6s' title="Buy Now" href="https://www.youtube.com/watch?v=uvL9RW-Rrig">Buy Now</div>
                    <div class="video-play-fun" title="Watch Video" href="https://www.youtube.com/watch?v=SrTKi_xmU1o">Watch Video</div>
                    <div id='testimonials' class='testimonials-section'>
                        <div class='testimonials-slider'>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>Everyday before leaving to work I spend a good 10 minutes searching for my phone which is usually on silent mode, now all I do is just ring it at will using Voyager Smart to find its location.</p>
                                </div>
                                <div class='author'>
                                    <h4>Rathna</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>I was expecting an interview call at 3pm but I couldn’t find my phone, if not for Voyager Smart I would have missed the call as the phone was on silent too” Slightly experienced working professional</p>
                                </div>
                                <div class='author'>
                                    <h4>Mithilesh</h4>
                                </div>
                            </div>
                            <div class='testimonial'>
                                <div class='icon'> <i class='ion-quote'></i> </div>
                                <div class='content'>
                                    <p>My aged dad loves the find your phone feature using his Voyager Smart, earlier he used to bring the house down to find his mobile now he just enjoys finding it using his wallet almost like a treasure hunt.</p>
                                </div>
                                <div class='author'>
                                    <h4>Naveena</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a id="play-pryme_video" class="play-pryme_video" data-section="6" href="#"> <span class="play-icon">
                  <svg width="62" height="62" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
                     <path d="M31 0C13.888 0 0 13.888 0 31c0 17.112 13.888 31 31 31 17.112 0 31-13.888 31-31C62 13.888 48.112 0 31 0zm-7.006 44.888V16.864l21.638 14.012-21.638 14.012z" fill="#000" fill-rule="evenodd"></path>
                  </svg>
               </span> <span class="title">Watch Video</span> </a>
        </div>
    </section>
    <div id='specification-container' class='specification-section'>
        <div class="row">
            <div class='col-md-3 border-style'>
                <input type='button' id='setup' class="spec-btn" value='Easy Setup'> </div>
            <div class='col-md-3 border-style'>
                <input type='button' id='spec' class="spec-btn" value='SMART Features' style="font-weight:500;"> </div>
            <div class='col-md-3 border-style'>
                <a href="https://cuirally.com/frequently-asked-question" target="_blank" class="spec-btn">FAQ </a>
            </div>
            <div class='col-md-3'>
                <input type='button' id='warranty' class="spec-btn" value="Warranty & Patents">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class='setup-content first' style="display:block">
            <div class="row">
                <div class="col-xs-12 col-md-1"></div>
                <div class="col-xs-12 col-md-5">
                    <!--  <div class="section-header text-center">
                  <h2 class="wow fadeInUp" data-wow-delay=".2s" style="text-transform: capitalize;padding-top: 20px;">Why Travel Clumisily with</h2>
               </div> -->
                    <div class="col-xs-12 col-sm-5 col-md-5"> <img src="img/easysetup/es-mobile-downlod.jpg">
                        <p class="smart-dec">Download Chipolo app to your mobile device
                            <br/>(Follow step by step instructions <a href="https://cuirally.com/faq/get-started/setting-up-your-new-chipolo">iOS</a> & <a href="https://cuirally.com/faq/get-started/setting-up-a-new-chipolo">Android</a>)</p>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 text-center"> <span class="plus-sign"><img src="img/arrow-right.jpg" class="img-responsive img-arrow-rigth"> <img src="img/arrow-down.jpg" class="img-responsive img-arrow-down"></span> </div>
                    <div class="col-xs-12 col-sm-5 col-md-5"> <img src="img/easysetup/es-bluetooth.jpg">
                        <p class="smart-dec">Connect voyager smart wallet to your phone
                            <br/>(Follow step by step instructions <a href="https://cuirally.com/faq/get-started/setting-up-your-new-chipolo">here</a>)</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-2 minus-center text-center equalto"> <span class="plus-sign"><img src="img/arrow-right.jpg" class="img-responsive img-arrow-rigth"> <img src="img/arrow-down.jpg" class="img-responsive img-arrow-down"></span> </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 text-center "> <img src="img/easysetup/es-connect.jpg">
                        <p class="smart-dec">Voila!
                            <br>Never lose your wallet again!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='setup-content second'>
            <div class="fluid-container">
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape orange-clr hvr-radial-out"> <img src="img/technical/bluetooth.png" class="hvr-pop" width="64"> </div>
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
					<div class="circle-shape  blue-clr hvr-radial-out"> <img src="img/technical/smartphone.png" class="hvr-buzz-out" width="64"> </div>
					<h4><b>Out of Range Notifications on your Smartphone</b></h4>
					<p><a href="https://cuirally.com/faq/chipolo-app/out-of-range-notifications">Check here</a> to learn how to setup/activate</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape  brown-clr hvr-radial-out"> <img src="img/technical/alarm.png" class="hvr-wobble-skew" width="64"> </div>
					<h4><b>Ring phone to find it even when on silent</b></h4>
					<p>Double press wallet to ring phone, even when it is on silent mode</p>
				</div>
				<div class="clearfix"></div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape orange-clr hvr-radial-out"> <img src="img/technical/wallet.png" class="hvr-rotate" width="64"> </div>
					<h4><b>Ring wallet to find its location </b></h4>
					<p>Press ‘Ring’ on Chipolo app to ring wallet. With 92 decibel melody, its easy to hear it rooms away</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape hvr-radial-out"> <img src="img/technical/camera.png" class="hvr-push" width="64"> </div>
					<h4><b>Take selfie on smart phone using wallet</b></h4>
					<p>Double press wallet to take selfie on smartphone.</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape blue-clr hvr-radial-out"> <img src="img/technical/battery.png" class="hvr-hang" width="64"> </div>
					<h4><b>Maintenance Free Battery</b></h4>
					<p>Designed to run a full year with zero upkeep. No battery replacement, no charging required. After 12 months, use <a href="https://chipolo.net/renewal">Chipolo Renewal Program</a> </p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape brown-clr hvr-radial-out"> <img src="img/technical/placeholder.png" class="hvr-float" width="64"> </div>
					<h4><b>Find last seen Voyager Smart Wallet Location on Map</b></h4>
					<p>Enable GPS on mobile to track exact location.</p>
				</div>
				<div class="clearfix"></div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape orange-clr hvr-radial-out"> <img src="img/technical/smartphone-login.png" class="hvr-shrink" width="64"> </div>
					<h4><b>Phone Finder</b></h4>
					<p>Use the Free Chipolo app to find/ring/send message to your phone via any web connected device using your unique login credentials. </p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape hvr-radial-out" style="padding-top:0;"> <img src="img/technical/warranty.png" class="hvr-pulse" style="padding-top: 24px;" width="90"> </div>
					<h4><b>Warranty</b></h4>
					<p>1 Year Limited Hardware warranty on Chipolo</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape blue-clr hvr-radial-out"> <img src="img/technical/eu.png" class="hvr-wobble-vertical" width="90" style="padding-top:20px;"> </div>
					<h4><b>Chipolo Product Qaulity</b></h4>
					<p>Chipolo is made in Slovenia, European Union thus ensuring European level of premium product quality</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-center padding-btm20">
					<div class="circle-shape  brown-clr hvr-radial-out"> <img src="img/technical/wallet2.png" class="hvr-wobble-horizontal" width="64"> </div>
					<h4><b>Community search feature for your lost wallet</b></h4>
					<p>Put all Chipolo community users on the lookout for your wallet through Chipolo app automatically & anonymously. Get notification of the map location of your wallet, when any Chipolo community user is within rage of your wallet. </p>
				</div>
				<div class="clearfix"></div>
			</div>
        </div>
		<div class='setup-content four'>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
						<img src="img/Patents&Hardware-Icon-02.png" width="200">
						
						<p style="padding-top:10px">Chipolo Plus Smart Chip is offered with 1 Year Limited Hardware Warranty. </p>
					</div>
                    <div class="col-md-6 text-center">
						<img src="img/Patents-&-Hardware-Icon-01.png" width="200">
						
						<p style="padding-top:10px">The Voyager Smart Wallet & Voyager Wallet is protected with strong design patents. Infringement of the same shall attract heavy penalties and lawsuits. Beware!</p>
					</div>
                </div>
            </div>
        </div>
        <div class='setup-content third'>FAQ</div>
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
                    <p>Copyright &copy; <?php echo date('Y'); ?> Cuir Ally | a <a href="https://webdefy.com/" target="_blank">Webdefy</a> site</p>
                </div>
                <div class='col-sm-6'>
                    <ul class='footer-social wow fadeInRight' data-wow-delay='.2s'>
                        <p>Got a Question? <a href="mailto:support@cuirally.com" class="footer-mail">support@cuirally.com</a>
                        </p>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <script src='js/jquery.scrollify.min.js'></script>
    <script src='js/jquery.magnific-popup.min.js'></script>
    <script src='js/jquery.ajaxchimp.min.js'></script>
    <script src='js/parallax.min.js'></script>
    <!-- <script src='js/particles.min.js'></script> -->
    <script src='js/waves.min.js'></script>
    <script src='js/owl.carousel.min.js'></script>
    <script src='js/wow.min.js'></script>
    <script src='js/validator.min.js'></script>
    <script src='js/smooth-scroll.min.js'></script>
    <script src='js/jquery.flipster.min.js'></script>
	<script src='js/formvalidation.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
	<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
    <script src='js/script.js'></script>
	<script>
	var clipboard = new Clipboard('.btn');
	</script>
    <script>
        $(document).ready(function() {
			var clipboard = new Clipboard('.couvalue')
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
			$(".copycoupon_btn").click(function(){
				$('.copycoupon_btn').html('Copied');
				$(this).css('background-color','#8DB654');
			});
            $('.testimonials-slider').owlCarousel({
                items: 1,
                slideSpeed: 10000,
                nav: false,
                autoplay: true,
                dots: true,
                loop: true,
                responsiveRefreshRate: 200,
            });
            $('.play-pryme_video').on('click', function(ev) {
                var currentsec = $(this).attr('data-section');
                $('.video-section' + currentsec + ' .overlay').fadeOut('300');
                $("#video" + currentsec)[0].src += "&autoplay=1";
                ev.preventDefault();
            });
            $('.close-you').on('click', function(ev) {
                var currentsec = $(this).attr('data-section');
                $('.video-section' + currentsec + ' .overlay').fadeIn('300');
                $("#video" + currentsec).attr('src', $("#video" + currentsec).attr('data-url'));
                ev.preventDefault();
            });
            $('#setup').on('click', function() {
                $('.setup-content').slideUp('1000');
                $('.first').slideDown('1000');
            });
            $('#spec').on('click', function() {
                $('.setup-content').slideUp('1000');
                $('.second').slideDown('1000');
            });
			$('#warranty').on('click', function() {
                $('.setup-content').slideUp('1000');
                $('.four').slideDown('1000');
            });
            $('.video-play-fun').magnificPopup({
                type: 'iframe',
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">' +
                        '<div class="mfp-close"></div>' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                        '</div>'
                },
                callbacks: {
                    markupParse: function(template, values, item) {
                        values.title = item.el.attr('title');
                    }
                }
            });
			$('.mobile-bn').on('click', function(ev) {
                ev.preventDefault();
				window.location.href = "https://cuirally.com/<?php echo $_SESSION['store_url']; ?>/voyager-wallet-blue";
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