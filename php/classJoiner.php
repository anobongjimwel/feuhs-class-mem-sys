<?php
    class classJoiner {
        private $username, $password, $destination, $pdo;
        const STUDENT_NAME = 1;
        const STUDENT_NUMBER = 2;
        const STUDENT_GRADE = 3;
        const STUDENT_STRAND = 4;

        public function __construct()
        {
            $this->username = "root";
            $this->password = "";
            $this->destination = "mysql:host=localhost;dbname=feuhsclassmem";
            $this->pdo = new PDO($this->destination, $this->username, $this->password);
        }

        public function studentNumberExists($studentNum) {
            if (!empty($studentNum)) {
                $query = $this->pdo->query("SELECT * FROM students WHERE studentNo = $studentNum");
                if ($query->rowCount()>0) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function checkIfDoneChoosingSubjects($studentNum) {
            if (!empty($studentNum)) {
                $query = $this->pdo->query("SELECT * FROM picks WHERE studentNo");
                if ($query->rowCount()>=2) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function getGrade($studentNum) {
            if (!empty($studentNum)) {
                $query = $this->pdo->query("SELECT * FROM students WHERE studentNo");
                if ($query->rowCount()!=0) {
                    return $query->fetch(PDO::FETCH_ASSOC)['grade'];
                } else {
                    return false;
                }
            }
        }

        public function getStrand($studentNum) {
            if (!empty($studentNum)) {
                $query = $this->pdo->query("SELECT * FROM students WHERE studentNo");
                if ($query->rowCount()!=0) {
                    return $query->fetch(PDO::FETCH_ASSOC)['strand'];
                } else {
                    return false;
                }
            }
        }

        public function getClassesAvailableExcept($classID) {
            if (!empty($classID)) {
                $query = $this->pdo->query("SELECT classes.classid, classes.className, count(schedules.classid)*40 as maxCount, count(picks.classid) as currCount FROM classes
  LEFT JOIN schedules ON classes.classId = schedules.classId
  LEFT JOIN picks ON classes.classId = picks.classId
  GROUP BY classes.classId
  HAVING currCount < maxCount AND classes.classId <> '".$classID."'");
                if ($query->rowCount()>0) {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return FALSE;
                }
            }
        }

        public function getClassesAvailable()
        {
            $query = $this->pdo->query("SELECT classes.classid, classes.className, count(schedules.classid)*40 as maxCount, count(picks.classid) as currCount FROM classes
LEFT JOIN schedules ON classes.classId = schedules.classId
LEFT JOIN picks ON classes.classId = picks.classId
GROUP BY classes.classId
HAVING currCount < maxCount");
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return FALSE;
            }
        }

        public function getSchedulesAvailableForClass($classid, $scheduleName) {
            if (!empty($classid)) {
                $query = $this->pdo->prepare("SELECT schedules.classid, schedules.schedule, schedules.scheduleid, COUNT(picks.scheduleid) AS currCount, 40 as maxCount
FROM schedules
  LEFT JOIN picks ON schedules.scheduleId = picks.scheduleid
GROUP BY schedules.scheduleid
HAVING schedules.classId = '".$classid."' AND currCount < maxCount AND schedules.schedule <> '".$scheduleName."'");
                $query->execute();
                if ($query->rowCount()>0) {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return FALSE;
                }
            }
        }

        public function isScheduleAvailable($classid, $scheduleid) {
            if (!empty($classid) && !empty($scheduleid)) {
                //check if class exists
                $queryIfExists = $this->pdo->query("SELECT * FROM schedules WHERE classId = '".$classid."' AND scheduleId = '".$scheduleid."'");
                if ($queryIfExists->rowCount()==0) {
                    return "Inexistent";
                } else {
                    $queryIfFull = $this->pdo->query("SELECT * FROM picks WHERE classId = '".$classid."' AND scheduleId = '".$scheduleid."'");
                    if ($queryIfFull->rowCount()<40) {
                        return "True";
                    } else {
                        return "False";
                    }
                }
            }
        }

        public function isScheduledPickedAlready($classid, $scheduleid, $studentnumber) {
            if (!empty($classid) && !empty($scheduleid) && !empty($studentnumber)) {
                $query = $this->pdo->query("SELECT * FROM picks WHERE classId = '" . $classid . "' AND scheduleId = '".$scheduleid."' AND classId = '".$classid."'");
                if ($query->rowCount()==0) {
                    return FALSE;
                } else {
                    return TRUE;
                }
    }
        }

        public function appendSchedulePick($classid, $scheduleid, $studentnumber) {
            $append = $this->pdo->prepare("INSERT INTO picks (studentNo, classId, scheduleid) VALUES (:stno, :clid, :scid)");
            $append->bindParam(':stno', $studentnumber);
            $append->bindParam('clid', $classid);
            $append->bindParam(':scid', $scheduleid);
            if ($append->execute()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function hasPicked($studentnum) {
            $query = $this->pdo->query("SELECT * FROM picks WHERE studentNo = '".$studentnum."'");
            if ($query->rowCount()>0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getStudentInfo($infoType, $studentNum) {
            $query = $this->pdo->query("SELECT * FROM students WHERE studentNo = '".$studentNum."';");
            if ($query->rowCount()!=0) {
                $student = $query->fetch(PDO::FETCH_ASSOC);
                if ($infoType == $this::STUDENT_NAME) {
                    return $student['fullName'];
                } else if ($infoType == $this::STUDENT_GRADE) {
                    return $student['grade'];
                } else if ($infoType == $this::STUDENT_STRAND) {
                    return $student['strand'];
                } else if ($infoType == $this::STUDENT_NUMBER) {
                    return $student['studentNo'];
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function getPickedSchedules($studentNum) {
            if (!empty($studentNum) && $this->hasPicked($studentNum)) {
                $query = $this->pdo->query("SELECT classes.className, schedules.schedule, picks.studentNo
FROM picks
LEFT OUTER JOIN schedules ON picks.scheduleid = schedules.scheduleid
LEFT OUTER JOIN classes ON picks.classId = classes.classId
HAVING picks.studentNo = '".$studentNum."'");
                if ($query->rowCount()==0) {
                    return false;
                } else {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        }

    }