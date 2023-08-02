<?php

session_start();

$sql = "SELECT id FROM regbus ORDER BY id DESC LIMIT 1";
$mysqli = require __DIR__ . "/rbus-db.php";
$id = $mysqli->query($sql);

if ($id->num_rows > 0) {
    $mysqli = require __DIR__ . "/rbus-db.php";
    
    $sql = "SELECT * FROM regbus";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

$SQL = "SELECT id FROM regsch ORDER BY id DESC LIMIT 1";
$mySQLi = require __DIR__ . "/rbus-db.php";
$ID = $mySQLi->query($SQL);

if ($ID->num_rows > 0) {
    $mySQLi = require __DIR__ . "/rbus-db.php";
    
    $SQL = "SELECT * FROM regsch";
            
    $RES = $mySQLi->query($SQL);
    
    $USR = $RES->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Job Portal - Home</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="cname">
            <h1>CAREER CONNECT</h1>      
        </div>
        <div class="hlogo">
            <a href="index.php">
                <img src="Career_Connect.png" alt="Career Connect Logo" class="logo">
            </a>
        </div>
        <div class="user">
            <a href="user.php">
                <img src="user_male_icon.png" alt="User Page" class="user">
            </a>
        </div>
        <div class="login">
            <a href="login.php" class="login">
                <img src="9020497_user_login_member_account_icon.png" alt="Log In" class="login">
            </a>
        </div>
    </header>

    <div class="main-body-layout">
        <div class="job-listing-column">
            <section id="job-listing">
                <h2>Job Listing</h2>
                <div class="job-item">
                <?php if (isset($user)): ?>
                    <div class="position">
                        <p><?= htmlspecialchars($user["position"]) ?></p>
                    </div>
                    
                    <div class="bName">
                        <p><strong>Company:</strong> <?= htmlspecialchars($user["bName"]) ?></p>
                    </div>
                    
                    <div class="description">
                        <p><strong>Description:</strong> <?= htmlspecialchars($user["pdescription"]) ?></p>
                    </div>
                    
                    <div class="schapply">
                        <a href="job_page.html">
                            <button id="apply-button">Apply Now</button>
                        </a>
                    </div>
                    <?php else: ?>
                        <p>No Positions available</p>
                    <?php endif; ?> 
                </div>
            </section>
        </div>

        <div class="school-listing-column">
            <div class="schools">
                <section class="school-listing">
                    <h2>School Listing</h2>
                    <div class="school-item">
                    <?php if (isset($USR)): ?>
                    <div class="schtext">
                    <div class="position">
                        <p><?= htmlspecialchars($USR["sname"]) ?></p>
                    </div>
                    
                    <div class="bName">
                        <p><strong>Curriculum offered:</strong> <?= htmlspecialchars($USR["curoff"]) ?></p>
                    </div>
                    
                    <div class="description">
                        <p><strong>Grades Offered:</strong> <?= htmlspecialchars($USR["gradeoff"]) ?></p>
                    </div>
                    </div>
                    
                    <div class="schapply">
                        <a href="job_page.html">
                            <button class="apply-button">Apply Now</button>
                        </a>
                    </div>
                    <?php else: ?>
                        <p>No Schools available</p>
                    <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
        <div class="ads">
                <section class="advert-placements">
                    <h3>Boost your School's Visibility!</h3>
                    <h3>Looking for Top Talent?</h3>
                    <h4>Apply Here!</h4>
                    <section class="btns">
                        <div class="btn">
                            <div class="business">
                                <a href="regBus.html">
                                    <button class="business-btn"> Advertise Job </button>
                                </a>
                            </div>
                            <div class="school">
                                 <a href="regSch.html">
                                    <button class="school-btn"> Advertise my School</button>
                                 </a>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
    </div>
    

    <script src="index_script.js"></script>
</body>
</html>
