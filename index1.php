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
      
        <header class="header">
            <div class="logo">
                <div class="logo-b" style=color:#e2672e;>Belen</div>
               
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
                    <li><a href="admin/manage_projects.php">Project</a></li>
                    <li><a href="admin/manage_contact.php">Contact</a></li>
                    <li><a href="form.php">register</a></li>
                    <li><a href="login.php">login</a></li>
                </ul>
            </nav>
        </header>

      
        <section id="home" class="section home" style="display: flex; justify-content: space-between; align-items: center; padding: 80px; background-color: #141212; color: white; min-height: 100vh; flex-wrap: wrap;">
            <div style="max-width: 500px;">
                 <h1 style="font-family: 'Croissant One', sans-serif; margin: 10px 0;font-size:70px; color:#e2672e;">Hello,</h1>
                <h2 style="font-family: 'Croissant One', sans-serif; margin: 10px 0;font-size:40px">I’m Belen Abebe.</h2>
                <p>I am a Web Designer and a Web Developer</p>
                <button class="contact-button" onclick="window.location.href='admin/manage_contact.php'">Contact me</button> 

            </div>
            <img src="20240908_101233.jpg" alt="Belen Abebe"style="width: 500px;; max-width: 90%; border-radius: 100px; box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.5); margin-top: 20px;">
        </section>
       
<section id="about" class="section about hidden" style="display: flex; justify-content: space-between; align-items: center; padding: 80px; background-color: #141212; color: white; min-height: 100vh; flex-wrap: wrap;">
    <img src="1733761570001.jpg" alt="About Image" style="width: 500px; max-width: 90%; border-radius: 900px; box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.5); margin-top: 20px;">
    <div style="max-width: 500px;">
        <h2 class="section-title" style=color:#e2672e;><span class="highlight">About Me</span></h2>
        <p><?php echo fetchAbout()['content']; ?></p>
    </div>
</section>

        

         

        <!-- Experience Section -->
        <section id="experience" class="section experience hidden;"  style="display: flex; justify-content: center; align-items: center; padding: 80px; background-color: #141212; color: white; min-height: 100vh; text-align: center;" >
           
            <div class="experience-content" style="max-width: 500px;" >
                 <h2 class="section-title"  style=color:#e2672e;><span class="highlight">Experience</span></h2>
                <?php
                $experience = fetchExperience();
                foreach ($experience as $exp) {
                    echo "<div><h3>{$exp['title']}</h3><p>{$exp['description']}</p></div>";
                }
                ?>
            </div>
        </section><br><br><br><br>

        <!-- Projects Section -->
        <section id="projects" class="section projects" >
            <h2 class="section-title"  style=color:#e2672e;><span class="highlight">My Projects</span></h2>
            <div class="project-list">
                <?php
                $projects = fetchProjects();
                foreach ($projects as $project) {
                    echo "<div style='margin-bottom: 200px;'>
                            <h3>{$project['title']}</h3>
                            <p>{$project['description']}</p>
                            <img src='{$project['image_url']}' alt='{$project['title']}'style='width: 400px; height: auto;>
                          </div>";
                }
                ?>
            </div>
        </section><br><br>

        <!-- Contact Section -->
        <section id="contact" class="section contact">
            <h2 class="section-title"><span class="highlight"  style=color:#e2672e;>Contact Me</span></h2>
            <ul>
                <?php
                $contacts = fetchContact();
                foreach ($contacts as $contact) {
                    echo "<li style='margin-bottom: 200px;'><a href='{$contact['link']}'>{$contact['platform']}</a></li>";
                }
                ?>
            </ul><br><br><br><br><br>
            <p   style=color:#e2672e;>Copyright copy& 2024 Belen Abebe. All Rights Reserved.</p>
        </section>
        
    </div>
    <script src="script.js"></script>
</body>
</html>
