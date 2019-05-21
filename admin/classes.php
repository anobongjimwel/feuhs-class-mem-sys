<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <?php include_once "php/genHeader.php" ?>
    <title>Classes</title>

    <script>
        function search() {
            var q = document.getElementById('q');
            if (q.value=="") {
                location.href = "classes.php";
            } else {
                location.href = "classes.php?q="+q.value;
            }
        }

        function deleteClass(classid, name) {
                Sweetalert2.fire({
                    title: "Are you sure?",
                    text: "Delete class \""+name+"\"?",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    showCancelButton: true,
                    showCloseButton: true,
                    cancelButtonColor: "red",
                    type: "warning"
                }).then((result) => {
                    if (result.value) {
                    let xmlHttp = new XMLHttpRequest();
                    xmlHttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText=="GOOD") {
                                Sweetalert2.fire({
                                    title: "Deleted!",
                                    type: "success",
                                    text: "Class '"+name+"' deleted. "
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else  {
                                Sweetalert2.fire({
                                    title: "Failed",
                                    type: "error",
                                    text: "Failed to delete class "+name
                                });
                            };
                        }
                    };
                    xmlHttp.open("post","php/actions/deleteClass.php", false);
                    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xmlHttp.send("id="+classid);

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    Sweetalert2.fire({
                        title: "Declined!",
                        type: "error",
                        text: "Class '"+name+"' deletion action declined. "
                    })
                }
            })
        }

        function deleteSchedule(scheduleid, classname, schedule) {
            Sweetalert2.fire({
                title: "Are you sure?",
                text: "Delete schedule "+schedule+" for "+classname+"?",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                showCancelButton: true,
                showCloseButton: true,
                cancelButtonColor: "red",
                type: "warning"
            }).then((result) => {
                if (result.value) {
                    let xmlHttp = new XMLHttpRequest();
                    xmlHttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText=="GOOD") {
                                Sweetalert2.fire({
                                    title: "Deleted!",
                                    type: "success",
                                    text: "Schedule "+schedule+" for "+classname+" deleted. "
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else  {
                                Sweetalert2.fire({
                                    title: "Failed",
                                    type: "error",
                                    text: "Failed to delete class schedule "+schedule+" for "+classname
                                });
                            }
                        }
                    };
                    xmlHttp.open("post","php/actions/deleteSchedule.php", false);
                    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xmlHttp.send("id="+scheduleid);

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    Sweetalert2.fire({
                        title: "Declined!",
                        type: "error",
                        text: "Class schedule "+schedule+" for "+classname+" deletion action declined. "
                    })
                }
            })
        }

        async function renameClass(classid, name) {
            const {value: classname} = await Sweetalert2.fire({
                title: 'Set new class name for '+name,
                input: 'text',
                inputPlaceholder: 'New Class Name'
            });

            if (classname) {
                let xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText=="GOOD") {
                            Sweetalert2.fire({
                                title: 'Success!',
                                text: 'New class name has been set.',
                                type: 'success'
                            });

                            setTimeout(function() {
                                location.reload()
                            }, 2000);
                        } else  {
                            Sweetalert2.fire({
                                title: "Failed",
                                type: "error",
                                text: "Failed to rename class name"
                            });
                        }
                    }
                };
                xmlHttp.open("post","php/actions/renameClass.php", false);
                xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlHttp.send("n="+classname+"&id="+classid);

            }
        }

    </script>
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
			<div class="col-md-8 col-lg-8">
				<div class="form-group">
					<input id="q" class="form-control" />
				</div>
			</div>
			<div class="col-6 col-md-2 col-lg-2">
				<a href="javascript:search()" class="btn btn-wire btn-sq float-lg-none btn-block"><span class="et-icon-magnifying-glass icon-spacer"></span>Search</a>
			</div>
			<div class="col-lg-2 col-6 col-md-2">
				<a class="btn btn-wire btn-block" href="add-class.php"><span class="et-icon-notebook icon-spacer"></span>Add</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-4 END -->

<!-- bloc-5
<div class="bloc l-bloc" id="bloc-5">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<div class="alert alert-success">
					<a href="#" class="btn btn-d btn-lg btn-style-none float-right" data-dismiss="alert" aria-label="Close"><span class="fa fa-close close"></span></a>
					<p class="mb-0">
						This is a sample alert
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
bloc-5 END -->

<!-- bloc-5 -->
<div class="bloc l-bloc" id="bloc-5">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-lg-2 col-md-2">
				<div>
					<h3 class="mg-clear text-center text-md-left">
						<strong>1029</strong>
					</h3>
					<p class="text-center text-md-left">
						Schedules
					</p>
				</div>
				<div>
					<h3 class="scroll-fx-right-out mg-clear text-center text-md-left">
						<strong>2019</strong>
					</h3>
					<p class="float-lg-none mg-clear text-center text-md-left">
						Classes
					</p>
				</div>
			</div>
			<div class="col-lg-10 col-md-10">
				<div class=" html-widget-style">
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
</style><b>

</b>
                <h2>Classes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <tbody>
                        <tr>
                            <th>Class</th>
                            <th>Schedules</th>
                            <th>Actions</th>
                        </tr>
                        <!-- UI BASIS PURPOSES ONLY
                        <tr>
                            <td scope="col">Class 1</td>
                            <td>0</td>
                            <td><a href="">Rename</a> - <a href="">Delete</a></td>
                        </tr>
                        <tr>
                            <td scope="col">Class 1</td>
                            <td>23</td>
                            <td><a href="">Rename</a> - <a href="">Delete</a></td>
                        </tr>
                        <tr>
                            <td scope="col">Class 1</td>
                            <td>0</td>
                            <td><a href="">Rename</a> - <a href="">Delete</a></td>
                        </tr>
                        -->
                        <?php
                        require_once "php/dbcon.php";
                        if (isset($_GET['q']) && !empty($_GET['q'])) {
                            $qrys = $db->query("SELECT c.classid as classid, c.classname as classname, COUNT(s.schedule) as schedules FROM classes c LEFT JOIN schedules s ON c.classid = s.classid WHERE c.classname LIKE '%".$_GET['q']."%' GROUP BY classid ORDER BY c.classname");
                        } else {
                            $qrys = $db->query("SELECT c.classid as classid, c.classname as classname, COUNT(s.schedule) as schedules FROM classes c LEFT JOIN schedules s ON c.classid = s.classid GROUP BY classid ORDER BY c.classname");
                        }
                        if ($qrys->rowCount()<1) {
                            echo "<h6>No records found for classes</h6>";
                        } else {
                            foreach ($qrys as $qry) {
                                echo "<tr>";
                                echo "  <td scope='col'>".$qry['classname']."</td>";
                                echo "  <td>".$qry['schedules']."</td>";
                                echo "  <td><a href=\"javascript:renameClass('".$qry['classid']."','".$qry['classname']."')\">Rename</a> - <a href=\"javascript:deleteClass('".$qry['classid']."','".$qry['classname']."')\">Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                        </tbody></table>
                </div>

                    <br />
                    <h2>Schedules</h2>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm">
                    <tbody>

                        <tr>
                            <th>Class</th>
                            <th>Schedule</th>
                            <th>Members</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <!-- UI BASIS PURPOSES ONLY
                        <tr>
                            <td scope="col">Class 1</td>
                            <td>Time Goes here</td>
                            <td>0</td>
                            <td>Empty</td>
                            <td><a href="">Delete</a></td>
                        </tr>
                        <tr>
                            <td scope="col">Class 1</td>
                            <td>Time Goes here</td>
                            <td>23</td>
                            <td class="green">Still Available</td>
                            <td><a href="">Delete</a></td>
                        </tr>
                        <tr>
                            <td scope="col">Class 1</td>
                            <td>Time Goes here</td>
                            <td>0</td>
                            <td class="red">Full</td>
                            <td><a href="">Delete</a></td>
                        </tr> -->
                        <?php
                        require_once "php/dbcon.php";
                        if (isset($_GET['q']) && !empty($_GET['q'])) {
                            $qrys = $db->query("SELECT c.classid as classid, c.classname as classname, s.scheduleid as scheduleid, s.schedule as schedule, count(p.studentno) as students FROM classes c LEFT JOIN schedules s ON c.classid = s.classid LEFT JOIN picks p ON s.scheduleid = p.scheduleid WHERE c.classname LIKE '%".$_GET['q']."%' OR s.schedule LIKE '%".$_GET['q']."%' GROUP BY s.scheduleid ORDER BY c.classid DESC, s.scheduleid ASC ");
                        } else {
                            $qrys = $db->query("SELECT c.classid as classid, c.classname as classname, s.scheduleid as scheduleid, s.schedule as schedule, count(p.studentno) as students FROM classes c LEFT JOIN schedules s ON c.classid = s.classid LEFT JOIN picks p ON s.scheduleid = p.scheduleid GROUP BY s.scheduleid ORDER BY c.classid DESC, s.scheduleid ASC");
                        }
                        if ($qrys->rowCount()<1) {
                            echo "<h6>No records found for schedules</h6>";
                        } else {
                            foreach ($qrys as $qry) {
                                echo "<tr>";
                                echo "  <td scope='col'>".$qry['classname']."</td>";
                                echo "  <td>".$qry['schedule']."</td>";
                                echo "  <td>".$qry['students']."</td>";
                                if ($qry['students']<1) {
                                    echo "<td>Empty</td>";
                                } else if ($qry['students']<40) {
                                    echo "<td class='green'>Still Available</td>";
                                } else {
                                    echo "<td class='red'>Full</td>";
                                }
                                echo "<td><a href=\"javascript:deleteSchedule('".$qry['scheduleid']."','".$qry['classname']."','".$qry['schedule']."')\">Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody></table>
                </div>


				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-5 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->
    
<script src="./js/scrollFX.js?757"></script>
</body>
</html>
