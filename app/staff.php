<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];
    
    // ❌ VULNERABLE QUERY - For educational purposes
    $query = "SELECT * FROM user WHERE username='$u' AND password='$p'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['staff_logged_in'] = true;
        header("Location: hidden-access/Congratss-Th1s-Fl4G-4Y0u-M4558r000-dvkCC821kXv.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Portal - TechNews Daily</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            padding: 20px;
        }
        
        .auth-container {
            max-width: 500px;
            width: 100%;
        }
        
        .auth-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-logo {
            font-family: 'Roboto Slab', serif;
            font-size: 32px;
            font-weight: 700;
            color: #1a237e;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .auth-logo i {
            color: #4fc3f7;
        }
        
        .auth-logo span {
            color: #4fc3f7;
        }
        
        .auth-form {
            margin: 30px 0;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1a237e;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #4fc3f7;
            box-shadow: 0 0 0 3px rgba(79, 195, 247, 0.2);
        }
        
        .btn-auth {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #4fc3f7 0%, #29b6f6 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(41, 182, 246, 0.3);
        }
        
        .alert-error {
            background: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #ffcdd2;
        }
        
        .auth-hint {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            border-left: 4px solid #4fc3f7;
        }
        
        .auth-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .auth-footer a {
            color: #4fc3f7;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .security-notice {
            color: #4caf50;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }
        
        .flag-hint {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .hint-steps ol {
            padding-left: 20px;
            margin-top: 10px;
        }
        
        .hint-steps li {
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <i class="fas fa-user-shield"></i>
                    <span>Staff</span>Portal
                </div>
                <h2>Authorized Personnel Only</h2>
                <p>Access restricted to TechNewsDaily staff members</p>
            </div>
            
            <?php if(isset($error)): ?>
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter staff username" required>
                </div>
                
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-auth">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </div>
                
                <div class="auth-hint">
                    <p><i class="fas fa-lightbulb"></i> <strong>Security Tip:</strong> This login form is vulnerable to SQL injection for educational purposes.</p>
                    <p><small>Try common SQL injection payloads to bypass authentication</small></p>
                </div>
            </form>
            
            <div class="auth-footer">
                <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Homepage</a>
                <span class="security-notice">
                    <i class="fas fa-shield-alt"></i> Secure Connection
                </span>
            </div>
        </div>
        
        <div class="flag-hint">
            <div class="hint-content">
                <h4><i class="fas fa-flag"></i> Challenge Objective</h4>
                <p>Bypass the login form using SQL injection to access the hidden staff area and retrieve the flag.</p>
                <div class="hint-steps">
                    <p><strong>Step-by-Step Guide:</strong></p>
                    <ol>
                        <li>Analyze the login form for SQL injection vulnerabilities</li>
                        <li>Use SQL injection to bypass authentication</li>
                        <li>Access the hidden congratulation page</li>
                        <li>Retrieve the flag from the database or hidden page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</body>
</html>