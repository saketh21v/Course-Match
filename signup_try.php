<!DOCTYPE html>
<html>
<head>
	<title>
		Sign Up
	</title>
</head>
<body>

		<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			
			User Name:<input type="text" name="Username"></input>
			<br>
			Password:<input type="password" name="password"></input>
			<br>
			Re Password:<input type="password" name="repassword"></input>
			<br>
			<input type="submit">


			<?php 

				$conn = mysql_connect('localhost','root','');    
            	if(!$conn)
                	die("Couldnot connect");
            	mysql_select_db("usrpass");
            	$name;
            	$pass;
            	$repass;

	            if($_SERVER["REQUEST_METHOD"] == "POST")
	            {
	             	$name = $_POST['Username'];
	             	$pass = $_POST['password'];
	             	$repass = $_POST['repassword'];

	             	$ret = mysql_query('SELECT* FROM userPass');

	             	while($row = mysql_fetch_array($ret, MYSQL_NUM))
	             	{

	             		if(strcmp($name,$row[0]) == 0)
	             		{
	             			echo "<br>USERNAME TAKEN !";
	             			break;
	             		}

	             		if(strcmp($pass,$repass) != 0)
	             		{
	             			echo "$pass,$repass";
	             			echo"Passwords Donot mAtch ! Try again";
	             			break;
	             		}

	             		$query = "INSERT INTO userPass (USERNAME,PASSWORD) VALUES('$name','$pass')";
	             		$ret = mysql_query($query,$conn);

	             		if(!$ret)
	             			echo "Failure !";
	             		else
	             			echo "Success";
	             	}



	            }
                

			 ?>

		</form>

</body>
</html>