
    <!DOCTYPE html>
<html lang="en">

<head>
   

    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    

    
    <link rel="stylesheet" href="empdash.css" />
    <!-- <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"> -->
    <title>Employee Dashboard</title>
</head>

<body class="bg-primary">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
         <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">AMS</div>
            <div class="list-group list-group-flush my-3">

                <a href="employee_dashboard.php" class="list-group-item list-group-item-action bg-black second-text ">

                   </i>Dashboard</a>
                

                
                <a href="../Leave/leave.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Leave</a>
                <a href="viewleave.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Previous Leave</a>
              
                <a href="viewReportsE.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Reports</a>

               
            </div>
        </div>


        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
       <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i><!-- <?php echo $fullname; ?> -->
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../Attendance/emplogout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

            </nav>
            

            
                

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

</body>

</html>
