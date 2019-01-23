<?php
    class classJoiner {
        private $username, $password, $destination, $pdo;

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
    }