
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
      background: #5F6E76;
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
      background: rgba(19, 35, 47, 0.9);
      padding: 40px;
      max-width: 600px;
      margin: 40px auto;
      border-radius: 4px;
    }
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);

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

    <!-- PHP script to log in -->
<?php
$ID = "ID";
$psswd = "";

$query = "";
$correct = true;



  function getLoc(){
    $loc = $_SERVER['PHP_SELF'];
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
    $conn = mysqli_connect("localhost", "User", "userme", "coursematch");
    // Check connection
    if (mysqli_connect_errno())
      {
          header("Location: http://localhost/coursematch/temp/someError.html");
          die();
      }

      $GLOBALS['ID'] = $_POST["ID"];
      $psswd = $_POST["psswd"];

      $query = 'SELECT Password FROM Student WHERE ID ="'.$GLOBALS['ID'].'"';

      $l = mysqli_query($conn, $query);
      if($l){
        $row = mysqli_fetch_row($l);
        $pass = $row[0];

        if(strcmp($pass, $psswd) == 0){
            $loc =  "http://localhost/coursematch/Course-Match/profile.php";
        }

    }else{
          $correct = false;
        }
      mysqli_close($conn);
    }
    return $loc;
  }
?>

  </head>
  <body>
  <div class="form">
        <div class="tab-content">
          <div id="signup">
            <h1>Sign In</h1>
            <?php if(!$correct) echo '<center><font color="red"><h5>*Check your credentials</h5></font></center>' ?>

            <form name="loginForm" action=<?php echo '"'.getLoc().'"'?> method="post">

            <div class="field-wrap">
              <label>
                ID<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="ID"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password"required autocomplete="off" name="psswd"/>
            </div>

            <button type="submit" class="button button-block"/>Get Started</button>

            </form>

          </div>

          <div id="login">
            // Not Needed

          </div>

        </div><!-- tab-content -->

  </div> <!-- /form -->
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
  //# sourceURL=pen.js

  if(document.forms['loginForm']['action'].toString() != <?php echo '"http://localhost'.$_SERVER['PHP_SELF'].'"'?>){

    document.forms['loginForm']['ID'].value = <?php echo '"'.$ID.'"' ?>;
    document.forms['loginForm'].submit();
  }


  </script>
  </body>
</html>
