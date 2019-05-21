<?php
class Counter
{
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

    public function countAllStudents() {
        $query = $this->pdo->query("SELECT * FROM students");
        if ($query->rowCount()==0) {
            return 0;
        } else {
            return $query->rowCount();
        }
    }

    public function countAllClasses() {
        $query = $this->pdo->query("SELECT * FROM classes");
        if ($query->rowCount()==0) {
            return 0;
        } else {
            return $query->rowCount();
        }
    }

    public function countAllSchedules() {
        $query = $this->pdo->query("SELECT * FROM schedules");
        if ($query->rowCount()==0) {
            return 0;
        } else {
            return $query->rowCount();
        }
    }

    public function getSystemProgress() {
        $query = $this->pdo->query("SELECT * FROM picks");
        $query2 = $this->pdo->query("SELECT * FROM students");
        return (round($query->rowCount() / ($query2->rowCount()*2),2) * 100) . "%";
    }

    public function getCompletedStudentsCount() {
        $query = $this->pdo->query("SELECT DISTINCT a.studentNo, COUNT(p.studentno) AS picks FROM students a LEFT JOIN picks p ON a.studentNo = p.studentno HAVING picks = 2");
        return $query->rowCount();
    }

    public function getIncompleteStudentsCount() {
        $query = $this->pdo->query("SELECT DISTINCT a.studentNo, COUNT(p.studentno) AS picks FROM students a LEFT JOIN picks p ON a.studentNo = p.studentno HAVING picks < 2");
        return $query->rowCount();
    }

    public function getClassStats() {
        $query = $this->pdo->query("SELECT c.classname, s.schedule, count(p.studentno) as members FROM classes c JOIN schedules s ON s.classid = c.classid LEFT JOIN picks p ON s.scheduleid = p.scheduleid GROUP BY c.classid, s.scheduleid ORDER BY members asc");
        if ($query->rowCount()==0) {
            return FALSE;
        } else {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getStudentStats() {
        $query = $this->pdo->query("SELECT s.studentno, s.fullName, s.grade, s.strand, count(p.studentno) as classes FROM students s LEFT JOIN picks p ON s.studentNo = p.studentno GROUP BY p.studentno ORDER BY classes desc");
        if ($query->rowCount()==0) {
            return FALSE;
        } else {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getStudentStatsLike($query) {
        $query = $this->pdo->query("SELECT s.studentno, s.fullName, s.grade, s.strand, count(p.studentno) as classes FROM students s LEFT JOIN picks p ON s.studentNo = p.studentno WHERE s.studentNo LIKE '%$query%' OR s.fullName LIKE '%$query%' OR s.strand LIKE '%$query%' OR s.grade LIKE '%$query%' GROUP BY p.studentno ORDER BY classes desc");
        if ($query->rowCount()==0) {
            return FALSE;
        } else {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getStudentProfilePic($studentno) {
        if (file_exists("../studentimg/$studentno.jpg")) {
            return "http://class.feuhs.edu/studentimg/$studentno.jpg";
        } else {
            return "http://class.feuhs.edu/img/placeholder-image.png";
        }
    }
}