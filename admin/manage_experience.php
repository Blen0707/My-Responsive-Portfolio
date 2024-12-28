<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $conn->query("INSERT INTO experience (title, description) VALUES ('$title', '$description')");
    echo "Experience added successfully.";
}
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM experience WHERE id = $id");
    echo "Experience deleted successfully.";
}
$experience = $conn->query("SELECT * FROM experience");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Experience</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <!-- Header
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
        </header> -->
        <h1>Manage Experience</h1>
        <form method="POST">
            <input type="text" name="title" placeholder="Experience Title" required><br>
            <textarea name="description" placeholder="Experience Description" required></textarea><br>
            <button type="submit">Add Experience</button>
        </form>
        <h2>Existing Experience</h2>
        <ul>
            <?php while ($row = $experience->fetch_assoc()): ?>
                <li>
                    <strong><?php echo $row['title']; ?></strong>: <?php echo $row['description']; ?><br>
                    <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    
</body>
</html>
