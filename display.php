
<?php 
    session_start();
 ?>
<!DOCTYPE html>

  <html class=''>
  <head>
    <title>Course-Match Registration</title>
      <meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="canonical" href="http://codepen.io/ehermanson/pen/KwKWEv" />
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel='stylesheet prefetch' href='//codepen.io/assets/reset/normalize.css'>
    <style class="cp-pen-styles">*, *:before, *:after {
      box-sizing: border-box;
    }

    html {
      overflow-y: scroll;
    }

    body {
      background: #AB4F4F;
      font-family: 'Titillium Web', sans-serif;
    }

    a {
      text-decoration: none;
      color: #1ab188;
      -webkit-transition: .5s ease;
      transition: .5s ease;
    }
    a:hover {
      color: #33CAFF;
    }

    .form {
      background: rgba(170,46,46, 0.9);
      padding: 40px;
      max-width: 600px;
      margin: 40px auto;
      border-radius: 4px;
      box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
    }

    .tab-group {
      list-style: none;
      padding: 0;
      margin: 0 0 40px 0;
    }
    .tab-group:after {
      content: "";
      display: table;
      clear: both;
    }
    .tab-group li a {
      display: block;
      text-decoration: none;
      padding: 15px;
      background: #33B2FF;
      color: #33B2FF;
      font-size: 20px;
      float: left;
      width: 50%;
      text-align: center;
      cursor: pointer;
      -webkit-transition: .5s ease;
      transition: .5s ease;
    }
    .tab-group li a:hover {
      background: #33B2FF;
      color: #ffffff;
    }
    .tab-group .active a {
      background: #33CAFF;
      color: #ffffff;
    }

    .tab-content > div:last-child {
      display: none;
    }

    h1 {
      text-align: center;
      color: #ffffff;
      font-weight: 300;
      margin: 0 0 40px;
    }

    label {
      position: absolute;
      -webkit-transform: translateY(6px);
              transform: translateY(6px);
      left: 13px;
      color: rgba(255, 255, 255, 0.5);
      -webkit-transition: all 0.25s ease;
      transition: all 0.25s ease;
      -webkit-backface-visibility: hidden;
      pointer-events: none;
      font-size: 22px;
    }
    label .req {
      margin: 2px;
      color: #61C4FF;
    }

    label.active {
      -webkit-transform: translateY(50px);
              transform: translateY(50px);
      left: 2px;
      font-size: 14px;
    }
    label.active .req {
      opacity: 0;
    }

    label.highlight {
      color: #ffffff;
    }

    input, textarea {
      font-size: 22px;
      display: block;
      width: 100%;
      height: 100%;
      padding: 5px 10px;
      background: none;
      background-image: none;
      border: 1px solid #a0b3b0;
      color: #ffffff;
      border-radius: 0;
      -webkit-transition: border-color .25s ease, box-shadow .25s ease;
      transition: border-color .25s ease, box-shadow .25s ease;
    }
    input:focus, textarea:focus {
      outline: 0;
      border-color: #61C4FF;
    }

    textarea {
      border: 2px solid #a0b3b0;
      resize: vertical;
    }

    .field-wrap {
      position: relative;
      margin-bottom: 40px;
    }

    .top-row:after {
      content: "";
      display: table;
      clear: both;
    }
    .top-row > div {
      float: left;
      width: 48%;
      margin-right: 4%;
    }
    .top-row > div:last-child {
      margin: 0;
    }

    .button {
      border: 0;
      outline: none;
      border-radius: 0;
      padding: 15px 0;
      font-size: 2rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .1em;
      background: #61C4FF;
      color: #ffffff;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      -webkit-appearance: none;
    }
    .button:hover, .button:focus {
      background: #22ABFE;
    }

    .button-block {
      display: block;
      width: 100%;
    }

    .forgot {
      margin-top: -20px;
      text-align: right;
    }
    
    </style>
  </head>
  <body>

  <div class = "form">
  	 <?php  
  	 	

  	 	//$this = $_SESSION['active'];

	

    	 $name = $_GET['studentName'];
    
     /*{
      if(isset($_SESSION["Name"]))
          $name = $_SESSION["Name"];
      
      if(isset($_SESSION["Active"]))
      	 $active = $_SESSION["Active"];
      }*/

  	 	 $conn = mysql_connect('localhost','root','');    
            if(!$conn)
                die("Couldnot connect");
            mysql_select_db("coursematch");

            //Student Details

            
                
                //echo "$name $active";
                //$name = 'zxcvas';
                /*Name*/
	              $ret = mysql_query("SELECT* FROM student where First_Name='$name'",$conn);

	              if(! $ret)
	               {
				      die('Could not get data: ' . mysql_error());
				   }


				   

				  
				  $id;
				  if(mysql_num_rows($ret)> 0)
				  {
				  	
		              while($row = mysql_fetch_array($ret,MYSQL_NUM))
		              {

		              		
		              		echo "<p>Details of $name are: <br>";
		              		$id = $row[0];

		              		/*Email*/
		              		 $ret2 = mysql_query("SELECT* FROM student_email where ID='$id'",$conn);

				              if(! $ret)
				               {
							      die('Could not get data: ' . mysql_error());
							   }

							   $row2 = mysql_fetch_row($ret2);
		                	echo " <table>

		                	<tr>
		                		<td><h4>ID:</h4></td>
		                		<td>$row[0]</td>
		                		
		                	</tr>

		                	<tr>
		                		<td><h4>Name:</h4></td>
		                		<td>$row[4] $row[5]</td>
		                	</tr>
		                	<tr>
		                		<td><h4>Email:</h4></td>
		                		<td>$row2[1]</td>
		                	</tr>
		                	<tr>
		                		<td><h4>Year of join:</h4></td>
		                		<td>$row[3]</td>
		                	</tr>

		                	<tr>
		                		<td><h4>Stream:</h4></td>
		                		<td>$row[2]</td>
		                	</tr>
		                	

		                		


		                	</table>";
		              }
		         }
		         else
		         {
		         	echo "Not Found!";
		         	exit();
		         }
	             	
	               $ret = mysql_query("SELECT* FROM student_course where ID='$id'",$conn);
	               echo "<h3>Courses :<h3><br>";
                 $out=0;
	               while($row = mysql_fetch_array($ret,MYSQL_NUM))
	               {
	              	if($out == 0)
                  {
                    //$_SESSION["Name"] = $row[1];
                    //$_SESSION["Active"] = 2;
                    //$out++;
                  }
                  $course = "course";
	              	echo "<a href='display2.php?courseName=$row[1]&courseActive=1'>$row[1] </a>";

                  //echo $_SESSION['active'];
	              }

	              
                //$_SESSION["Name"] = "CA";
                

	        

	        

	        //Feedback for the course







  	 	
  	 ?>

  	 </div>

       


  <script src='//dmnbd74khqk5q.cloudfront.net/assets/common/stopExecutionOnTimeout.js?t=1'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>$('.form').find('input, textarea').on('keyup blur focus', function (e) {
      var $this = $(this), label = $this.prev('label');
      if (e.type === 'keyup') {
          if ($this.val() === '') {
              label.removeClass('active highlight');
          } else {
              label.addClass('active highlight');
          }
      } else if (e.type === 'blur') {
          if ($this.val() === '') {
              label.removeClass('active highlight');
          } else {
              label.removeClass('highlight');
          }
      } else if (e.type === 'focus') {
          if ($this.val() === '') {
              label.removeClass('highlight');
          } else if ($this.val() !== '') {
              label.addClass('highlight');
          }
      }
  });
  $('.tab a').on('click', function (e) {
      e.preventDefault();
      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');
      target = $(this).attr('href');
      $('.tab-content > div').not(target).hide();
      $(target).fadeIn(600);
  });

  $(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        // <DO YOUR WORK HERE>
        history.back();
    }
});
  //# sourceURL=pen.js
  </script>
  </body>
</html>