<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ONSP || Dashboard - Code Camp BD</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        
        <?php include_once('includes/sidebar.php');?>
        <!-- Content Start -->
        <div class="content">
            <?php include_once('includes/header.php');?>

<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
            <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> is the sole owner of this script. It is not suitable for personal use. And releasing it in demo version. Besides, it is being provided for free only from <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>. For any of your problems contact us on <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">MH RONY</a> on facebook. Thanks for staying with <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>.</marquee>
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        
                        <?php
$uid=$_SESSION['ocasuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <h3>Hello, <?php  echo $row->FullName;?> <span>  Welcome to Your Note Shareing Platform</span></h3><?php $cnt=$cnt+1;}} ?>
                        
                    </div>
                    
                </div>
            </div>
            <!-- Recent Sales End -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-8">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file fa-6x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Uploaded Subject Notes</p>
                                 <?php 
                                 $uid=$_SESSION['ocasuid'];
$sql1 ="SELECT * from  tblnotes where UserID=:uid";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':uid',$uid,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totnotes=$query1->rowCount();
?>
                                <h4 style="color: blue"><?php echo htmlentities($totnotes);?></h4>
                                        <a href="manage-notes.php"><h5>View Detail</h5></a>
                            </div>
                        </div>
                    </div>
<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file fa-6x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Uploaded Notes File</p>
                                 <?php 
                                 $uid=$_SESSION['ocasuid'];
$sql1 ="SELECT 
COUNT(IF(File1!= '',0,NULL)) as file,
COUNT(IF(File2!= '',0,NULL)) as file2,
COUNT(IF(File3!= '',0,NULL)) as file3,
COUNT(IF(File4!= '',0,NULL)) as file4
from  tblnotes where UserID=:uid";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':uid',$uid,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
foreach($results1 as $rows)
{
    $totalfiles=$rows->file+$rows->file2+$rows->file3+$rows->file4;
}
?>
                                <h4 style="color: blue"><?php echo htmlentities($totalfiles);?></h4>
                                        <a href="manage-notes.php"><h5>View Detail</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->

            <?php include_once('includes/footer.php');?>
        </div>
        <!-- Content End -->
<?php include_once('includes/back-totop.php');?>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<!---   Author By: MH RONY
        Author Website: https://dev-mhrony.com
        Github Link: https://github.com/dev-mhrony
        Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html><?php }  ?>