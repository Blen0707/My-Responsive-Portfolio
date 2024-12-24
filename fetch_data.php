<?php
include 'db.php';

function fetchProjects() {
    global $conn;
    $result = $conn->query("SELECT * FROM projects");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function fetchExperience() {
    global $conn;
    $result = $conn->query("SELECT * FROM experience");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function fetchAbout() {
    global $conn;
    $result = $conn->query("SELECT content FROM about LIMIT 1");
    return $result->fetch_assoc();
}

function fetchContact() {
    global $conn;
    $result = $conn->query("SELECT * FROM contact");
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
