<?php
session_start();

// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "ams";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





// Process login form submission
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $employee_no = $_POST['employee_no'];

     // Retrieve employee details from the database
    $query = "SELECT employee_id, employee_no, fullname, password FROM employee WHERE username = '$username' AND employee_no = '$employee_no' LIMIT 1";
    $result = mysqli_query($conn, $query);
       
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $employee_id = $row['employee_id'];
        $employee_no = $row['employee_no'];
        $fullname = $row['fullname'];

        // Verify the password
        if ($password == $row['password']) {
            // Check if attendance has already been recorded for the current date and employee ID
            $currentDate = date("Y-m-d");
            date_default_timezone_set("Asia/Kathmandu");
            $attendanceTime = date("H:i:s");

            // Check if today is a holiday
            $holidayQuery = "SELECT * FROM holidays WHERE holiday_date = '$currentDate'";
            $holidayResult = mysqli_query($conn, $holidayQuery);

            if (mysqli_num_rows($holidayResult) > 0) {
                // Today is a holiday, mark attendance status as "Holiday"
                $attendanceStatus = "Holiday";
            } else {
                // Today is not a holiday, mark attendance status as "Present"
                $attendanceStatus = "Present";
            }

            // Check if attendance has already been recorded for the current date and employee ID
            $checkQuery = "SELECT * FROM attendance WHERE employee_id = $employee_id AND attendance_date = '$currentDate'";
            $checkResult = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($checkResult) == 0) {
                // Attendance not recorded for the current date, insert a new entry with the attendance time and status
                $attendanceQuery = "INSERT INTO attendance (employee_id, employee_no, fullname, attendance_status, attendance_date, attendance_time)
                                    VALUES ($employee_id, '$employee_no', '$fullname', '$attendanceStatus', '$currentDate', '$attendanceTime')";
                mysqli_query($conn, $attendanceQuery);
            }

            // Set the employee ID in the session for future reference
            $_SESSION['employee_id'] = $employee_id;

            // Redirect to the employee dashboard or perform other actions as needed
            header("Location: employee_dashboard.php");
            exit();
        } else {
            // Display an error message for invalid password
            $error = "Invalid password. Please try again.";
        }
    } else {
        // Display an error message for invalid username
        $error = "Invalid username. Please try again.";
    }
}

// Check if the employee is already logged in
if (isset($_SESSION['employee_id'])) {
    // Redirect to the employee dashboard or perform other actions as needed
    header("Location: employee_dashboard.php");
    exit();
}





   
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head id="Head">
    <title>Employee Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-size: cover;
            font-family: sans-serif;
            background:white;
        }

        #content {
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

        .login-header {
            width: 100%;
            height: 38px;
            margin-bottom: 10px;
            border-bottom: 1px solid #037cb1;
        }

        .label {
            margin-left: 41px;
            margin-top: 5px;
        }

        .login-input-box-code input {
            width: 150px;
            height: 38px;
            margin-left: 12px;
            border: 1px solid #dcdcdc;
            border-radius: 4px;
            padding-left: 42px;
        }

        .login-input-box-code input:hover {
            border: 1px solid #037cb1;
            outline:0;
        }

        .login-input-box-code input:focus {
            border: 1px solid #037cb1;
            outline:0;
        }

        .login-input-box {
            margin-top: 8px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            display: inline-block;
        }

        .login-input-box input {
            width: 350px;
            height: 32px;
            margin-left: 18px;
            border: 1px solid #dcdcdc;
            border-radius: 4px;
            padding-left: 22px;
        }

        .login-input-box input:hover {
            border: 1px solid #037cb1;
            outline:0;
            box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
        }

        .login-input-box input:focus {
            border: 1px solid #037cb1;
            outline:0;
            box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
        }

        .login-button-box {
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

```php
        .logon-box {
            margin-top: 20px;
            text-align: center;
        }

        .logon-box a {
            margin: 30px;
            color: #4a4744;
            font-size: 13px;
            text-decoration: none;
        }
    </style>
</head>

<body>
     
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
    
    <div style="transform:translateX(100)">  
    </div>
    <div id="content">             
        <div class="login-header">
            <h2><center>Login</center></h2>
        </div>
        <form name="login" method="post" action="">
            <div class="label"><label>Username</label></div>
            <div class="login-input-box">
                <input name="username" type="text" name="username" placeholder="Enter your username" />
            </div>

            <div class="label"><label>Password</label></div>
            <div class="login-input-box">
                <input name="password" type="password" name="password" placeholder="Enter your password" />
            </div>
            <div class="label"><label>Employee_no</label></div>
            <div class="login-input-box">
                <input name="employee_no" type="number" name="employee_no" placeholder="Enter your employee_no" />
            </div>
            
            <div >                          
                <input type="submit" name="submit" value="Log in" class="login-button-box" style="height:34px;" />
            </div>
        </form>
   
    </div>
</body>
</html>
