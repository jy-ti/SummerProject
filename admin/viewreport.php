
<?php
include("../include.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Report</title>
    <style>
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

h2 {
  margin-top: 20px;
}

p {
  margin-top: 10px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}
</style>
<body>
    <div class="container">



<?php
$conn = mysqli_connect('localhost', 'root', '', 'ams');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




// Fetch report from the database
$fetchQuery = "SELECT * FROM reports";
$fetchResult = mysqli_query($conn, $fetchQuery);




if (mysqli_num_rows($fetchResult) > 0) {
    echo "<h2>Employee Report</h2>";
    echo "<table>";
    echo "<tr><th>Employee ID</th><th>Full Name</th><th>Employee No</th><th>Department</th><th>Total Attendance</th><th>Total Leave</th><th>Appreciation</th></tr>";

    while ($row = mysqli_fetch_assoc($fetchResult)) {
        echo "<tr>";
        echo "<td>" . $row['employee_id'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['employee_no'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo "<td>" . $row['total_attendance'] . "</td>";
        echo "<td>" . $row['total_leave'] . "</td>";
        /*echo "<td>" . $row['fine'] . "</td>";*/
                echo "<td>" . $row['Appreciation'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No reports found.</p>";
}

mysqli_close($conn);
?>

</body>
</html>