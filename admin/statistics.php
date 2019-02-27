<?php
    session_start();
    require_once "php/Counter.php";
    $ctr = new Counter();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?705">
	<link rel="stylesheet" type="text/css" href="style.css?8063">
	<link rel="stylesheet" type="text/css" href="./css/animate.min.css?5206">
	<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/et-line.min.css">
	
    
	<script src="./js/jquery-3.3.1.min.js?1535"></script>
	<script src="./js/bootstrap.bundle.min.js?317"></script>
	<script src="./js/blocs.min.js?4525"></script>
	<script src="./js/lazysizes.min.js" defer></script>
    <title>Statistics</title>

    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0 -->
<div class="bloc l-bloc none bloc-bg-texture texture-geometry-shapes sticky-nav" id="bloc-0">
	<div class="container ">
		<div class="row">
			<div class="col">
				<nav class="navbar row navbar-expand-md navbar-light">
					<a class="navbar-brand" href="index.php"><span class="special-tag-for-editing-text-with-html"></span><span class="special-tag-for-editing-text-with-html"></span><img src="https://www.feu.edu.ph/manila/wp-content/photos/shslogo.png" alt="logo" width="50" height="50" /></a>
					<button id="nav-toggle" type="button" class="ml-auto ui-navbar-toggler navbar-toggler border-0 p-0" data-toggle="collapse" data-target=".navbar-1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse navbar-1">
						<ul class="site-navigation nav navbar-nav ml-auto">
							<li class="nav-item">
								<a href="statistics.php" class="nav-link">Statistics</a>
							</li>
							<li class="nav-item">
								<a href="classes.html" class="a-btn nav-link">Classes</a>
							</li>
							<li class="nav-item">
								<a href="students.html" class="a-btn nav-link">Students</a>
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
<div class="bloc l-bloc none b-divider" id="bloc-2">
	<div class="container ">
		<div class="row">
			<div class="order-sm-0 offset-sm-0 col-sm-4 col-md-4 col-6 col">
				<h3 class="mg-md text-center ">
					<strong><?php echo $ctr->countAllStudents() ?></strong>
				</h3>
				<h4 class="mg-md text-center ">
					Students
				</h4>
			</div>
			<div class="col-6 col-md-4 col-sm-4">
				<h3 class="mg-md text-center ">
					<strong><?php echo $ctr->countAllClasses() ?></strong>
				</h3>
				<h4 class="mg-md text-center ">
					Classes
				</h4>
			</div>
			<div class="col-md-4 col-sm-4 col-6">
				<h3 class="mg-md text-center ">
					<strong><?php echo $ctr->countAllSchedules() ?></strong>
				</h3>
				<h4 class="mg-md text-center ">
					Schedules
				</h4>
			</div>
			<div class="col-sm-4 col-md-4 col-6">
				<h3 class="mg-md text-center ">
					<strong><?php echo $ctr->getSystemProgress() ?></strong>
				</h3>
				<h4 class="mg-md text-center ">
					Progress
				</h4>
			</div>
			<div class="col-sm-4 col-md-4 col-6">
				<h3 class="mg-md text-center ">
					<strong><?php echo $ctr->getCompletedStudentsCount() ?></strong>
				</h3>
				<h4 class="mg-md text-center ">
					Membered
				</h4>
			</div>
			<div class="col-sm-4 col-md-4 col-6">
				<h3 class="mg-md text-center ">
					<strong><?php echo $ctr->getIncompleteStudentsCount() ?></strong>
				</h3>
				<h4 class="mg-md text-center ">
					Unfinished
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-3 -->
<div class="bloc l-bloc" id="bloc-3">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<div >
					<style>
	tr.green {
		color: green
	}
	
	tr.red {
		color: red
	}
	
	tr.gray {
		color: gray
	}
</style><b>

</b><div class="table-responsive"><table class="table table-bordered table-hover">
	<tbody>
		<tr>
			<th scope="col">Class</th>
			<th scope="col">Schedule</th>
			<th scope="col">Members</th>
			<th scope="col">Status</th>
		</tr>
        <?php
            if ($ctr->getClassStats()!=false) {
                foreach ($ctr->getClassStats() as $class) {
                    switch ($class['members']) {
                        case "0":
                            echo "<tr class='gray'>";
                            echo "  <td>".$class['classname']."</td>";
                            echo "  <td>".$class['schedule']."</td>";
                            echo "  <td>".$class['members']."</td>";
                            echo "  <td>Empty</td>";
                            echo "</tr>";
                            break;

                        case "40":
                            echo "<tr class='red'>";
                            echo "  <td>".$class['classname']."</td>";
                            echo "  <td>".$class['schedule']."</td>";
                            echo "  <td>".$class['members']."</td>";
                            echo "  <td>Full</td>";
                            echo "</tr>";
                            break;

                        default:
                            echo "<tr class='green'>";
                            echo "  <td>".$class['classname']."</td>";
                            echo "  <td>".$class['schedule']."</td>";
                            echo "  <td>".$class['members']."</td>";
                            echo "  <td>Still Available</td>";
                            echo "</tr>";
                            break;
                    }
                }
            }
            ?>
        <!-- for UI debugging purposes, don't delete
		<tr class="gray">
			<td>Class 1</td>
			<td>Time Goes Here</td>
			<td>0</td>
			<td>Empty</td>
		</tr>
		<tr class="green">
			<td>Class 2</td>
			<td>Time Goes Here</td>
			<td>24</td>
			<td>Still Available</td>
		</tr>
		<tr class="red">
			<td>Class 3</td>
			<td>Time Goes Here</td>
			<td>40</td>
			<td>Full</td>
		</tr>
		-->
		
</tbody></table>
</div>
					
				</div>
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
    

</body>
</html>
