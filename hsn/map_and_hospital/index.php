<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>Covid-19 surveillance</title>
	<link rel="stylesheet" type="text/css" href="assets/css/css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/js.js"></script>
</head>
<body class="scrollbar" id="style-3">



	<!-- map and sidebar container -->
	<div class="contianer1">
		<!-- side bar -->
	 <div class="sidebar side_in">
			<!-- search bar-->
		<div class="ser_container">
			<form>
				<input class="ser_side" type="text" placeholder="township"/>
				<div class="ser_btn"></div>
			</form>
		</div><!-- end search bar-->
			<div class="hh_drop_down scrollbar" id="style-3">
			    <ul class="hh_main">
			        <li class="hh_main_menu">
			            <a href="javascript:void(0);" class="hh_sf">Shan State</a>
			            <ul class="hh_inner expanded">
			                <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>
			        </li>

			        <li class="hh_main_menu">
			            <a class="hh_sf " href="#">Kayin State</a>
			            <ul class="hh_inner expanded">
			                <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>

			        </li>

			        <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Kayah State</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>
			        </li>

			        <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Kachin State</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Rakhin State</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Mon State</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>
			        </li>

			        <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Chin State</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">State-1</a></li>
			                <li><a href="#">State-2</a></li>
			                <li><a href="#">State-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Tanintharyi Region</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">Region-1</a></li>
			                <li><a href="#">Region-2</a></li>
			                <li><a href="#">Region-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Magway Region</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">Region-1</a></li>
			                <li><a href="#">Region-2</a></li>
			                <li><a href="#">Region-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Ayeyarwady Region</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">Region-1</a></li>
			                <li><a href="#">Region-2</a></li>
			                <li><a href="#">Region-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Yangon Region</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">Region-1</a></li>
			                <li><a href="#">Region-2</a></li>
			                <li><a href="#">Region-3</a></li>
			            </ul>
			        </li>

			         <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Mandalay Region</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">Region-1</a></li>
			                <li><a href="#">Region-2</a></li>
			                <li><a href="#">Region-3</a></li>
			            </ul>
			        </li>

			       	 <li class="hh_main_menu">
			            <a class="hh_sf" href="#">Naypyidaw Region</a>
			            <ul class="hh_inner expanded">
			                 <li><a href="#">Region-1</a></li>
			                <li><a href="#">Region-2</a></li>
			                <li><a href="#">Region-3</a></li>
			            </ul>
			        </li>

			    </ul>
			</div>


			<!-- information -->
			<div class="info_side">
				<div class="info_inner">
					<div class="info_img bg_red"></div>
					<p class="info_txt">Danger</p>
				</div>
				<div class="info_inner">
					<div class="info_img bg_purple"></div>
					<p class="info_txt">Danger</p>
				</div>
				<div class="info_inner">
					<div class="info_img bg_blue"></div>
					<p class="info_txt">Danger</p>
				</div><!-- end information -->
			</div><!-- end information -->
		</div><!-- end side bar -->

		<!-- icon -->
		<div class="icon_side">
			<div class="icon_search fade_in" onclick="side_inout()"> </div>
		</div><!-- end icon -->

		<!-- map-->
		<div class="map" style="background: url('assets/imgs/map.PNG');background-repeat: no-repeat;background-size: cover;">
		</div><!--end map -->
	</div><!-- end map and sidebar container -->

	<!-- hospital container -->
	<div class="hop_container">
		<p class="ttl_hop">PUI Hospitals </p>
		<div class="hops scrollbar" id="style-3">
			<p> 76 Way Ba Gyi General Hopspital (Mandalay Townshiop)</p>
			<p> 28 Insein General Hopspital (Yangon Townshiop)</p>
			<p> 11 Way Ba Gyi General Hopspital (NayPyiTaw Townshiop)</p>
			<p> 20 Insein General Hopspital (Kachin State)</p>
			<p> 76 Way Ba Gyi General Hopspital (Mandalay Townshiop)</p>
			<p> 28 Insein General Hopspital (Yangon Townshiop)</p>
			<p> 11 Way Ba Gyi General Hopspital (NayPyiTaw Townshiop)</p>
			<p> 20 Insein General Hopspital (Kachin State)</p>
		</div>	
	</div><!-- end hospital container -->
</body>
</html>