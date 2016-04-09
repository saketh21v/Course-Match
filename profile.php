<!DOCTYPE html>
<!-- saved from url=(0046)http://localhost/coursematch/temp/profile.html -->
<html class=""><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">


<?php
$email = "";
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
      $email = $_POST["email"];
	}
else{
	header("Location: http://localhost/coursematch/Course-Match/someError.html");
	die();
	}
?>
<style class="cp-pen-styles">body{
	margin: 0 0 0 0;
	background:url();
	background-size:cover;
	}
.click{
	  background: url('images/blockFace.jpeg');
	  background-size:contain;
	  position: relative;
	    -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
	  	  					-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
			  box-shadow: 0px 0px 0px 2pt transparent;
	  border: 0px solid #FFF;
	  margin: auto;
  cursor: pointer;
	  	width:120px;
	height:120px;
	}
.Profile{
	margin-left:auto;
	  z-index: 9999;
	margin-right:auto;
	text-align:center;
		  	  					-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
	width:300px;
	height:200px;
		  border-radius:50%;
	margin-top:34vh;
	}
	.clickProfile{
	margin-left:auto;
		border-top-left-radius:20px;
	border-top-right-radius:20px;
	margin-right:auto;
	background:#191919;
	text-align:center;
	padding:20px 0px 20px 0px;
		  	  					-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
			width:450px;
	height:120px;
	margin-top:24vh;
	}
.Img{
	  background: url('images/blockFace.jpeg');
	  background-size:contain;
	  	  z-index: 9999;
	  position: relative;
	    -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
	  	  					-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.2s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.2s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.2s;
			  box-shadow: 0px 0px 0px 2pt transparent;
	  border: 0px solid #FFF;
	  margin: auto;
  cursor: pointer;
	  	width:200px;
	height:200px;
	}
		.clickPopUp{
			position: relative;
	background: #e74c3c;
	display:none;
		opacity:1;
		width:450px;
		height: 100px;
		-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
	margin-top:20px;
	border-bottom-left-radius:20px;
	border-bottom-right-radius:20px;
	padding: 13px 0px 10px 0px;
	font-size:18px;
		}
.PopUp {
	position: relative;
	background: #e74c3c;
		width:300px;
		opacity:0;
				font-family: 'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;
	font-weight: 700;
	text-decoration:none;
	text-transform:uppercase;
	color:#FFF;
			  	  					-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
	margin-top:20px;
	border-radius:20px;
	padding: 13px 0px 10px 0px;
	font-size:18px;
}
.PopUp:after, .clickPopUp:after {
	bottom: 100%;
	left: 50%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-color: rgba(231, 76, 60, 0);
	border-bottom-color: #e74c3c;
	border-width: 10px;
	margin-left: -10px;

}
.PopUp a, .clickPopUp a{
		font-family: 'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;
	font-weight: 700;
	text-decoration:none;
	text-transform:uppercase;
	color:#FFF;
	}
.overlay{
  background: rgba(0,0,0,.5);
  position: absolute;
  margin: auto;
  width: 0px;
  height: 0px;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  opacity: 0;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}

.Img:hover .overlay, .click:hover .overlay{
  opacity: 1;
  width: 100%;
  height: 100%;
}

.overlay span{
  color: #fff;
  font-family: 'Open Sans', sans-serif;
  text-align: center;
  position: absolute;
  margin: auto;
  width: 160px;
  height: 30px;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  opacity: 0;
}

.Img:hover .overlay span{
  opacity: 1;
  -webkit-transition: 1.3s ease;
  transition: 1.3s ease;
}
.content{
	padding-left: 15px; padding-right: 15px;
	color:#FFF;
	font-family: 'Open Sans', sans-serif;
	}
#logo {
  width: 40px; /* required to center */
  height: 40px;
  	border-radius:50%;
	margin-top:15px;
		 margin-left:20px;
		 margin-right:20px;
  			  	  					-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
    fill: white;
}
#logo:hover{
	background:#191919;
	border-radius:50%;
	 fill: #e74c3c;;
	}
	.clickPopUp h4{
		margin-top:10px;
		}
		.buttons{
			background:transprent;
			display: inline;
			cursor: pointer;
			padding:20px;
			margin:0;
			-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
		border-top: 1px solid #891d1d;
		border-left: 0px solid #891d1d;
				}
				.b{
					border-bottom: 1px solid #891d1d;
					}
			.buttons:hover{
				background:#FF7364;
				border-left: 3px solid #891d1d;
				box-shadow: inset 0px 0px 8px rgba(0,0,0,0.2);
				}

				<!-- /////////////////////////////////////// -->
.clickCC{
	  background-size:contain;
	  position: relative;
	    -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
    -webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
    -moz-transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
	transition:cubic-bezier(.34,.43,0,1.02) 0.5s;
	box-shadow: 0px 0px 0px 2pt transparent;
	  border: 0px solid #FFF;
	  margin: auto;
  cursor: pointer;
	width:120px;
	height:120px;
	}

.Courses{
	  	position: relative;
	  	border: 0px solid #FFF;
	  	margin: auto;
  		cursor: pointer;
	}
.clickCourses{
	position: absolute;
	background: #81B7D4;
	display:none;
	opacity:1;
	width:200px;
	-webkit-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
	-moz-transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
	transition:cubic-bezier(.34,.43,0,1.02) 0.4s;
	margin-top:45px;
	border-bottom-left-radius:20px;
	border-bottom-right-radius:20px;
	padding: 10px 0px 10px 0px;
	font-size:18px;
}
.clickCourses:after {
	bottom: 100%;
	left: 70%;
	border: solid transparent;
	content: "";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-color: rgba(231, 76, 60, 0);
	border-bottom-color: #e74c3c;
	border-width: 10px;
	margin-left: -10px;

}
.clickCourses a{
		font-family: 'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;
	font-weight: 700;
	text-decoration:none;
	text-transform:uppercase;
	color:#FFF;
	}

	ul#menu{
    list-style-type: none;
    margin: 0%;
    padding: 0;
    overflow: hidden;
}

ul#list{
	list-style-type: none;
	height: 150px;
	overflow: hidden;
	overflow-y: scroll;

}

li {
		display: block;
		cursor: pointer;
}


li.menuL {
    float: left;
}

li.menuL a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
</style>
<style type="text/css"></style>


</head>
<body>

<div class="ACon">
<div class="Profile">
<div class="Img">
    <div class="overlay">
      <span><img></span>
    </div>
</div>



<div class="PopUp" style="opacity: 0; margin-top: 0px;">Open Profile</div>
<div class="clickPopUp">
<ul id=menu>
<h4><a class="username" href=""><?php echo '"'.$email.'"' ?></a></h4>

<div class="Courses">
	<li class=menuL><h5 class="buttons"><a class="active" href="#Courses">Courses</a></h5></li>
</div>

<div class="clickCourses">
<ul id="list">
<li><h5 ><a class="username">Por</a></h5></li>
<li><h5 ><a class="username">Por</a></h5></li>
<li><h5 ><a class="username">Por</a></h5></li>
<li><h5 ><a class="username">Por</a></h5></li>
<li><h5 ><a class="username">P</a></h5></li>
</ul>
</div>

<li class=menuL><h5 class="buttons"><a class="username" href="#Portfolio">Portfolio</a></h5></li>

<li class=menuL><h5 class="buttons"><a class="username" href="#About">About</a></h5></li>
</ul>
</div>
</div>
</div>

<script src="./profile_files/stopExecutionOnTimeout.js"></script>
<script src="./profile_files/jquery.min.js"></script>
<script>$(document).ready(function () {
    var $Menu = $('.Img');
    var $Senu = $('.Courses');

    $('.Img').mouseenter(function () {
        $('.PopUp').css('opacity', '1');
        $('.PopUp').css('margin-top', '20px');
    });
    $('.Img').mouseleave(function () {
        $('.PopUp').css('opacity', '0');
        $('.PopUp').css('margin-top', '0px');
    });

    $('.Img').on('click', function () {
        if ($Menu.hasClass('Img')) {
            $('.Img').addClass('click');
            $('.Img').removeClass('Img');
            $('.Profile').addClass('clickProfile');
            $('.Profile').removeClass('Profile');
            $('.clickPopUp').css('display', 'block');
            $('.PopUp').css('display', 'none');
        } else {
            $('.click').addClass('Img');
            $('.click').removeClass('click');
            $('.clickProfile').addClass('Profile');
            $('.clickProfile').removeClass('clickProfile');
            $('.clickPopUp').css('display', 'none');
            $('.PopUp').css('display', 'block');
        }
    });
	$('.Courses').on('click', function () {
        if ($Senu.hasClass('Courses')) {
            $('.Courses').addClass('clickCC');
            $('.Courses').removeClass('Courses');
            $('.clickCourses').css('display', 'block');
            $('.Courses').css('display', 'none');
        } else {
            $('.clickCC').addClass('Courses');
            $('.clickCC').removeClass('clickCC');
            $('.clickCourses').css('display', 'none');
            $('.Courses').css('display', 'block');
        }
    });


});
//# sourceURL=pen.js
</script>
</body></html>
