<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $image_url = $conn->real_escape_string($_POST['image_url']);
    $conn->query("INSERT INTO projects (title, description, image_url) VALUES ('$title', '$description', '$image_url')");
    echo "Project added successfully.";
}
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM projects WHERE id = $id");
    echo "Project deleted successfully.";
}
$projects = $conn->query("SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
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
        <h1>Manage Projects</h1>
        <form method="POST" action="manage_projects.php">
            <input type="text" name="title" placeholder="Project Title" required><br>
            <textarea name="description" placeholder="Project Description" required></textarea><br>
            <input type="text" name="image_url" placeholder="Image URL" required><br>
            <button type="submit">Add Project</button>
        </form>
        <h2>Existing Projects</h2>
        <ul>
            <?php while ($row = $projects->fetch_assoc()): ?>
                <li>
                    <strong><?php echo $row['title']; ?></strong>: <?php echo $row['description']; ?><br>
                    <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>" width="100"><br>
                    <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
