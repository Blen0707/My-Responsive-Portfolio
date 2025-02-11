<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $platform = $conn->real_escape_string($_POST['platform']);
    $link = $conn->real_escape_string($_POST['link']);
    $conn->query("INSERT INTO contact (platform, link) VALUES ('$platform', '$link')");
    echo "Contact added successfully.";
}
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM contact WHERE id = $id");
    echo "Contact deleted successfully.";
}
$contacts = $conn->query("SELECT * FROM contact");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contact</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        
        <h1>Manage Contact Section</h1>
        <form method="POST">
            <input type="text" name="platform" placeholder="Platform (e.g., LinkedIn)" required><br>
            <input type="text" name="link" placeholder="Link (e.g., https://linkedin.com/in/username)" required><br>
            <button type="submit">Add Contact</button>
        </form>
        <h2>Existing Contacts</h2>
        <ul>
            <?php while ($row = $contacts->fetch_assoc()): ?>
                <li>
                    <?php echo $row['platform']; ?>: <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a>
                    <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    
</body>
</html>
