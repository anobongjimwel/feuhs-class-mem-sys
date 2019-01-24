<?php
    session_start();

    if (!empty($_SESSION['studentNum'])) {
        $studentNum = $_SESSION['studentNum'];
    } else {
        header("Location: choose.php");
    }

    include_once "php/classJoiner.php";
    $cJ = new ClassJoiner;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?9490">
	<link rel="stylesheet" type="text/css" href="style.css?8499">
	<link rel="stylesheet" type="text/css" href="./css/animate.min.css?2446">
	<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/et-line.min.css">
	
    
	<script src="./js/jquery-3.3.1.min.js?2639"></script>
	<script src="./js/bootstrap.bundle.min.js?3403"></script>
	<script src="./js/blocs.min.js?4427"></script>
	<script src="./js/jqBootstrapValidation.js"></script>
	<script src="./js/formHandler.js?5710"></script>
	<script src="./js/lazysizes.min.js" defer></script>
    <title>Choose-Classes</title>

    
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
					<a class="navbar-brand" href="index.html"><img src="https://shs.feu.edu.ph/img/logo.png" alt="logo" width="55" height="55" /></a>
					<button id="nav-toggle" type="button" class="ml-auto ui-navbar-toggler navbar-toggler border-0 p-0" data-toggle="collapse" data-target=".navbar-1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse navbar-1">
						<ul class="site-navigation nav navbar-nav ml-auto">
							<li class="nav-item">
								<a href="index.html" class="nav-link">Home</a>
							</li>
							<li class="nav-item">
								<a href="choose.html" class="nav-link">Choose</a>
							</li>
							<li class="nav-item">
							</li>
							<li class="nav-item">
								<a href="check.html" class="a-btn nav-link">Check</a>
							</li>
                            <li class="nav-item">
                                <a href="http://m.manage.feuhs.edu" class="nav-link a-btn">Manage</a>
                            </li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0 END -->

<!-- bloc-3 -->
<div class="bloc l-bloc" id="bloc-3">
	<div class="container bloc-lg">
		<div class="row no-gutters row-style">
			<div class="col-lg-3 offset-lg-0">
				<img src="img/lazyload-ph.png" data-src="img/placeholder-image.png" class="img-fluid mx-auto d-block lazyload" />
				<h4 class="mg-md">
					Student Name
				</h4>
				<p class="mg-clear">
                    <i>Student Number: <?php echo $studentNum?> <br>Grade: <?php echo $cJ->getGrade($studentNum)?><br>Strand: <?php echo $cJ->getStrand($studentNum)?></i>
				</p>
			</div>
			<div class="scroll-fx-in-fade order-lg-1 offset-md-0 offset-lg-1 col-lg-8">
				<form id="frm-classes" novalidate data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!" action="custom-action-url" method="POST">
					<h2 class="mg-md">
						Choose Classes
					</h2>
					<h6 class="mg-md animated fadeIn animDelay02" data-appear-anim-style="fadeIn">
						FIrst Class
					</h6>
					<div class="form-group container-div-0-bloc-3-style">
						<select id="firstClassId" onChange="checkSecondClass()" class="form-control animDelay04 animated zoomIn" data-appear-anim-style="zoomIn"name="select_921">
							<option>---</option>
                            <?php
							    foreach ($cJ->getClassesAvailable() as $class) {
							        echo "<option value='".$class['classid']."'>";
							        echo $class['className'];
							        echo "</option>";
							    }
                            ?>
						</select>
					</div>
					<div class="form-group">
						<select id="firstScheduleId" onChange="updateSecondClassSchedules(document.getElementById('secondClassId').value, document.getElementById('firstScheduleId').options[document.getElementById('firstScheduleId').selectedIndex].text)" class="form-control animDelay06 animated zoomIn" data-appear-anim-style="zoomIn" name="select_831">
                            <option>---</option>
						</select>
					</div>
					<h6 class="mg-md animDelay08 animated fadeIn" data-appear-anim-style="fadeIn">
						Second Class
					</h6>
					<div class="container-div-0-style">
						<select id="secondClassId" onChange="updateSecondClassSchedules(this.value, document.getElementById('firstScheduleId').options[document.getElementById('firstScheduleId').selectedIndex].text)" class="form-control animated puffIn animDelay1" data-appear-anim-style="puffIn" name="select_959">
                            <option>---</option>
                            <?php
                            foreach ($cJ->getClassesAvailable() as $class) {
                                echo "<option value='".$class['classid']."'>";
                                echo $class['className'];
                                echo "</option>";
                            }
                            ?>
						</select>
					</div>
					<div class="form-group container-div-27490-style">
					</div>
					<select id="secondScheduleId" class="form-control animated puffIn animDelay2" data-appear-anim-style="puffIn" name="select_2198">
                        <option>---</option>
					</select>
				</form>
				<div class="form-group container-div-bloc-3-style">
				</div>
				<button class="btn btn-glossy btn-green-ryb float-lg-right float-md-right float-sm-right float-right animDelay2 animated rollIn bloc-button" data-appear-anim-style="rollIn" type="submit" id="submit">
					<span class="et-icon-circle-compass icon-spacer icon-white"></span>Submit
				</button>
			</div>
		</div>
	</div>
</div>
<!-- bloc-3 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->
    
<script src="./js/scrollFX.js?4783"></script>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->


<script>
    function checkSecondClass() {
        var firstClassId = document.getElementById("firstClassId");
        var secondClassId = document.getElementById("secondClassId");
        var firstScheduleId = document.getElementById("firstScheduleId");
        var secondScheduleId = document.getElementById("secondScheduleId");
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                secondClassId.innerHTML = this.response;
                updateFirstClassSchedules(firstClassId.value, secondScheduleId.options[firstScheduleId.selectedIndex].text);
                updateSecondClassSchedules(secondClassId.value);
            }
        };
        xmlhttp.open("POST","php/getClassesAvailableForDropDown.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("classId="+firstClassId.value);
    }

    function updateSecondClassSchedules(classid, scheduleName) {
        var secondScheduleId = document.getElementById("secondScheduleId");
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                secondScheduleId.innerHTML = this.response;
            }
        };
        xmlhttp.open("POST","php/getSchedulesForDropDown.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("classId="+classid+"&scheduleName="+scheduleName);
    }

    function updateFirstClassSchedules(classid) {
        var firstScheduleId = document.getElementById("firstScheduleId");
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                firstScheduleId.innerHTML = this.response;
            }
        };
        xmlhttp.open("POST","php/getSchedulesForDropDown.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("classId="+classid+"&scheduleName=---");
    }
</script>
</body>
</html>
