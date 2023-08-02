<?php

if (empty($_POST["school-name"])) {
    die("School name is required");
}

if (empty($_POST["curriculum"])) {
    die("Curriculum being offered is required");
}

if (empty($_POST["grades-offered"])) {
    die("The grades you offer is required");
}

$mysqli = require __DIR__ . "/rbus-db.php";

$sql = "INSERT INTO regsch (sname, curoff, gradeoff)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["school-name"],
                  $_POST["curriculum"],
                  $_POST["grades-offered"]);
                  
if ($stmt->execute()) {

    header("Location: index.php");
    exit;
}