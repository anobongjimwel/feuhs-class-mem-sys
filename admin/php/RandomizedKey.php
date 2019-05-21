<?php
    class RandomizedKey
    {
        public function __construct()
        {

        }

        public static function generate($length) {
            $alphanum = 'z1Ay2BxC3wDv4EuFtG5sHrI7qJp6KoL8nMm9NlO0kPjQiRhSgTfUeVdWcXbYaZ';
            $key = "";
            for ($i = 0; $i < $length; $i++) {
                $key .= $alphanum[mt_rand(0, strlen($alphanum)-1)];
            }
            return $key;
        }
    }