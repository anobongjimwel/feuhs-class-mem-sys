<?php
    session_start();
    ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?294">
	<link rel="stylesheet" type="text/css" href="style.css?5497">
	<link rel="stylesheet" type="text/css" href="./css/animate.min.css?7354">
	<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/et-line.min.css">
	
    
	<script src="./js/jquery-3.3.1.min.js?7842"></script>
	<script src="./js/bootstrap.bundle.min.js?9590"></script>
	<script src="./js/blocs.min.js?3295"></script>
	<script src="./js/lazysizes.min.js" defer></script>
    <title>Choose</title>

    
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
								<a href="index.php" class="nav-link">Check</a>
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

<!-- bloc-2 -->
<div class="bloc l-bloc" id="bloc-2">
	<div class="container bloc-lg">
		<div class="row">
			<div class="offset-lg-1 col-lg-10 scroll-fx-in-fade">
				<h2 class="mg-md h2-style animated fadeIn" data-appear-anim-style="fadeIn">
					Student Number
				</h2>
                <span id="negativeNotice">

                    </span>
				<div class="form-group">
					<input id="studentNumber" class="form-control d-block animated zoomIn" placeholder="Student Number" maxlength="20" required data-validation-required-message="Student Number Required" data-appear-anim-style="zoomIn" />
					<div class="container-div-style">
					</div>
                    <input type="button" onclick="checkIfStudentNumberValid()" class="btn btn-glossy btn-green-ryb animated pulse float-lg-right float-md-right float-sm-right float-right" data-appear-anim-style="pulse" value="Log In"><span class="et-icon-target icon-spacer icon-white"></span></input>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->
    
<script src="./js/scrollFX.js?7551"></script>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->

<script>
    function checkIfStudentNumberValid() {
        var studentNumInput = document.getElementById("studentNumber");
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText=="TRUE") {
                    location.href = "choose-classes.php";
                } else {
                    document.getElementById("negativeNotice").innerHTML = "<div class=\"alert alert-danger\" id=\"neg-alert\">\n" +
                        "                    <a href=\"#\" class=\"btn btn-d btn-lg btn-style-none float-right\" data-dismiss=\"alert\" aria-label=\"Close\"><span class=\"fa fa-close close\"></span></a>\n" +
                        "                    <p class=\"mb-0\" id=\"neg-alert-text\">\n" +
                        "                        Student number doesn't exists or wrong student number format.\n" +
                        "                    </p>\n" +
                        "                </div>"
                }
            }
        };
        xmlhttp.open("POST","php/checkStudent.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("studentNum="+studentNumInput.value);
    }
</script>

</body>
</html>
