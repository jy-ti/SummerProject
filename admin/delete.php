<?php
        $id=$_GET['id'];
        

        //connection
        
        $conn=mysqli_connect('localhost','root','','AMS');
       //to delete record
        $sql="delete from employee where employee_id=$id";

        //execute query
        mysqli_query($conn,$sql);

        //redirect to listening page
        

        header('location:employee.php');
        ?>