<!DOCTYPE html>
<!-- saved from url=(0046)http://localhost/coursematch/temp/profile.html -->


<?php session_start(); ?>
<html class=""><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <!-- CSS -->
	<link rel="stylesheet" href="style.css" type="text/css" />

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>

	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

	<!-- jQuery Easing -->
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

	<!-- Functions -->
	<script type="text/javascript" src="js/functions.js"></script>

<?php

$fName = "Name";
$lName = "Name";
$ID = "ID";
$stream = "Stream";
$joinYear = 2000;
$email = "me@me.me";
$phone = "";

$queryStudent = "";
$queryStudentEmail = "";
$queryStudentPhone = "";
$queryStudentCourses = "";
$numCourses = 0;

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
      $ID = $_POST["ID"];
	  $conn = mysqli_connect("localhost", "User", "userme", "coursematch");

      $queryStudent = "SELECT First_Name,Last_Name, Stream, Join_Year FROM Student WHERE ID='".$ID."'";
      $queryStudentEmail = "SELECT Email FROM Student_Email WHERE ID='".$ID."'";
      $queryStudentPhone = "SELECT Phone_NO FROM Student_Phone_No WHERE ID='".$ID."'";
      $queryStudentCourses = "SELECT Course FROM Student_Course WHERE ID='".$ID."'";

      $j = mysqli_query($conn, $queryStudent);
      if($j){
      	$row = mysqli_fetch_row($j);
      	$fName = $row[0];
        $lName = $row[1];
      	$stream = $row[2];
      	$joinYear = $row[3];
      }
      $k = mysqli_query($conn, $queryStudentEmail);
      if($k){
        $row = mysqli_fetch_row($k);
        $email = $row[0];
      }

      $l = mysqli_query($conn, $queryStudentPhone);
      if($l){
        $row = mysqli_fetch_row($l);
        $phone = $row[0];
      }

      $m = mysqli_query($conn, $queryStudentCourses);
      //$numCourses = mysqli_num_rows($m);

      $courses = array();
      $x = 0;
      while(($row = mysqli_fetch_row($m))){
        $courses[$x++] = $row[0];
      }
	}
else{
	header("Location: http://localhost/coursematch/Course-Match/someError.html");
	die();
	}
?>
</head>
<body>




<!-- Search Boxes  action="./try1.php" method="GET" target="_blank" -->

<div id="search-form">
  <form name="searchForm" class="form-container" action="qwert" onsubmit="return clickSearch()" target="_blank" method="get">
    <input type="text" id = "searchForValue" class="search-field" placeholder="Search here..." name="searchForValue"/>
    <div class="submit-container">
      <input type="submit" value="" class="submit" /></br>
    </div>

    <div id="radio">
      <radiogroup>
        <input type="radio" id="searchCourse" name="searchFor" value="Course" checked="checked">Courses</input></br>
				<input type="radio" id="searchFriends" name="searchFor" value="Student" >Friends</input></br>
      </radiogroup>
    </div>
		<input type="hidden" name="ID" value=<?php echo "'".$ID."'"?>/>
	</form>
</div>

<!-- JS for onClick handling-->

<script>
function clickSearch() {
	var searchOptions = document.getElementsByName('searchFor');
	var searchValue;
	for(var i = 0; i < searchOptions.length; i++){
		if(searchOptions[i].checked){
				searchValue = searchOptions[i].value;
		}
	}
	searchValue = "display".concat(searchValue);
	searchValue = searchValue.concat(".php");
	alert(searchValue);
	var searchForm = document.forms["searchForm"];
	searchForm.setAttribute("action", searchValue);
}

</script>


<div id="CourseAdd">
  <form action="./addCourse.php" method="POST" target="_blank">
    <div id="addBtnContainer">
			<input type="hidden" value=<?php if(!empty($_POST)) echo "'".$_POST["ID"]."'" ?> name="ID">
      <input type="submit" value="Add New Course" class="addBtn"/>
    </div>
  </form>
</div>

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
<h4><a class="username" href=""><?php echo $ID ?></a></h4>

<div class="Courses">
	<li class=menuL><h5 class="buttons"><a class="username" href="#Courses">Courses</a></h5></li>
</div>

<div class="clickCourses">
<ul class="list">
<?php
if(count($courses) != 0){
  for($x=0;$x<count($courses);$x++){
    echo '<li><h5 ><a class="username">'.$courses[$x].'</a></h5></li>';
  }
}
else{
  echo '<li><h5 ><a class="username">Sorry! No Courses.</a></h5></li>';
}
?>
<!-- <li><h5 ><a class="username">Por</a></h5></li> -->
</ul>
</div>

<div class="Portfolio">
	<li class=menuL><h5 class="buttons"><a class="username" href="#Portfolio">Portfolio</a></h5></li>
	<div class="clickPortfolio">
		<ul class="list">
			<li><h5><a class="username">Name      : <?php echo $fName.' '.$lName?></a></h5></li>
			<li><h5><a class="username">ID     : <?php echo $ID?></a></h5></li>
			<li><h5><a class="username">Stream    : <?php echo $stream?></a></h5></li>
			<li><h5><a class="username">Join Year : <?php echo $joinYear?></a></h5></li>
		</ul>
	</div>


<li class=menuL><h5 class="buttons"><a class="username" href="#About">About</a></h5></li>
</ul>
</div>
</div>
</div>

<script src="./profile_files/stopExecutionOnTimeout.js"></script>
<script src="./profile_files/jquery.min.js"></script>
<script>
var $Menu = $('.Img');
var $Cenu = $('.Courses');
var $Penu = $('.Portfolio');

function reset(P){
        switch (P) {
          case 'C':
          alert("C "+$Cenu.hasClass('clickCC'));
            if($Cenu.hasClass('clickCC')){
                  $('.clickCC').addClass('Courses');
                  $('.clickCC').removeClass('clickCC');
                  $('.clickCourses').css('display', 'none');
                  $('.Courses').css('display', 'block');
              }
            break;
          case 'P':
          alert("P "+$Penu.hasClass('.clickPP'));
            if($Penu.hasClass('.clickPP')){
    	            $('.clickPP').addClass('Portfolio');
    	            $('.clickPP').removeClass('clickPP');
    	            $('.clickPortfolio').css('display', 'none');
    	            $('.Portfolio').css('display', 'block');
            	}
        }
    }
</script>
<script>

$(document).ready(function () {
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
        if ($Cenu.hasClass('Courses')) {
            $('.Courses').addClass('clickCC');
            $('.Courses').removeClass('Courses');
            $('.clickCourses').css('display', 'block');
            $('.Courses').css('display', 'none');

            if(!$Penu.hasClass('Portfolio')){
                $('.clickPP').addClass('Portfolio');
                $('.clickPP').removeClass('clickPP');
                $('.clickPortfolio').css('display', 'none');
                $('.Portfolio').css('display', 'block');
            }
        }
        else {
            $('.clickCC').addClass('Courses');
            $('.clickCC').removeClass('clickCC');
            $('.clickCourses').css('display', 'none');
            $('.Courses').css('display', 'block');
        }

    });

	$('.Portfolio').on('click', function () {
        if ($Penu.hasClass('Portfolio')) {
            $('.Portfolio').addClass('clickPP');
            $('.Portfolio').removeClass('Portfolio');
            $('.clickPortfolio').css('display', 'block');
            $('.Portfolio').css('display', 'none');
          if (!$Cenu.hasClass('Courses')){
            $('.clickCC').addClass('Courses');
            $('.clickCC').removeClass('clickCC');
            $('.clickCourses').css('display', 'none');
            $('.Courses').css('display', 'block');
          }
        }
        else {
            $('.clickPP').addClass('Portfolio');
            $('.clickPP').removeClass('clickPP');
            $('.clickPortfolio').css('display', 'none');
            $('.Portfolio').css('display', 'block');
        }
    });


});
</script>
</body></html>
