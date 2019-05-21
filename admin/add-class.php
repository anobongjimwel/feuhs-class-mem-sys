<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <?php include_once "php/genHeader.php" ?>
    <title>Add Class</title>

    
<!-- Analytics -->
 
<!-- Analytics END -->

    <script>
        function addNewClass() {
            const name = document.getElementById("addclass1");
            const schedule = document.getElementById("addclass2");
            if (name.value=="" || schedule.value=="") {
                Sweetalert2.fire({
                    title: "Information Incomplete!",
                    type: "error",
                    text: "You must fill in the required fields in order to add a new class. "
                })
            } else {
                let xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText=="GOOD") {
                            Sweetalert2.fire({
                                title: "Added!",
                                type: "success",
                                text: "New class named \""+name.value+"\""
                            });
                            setTimeout(function() {
                                location.href = 'add-class.php';
                            }, 1000);
                        } else if (this.responseText=="DUPLICATE") {
                            Sweetalert2.fire({
                                title: "Failed",
                                type: "error",
                                text: "Failed to add new class named \""+name.value+"\". Duplicate found!";
                            });
                        } else {
                            Sweetalert2.fire({
                                title: "Failed",
                                type: "error",
                                text: "Failed to add new class named \""+name.value+"\""
                            });
                        }
                    }
                };
                xmlHttp.open("post","php/actions/addNewClass.php", true);
                xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlHttp.send("n="+name.value+"&sch="+schedule.value);
            }
        };
    </script>
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0 -->
<div class="bloc l-bloc none bloc-bg-texture texture-geometry-shapes sticky-nav" id="bloc-0">
	<div class="container bloc-6">
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

<!-- bloc-7
<div class="bloc l-bloc" id="bloc-7">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<div class="alert alert-success">
					<a href="#" class="btn btn-d btn-lg btn-style-none float-right" data-dismiss="alert" aria-label="Close"><span class="fa fa-close close"></span></a>
					<p class="mb-0">
						Yo! This is an alert
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
bloc-7 END -->

<!-- bloc-8 -->
<div class="bloc l-bloc" id="bloc-8">
	<div class="container">
		<div class="row">
			<div class="col-md-6" style="padding-top: 30px;">
				<h2 class="mg-md">
					Add New Class
				</h2>
				<div class="container-div-6197-style">
					<div class="form-group container-div-13715-style">
						<label>
							Class Name
						</label>
						<input class="form-control" id="addclass1"/>
					</div>
					<div class="container-div-39097-style">
						<div class="form-group">
							<label>
								Schedule
							</label>
						</div>
						<div class="form-group">
							<select class="form-control" id="addclass2">
                                <option value="" selected>
                                    Choose one...
                                </option>
                                <option value="7:30am - 8:45am">
                                    7:30am - 8:45am
                                </option>
                                <option value="8:45am - 10:00am">
                                    8:45am - 10:00am
                                </option>
                                <option value="10:00am - 11:15am">
                                    10:00am - 11:15am
                                </option>
                                <option value="11:15am - 12:30am">
                                    11:15am - 12:30am
                                </option>
                                <option value="12:30am - 1:45am">
                                    12:30am - 1:45am
                                </option>
                                <option value="1:45pm - 3:00pm">
                                    1:45pm - 3:00pm
                                </option>
							</select>
						</div>
					</div>
					<div>
                            <a href="#" onclick="addNewClass()" class="btn btn-wire float-lg-right float-md-right btn-block">Add Class<br></a>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="padding-top: 30px;">
				<h2 class="mg-md">
					Add New Schedule
				</h2>
				<div class="form-group">
					<div class="form-group">
						<label>
							Class Name
						</label>
					</div>
					<div>
						<select class="form-control">
							<option value="0">
								Option 1
							</option>
							<option value="1">
								Option 2
							</option>
						</select>
					</div>
				</div>
				<div class="form-group container-div-32578-style">
					<label>
						Schedule
					</label>
					<select class="form-control">
                        <option value="" selected>
                            Choose one...
                        </option>
						<option value="7:30am - 8:45am">
							7:30am - 8:45am
						</option>
						<option value="8:45am - 10:00am">
							8:45am - 10:00am
						</option>
                        <option value="10:00am - 11:15am">
                            10:00am - 11:15am
                        </option>
                        <option value="11:15am - 12:30am">
                            11:15am - 12:30am
                        </option>
                        <option value="12:30am - 1:45am">
                            12:30am - 1:45am
                        </option>
                        <option value="1:45pm - 3:00pm">
                            1:45pm - 3:00pm
                        </option>
					</select>
				</div>
				<div class="form-group">
					<a href="#" onclick="addNewClass()" class="btn btn-wire float-lg-right float-none float-md-right btn-block">Add Schedule</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-8 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->


</body>
</html>
