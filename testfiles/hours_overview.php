<!-- doctype -->
<!doctype html>

<!-- HTML -->
<html lang="en">

<!-- Head -->
<head>

  <!-- Hoofd pagina Title -->
  <title>Admin - Hours overview</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- Material Dashboard CSS -->
  <link rel="stylesheet" href="../assets/css/material-dashboard.css">
</head>
<!-- Head End-->

<!-- Body -->
<body>


<?php
require_once '../connection/database.php';
$db = new Database();

session_start();

if ($_SESSION['is_admin'])
{
	// inlcudes etc vinden het niet zo leuk om met / te beginnen...
	require_once '../connection/database.php';
  

	$hours = $db->hours_overview();
  $users_overview = $db->users_overview();
  $date_format = '%A %e %B, %Y<br>om %H:%M';

?>


  
  <!-- wrapper -->
  <div class="wrapper">

  <!-- side bar -->
  <div class="sidebar" data-color="orange" data-background-color="white">
  <!--
  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

  Tip 2: you can also add an image using data-image tag
  -->

  <!-- Logo -->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      Emmanuel
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Examenvoorbereiding 
    </a>
  </div>
  <!-- logo end -->

  <!-- Sidebar wrapper  -->
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item   ">
        <a class="nav-link" href="users_overview.php">
          <i class="material-icons">dashboard</i>
          <p>User overzicht</p>
        </a>
       </li>
       <li class="nav-item active ">
        <a class="nav-link" href="hours_overview.php">
          <i class="material-icons">dashboard</i>
          <p>Hours overzicht</p>
        </a>
       </li>
       <li class="nav-item  ">
        <a class="nav-link" href="departments_overview.php">
          <i class="material-icons">dashboard</i>
          <p>department user overzicht </p>
        </a>
       </li>
       <li class="nav-item   ">
        <a class="nav-link" href="departments_overzicht.php">
          <i class="material-icons">dashboard</i>
          <p>department  overzicht</p>
        </a>
       </li>
    </ul>
  </div>
  <!-- Sidebar wrapper end -->

  </div>
  <!-- side bar End -->
  

  <!-- main panel -->
  <div class="main-panel">

  

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  

  <!-- containter fluid -->
    <div class="container-fluid">
    

      <!-- navbar wrapper -->
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">Hour table</a>
      </div>
      <!-- navbar wrapper end -->

      <!-- button navbar -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <!-- button navbar end -->

      <!-- Nav bar content -->
      <div class="collapse navbar-collapse justify-content-end">

        <!--Account dropdown content -->
        <ul class="navbar-nav">

          <!-- nav item dropdown -->
          <li class="nav-item dropdown">

            <!-- person icon nav link -->
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                    Account
              </p>
            </a>
            <!-- person icon nav link end -->

            <!-- dropdown menu profile -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Log out</a>
            </div>
            <!-- dropdown menu profile end -->

          </li>
          <!-- nav item dropdown end --> 

        </ul>
        <!-- Account dropdown content end -->

      </div>
      <!-- Nav bar content end-->

    </div>
    <!-- container fluid -->

  </nav>
  <!-- End Navbar --> 

  <!--Body Content -->
  <div class="content">

  <div class="alert alert-warning alert-dismissible fade show" role="alert">

  <strong>You have successfully login in as </strong><?php

echo $_SESSION['logged_in_as'];

?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<button class="btn btn-round" data-toggle="modal" data-target="#signupModal">
    <i class="material-icons">assignment</i>
    uren Toevoegen
</button>

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Uren toevoegen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">


            <div class="col mr-auto">

              <form class="form" method="POST" action="../code/create.php">
                <div class="modal-body">
                  <div class="form-group">
                    <select id="user_id" name="user_id" autofocus>
		                  <?php foreach ($users_overview as $user) { ?>
		                    <option value="<?= $user['id'] ?>"><?= $user['username'] . ' - ' . $user['email'] ?></option>
		                   <?php } ?>
	                  </select><br>
                </div>
                <label for="start_date">Van:</label><br>
              	<input id="start_date" type="date" name="start_date" value="<?= date('Y-m-d') ?>" required>
	              <input type="time" name="start_time" value="<?= date('H:i') ?>" required><br>
	              <label for="end_date">Tot:</label><br>
	              <input id="end_date" type="date" name="end_date" value="<?= date('Y-m-d') ?>" required>
	              <input type="time" name="end_time" value="<?= date('H:i') ?>" required><br>
                </div>
              <div class="modal-footer justify-content-center">


              
              <a>

              <button type="submit" class="btn btn-primary btn-round">Voeg tijd toe 
              
              </button>

              
              </a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--card -->
<div class="card">


  <!--Card header -->
  <div class="card-header card-header-rose card-header-icon">
    <div class="card-icon">
      <i class="material-icons">assignment</i>
    </div>
    <h4 class="card-title">Uren Table</h4>
  </div>
  <!-- end card header  -->

  <!--card body -->
  <div class="card-body">

    <!--Table responsive -->
    <div class="table-responsive">

      <!--table -->
      <table class="table">

        <!--Table head-->
        <thead>

          <!--Table head Body -->
          <tr>
            <th>Gebruiker</th>
            <th>Begint op</th>
            <th>Eindigt op</th>
            <th class="text-right">Beheer</th>
           </tr>
           <!--end Table head Body -->

        </thead>
        <!--end Table head-->

        <!--Table body  -->
        <tbody>
          <?php foreach ($hours as $entry) { ?>
            <tr>
              <td><?= $entry['username'] ?></td>
              <!-- strftime() formart het zoals we zelf willen -->
              <td><?= strftime($date_format, $entry['starts_at_unix']) ?></td>
              <td><?= strftime($date_format, $entry['ends_at_unix']) ?></td>
              <!-- Probeer deze 2 pagina's maar zelf te maken, ik heb er vertrouwen in dat het je lukt! Je hebt het ook al eerder gedaan -->
              <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                              <i class="material-icons">edit</i>
                </button>
                          
                <a href="delete_user.php?user_id=<?= $entry['id'] ?>">
                  <button  type="button" rel="tooltip" class="btn btn-danger btn-round">         
                  <i class="material-icons">close</i>
                  </button>
                </a>
              </td>
            </tr>
            <?php } //endforeach hours ?>
                        
        </tbody>
        <!--end Table body -->

      </table>
      <!--end table -->
      
    </div>
    <!--Table responsive -->

  </div>
  <!--end card body -->

</div>
<!--end card -->

<?php } // endif ?>

  </div>
  <!--Body Content end -->

  <!-- Footer -->
  <footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Emmanuel Ofori</a> for a better web.
      </div>
    </div>
  </footer>
  <!-- Footer end -->

  

  </div>
  <!-- main panel end -->

  </div>
  <!-- wrapper end -->



 <!-- plugin -->

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

  <!-- Plugin for the Perfect Scrollbar -->
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>

  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>

  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>

  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>

  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js" ></script>

  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="../assets/js/plugins/jquery.datatables.min.js"></script>

  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>

  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>

  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>

  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" ></script>

  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>

  <!--  Google Maps Plugin    -->
  <script  src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>

</body>
<!-- body end -->

</html>
<!-- Html end -->

