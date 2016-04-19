<?php 
	session_start();
 ?>
<!DOCTYPE html>


<html>
<head>
	<title></title>
</head>
<body>

	<form method="POST" action="display.php">
		<input type="text" id="name1"></input>
		<a href='' id="send1"><input type="button" name = "submit" onclick="click1()"></a>
	</form>

	<br>
	<br>

	<form method="POST" action="display2.php">
		<input type="text" id="name2"></input>
		<a href='' id="send2"><input type="button" name = "submit2" onclick="click2()"></a>
	</form>


	


	<script type="text/javascript">
		function click1()
		{
			var x = document.getElementById("name1").value;
			var y = "display.php?studentName=";
			var res = y.concat(x);
			document.getElementById("send1").setAttribute("href",res);
		}

		function click2()
		{
			var x = document.getElementById("name2").value;
			var y = "display2.php?courseName=";
			var res = y.concat(x);
			document.getElementById("send2").setAttribute("href",res);
		}

	</script>

</body>
</html>