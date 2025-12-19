<?php
session_start();
if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: ../staff.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎉 Access Granted - TechNews Daily</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }
        
        .congrats-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        
        .trophy {
            font-size: 80px;
            color: #ffca28;
            margin-bottom: 20px;
        }
        
        h1 {
            color: #1a237e;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .flag-box {
            background: #f3e5f5;
            border: 3px solid #ab47bc;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
        }
        
        .flag-code {
            display: block;
            background: #1a237e;
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            border: 2px dashed #4fc3f7;
        }
        
        .btn-back {
            display: inline-block;
            padding: 15px 30px;
            background: #4fc3f7;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 20px;
        }
        
        .btn-back:hover {
            background: #29b6f6;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="congrats-container">
        <div class="trophy">
            <i class="fas fa-trophy"></i>
        </div>
        
        <h1>🎉 Access Granted!</h1>
        <p class="subtitle">Congratulations! You've successfully bypassed the login security</p>
        
        <div class="flag-box">
            <h2><i class="fas fa-flag"></i> Flag Captured!</h2>
            <code class="flag-code">Flag{YES_KAMU_BERHASIL_latest_tech_news}</code>
        </div>
        
        <a href="../index.php" class="btn-back">
            <i class="fas fa-home"></i> Return to Homepage
        </a>
    </div>
</body>
</html>