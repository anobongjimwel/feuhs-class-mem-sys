<?php
    if (session_status()==PHP_SESSION_ACTIVE) {
        session_destroy();
    }
    session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?919">
	<link rel="stylesheet" type="text/css" href="style.css?4953">
	<link rel="stylesheet" type="text/css" href="./css/animate.min.css?6469">
	<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/et-line.min.css">
	
    
	<script src="./js/jquery-3.3.1.min.js?2915"></script>
	<script src="./js/bootstrap.bundle.min.js?4729"></script>
	<script src="./js/blocs.min.js?7695"></script>
	<script src="./js/lazysizes.min.js" defer></script>
    <title>Home</title>

    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-1 -->
<div class="bloc bloc-fill-screen bloc-bg-texture texture-geometry-shapes l-bloc" id="bloc-1">
	<div class="container fill-bloc-top-edge">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-light row navbar-expand-md">
					<a class="navbar-brand" href="index.php"><img src="img/lazyload-ph.png" data-src="https://shs.feu.edu.ph/img/logo.png" alt="logo" width="55" height="55" class="lazyload" /></a>
					<button id="nav-toggle" type="button" class="ui-navbar-toggler navbar-toggler border-0 p-0 mr-md-0 ml-auto" data-toggle="collapse" data-target=".navbar-1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse navbar-1">
						<ul class="site-navigation nav navbar-nav ml-auto">
							<li class="nav-item">
								<a href="index.php" class="nav-link">Home</a>
							</li>
							<li class="nav-item">
								<a href="choose.php" class="a-btn nav-link">Choose</a>
							</li>
                            <li class="nav-item">
                                <a href="http://m.manage.feuhs.edu" class="nav-link a-btn">Manage</a>
                            </li>
							<li class="nav-item">
								<a href="check.php" class="nav-link a-btn">Check</a>
							</li>
						</ul>
					</div>
				</nav>
				<div class="text-center">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="mg-md text-center">
					Choosing Elective Classes? Never been this easy.
				</h1>
				<h3 class="mg-md float-none text-center">
					Jayrick Zabala, a teacher at Far Eastern University High School, has partnered with his colleague Jimwel Anobong, to make up a system which will give you ease in choosing your class. <br><br>You may click on “choose” from the menu if you haven&rsquo;t selected any class yet. You may choose “check” to see the classes you have already done choosing.<br>
				</h3>
				<div class="text-center">
				</div>
			</div>
		</div>
	</div>
	<div class="container fill-bloc-bottom-edge">
		<div class="row">
			<div class="col-12">
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


<!-- bloc-3 -->
<div class="bloc l-bloc" id="bloc-3">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4 class="mg-md text-sm-left text-center">
					About
				</h4><a href="index.php" class="a-btn a-block footer-link">Voting System</a><a href="index.php" class="a-btn a-block footer-link">Behind the System</a>
			</div>
			<div class="col-md-3 col-sm-6">
				<h4 class="mg-md text-sm-left text-center">
					Navigation
				</h4><a href="index.php" class="a-btn a-block footer-link">Home</a><a href="index.php" class="a-btn a-block footer-link">Choose</a><a href="index.php" class="a-btn a-block footer-link">Check</a><a href="index.php" class="a-btn a-block footer-link">Manage</a>
			</div>
			<div class="col-md-3 col-sm-6">
				<h4 class="mg-md text-sm-left text-center">
					How To
				</h4><a href="index.php" class="a-btn a-block footer-link">Choose Guide</a><a href="index.php" class="a-btn a-block footer-link">Check Guide</a>
			</div>
			<div class="col-md-3 col-sm-6">
				<h4 class="mg-md text-sm-left text-center">
					Social Media Links
				</h4><a href="index.php" class="a-btn a-block footer-link">Facebook</a><a href="index.php" class="a-btn a-block footer-link">Twitter</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-3 END -->

</div>
<!-- Main container END -->
    


<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->

</body>
</html>
