<?php
    session_start();
    require_once "php/domainChecker.php";
    if (isset($_SESSION['jayrick']) && $_SESSION['zabala']) {
        header("Location: statistics.php");
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
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?5053">
	<link rel="stylesheet" type="text/css" href="style.css?4971">
	<link rel="stylesheet" type="text/css" href="./css/animate.min.css?470">
	<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/et-line.min.css">
	
    
	<script src="./js/jquery-3.3.1.min.js?2994"></script>
	<script src="./js/bootstrap.bundle.min.js?349"></script>
	<script src="./js/blocs.min.js?9694"></script>
	<script src="./js/lazysizes.min.js" defer></script>
    <title>Home</title>

    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-1 -->
<div class="bloc bgc-tea-green tc-white l-bloc bloc-bg-texture texture-geometry-shapes-2 none bloc-fill-screen" id="bloc-1">
	<div class="container">
		<div class="row l-bloc">
			<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 offset-lg-4 col-lg-4">
				<img src="img/lazyload-ph.png" data-src="https://www.feu.edu.ph/manila/wp-content/photos/shslogo.png" class="img-fluid mx-auto d-block img-style lazyload" />
				<div class="container-div-0-style">
				</div>
				<div class="form-group">
					<label class="label-style">
						Username
					</label>
					<input id="username" class="form-control" />
					<div class="container-div-style">
					</div>
					<div class="form-group">
						<label>
							Password
						</label>
						<input id="password" class="form-control" type="password" />
						<div class="container-div-bloc-0-style">
						</div>
						<div class="text-center">
							<a id="OG" class="btn btn-d btn-lg">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->

</div>
<!-- Main container END -->
    <script>
        document.getElementById("OG").onclick = function () {
            var un = document.getElementById("username");
            var pw = document.getElementById("password");
            if (un.value == "admin" && pw.value == "password") {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        location.href="statistics.php";
                    }
                };
                xmlhttp.open("GET","php/sessionSetter.php",false);
                xmlhttp.send();
            } else {
                if (un.value=="" || pw.value=="") {
                    alert("Please fill in the needed credentials!");
                } else {
                    alert("Wrong username or password");
                }
            }
        }
    </script>

</body>
</html>
