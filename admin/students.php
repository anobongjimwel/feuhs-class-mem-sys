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

    <?php include_once "php/genHeader.php" ?>
    <title>Students</title>

    
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
					<a class="navbar-brand" href="index.php"><span class="special-tag-for-editing-text-with-html"></span><span class="special-tag-for-editing-text-with-html"></span><img src="https://www.feu.edu.ph/elements/feulogo.png" alt="logo" width="50" height="50" /></a>
					<button id="nav-toggle" type="button" class="ml-auto ui-navbar-toggler navbar-toggler border-0 p-0" data-toggle="collapse" data-target=".navbar-1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse navbar-1">
						<ul class="site-navigation nav navbar-nav ml-auto">
							<li class="nav-item">
								<a href="statistics.php" class="nav-link">Statistics</a>
							</li>
							<li class="nav-item">
								<a href="classes.php" class="a-btn nav-link">Classes</a>
							</li>
							<li class="nav-item">
								<a href="students.php" class="a-btn nav-link">Students</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0 END -->

<!-- bloc-4 -->
<div class="bloc l-bloc" id="bloc-4">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-md-8 col-lg-10">
				<div class="form-group">
					<input class="form-control field-style" id="q"/>
				</div>
			</div>
			<div class="col-6 col-md-2 col-lg-2">
				<a class="btn btn-wire btn-sq float-lg-none btn-block" href="javascript:search()"><span class="et-icon-magnifying-glass icon-spacer"></span>Search</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-4 END -->

<!-- bloc-11 -->
<div class="bloc l-bloc" id="bloc-11">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-lg-2 col-md-2">
				<div>
					<h3 class="mg-clear text-center text-md-left">
						<strong><?php echo $ctr->countAllStudents()?></strong>
					</h3>
					<p class="text-center text-md-left">
						Students
					</p>
				</div>
				<div>
					<h3 class="scroll-fx-right-out mg-clear text-center text-md-left">
						<strong><?php echo $ctr->getIncompleteStudentsCount()?></strong>
					</h3>
					<p class="float-lg-none mg-clear text-center text-md-left">
						Unfinished<br>
					</p>
				</div>
			</div>
			<div class="col-lg-10 col-md-10">
				<div class=" html-widget-style ">
<style>
	td.green {
		color: green
	}
	
	td.red {
		color: red
	}
	
	td.gray {
		color: gray
	}
</style><div class="table-responsive">

			<table class="table table-bordered table-hover table-sm">
	<tbody>
		<tr>
			<th>Image</th>
			<th>Student Number</th>
			<th>Name</th>
			<th>Grade</th>
			<th>Strand</th><th>Status</th>
		</tr>
        <?php
            if (isset($_GET['q']) && !empty($_GET['q']) && $_GET['q']!="") {
                $students = $ctr->getStudentStatsLike($_GET['q']);
            } else {
                $students = $ctr->getStudentStats();
            }

            if ($students != false) {
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td><img src='" . $ctr->getStudentProfilePic($student['studentno']) . "' data-src='' style='width: 25px; height: 25px' class='lazyload' /></td>";
                    echo "<td>" . $student['studentno'] . "</td>";
                    echo "<td>" . $student['fullName'] . "</td>";
                    echo "<td>" . $student['grade'] . "</td>";
                    echo "<td>" . $student['strand'] . "</td>";

                    switch ($student['classes']) {
                        case 2:
                            echo "<td class='green'>Complete</td>";
                            break;

                        case 1:
                            echo "<td class='red'>Incomplete</td>";
                            break;

                        default:
                            echo "<td class='red'>Unsubmitted</td>";
                            break;
                    }
                    echo "</tr>";
                }
            }

        ?>
        <!-- UI Debugging Purposes only
		<tr>
			<td><img src="img/lazyload-ph.png" data-src="" style="width: 25px; height: 25px" class="lazyload"></td>
			<td>Student Number</td>
			<td>Name</td>
			<td>G12</td>
			<td>HUMSS</td>
			<td class="red">Unsubmitted</td>
		</tr>
		<tr>
			<td><img src="img/lazyload-ph.png" data-src="" style="width: 25px; height: 25px" class="lazyload"></td>
			<td>Student Number</td>
			<td>Name</td>
			<td>G12</td>
			<td>HUMSS</td>
			<td class="red">Incomplete</td>
		</tr>
		<tr>
			<td><img src="img/lazyload-ph.png" data-src="" style="width: 25px; height: 25px" class="lazyload"></td>
			<td>Student Number</td>
			<td>Name</td>
			<td>G12</td>
			<td>HUMSS</td>
			<td class="green">Complete</td>
		</tr>
		-->
	</tbody></table>
</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-11 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->

<script>

    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    function search() {
        var q = document.getElementById("q");
        if (q.value != getUrlVars()['q']) {
            location.href="students.php?q="+q.value;
        }
    }
</script>
<script src="./js/scrollFX.js?2168"></script>
</body>
</html>
