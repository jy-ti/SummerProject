<?php
include("../include.php");
?>

<!DOCTYPE HTML>
<html>

</style></style>
    <body>

        <?php
        $employee_id=$_GET['id'];
        
        //connection

        $conn=mysqli_connect('localhost','root','','AMS');
        if (isset($_POST['submit'])) {
            $employee_no=$_POST['employee_no'];
            $fullname=$_POST['fullname'];
           
            $department=$_POST['department'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            
           

            //update codes

            $sql="UPDATE employee set employee_no='$employee_no',fullname='$fullname',department='$department',username='$username',password='$password' where employee_id='$employee_id' ";
            mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn)==1) {
                header('location:employee.php');

            }
            else{
                echo "Data update failed".mysqli_error($conn);
            }
        }

        $sql1="select * from employee where employee_id=$employee_id";
        $res=mysqli_query($conn,$sql1);
        $data=mysqli_fetch_assoc($res);
        


        ?>


<div id="content">  
<div class="login-header">
        <h2><center>update Employee</center></h2>
    </div>
    <br><br>
    <center>       
        <form method="post" >
       
       
 <div class="login-input-box">
       <div class="label"><label>employee_no</label></div>
        <input type="text" name="employee_no" value="<?php echo $data['employee_no']; ?>">
      </div>
       <div class="login-input-box">
      <div class="label"><label>FullName</label></div>
        <input type="text" name="fullname" value="<?php echo $data['fullname']; ?>"> <!-- DB ko  info store garna lai value ma rakheko-->
        </div>

         <div class="login-input-box">
    
<div class="label"><label for="options" value="<?php echo $data['department']; ?>">Select a Department:</label></div>
<div class="login-input-box">
                    <select name="department" id="department" required>
                    <option value="">Select</option>
                    <option value="HR">HR</option>
                    <option value="projecte">Project</option>
                    <option value="IT">IT</option>
                    <option value="Account">Account</option>
                    <option value="Management">Management</option>

     </div></select>
         <div class="label"><label>UserName</label></div>
        <input type="text" name="username" value="<?php echo $data['username']; ?>">
        <div class="label"><label>Password</label></div>
        <input type="password" name="password" value="<?php echo $data['password']; ?>"><br><br>
         <div class="label"><label>Email</label></div>
        <input type="text" name="email" value="<?php echo $data['email']; ?>">
    </div>
        
        <input type="submit" name="submit" value="update"></div>
    </center>
</form>
</body>
</html>
