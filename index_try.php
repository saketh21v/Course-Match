<html>
    <body>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Name:<input type="text" name="username">
        <br>
        Password:<input type="password" name="pass">
        <br>
        <ul>
        <li><a href="signup.php"><input type="Button" value="Sign Up"></a></li>
        <li><input type="submit"></li>

        </ul>

        </form>
        
        
        <?php
            
            $conn = mysql_connect('localhost','root','');    
            if(!$conn)
                die("Couldnot connect");
            mysql_select_db("usrpass");

            if($_SERVER["REQUEST_METHOD"] == "POST")
             {
                
                $user = $_POST['username'];
                $password = $_POST['pass'];

                //echo "<h1>$password</h1>";
                mysql_select_db('usrpass');
                $ret = mysql_query("SELECT* FROM userPass",$conn);

                $i=0;

                while($row = mysql_fetch_array($ret,MYSQL_NUM))
                {
                    if($row[0] == $user)
                    {
                        $i = 1;
                        if($row[1] == $password)
                        {
                            echo "Success";

                            echo "<script>location.href='main.php'</script>";
                        }
                        else
                            echo "failure";
                    }
                }
                if($i == 0)
                    echo "REcord doesnot exsit";




             }   
            
            

            
    
         ?>
    </body>
</html>