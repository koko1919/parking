<?php 
session_start();
require 'mysqlConnect.php';
require 'update_slots.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>smart-parking</title>
    <link rel="icon" href="assets/img/ny.jpg" />

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
  </head>

  <body>

  <section id="container" >
       <!--header start-->
      <header class="header black-bg">

            <!--logo start-->
            <a href="index.php" class="logo"><b>Smart-parking</b></a>
            <!--logo end-->

        </header>
      <!--header end-->

       <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="#"><img src="assets/img/assistant-144.png" class="img-circle" width="60"></a></p>
                    <h5 class="centered"> <?php echo $_SESSION['email']; ?></h5>

                  <li class="mt">
                      <a href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
				<div class="row">

	                  <div class="col-md-12">
	                  	  <div class="content-panel">

              <table class="table table-bordered">
                      <tr><h2>View All Parkings</h2></tr>
                      <tr align="center">
                      <th>S.N </th>
                      <th>Location </th>
                      <th>Street </th>
                      <th>Name</th>
                      <th>Slot</th>
                      <th>Price</th>
                      <th>Delete </th>
                      <th>Edit </th>
                      </tr>
<?php
$sel="select * from parkings";
$run=mysqli_query($con,$sel);
$i=0;
while($row=mysqli_fetch_array($run)){
$id=$row['id'];
$location=$row['location'];
$street=$row['street'];
$name=$row['name'];
$slot=$row['slot'];
$price=$row['price'];
$i++;

?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $location; ?></td>
<td><?php echo $street; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $slot; ?></td>
<td><?php echo $price; ?></td>
<td><a href="edit.php? edit=<?php echo $id; ?>">Edit</a</td>
<td><a href="basic_table.php?delete=<?php echo $id; ?>">Delete</a></td>
</tr>
<?php }?>
</table>
<?php
if(isset($_GET['delete']))
{
  $delete_id=$_GET['delete'];
  $delete="DELETE FROM `parkings` WHERE `parkings`.`id` ='$delete_id'";
  $run_delete=mysqli_query($con,$delete);
  if($run_delete)
  {
    echo "<script>alert('Parking deleted successfully')</script>";
    echo "<script>window.open('basic_table.php','_self')</script>";
  }
}
?>
	                  	  </div><!--/content-panel -->
	                  </div><!-- /col-md-12 -->


				</div>

		</section><!--wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
