<?php

if (empty($_POST["business-name"])) {
    die("Business name is required");
}

if (empty($_POST["position-offered"])) {
    die("Position being offered is required");
}

if (empty($_POST["description"])) {
    die("Description is required");
}

$mysqli = require __DIR__ . "/rbus-db.php";

$sql = "INSERT INTO regbus (bName, position, pdescription)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["business-name"],
                  $_POST["position-offered"],
                  $_POST["description"]);
                  
if ($stmt->execute()) {

    header("Location: index.php");
    exit;
}