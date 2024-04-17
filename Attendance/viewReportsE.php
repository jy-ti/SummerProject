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

// Retrieve leave requests of the logged-in employee from the database
$conn = mysqli_connect('localhost', 'root', '', 'ams');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM reports WHERE employee_id='$employee_id'";
$result = mysqli_query($conn, $query);

// Create an HTML table
$html = "<table>";
$html .= "<tr><th>Full Name</th><th>Total Attendance</th><th>Total Leave</th><th>Start Date</th><th>End Date</th><th>Fine</th><th>Appreciation</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>";
    $html .= "<td>" . $row['fullname'] . "</td>";
    $html .= "<td>" . $row['total_attendance'] . "</td>";
    $html .= "<td>" . $row['total_leave'] . "</td>";
    $html .= "<td>" . $row['start_date'] . "</td>";
    $html .= "<td>" . $row['end_date'] . "</td>";
    $html .= "<td>" . $row['fine'] . "</td>";
    $html .= "<td>" . $row['Appreciation'] . "</td>";
    $html .= "</tr>";
}

$html .= "</table>";

mysqli_close($conn);

// Function to clean data for Excel export
function cleanData($str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) {
        $str = '"' . str_replace('"', '""', $str) . '"';
    }
    return $str;
}

// Export table as Excel file when button is clicked
if (isset($_POST['download'])) {
    // Create an Excel file
    $filename = "employee_report_" . date('Ymd') . ".xls";
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $output = "";

    // Add table data
    $lines = explode("\n", $html);
    foreach ($lines as $line) {
        $row = explode("</td><td>", $line);
        $output .= implode("\t", array_map('cleanData', $row)) . "\n";
    }

    echo $output;
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaves</title>
    <style>
        table {
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






<!DOCTYPE html>
<html>
<head>
    <title>Leaves</title>
    <style>
        table {
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
        <table>
            <?php echo $html; ?>
        </table>

         <form method="post">
            <button type="submit" name="download" class="btn-primary">Download Report</button>
        </form> 
    </div>
</body>
</html>
