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
   
<!-- <?php echo $about['content']; ?> -->
    <div class="container">
        <h1>Manage About Section</h1>
        <form method="POST" action="manage_about.php">
            <textarea name="about" rows="10" cols="80"><?php echo $about['content']; ?></textarea><br>
            <button type="submit">Update About</button>
        </form>
    </div>
   
</body>
</html>
