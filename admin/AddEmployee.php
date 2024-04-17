<?php
include("../include.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ams";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMessages = array(); // Initialize an array to store error messages

$sql = "SELECT MAX(employee_id) AS max_id FROM employee";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$val = $row['max_id'] + 1;


if (isset($_POST['submit'])) {
     $employee_id = $_POST['employee_id'];
    $employee_no = $_POST['employee_no'];
    $fullname = $_POST['fullname'];
    $department = $_POST['department'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validation
    if (strlen($employee_no) > 30) {
        $errorMessages[] = "Invalid employee number. Please enter a valid employee number.";
    }

    if (strlen($fullname) > 30 || !preg_match("/^[a-zA-Z ]{1,30}$/", $fullname)) {
        $errorMessages[] = "Invalid full name. Only letters and spaces are allowed, and maximum length is 30 characters.";
    }

    if (strlen($department) > 30) {
        $errorMessages[] = "Invalid department selected.";
    }

    if (strlen($username) > 30) {
        $errorMessages[] = "Invalid username entered.";
    }

    if (strlen($password) > 30) {
        $errorMessages[] = "Invalid password entered.";
    }

    if (!empty($email) && !preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email)) {
        $errorMessages[] = "Invalid email address format.";
    }

    if (empty($errorMessages)) {
        $query = "SELECT * FROM employee WHERE employee_no = '$employee_no'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $errorMessages[] = "Employee number already exists.";
        } else {
      $sql = "INSERT INTO employee (employee_id, employee_no, fullname, department, username, password, email)
        VALUES ('$employee_id', '$employee_no', '$fullname', '$department', '$username', '$password', '$email')";
            if (mysqli_query($conn, $sql)) {
                header('location: employee.php');
                exit();
            } else {
                $errorMessages[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head id="Head">
    <title>Add Employee</title>

    <!-- Your CSS styles here -->
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="login-header">
            <h2><center>Add Employee</center></h2>
        </div>
        <center>
            <!-- Display error messages -->
            <?php if (!empty($errorMessages)) : ?>
                <div class="error-message">
                    <?php foreach ($errorMessages as $errorMessage) : ?>
                        <?php echo $errorMessage; ?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form name="login" method="post" action="">
               <div class="label"><label>ID</label></div>
                <div class="login-input-box">
                    <input name="employee_id" type="text" name="employee_id" value="<?php echo $val; ?>" readonly /></div>

                <div class="label"><label>employee_no</label></div>
                <div class="login-input-box">
                    <input name="employee_no" type="number" placeholder="Enter your employee number" name="employee_no" /></div>

                <div class="label"><label>fullname</label></div>
                <div class="login-input-box">
                    <input name="fullname" type="text" placeholder="Enter your fullName" name="fullname" /></div>

                <div class="label"><label>username</label></div>
                <div class="login-input-box">
                    <input  type="text" placeholder="Enter your username" name="username" /></div>
                    <div class="label"><label>Password</label></div>

                <div class="login-input-box">
                    <input  type="password" placeholder="Enter your password" name="password" /></div>

                <div class="label"><label>Email</label></div>
                    <div class="login-input-box">
                    <input  type="text" placeholder="Enter your email" name="email" /></div>


            
                <div class="label" for="department">
                  
             <label for="options">Select a Department:</label>
             <div class="login-input-box">
                    <select name="department" id="department" required>
                    <option value="">Select</option>
                    <option value="HR">HR</option>
                    <option value="Project">Project</option>
                    <option value="IT">IT</option>
                    <option value="Account">Account</option>
                    <option value="Management">Management</option>
                </select>
            </div>
            
                <div>

                <div>
                    <input type="submit" name="submit" value="ADD" class="login-button-box" style="height:32px;" />
                </div>
            </form>
        </center>
    </div>
</body>

</html>
