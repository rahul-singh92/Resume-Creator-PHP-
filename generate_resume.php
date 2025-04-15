<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$summary = $_POST['summary'];
$degree = $_POST['degree'];
$university = $_POST['university'];
$year = $_POST['year'];
$skills = $_POST['skills'];
$projects = isset($_POST['projects']) ? $_POST['projects'] : [];
$certifications = isset($_POST['certifications']) ? $_POST['certifications'] : [];
$experiences = isset($_POST['experiences']) ? $_POST['experiences'] : [];
$layout = $_POST['layout'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generated Resume</title>
    <link rel="stylesheet" href="resume-style.css">
</head>
<body>
<div class="resume-container">

    <h1><?php echo htmlspecialchars($fullname); ?></h1>
    <hr>

    <?php if ($layout == "onepage"): ?>
        <div class="section">
            <h3>Contact</h3>
            Email: <?php echo htmlspecialchars($email); ?><br>
            Phone: <?php echo htmlspecialchars($phone); ?><br>
            Address: <?php echo htmlspecialchars($address); ?>
        </div>

        <?php if (!empty($summary)): ?>
        <div class="section">
            <h3>Summary</h3>
            <?php echo nl2br(htmlspecialchars($summary)); ?>
        </div>
        <?php endif; ?>

        <div class="section">
            <h3>Education</h3>
            <?php echo htmlspecialchars($degree); ?> from <?php echo htmlspecialchars($university); ?> (<?php echo htmlspecialchars($year); ?>)
        </div>

        <?php if (!empty($skills)): ?>
        <div class="section">
            <h3>Skills</h3>
            <ul>
                <?php
                    $skillList = explode(',', $skills);
                    foreach ($skillList as $skill) {
                        if (!empty(trim($skill))) { 
                            echo "<li>" . htmlspecialchars($skill) . "</li>";
                        }
                    }
                ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if (!empty($experiences) && array_filter($experiences, 'trim')): ?>
        <div class="section">
            <h3>Experience</h3>
            <ul>
                <?php foreach ($experiences as $exp) {
                    if (!empty(trim($exp))) { 
                        echo "<li>" . nl2br(htmlspecialchars($exp)) . "</li>";
                    }
                } ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if (!empty($projects) && array_filter($projects, 'trim')): ?>
        <div class="section">
            <h3>Projects</h3>
            <ul>
                <?php foreach ($projects as $project) {
                    if (!empty(trim($project))) { 
                        echo "<li>" . nl2br(htmlspecialchars($project)) . "</li>";
                    }
                } ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if (!empty($certifications) && array_filter($certifications, 'trim')): ?>
        <div class="section">
            <h3>Certifications</h3>
            <ul>
                <?php foreach ($certifications as $certification) {
                    if (!empty(trim($certification))) { 
                        echo "<li>" . nl2br(htmlspecialchars($certification)) . "</li>";
                    }
                } ?>
            </ul>
        </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="two-column">
            <div class="left">
                <h3>Contact</h3>
                <?php echo htmlspecialchars($email); ?><br>
                <?php echo htmlspecialchars($phone); ?><br>
                <?php echo htmlspecialchars($address); ?>
                <hr>

                <?php if (!empty($skills)): ?>
                <h3>Skills</h3>
                <ul>
                    <?php
                        $skillList = explode(',', $skills);
                        foreach ($skillList as $skill) {
                            if (!empty(trim($skill))) { 
                                echo "<li>" . htmlspecialchars($skill) . "</li>";
                            }
                        }
                    ?>
                </ul>
                <hr>
                <?php endif; ?>

                <?php if (!empty($certifications) && array_filter($certifications, 'trim')): ?>
                    <h3>Certifications</h3>
                    <ul>
                        <?php foreach ($certifications as $certification) {
                            if (!empty(trim($certification))) { 
                                echo "<li>" . nl2br(htmlspecialchars($certification)) . "</li>";
                            }
                        } ?>
                    </ul>
                    <hr>
                <?php endif; ?>
            </div>

            <div class="right">
                <?php if (!empty($summary)): ?>
                    <h3>Summary</h3>
                    <?php echo nl2br(htmlspecialchars($summary)); ?>
                    <hr>
                <?php endif; ?>

                <h3>Education</h3>
                <?php echo htmlspecialchars($degree); ?> from <?php echo htmlspecialchars($university); ?> (<?php echo htmlspecialchars($year); ?>)
                <hr>

                <?php if (!empty($experiences) && array_filter($experiences, 'trim')): ?>
                <h3>Experience</h3>
                <ul>
                    <?php foreach ($experiences as $exp) {
                        if (!empty(trim($exp))) { 
                            echo "<li>" . nl2br(htmlspecialchars($exp)) . "</li>";
                        }
                    } ?>
                </ul>
                <hr>
                <?php endif; ?>

                <?php if (!empty($projects) && array_filter($projects, 'trim')): ?>
                <h3>Projects</h3>
                <ul>
                    <?php foreach ($projects as $project) {
                        if (!empty(trim($project))) { 
                            echo "<li>" . nl2br(htmlspecialchars($project)) . "</li>";
                        }
                    } ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
