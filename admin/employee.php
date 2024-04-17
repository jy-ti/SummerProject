<?php
include("../include.php");

$conn = mysqli_connect('localhost', 'root', '', 'ams');

// Retrieve all employees from the database
$sql = "SELECT * FROM employee ORDER BY employee_id DESC";
$result = mysqli_query($conn, $sql);

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
    $sql = "SELECT * FROM employee WHERE employee_no = '$employee_no' ORDER BY employee_id DESC";
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <a href="AddEmployee.php"><button style="background-color:skyblue; border-color: skyblue;"> Add new </button></a>

    <style>
         body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            /*background-color: #ffffff;*/
            color: #000;
            padding: 0px;
            text-align: center;
        }
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
        .search-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <div class="header">
        <h1>Employee Details</h1>
    </div>

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

        <table border="2px solid black" style="width:100%" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee_No</th>
                    <th>Fullname</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $d) {
                    ?>
                    <tr>
                        <td style='padding-left: 45px;'><?php echo $d['employee_id']; ?></td>
                        <td style='padding-left: 45px;'><?php echo $d['employee_no']; ?></td>
                        <td style='padding-left: 5px;'><?php echo $d['fullname']; ?></td>
                        <td style='padding-left: 5px;'><?php echo $d['department']; ?></td>
                        <td style='padding-left: 5px;'><?php echo $d['email']; ?></td>
                        <td style='padding-left: 5px;'>
                            <a href="update.php?id=<?php echo $d['employee_id'] ?>"><button style="background-color:skyblue; border-color: skyblue;">Update</button></a>
                            <a href="delete.php?id=<?php echo $d['employee_id'] ?>" onclick="return confirm('Are you sure you want to delete?')"><button style="background-color:#C41E3A; border-color: #C41E3A; color: white;">Delete</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- <div class="pagination">
            <?php
            // for ($i = 1; $i <= $totalPages; $i++) {
                // if ($i == $currentPage) {
                    // echo "<span class='current'>$i</span>";
                // } else {
                    // echo "<a href='?page=$i'>$i</a>";
                // }
            // }
            ?> -->
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

</body>
</html>
