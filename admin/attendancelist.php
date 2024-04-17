<?php
include("../include.php");

$conn = mysqli_connect('localhost', 'root', '', 'ams');

$today = date("Y-m-d");
$search_date = isset($_GET['search_date']) ? $_GET['search_date'] : $today;

// Get employee data from the "employee" table
$employeeQuery = "SELECT * FROM employee";
$employeeResult = mysqli_query($conn, $employeeQuery);
$employees = [];

if (mysqli_num_rows($employeeResult) > 0) {
    while ($row = mysqli_fetch_assoc($employeeResult)) {
        $employees[$row['employee_id']] = $row;
    }
}

// Get attendance data for the selected date
$sql = "SELECT * FROM attendance WHERE attendance_date = '$search_date'";
$result = mysqli_query($conn, $sql);
$data = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row; // Append the row to the $data array
    }
}

// Check attendance status for each employee
foreach ($employees as $employee) {
    $employeeId = $employee['employee_id'];
    $employeeNo = $employee['employee_no'];
    $employeeName = $employee['fullname'];

    

    $attendanceFound = false;

    // Check if the employee has made attendance for the selected date
    foreach ($data as $attendance) {
        if ($attendance['employee_no'] == $employeeNo) {
            $attendanceFound = true;

            // Check attendance date and time
            $attendanceTime = strtotime($attendance['attendance_time']);
            $cutOffTime = strtotime('10:00 AM');

            if ($attendanceTime !== false && $attendanceTime <= $cutOffTime) {
                $attendance['attendance_status'] = 'Present';
            } else {
                $attendance['attendance_status'] = 'Presented Late';
            }

            break;
        }
    }

    // If attendance not found, mark as absent
    if (!$attendanceFound) {
        $attendance = [
            'employee_no' => $employeeNo,
            'fullname' => $employeeName,
            'attendance_date' => $search_date,
            'attendance_time' => '',
            'attendance_status' => 'Absent'
        ];

        $data[] = $attendance;
    }
}


// Handle selected number of rows per page
$perPage = isset($_GET['records_per_page']) ? $_GET['records_per_page'] : 5; // Default to 5 rows per page

// Paginate the data
$totalRows = count($data);
$totalPages = ceil($totalRows / $perPage);
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($currentpage - 1) * $perPage;
$data = array_slice($data, $start, $perPage);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Details</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            color: #000;
            padding: 0px;
            text-align: center;
        }
        
        table {
            background-color: white;
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
        
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-form label {
            margin-right: 10px;
        }

        .table-container {
            margin-top: 20px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            padding: 10px;
            text-align: left;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>

    <!-- ... Rest of the code ... -->
</head>

<body>
<!-- ... Rest of the code ... -->

<div class="manage">
    <div class="controls">
        <div class="search-form">
            <form method="GET" action="">
                <label for="search_date">Search Date:</label>
                <input type="date" id="search_date" name="search_date" value="<?php echo $search_date; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
  <div class="show-rows">
            <form method="GET" action="">
                <label for="records_per_page">Show Rows:</label>
                <select id="records_per_page" name="records_per_page">
                    <option value="5" <?php if ($perPage == 5) echo 'selected'; ?>>5</option>
                    <option value="10" <?php if ($perPage == 10) echo 'selected'; ?>>10</option>
                    <option value="20" <?php if ($perPage == 20) echo 'selected'; ?>>20</option>
                    <!-- Add more options as needed -->
                </select>
                <button type="submit">Go</button>
            </form>
        </div>
    </div>
    </div>

    <div class="table-container">
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php else: ?>
            <table>
                <thead>
                <tr>
                    <th>Employee_No</th>
                    <th>Employee_Name</th>
                    <th>Attendance_date</th>
                    <th>Attendance_time</th>
                    <th>Attendance_Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $d): ?>
                    <tr>
                        <td><?php echo $d['employee_no']; ?></td>
                        <td><?php echo $d['fullname']; ?></td>
                        <td><?php echo $d['attendance_date']; ?></td>
                        <td><?php echo $d['attendance_time']; ?></td>
                        <td><?php echo $d['attendance_status']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>


<center>
<?php
 $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
     $totalRecords = 100; // Replace this with your actual total number of records
    
    $perPage = 5; // Replace this with the desired number of records per page
    
    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $perPage);
    
    // Make sure $totalPages is defined and not empty
    if (empty($totalPages)) {
        $totalPages = 1;
    }
?>


<ul class="pagination justify-content-end">
    <?php
    // Assuming you have defined the $currentpage and $totalPages variables
    // Next button
    if ($currentpage < $totalPages) {
        $nextPage = $currentpage + 1;
        echo '<a class="page-link bg-white" href="?page=' . $nextPage . '">Next</a>';
    } else {
        echo '<a class="page-link bg-white disabled">Next</a>';
    }
    
    // Previous button
    if ($currentpage > 1) {
        $previousPage = $currentpage - 1;
        echo '<a class="page-link bg-white" href="?page=' . $previousPage . '">Previous</a>';
    } else {
        echo '<a class="page-link bg-white disabled">Previous</a>';
    }

    
?>
</ul></center>


</div>

<!-- ... Rest of the code ... -->

</body>
</html>
