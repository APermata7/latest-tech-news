<?php
include 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$single_article = false;
$show_warning = false;

if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM article WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $articles = $result->fetch_all(MYSQLI_ASSOC);
            $single_article = true;
        }
        $stmt->close();
    }
}

if (!$single_article) {
    $query = "SELECT * FROM article ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $articles = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $articles = [];
    }
}

if (isset($_GET['test']) && $_GET['test'] == 'legacy' && isset($_GET['id'])) {
    $legacy_id = $_GET['id'];
    $legacy_query = "SELECT * FROM article WHERE id = $legacy_id";
    $result = mysqli_query($conn, $legacy_query);
    if ($result) {
        $articles = $result->fetch_all(MYSQLI_ASSOC);
        $single_article = true;
        $show_warning = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $single_article ? 'Article - ' : ''; ?>TechNews Daily</title>
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
                        <i class="fas fa-newspaper"></i>
                        <span>TechNews</span>Daily
                    </div>
                    <ul class="nav-menu">
                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="article.php" class="active"><i class="fas fa-newspaper"></i> Articles</a></li>
                        <li><a href="staff.php"><i class="fas fa-user-shield"></i> Staff Area</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container article-main">
        <h1 class="page-title"><?php echo $single_article ? 'Article Details' : 'Latest Tech Articles'; ?></h1>
        <p class="page-subtitle"><?php echo $single_article ? 'In-depth technology analysis' : 'Browse our collection of tech articles'; ?></p>
        
        <?php if($show_warning): ?>
        <div class="security-warning">
            <h4><i class="fas fa-exclamation-triangle"></i> Security Warning</h4>
            <p>You are viewing the legacy version with known vulnerabilities.</p>
        </div>
        <?php endif; ?>
        
        <?php if($single_article && !empty($articles)): ?>
            <div class="article-full">
                <?php foreach($articles as $row): ?>
                    <div class="article-meta">
                        <span><i class="far fa-calendar"></i> Published recently</span>
                        <span><i class="fas fa-tag"></i> Technology</span>
                    </div>
                    
                    <h2 class="article-title-single"><?php echo htmlspecialchars($row['title']); ?></h2>
                    
                    <div class="article-content">
                        <?php echo nl2br(htmlspecialchars($row['text'])); ?>
                    </div>
                <?php endforeach; ?>
                
                <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee;">
                    <a href="article.php" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to All Articles
                    </a>
                </div>
            </div>
            
        <?php else: ?>
            <?php if(!empty($articles)): ?>
                <div class="articles-grid">
                    <?php foreach($articles as $row): ?>
                        <div class="article-card">
                            <div class="article-category">Tech News</div>
                            <h3 class="article-title">
                                <a href="article.php?id=<?php echo $row['id']; ?>" style="color: inherit; text-decoration: none;">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </a>
                            </h3>
                            <p class="article-preview">
                                <?php echo htmlspecialchars(substr($row['text'], 0, 150)); ?>...
                            </p>
                            <a href="article.php?id=<?php echo $row['id']; ?>" class="btn-readmore">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 60px 20px;">
                    <i class="fas fa-newspaper" style="font-size: 60px; color: #ddd; margin-bottom: 20px;"></i>
                    <h3 style="color: #666;">No Articles Found</h3>
                    <p>Check back later for new content.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>

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
                <p class="copyright">&copy; 2023 TechNewsDaily. Educational SQL Injection Challenge.</p>
                <div class="footer-note">
                    <i class="fas fa-exclamation-triangle"></i> 
                    This website contains intentional vulnerabilities for educational purposes only.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>