<?php
include("includeemp.php");

// Check if the employee is logged in
session_start();
if (!isset($_SESSION['employee_id'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login+attendance.php");
    exit();
}

// Get the employee ID of the logged-in employee
$employee_id = $_SESSION['employee_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaves</title>
    <style>
    table{
        background-color: white;

    }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 40px;
  }
  
  th {

    
    padding: 8px;
    text-align: left;
    border-bottom: 3px solid #ddd;
    border-right: 1px solid #add;
  }
  td {

    
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    border-right: 1px solid #add;
  }
  
  th {
    background-color: white;
    color: black;
  }

  .btn-primary {
    padding: 5px 10px;
    font-size: 12px;
  }

</style>
</head>
<body>
    <div class="container">
        <h2>Leave Requests</h2>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'ams');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve leave requests of the logged-in employee from the database
        $query = "SELECT * FROM leave_records WHERE employee_id='$employee_id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Full Name</th><th>Start Date</th><th>End Date</th><th>Leave Type</th><th>Reason</th><th>Status</th></tr>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
               
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['start_date'] . "</td>";
                echo "<td>" . $row['end_date'] . "</td>";
                echo "<td>" . $row['leave_type'] . "</td>";
                echo "<td>" . $row['reason'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
            }

            echo "</table>";
        } else {
            echo "<p>No leave requests found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
