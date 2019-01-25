<?php
session_start();

if (!empty($_SESSION['studentNum'])) {
    $studentNum = $_SESSION['studentNum'];
} else {
    header("Location: choose.php");
}

include_once "php/classJoiner.php";
$cJ = new ClassJoiner;

if (!$cJ->hasPicked($studentNum)) {
    header("Location: choose-classes.php");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?6395">
	<link rel="stylesheet" type="text/css" href="style.css?79">
	<link rel="stylesheet" type="text/css" href="./css/animate.min.css?1553">
	<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/et-line.min.css">
	
    
	<script src="./js/jquery-3.3.1.min.js?2486"></script>
	<script src="./js/bootstrap.bundle.min.js?8167"></script>
	<script src="./js/blocs.min.js?9855"></script>
	<script src="./js/lazysizes.min.js" defer></script>
    <title>Check Class Details</title>

    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0 -->
<div class="bloc bgc-north-texas-green bloc-bg-texture texture-geometry-shapes d-bloc" id="bloc-0">
	<div class="container ">
		<div class="row">
			<div class="col">
                <nav class="navbar row navbar-expand-md navbar-dark">
                    <a class="navbar-brand" href="index.php"><img src="https://shs.feu.edu.ph/img/logo.png" alt="logo" width="55" height="55" /></a>
                    <button id="nav-toggle" type="button" class="ml-auto ui-navbar-toggler navbar-toggler border-0 p-0" data-toggle="collapse" data-target=".navbar-1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-1">
                        <ul class="site-navigation nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="choose.php" class="nav-link">Choose</a>
                            </li>
                            <li class="nav-item">
                                <a href="check.php" class="nav-link">Check</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Manage</a>
                            </li>
                            <li class="nav-item">
                            </li>
                        </ul>
                    </div>
                </nav>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0 END -->

<?php $schedules = $cJ->getPickedSchedules($_SESSION['studentNum'])?>
<!-- bloc-6 -->
<div class="bloc l-bloc" id="bloc-6">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-md-6">
                <?php if (file_exists("studentimg/".$studentNum.".jpg")) {
                    echo "<img src=\"img/lazyload-ph.png\" data-src=\"studentimg/2000051532.jpg\" class=\"img-fluid img-style float-lg-right lazyload\" />";
                } else {
                    echo "<img src=\"img/lazyload-ph.png\" data-src=\"img/placeholder-img.png\" class=\"img-fluid img-style float-lg-right lazyload\" />";
                }
				?>
			</div>
			<div class="col-md-6">
                <a href="index.php" style="text-decoration: none; color: blueviolet">< Back</a>
				<h1 class="mg-md">
                    <?php echo $cJ->getStudentInfo($cJ::STUDENT_NAME, $_SESSION['studentNum'])?>
				</h1>
				<p>
					Student Number: <?php echo $cJ->getStudentInfo($cJ::STUDENT_NUMBER, $_SESSION['studentNum'])?> <br>Grade: <?php echo $cJ->getStudentInfo($cJ::STUDENT_GRADE, $_SESSION['studentNum'])?> <br>Strand: <?php echo $cJ->getStudentInfo($cJ::STUDENT_STRAND, $_SESSION['studentNum'])?> <br> <br>Class 1: <br><?php echo $schedules[0]['className'] ?> <br><?php echo $schedules[0]['schedule'] ?> <br> <br>Class 2: <br><?php echo $schedules[1]['className'] ?> <br><?php echo $schedules[1]['schedule'] ?>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-6 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->
    


<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->

</body>
</html>
