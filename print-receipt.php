<?php
    session_start();
    include_once('php/classJoiner.php');
    $cJ = new classJoiner();
    if (empty($_SESSION['studentNum']) && !$cJ->hasPicked($_SESSION['studentNum'])) {
        header("Location: index.php");
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/paper.css" />
        <style>
            @page { size: letter }

            * {
                font-weight: normal;
                font-family: Arial;
            }
        </style>
    </head>
    <body class="semiletter landscape">
    <section class="sheet padding-10mm" style="background-image: url('img/texture-geometry-shapes.png'); background-color: rgb(233,255,233)">

        <!-- Write HTML just like a web page -->
        <div style="display: inline-block; text-align: center; width: 100%">
            <img src="https://shs.feu.edu.ph/img/logo.png" alt="logo" width="55" height="70 " />
            <br />
            <h1 style="font-weight: 600 !important; position: relative; top: -20px; display: inline-block; font-family: 'Arial'">Far Eastern University High School</h1>
            <br />
            <h4 style="position: relative; top: -60px; display: inline-block; font-family: 'Arial'">Class Membership Receipt</h4><br />
            <table style="width: 100%; position: relative; top: -60px;">
                <tr>
                    <td style="text-align: right; width: 40%; font-size: 12px"><b>STUDENT DETAILS</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%">Student Number:</td>
                    <td><?php echo $cJ->getStudentInfo($cJ::STUDENT_NUMBER, $_SESSION['studentNum'])?></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%">Name:</td>
                    <td><?php echo $cJ->getStudentInfo($cJ::STUDENT_NAME, $_SESSION['studentNum'])?></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%">Grade:</td>
                    <td><?php echo $cJ->getStudentInfo($cJ::STUDENT_GRADE, $_SESSION['studentNum'])?></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%">Strand:</td>
                    <td><?php echo $cJ->getStudentInfo($cJ::STUDENT_STRAND, $_SESSION['studentNum'])?></td>
                </tr>

                <tr>
                    <td style="text-align: right; width: 40%; font-size: 12px"><b>&nbsp;</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%; font-size: 12px"><b>CLASS SCHEDULES</b></td>
                    <td></td>
                </tr>
                <?php $schedules = $cJ->getPickedSchedules($_SESSION['studentNum'])?>
                <tr>
                    <td style="text-align: right; width: 40%; vertical-align: top">Class 1:</td>
                    <td><b style="font-weight: 900; font-size: 20px"><?php echo $schedules[0]['className'] ?></b><br /><?php echo $schedules[0]['schedule'] ?></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%; font-size: 12px"><b>&nbsp;</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%; font-size: 12px"><b>&nbsp;</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: right; width: 40%; vertical-align: top">Class 2:</td>
                    <td><b style="font-weight: 900; font-size: 20px"><?php echo $schedules[1]['className'] ?></b><br /><?php echo $schedules[1]['schedule'] ?></td>
                </tr>
                <br />
            </table>
        </div>
    </section>
    </body>
</html>