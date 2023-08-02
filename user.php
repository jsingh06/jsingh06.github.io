<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/user-database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <header class="header">
        <h1 class="company-name">CAREER CONNECT</h1>
        <a href="index.php">
            <img src="Career_Connect.png" alt="Career Connect Logo" class="logo">
        </a>
    </header>
    
    <div class = "main">
        <h1 class = "pdata">Personal Data</h1>
        <section class = "userdata">
    
            <?php if (isset($user)): ?>
                
                <div class = "name">
                    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                </div>

                <div class= "email">
                    <div class = "emailadd"><h4>Email: <?= htmlspecialchars($user["email"]) ?></h4></div>
                </div>
                
                <div class = "name">
                    <h4>Education Level: <?= htmlspecialchars($user["educationlvl"]) ?></h4>
                </div>

                
                <a href="logout.php">
                    <button class = "logout">
                        Log Out
                    </button>
                </a>
        </section>
        <?php else: ?>
            <section>
                <div class = "opts">
                    <div class="login">
                        <a href="login.php">
                            <button class="login-btn"> 
                                Log In
                            </button>
                        </a>
                    </div>
                    <div class="signup">
                        <a href="createacc.html">
                            <button class="signup-btn"> 
                                Sign Up
                            </button>
                        </a>
                    </div>
                </div>
                <a href="index.php">
                    <button class = "homep">
                        Back to Home Page
                    </button>
                </a>
            </section>
            <?php endif; ?>
    </div>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    