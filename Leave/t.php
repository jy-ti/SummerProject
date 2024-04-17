<?php 
include ('includeemp.php');
?>

<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "ams";

session_start();

// Check if the user is logged in
if (!isset($_SESSION["employee_id"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit();
}

// Get the logged-in employee ID from the session
$employee_id = $_SESSION["employee_id"];

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the employee data
$query = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Employee data found, retrieve the employee details
    $row = mysqli_fetch_assoc($result);
    $employee_no = $row["employee_no"];
    $fullname = $row["fullname"];

    // Check if the leave request form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the leave form data
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $leave_type = $_POST["leave_type"];
        $reason = $_POST["reason"];

        // Insert the leave request into the "leave_records" table
        $insertQuery = "INSERT INTO leave_records (employee_no, fullname, start_date, end_date,leave_type,status, reason)
                        VALUES ('$employee_no', '$fullname', '$start_date', '$end_date','$leave_type', 
                        'pending..','$reason')";
        mysqli_query($conn, $insertQuery);

        echo "Leave request submitted successfully.";
    }
} else {
    // No employee data found for the logged-in employee
    echo "Employee data not found.";
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!DOCTYPE html>
<html>
<head>
    <title>Leave Request Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .form-group textarea {
            resize: vertical;
            height: 100px;
        }
        
        .form-group input[type="submit"] {
            background-color: gray;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>



<div class="container">
        <h2>Leave Request Form</h2>
        <form method="POST" action="">
           
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="leave_type">Leave Type:</label>
                <select name="leave_type" id="leave_type" required>
                    <option value="">Select</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Annual Leave">Annual Leave</option>
                    <option value="Maternity/Paternity Leave">Maternity/Paternity Leave</option>
                    <option value="Bereavement Leave">Bereavement Leave</option>
                    <option value="Personal Leave">Personal Leave</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reason">Reason</label>
                <input type="text" id="reason" name="reason" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit Request">
            </div>
        </form>
    </div>
    </body>
</html>