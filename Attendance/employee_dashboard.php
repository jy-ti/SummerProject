<?php 
include("includeemp.php");
?>
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

// Check if the employee is already logged in
if (!isset($_SESSION['employee_id'])) {
    // Redirect to the login page or perform other actions as needed
    header("Location: login.php");
    exit();
}

// Retrieve employee details from the session
$employee_id = $_SESSION['employee_id'];

// Query the database to get the employee's full name
$query = "SELECT fullname FROM employee WHERE employee_id = $employee_id LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['fullname'];
} else {
    // Redirect to the login page or perform other actions as needed
    header("Location: login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Employee</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-top: 50px;
        }
    </style>
</head>
<body>
   <?php
    // Assuming $fullname and $logDate are already defined
    
    // Function to check if the given date is a holiday
    function isHoliday($date) {
        // Implement your logic to check if $date is a holiday
        // Return true if it is a holiday, false otherwise
        // You can use a database or an array of holiday dates for this check
    }
    $logDate = date('Y-m-d');
    
    $welcomeMessage = "Welcome $fullname:)";
    $attendanceMessage = "Your attendance for today has been recorded";
    
    if (isHoliday($logDate)) {
        $welcomeMessage .= "<br>Your attendance for today has been recorded<br>Today is a holiday!";
        $attendanceMessage = "";
    }
?>

<div class="container">
    <h1><?php echo $welcomeMessage; ?></h1>
    <h2 style="font-size: 18px;"><?php echo $attendanceMessage; ?></h2>
</div>

</body>
</html>
