<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resume Creator</title>
    <link rel="stylesheet" type="text/css" href="r_c.css">
    
    <script>
        function addProject() {
            var newProject = document.createElement("textarea");
            newProject.name = "projects[]";
            newProject.placeholder = "Mention your projects here";
            newProject.rows = 4;
            newProject.cols = 50;
            document.getElementById("projectsContainer").appendChild(newProject);
            document.getElementById("projectsContainer").appendChild(document.createElement("br"));
        }

        function addCertification() {
            var newCertification = document.createElement("textarea");
            newCertification.name = "certifications[]";
            newCertification.placeholder = "Mention certifications if any";
            newCertification.rows = 4;
            newCertification.cols = 50;
            document.getElementById("certificationsContainer").appendChild(newCertification);
            document.getElementById("certificationsContainer").appendChild(document.createElement("br"));
        }

        function addExperience() {
            var newExperience = document.createElement("textarea");
            newExperience.name = "experiences[]";
            newExperience.placeholder = "Mention your work experience";
            newExperience.rows = 4;
            newExperience.cols = 50;
            document.getElementById("experienceContainer").appendChild(newExperience);
            document.getElementById("experienceContainer").appendChild(document.createElement("br"));
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
        <form method="post" action="generate_resume.php">
            <h3>Personal Details</h3>
            Full Name: <input type="text" name="fullname" required><br><br>
            Email: <input type="email" name="email" required><br><br>
            Phone: <input type="text" name="phone" required><br><br>
            Address: <input type="text" name="address"><br><br>

            <h3>Summary</h3>
            <textarea name="summary" placeholder="Write a short professional summary" rows="4" cols="50"></textarea><br><br>

            <h3>Education</h3>
            Degree: <input type="text" name="degree" required><br><br>
            University: <input type="text" name="university" required><br><br>
            Year of Passing: <input type="text" name="year" required><br><br>

            <h3>Skills</h3>
            <textarea name="skills" placeholder="E.g., C, C++, JavaScript, Python" rows="4" cols="50"></textarea><br><br>

            <h3>Projects (Optional)</h3>
            <div id="projectsContainer">
                <textarea name="projects[]" placeholder="Mention your projects here" rows="4" cols="50"></textarea><br><br>
            </div>
            <button type="button" onclick="addProject()">Add another project</button><br><br>

            <h3>Certifications (Optional)</h3>
            <div id="certificationsContainer">
                <textarea name="certifications[]" placeholder="Mention certifications if any" rows="4" cols="50"></textarea><br><br>
            </div>
            <button type="button" onclick="addCertification()">Add another certification</button><br><br>

            <h3>Experience (Optional)</h3>
            <div id="experienceContainer">
                <textarea name="experiences[]" placeholder="Mention your work experience" rows="4" cols="50"></textarea><br><br>
            </div>
            <button type="button" onclick="addExperience()">Add another experience</button><br><br>

            <h3>Resume Format</h3>
            <input type="radio" name="layout" value="onepage" checked> One Page<br>
            <input type="radio" name="layout" value="twocol"> Two Column<br><br>

            <input type="submit" value="Generate Resume">
        </form>
    </div>
</body>
</html>
