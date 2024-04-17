<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname="ams";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(empty($username) || empty($password)){
        echo "Don't leave any empty field!!";
    }
        else{
            $conn=mysqli_connect('localhost','root','','ams');
            if(!$conn){
                die("Connection Failed:");
            }
        
        }
        if(!empty($username) && !empty($password)){
            $sql1="SELECT * FROM admin WHERE username='$username' and password='$password'";
            $result1=mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);
            if(is_array($row1)){
            header("Location:dashboard.php");
            }

                 
            
    }
}

?>
<!DOCTYPE html>
<html>
<head id="Head"><title>
   Login
</title><style>
    body{
    margin: 0;
     padding: 0;
     background-size: cover;
     font-family: sans-serif;
     background:white;
 }
 
 #content{
     background-color: #9494d3;
     width: 420px;
     height: 280px;
     border: 1px solid #000000;
     border-radius: 6px;
     padding: 10px;
     margin-top: 15%;
     margin-left: auto;
     margin-right: auto;
     display: block;
 }
 
 .login-header{
     width: 100%;
     height: 38px;
     margin-bottom: 10px;
     border-bottom: 1px solid #037cb1;
 }
 .label{
    margin-left: 41px;
    margin-top: 5px;

 }
 
 
 .login-input-box-code input{
     
     width: 150px;
     height: 32px;
     margin-left: 12px;
     border: 1px solid #dcdcdc;
     border-radius: 4px;
     padding-left: 42px;
 }
 
 .login-input-box-code input:hover{
     border: 1px solid #037cb1;
     outline:0;
 
 }
 
 .login-input-box-code input:focus{
     border: 1px solid #037cb1;
     outline:0;
 }

  
 .login-input-box{
     margin-top: 8px;
     width: 100%;
     margin-left: auto;
     margin-right: auto;
     display: inline-block;
 
 }
 
 .login-input-box input{
     width: 350px;
     height: 32px;
     margin-left: 18px;
     border: 1px solid #dcdcdc;
     border-radius: 4px;
     padding-left: 22px;
 }
 
 .login-input-box input:hover{
     border: 1px solid #037cb1;
     outline:0;
     box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
 
 }
 
 .login-input-box input:focus{
     border: 1px solid #037cb1;
     outline:0;
     box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
 
 }
 
 
 
 .login-button-box{
     margin-top: 25px;
     background-color: #037cb1;
     color: #ffffff;
     font-size: 16px;
     width: 200px;
     height: 40px;
     margin-left: 115px;
     border: 2px solid #099ee0;
     border-radius: 6px;
     cursor:pointer;
   
 }
 
 .logon-box{
     margin-top: 20px;
     text-align: center;
 }
 
 .logon-box a{
     margin: 30px;
     color: #4a4744;
     font-size: 13px;
     text-decoration: none;
 }

</style>
</head>

<body>
    
    <div style="transform:translateX(100)">  
    </div>
    <div id="content">             
    <div class="login-header">
        <h2><center>Login</center></h2>
    </div>
    <form name="login" method="post" action="" >
        <div class="label"><label>Username</label></div>
        <div class="login-input-box">
            <input name="username" type="text" name="username" placeholder="Enter your username" />
        </div>
        <div class="label"><label>Password</label></div>
        <div class="login-input-box">
            <input name="password" type="password" name="password" placeholder="Enter your password" />
        </div>
        <div >                          
            <input type="submit" name="submit" value="Log in" class="login-button-box" style="height:34px;" />
        </div>
    </form>
   
</div>

</body>
</html>
