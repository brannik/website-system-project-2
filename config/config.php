<?php
    define("DB_HOST","localhost");
    define("DB_USER","brannik");
<<<<<<< HEAD
    define("DB_PASS","112358");
=======
    define("DB_PASS","11235813");
>>>>>>> main
    define("DB_NAME","systemdb");
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }

?>