<!-- doctype -->
<!doctype html>

<!-- HTML -->
<html lang="en">

<!-- Head -->
<head>

  <!-- Hoofd pagina Title -->
  <title>Admin - Users overview</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- Material Dashboard CSS -->
  <link rel="stylesheet" href="../assets/css/material-dashboard.css"> 

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
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

	$departments_overzicht = (new Database())->departments_overview();


?>



  
  <!-- wrapper -->
  <div class="wrapper">

  <!-- side bar -->
  <div class="sidebar" data-color="orange" data-background-color="white"  data-image="../assets/img/sidebar-1.jpg ">
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
      <div class="user">

          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>



    <ul class="nav">
      <li class="nav-item   ">
        <a class="nav-link" href="users_overview.php">
          <i class="material-icons">dashboard</i>
          <p>User overzicht</p>
        </a>
       </li>
       <li class="nav-item ">
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
       <li class="nav-item  active ">
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
        <a class="navbar-brand" href="javascript:;">Departments table</a>
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

  <strong>You have successfully login in as </strong>
  <?php

    echo $_SESSION['logged_in_as'];

  ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



<button class="btn btn-round" data-toggle="modal" data-target="#signupModal">
    <i class="material-icons">assignment</i>
    User Toevoegen
</button>

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">User toevoegen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">


            <div class="col mr-auto">
            <form class="form" method="POST" action="../code/add_user.php">
            <div class="modal-body">
            
            <!-- radio 1 -->
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> admin
                <span class="circle">
                <span class="check"></span>
                </span>
               </label>
              </div>


              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> user
                <span class="circle">
                <span class="check"></span>
                </span>
               </label>
              </div>  
              
                

                <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">face</i></div>
                      </div>
                        <input type="number"  name="type_id" class="form-control" placeholder="Type_id...">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">face</i></div>
                      </div>
                        <input type="text" class="form-control" name="username" placeholder="Username...">
                    </div>
                  </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">Email</i></div>
                    </div>
                      <input type="email" class="form-control" name="email" placeholder="Email...">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                    </div>
                      <input type="password" placeholder="password..." name="password" class="form-control" />
                  </div>
                </div>
                </div>
              <div class="modal-footer justify-content-center">
              <input type="submit" value="Aanmaken">
              <a href="#pablo" class="btn btn-primary btn-round">Voeg user toe 

              
              
              
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
    <h4 class="card-title">Department Table</h4>
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
            <th scope="text-center">#</th>
            <th scope="col">Naam</th>
            <th scope="col">postcode</th>
            <th scope="col">Stad</th>
            <th scope="col">Straat</th>
            <th scope="col">Huisnummer</th>
          </tr>
          <!--end Table head Body -->

        </thead>
        <!--end Table head-->

        <!--Table body  -->
        <tbody>

          <?php foreach ($departments_overzicht as $entry) { ?>
          <tr>
            <th scope="row"><?= $entry['id'] ?></th>
            <td><?= $entry['name'] ?></td>
            <td><?= $entry['post_code'] ?></td>
            <td><?= $entry['city'] ?></td>
            <td><?= $entry['street'] ?></td>
            <td><?= $entry['number'] ?></td>
          </tr>
    <?php } // endforeach ?>
                
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
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>

</body>
<!-- body end -->

</html>
<!-- Html end -->

