<?php 
include("../include.php");

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ams');
$conn = mysqli_connect('localhost','root','','ams') or die(mysqli_error());

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<header>
   <link rel="stylesheet" type="text/css" href="style.css">
</header>


            <div style="text-align: left; font-family: : Arial;" >
                <h3 class="fs-2">Welcome Admin :)</h3></a>
            </div>
            <br>
                

      <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">

                        <?php
                        $sql = "SELECT employee_id from employee";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $empcount=$query->rowCount();
                        ?>

                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
                                <div class="font-14 text-secondary weight-500">Total Employees</div>
                            </div>
                            
                        </div>
                    </div>
                </div>

               
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">

                        <?php
                        $sql = "SELECT attendance_id from attendance";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $attendancecount=$query->rowCount();
                        ?>

                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo($attendancecount);?></div>
                                <div class="font-14 text-secondary weight-500">Total Attendance</div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">

                        <?php
                        $sql = "SELECT leave_id from leave_records";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $leavecount=$query->rowCount();
                        ?>

                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo($leavecount);?></div>
                                <div class="font-14 text-secondary weight-500">Total leave</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
    <!--  -->
            </div>
        </div>
    </div>
</div>

                <br><br>

                 <!-- <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">

                        <?php
                        // $sql = "SELECT leave_id from leave_records where status='rejected'";
                        // $query = $dbh -> prepare($sql);
                        // $query->execute();
                        // $results=$query->fetchAll(PDO::FETCH_OBJ);
                        // $leavecount=$query->rowCount();
                        ?>

                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark"><?php echo($leavecount);?></div>
                                <div class="font-14 text-secondary weight-500">Rejected leave</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                 -->



</body>

</html>
