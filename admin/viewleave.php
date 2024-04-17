<?php 
include("../include.php");

$conn = mysqli_connect('localhost', 'root', '', 'ams');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve leave requests from the database
$query = "SELECT * FROM leave_records";
$result = mysqli_query($conn, $query);

$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Perform search based on employee number
if (isset($_POST['search'])) {
    $employee_no = $_POST['employee_no'];

    // Construct the SQL query with the search condition
    $sql = "SELECT * FROM leave_records WHERE employee_no = '$employee_no'";
    $result = mysqli_query($conn, $sql);

    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}

// Number of rows to display per page
$rows = isset($_POST['rows_per_page']) ? $_POST['rows_per_page'] : 5;

// Get the total number of rows
$totalRows = count($data);

// Calculate the total number of pages
$totalPages = ceil($totalRows / $rows);

// Get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Validate and adjust the current page number if necessary
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $rows;

// Retrieve the data for the current page
$data = array_slice($data, $offset, $rows);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests</title>
    <style>
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

        .search-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
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

        <div class="manage">
            <div class="search-form">
                <form method="POST" action="">
                    <label for="employee_no">Employee Number:</label>
                    <input type="text" id="employee_no" name="employee_no">
                    <button type="submit" name="search">Search</button>
                </form>

                <form method="POST" action="">
                    <label for="rows_per_page">Show Rows:</label>
                    <select id="rows_per_page" name="rows_per_page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                    <button type="submit" name="submit_rows">Submit</button>
                </form>
            </div>
            
            <?php
            if (!empty($data)) {
                echo "<table>";
                echo "<tr><th>Leave ID</th><th>Employee No</th><th>Full Name</th><th>Start Date</th><th>End Date</th><th>Leave Type</th><th>Reason</th><th>Status</th><th>Action</th></tr>";
                
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['leave_id'] . "</td>";
                    echo "<td>" . $row['employee_no'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "<td>" . $row['leave_type'] . "</td>";
                    echo "<td>" . $row['reason'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='leave_process.php'>";
                    echo "<input type='hidden' name='leave_id' value='" . $row['leave_id'] . "'>";
                    echo "<input type='submit' name='accept' value='Accept' style='background-color:#3caa1a; border-color: #3caa1a; color: white;'>";
                    echo "<input type='submit' name='reject' value='Reject' style='background-color:#C41E3A; border-color: #C41E3A; color: white;'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "<p>No leave requests found.</p>";
            }
            ?>
        </div>
    </div>

<center>
<?php
//pagination
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
</ul>
</center>

</body>
</html>