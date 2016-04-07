<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			
			Name: <input type="text" name="name"></input>
			<input type="submit"></input>

	</form>


			<?php 

				$conn = mysql_connect('localhost','root','');    
            	if(!$conn)
                	die("Couldnot connect");
            	mysql_select_db("usrpass");

            	if($_SERVER["REQUEST_METHOD"] == "POST")
            	{
            		$name = $_POST['name'];


                $ret = mysql_query("SELECT* FROM studentsearch",$conn);

                $i = 0;
                while($row = mysql_fetch_array($ret,MYSQL_NUM))
                {
                	if((strcmp($name,$row[0]) == 0))
                	{
                		echo " $row[0] $row[1] $row[2]";
                		$i = 1;
                		break;
                	}
                }
                if($i == 0)
                {
                	echo "record not found";
                }


            	}




    		?>

</body>
</html>