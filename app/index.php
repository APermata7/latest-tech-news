<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechNews Daily - Latest Technology Updates</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Slab:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="main-header">
        <div class="header-overlay">
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <i class="fas fa-newspaper"></i>
                        <span>TechNews</span>Daily
                    </div>
                    <ul class="nav-menu">
                        <li><a href="index.php" class="active"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="article.php"><i class="fas fa-newspaper"></i> Articles</a></li>
                        <li><a href="staff.php"><i class="fas fa-user-shield"></i> Staff Area</a></li>
                    </ul>
                </nav>
                
                <div class="hero-section">
                    <div class="hero-content">
                        <h1 class="hero-title">Latest <span class="highlight">Technology</span> News</h1>
                        <p class="hero-subtitle">Your trusted source for daily updates on cybersecurity, AI innovations, and tech breakthroughs</p>
                        <a href="article.php" class="btn-primary">
                            <i class="fas fa-arrow-right"></i> Explore Articles
                        </a>
                    </div>
                    <div class="hero-image">
                        <div style="background: #2c3e50; padding: 20px; border-radius: 10px; color: white; text-align: center;">
                            <i class="fas fa-bolt" style="font-size: 60px; margin-bottom: 15px;"></i>
                            <h3>Breaking News</h3>
                            <p>SQL Injection Challenge Live!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Why Trust Our Platform</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Security Focused</h3>
                    <p>We prioritize cybersecurity news and best practices to keep you informed about digital threats.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Real-time Updates</h3>
                    <p>Get the latest tech news as it happens with our continuously updated news feed.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Expert Analysis</h3>
                    <p>Our team of tech experts provide in-depth analysis of emerging technologies.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Articles Preview -->
    <section class="articles-preview">
        <div class="container">
            <h2 class="section-title">Recent <span class="highlight">Articles</span></h2>
            <div class="articles-grid">
                <?php
                $query = "SELECT id, title, SUBSTRING(text, 1, 150) as preview FROM article ORDER BY id DESC LIMIT 3";
                $result = mysqli_query($conn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="article-card">';
                        echo '<div class="article-category">Cybersecurity</div>';
                        echo '<h3 class="article-title">' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p class="article-preview">' . htmlspecialchars($row['preview']) . '...</p>';
                        echo '<a href="article.php?id=' . $row['id'] . '" class="btn-readmore">Read More <i class="fas fa-arrow-right"></i></a>';
                        echo '</div>';
                    }
                } else {
                    echo '<div style="grid-column: 1/-1; text-align: center; padding: 40px;">';
                    echo '<i class="fas fa-newspaper" style="font-size: 48px; color: #ddd; margin-bottom: 15px;"></i>';
                    echo '<p>No articles available yet.</p>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="text-center">
                <a href="article.php" class="btn-secondary">View All Articles <i class="fas fa-newspaper"></i></a>
            </div>
        </div>
    </section>

    <!-- SQL Injection Challenge Section -->
    <section style="background: linear-gradient(135deg, #1a237e 0%, #283593 100%); color: white; padding: 80px 0;">
        <div class="container">
            <h2 style="text-align: center; font-family: 'Roboto Slab', serif; font-size: 36px; margin-bottom: 20px;">
                <i class="fas fa-shield-alt"></i> SQL Injection Challenge
            </h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 40px; font-size: 18px;">
                Test your cybersecurity skills with our interactive SQL injection challenge. Find all hidden flags!
            </p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 40px;">
                <div style="background: rgba(255,255,255,0.1); padding: 25px; border-radius: 10px; text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">🚩</div>
                    <h3>3 Flags Hidden</h3>
                    <p>Find flags in articles, login bypass, and database</p>
                </div>
                
                <div style="background: rgba(255,255,255,0.1); padding: 25px; border-radius: 10px; text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">🔐</div>
                    <h3>Login Bypass</h3>
                    <p>Bypass the staff login with SQL injection</p>
                </div>
                
                <div style="background: rgba(255,255,255,0.1); padding: 25px; border-radius: 10px; text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">💾</div>
                    <h3>Database Extraction</h3>
                    <p>Extract data using UNION injection</p>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 50px;">
                <a href="staff.php" class="btn-primary" style="background: white; color: #1a237e;">
                    <i class="fas fa-user-shield"></i> Start Challenge
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas fa-newspaper"></i>
                    <span>TechNews</span>Daily
                </div>
                <p class="footer-tagline">Stay informed. Stay secure. Stay ahead.</p>
                <div class="footer-links">
                    <a href="index.php">Home</a> | 
                    <a href="article.php">Articles</a> | 
                    <a href="staff.php">Staff Area</a>
                </div>
                <p class="copyright">&copy; 2023 TechNewsDaily. All rights reserved.</p>
                <div class="footer-note">
                    <i class="fas fa-exclamation-triangle"></i> 
                    This website is for educational purposes only. Practice responsible disclosure.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>