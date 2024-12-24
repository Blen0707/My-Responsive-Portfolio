<?php include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aboutContent = $conn->real_escape_string($_POST['about']);
    $conn->query("UPDATE about SET content = '$aboutContent' WHERE id = 1");
    echo "About section updated successfully.";
}
$about = $conn->query("SELECT * FROM about LIMIT 1")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage About</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
            <div class="logo">
                <div class="logo-b">B</div>
                <div class="logo-elen">elen</div>
            </div>
            <nav class="nav">
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="nav-links" id="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="manage_about.php">About</a></li>
                    <li><a href="admin/manage_experience.php">Experience</a></li>
                    <li><a href="admin/manage_project.php">Project</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </header>
<!-- <?php echo $about['content']; ?> -->
    <div class="container">
        <h1>Manage About Section</h1>
        <form method="POST" action="manage_about.php">
            <textarea name="about" rows="10" cols="80"><?php echo $about['content']; ?></textarea><br>
            <button type="submit">Update About</button>
        </form>
    </div>
    <p>Copyright 2024 Belen Abebe. All Rights Reserved.</p>
</body>
</html>
