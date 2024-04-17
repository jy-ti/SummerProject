
<?php
        $conn = mysqli_connect('localhost', 'root', '', 'ams');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
// Process accept/reject actions
        if (isset($_POST['accept']) || isset($_POST['reject'])) {
            $leave_id = $_POST['leave_id'];
          
            
            if (isset($_POST['accept'])) {
                // Update leave status as accepted in the database
                $status = "Accepted";
                $updateQuery = "UPDATE leave_records SET status='$status' WHERE leave_id='$leave_id'";
                $result = mysqli_query($conn, $updateQuery);
                
                if ($result) {
                    header('location:viewleave.php');
                    echo "<p class='success'>Leave request accepted.</p>";
                } else {
                    echo "<p class='error'>Error accepting leave request: " . mysqli_error($conn) . "</p>";
                }
            } elseif (isset($_POST['reject'])) {
                
               $status = "Rejected";


                $updateQuery = "UPDATE leave_records SET status='$status' WHERE leave_id='$leave_id'";
                $result = mysqli_query($conn, $updateQuery);
                 header('location:viewleave.php');
                
                if ($result) {
                    echo "<p class='success'>Leave request rejected.</p>";
                } else {
                    echo "<p class='error'>Error rejecting leave request: " . mysqli_error($conn) . "</p>";
                }
            }
        }
        
        mysqli_close($conn);