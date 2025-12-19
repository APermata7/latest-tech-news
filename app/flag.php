<?php
// File: app/flag.php - Hint page for the challenge
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flag Challenge - TechNews Daily</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Slab:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="main-header">
        <div class="header-overlay">
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <i class="fas fa-flag"></i>
                        <span>Flag</span>Challenge
                    </div>
                    <ul class="nav-menu">
                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="article.php"><i class="fas fa-newspaper"></i> Articles</a></li>
                        <li><a href="staff.php"><i class="fas fa-user-shield"></i> Staff Login</a></li>
                        <li><a href="flag.php" class="active"><i class="fas fa-flag"></i> Flag Info</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="flag-main">
        <div class="container">
            <h1 class="page-title">SQL Injection Flag Challenge</h1>
            <p class="page-subtitle">Find all hidden flags in the system</p>
            
            <div class="challenge-info">
                <div class="info-card">
                    <h3><i class="fas fa-bullseye"></i> Challenge Objectives</h3>
                    <ul class="objectives-list">
                        <li>Identify SQL injection vulnerabilities</li>
                        <li>Bypass authentication mechanisms</li>
                        <li>Extract database information</li>
                        <li>Find all hidden flags</li>
                    </ul>
                </div>
                
                <div class="info-card">
                    <h3><i class="fas fa-map"></i> Flag Locations</h3>
                    <div class="locations-grid">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-lock-open"></i>
                            </div>
                            <h4>Flag 1</h4>
                            <p>After bypassing staff login</p>
                            <span class="location-hint">Hint: Try SQL injection in login form</span>
                        </div>
                        
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <h4>Flag 2</h4>
                            <p>Hidden in database records</p>
                            <span class="location-hint">Hint: Use UNION injection on article.php</span>
                        </div>
                        
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <h4>Flag 3</h4>
                            <p>In page source or comments</p>
                            <span class="location-hint">Hint: Check hidden sections in articles</span>
                        </div>
                    </div>
                </div>
                
                <div class="info-card">
                    <h3><i class="fas fa-lightbulb"></i> Useful Payloads</h3>
                    <div class="payloads-list">
                        <div class="payload-item">
                            <h5>Authentication Bypass:</h5>
                            <code>adminflag' OR '1'='1</code>
                        </div>
                        <div class="payload-item">
                            <h5>Union Injection:</h5>
                            <code>1 UNION SELECT 1,username,password FROM user</code>
                        </div>
                        <div class="payload-item">
                            <h5>Error-Based:</h5>
                            <code>1 AND extractvalue(1, concat(0x7e, (SELECT database())))</code>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="cta-section">
                <h3>Ready to Start?</h3>
                <p>Begin your SQL injection journey with these starting points:</p>
                <div class="cta-buttons">
                    <a href="staff.php" class="btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Try Login Bypass
                    </a>
                    <a href="article.php?id=1" class="btn-secondary">
                        <i class="fas fa-search"></i> Test Article Page
                    </a>
                    <a href="index.php" class="btn-outline">
                        <i class="fas fa-book"></i> Read Documentation
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas fa-shield-alt"></i>
                    <span>SQLi</span>Challenge
                </div>
                <p class="footer-tagline">Learn. Practice. Secure.</p>
                <div class="footer-links">
                    <a href="privacy.php">Privacy Policy</a> | 
                    <a href="terms.php">Terms of Service</a> | 
                    <a href="contact.php">Contact</a>
                </div>
                <p class="copyright">&copy; 2023 TechNewsDaily Security Labs. For educational purposes only.</p>
            </div>
        </div>
    </footer>
</body>
</html>