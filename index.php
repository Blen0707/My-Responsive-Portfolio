<?php
include 'fetch_data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="styles.css">
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

        <!-- Home Section -->
        <section id="home" class="section home">
            <div>
                <h1>Hello,</h1>
                <h2>I’m Belen Abebe.</h2>
                <p>I am a Web Designer and a Web Developer</p>
                <button class="contact-button" onclick="window.location.href='admin/manage_contact.php'">Contact me</button>

            </div>
            <img src="assets/img2.jpg" alt="Belen Abebe">
        </section>

        <!-- About Section -->
        <section id="about" class="section about">
            <h2 class="section-title"><span class="highlight">About Me</span></h2>
            <div class="about-content">
                <img src="assets/img1.jpg" alt="About Image">
                <p><?php echo fetchAbout()['content']; ?></p>
            </div>
        </section>

        <!-- Experience Section -->
        <section id="experience" class="section experience">
            <h2 class="section-title"><span class="highlight">Experience</span></h2>
            <div class="experience-content">
                <?php
                $experience = fetchExperience();
                foreach ($experience as $exp) {
                    echo "<div><h3>{$exp['title']}</h3><p>{$exp['description']}</p></div>";
                }
                ?>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="section projects">
            <h2 class="section-title"><span class="highlight">My Projects</span></h2>
            <div class="project-list">
                <?php
                $projects = fetchProjects();
                foreach ($projects as $project) {
                    echo "<div>
                            <h3>{$project['title']}</h3>
                            <p>{$project['description']}</p>
                            <img src='{$project['image_url']}' alt='{$project['title']}'>
                          </div>";
                }
                ?>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section contact">
            <h2 class="section-title"><span class="highlight">Contact Me</span></h2>
            <ul>
                <?php
                $contacts = fetchContact();
                foreach ($contacts as $contact) {
                    echo "<li><a href='{$contact['link']}'>{$contact['platform']}</a></li>";
                }
                ?>
            </ul>
        </section>
        <p>Copyright 2024 Belen Abebe. All Rights Reserved.</p>
    </div>
    <script src="script.js"></script>
</body>
</html>
