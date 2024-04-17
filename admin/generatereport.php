<?php
include("../include.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: black;
            margin-bottom: 5px;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input[type="date"] {
            margin-bottom: 10px;
        }

        .form-container button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'ams');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            // Generate report for the selected date range
            $reportQuery = "SELECT e.employee_id, e.fullname, e.employee_no, e.department,
    (SELECT COUNT(a.attendance_id) FROM attendance a WHERE e.employee_id = a.employee_id AND DATE(a.attendance_date) BETWEEN '$startDate' AND '$endDate') AS total_attendance,
    (SELECT COUNT(l.leave_id) FROM leave_records l WHERE e.employee_id = l.employee_id AND ((l.start_date BETWEEN '$startDate' AND '$endDate') OR (l.end_date BETWEEN '$startDate' AND '$endDate')) AND l.status = 'Accepted') AS total_leave
    FROM employee e";

            $reportResult = mysqli_query($conn, $reportQuery);

            // Check if the form is submitted
            if (mysqli_num_rows($reportResult) > 0) {
                echo "<h3>Employee Report</h3>";
                echo "<table>";
                echo "<tr><th>Employee ID</th><th>Full Name</th><th>Employee No</th><th>Department</th><th>Total Attendance</th><th>Total Leave</th><th>Appreciation</th></tr>";

                while ($row = mysqli_fetch_assoc($reportResult)) {
                    $employeeId = $row['employee_id'];

                    // Fetch fullname and department from employee table
                    $employeeQuery = "SELECT fullname, department FROM employee WHERE employee_id = '$employeeId'";
                    $employeeResult = mysqli_query($conn, $employeeQuery);
                    $employeeData = mysqli_fetch_assoc($employeeResult);

                    $fullname = $employeeData['fullname'];
                    $department = $employeeData['department'];

                    echo "<tr>";
                    echo "<td>" . $row['employee_id'] . "</td>";
                    echo "<td>" . $fullname . "</td>";
                    echo "<td>" . $row['employee_no'] . "</td>";
                    echo "<td>" . $department . "</td>";
                    echo "<td>" . $row['total_attendance'] . "</td>";
                    echo "<td>" . $row['total_leave'] . "</td>";

                    // Check for appreciation
                    $holidayAttendanceQuery = "SELECT COUNT(*) AS holiday_attendance
                                               FROM attendance a
                                               INNER JOIN holidays h ON a.attendance_date = h.holiday_date
                                               WHERE a.employee_id = '$employeeId'
                                               AND DATE(a.attendance_date) BETWEEN '$startDate' AND '$endDate'
                                               AND a.attendance_status = 'Holiday'";
                    $holidayAttendanceResult = mysqli_query($conn, $holidayAttendanceQuery);
                    $holidayAttendance = mysqli_fetch_assoc($holidayAttendanceResult)['holiday_attendance'];

                    if ($holidayAttendance > 0) {
                        $appreciation = 500;
                        $appreciationCell = "<td>$appreciation</td>";
                    } else {
                        $appreciation = 0;
                        $appreciationCell = "<td>0</td>";
                    }

                    //echo $fineCell;
                    echo $appreciationCell;
                    echo "</tr>";

                     // Update the report data in the reports table
                    $totalAttendance = $row['total_attendance'];
                    $totalLeave = $row['total_leave'];

                    $updateQuery = "UPDATE reports
    SET total_attendance = '$totalAttendance', total_leave = '$totalLeave',  appreciation = '$appreciation',
    fullname = '$fullname', department = '$department'
    WHERE employee_id = '$employeeId'";
                    mysqli_query($conn, $updateQuery);

                    // Insert the report data into the reports table if it doesn't exist
                    $insertQuery = "INSERT INTO reports (employee_id, total_attendance, total_leave,  appreciation) 
                                    SELECT '$employeeId', '$totalAttendance', '$totalLeave',  '$appreciation'
                                    WHERE NOT EXISTS (SELECT 1 FROM reports WHERE employee_id = '$employeeId')";
                    mysqli_query($conn, $insertQuery);
                }

                echo "</table>";
            } else {
                echo "<p>No employees found for the selected date range.</p>";
            }
        }
        ?>

                    

        <div class="form-container">
            <h3>Generate Report</h3>
            <form method="POST">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
                <button type="submit">Generate Date Range Report</button>
            </form>
            <a href="viewreport.php">
                <button type="submit">View Report</button></a>
        </div>
    </div>
</body>
</html>
