<?php
session_start();
if (!isset($_SESSION["current_user"]) || $_SESSION["current_user"] == null) {
    header("Location: ./Login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CGU - Home</title>
    <meta name="description" content="Career Guidance Unit - System">
    <meta name="author" content="CGU-UOK">
    <link rel="stylesheet" href="../res/css/editProfile.css">
    <?php $loadingPositon = 'header'; include '../Common/CommonResources.php'; ?>

</head>
<body>

<div class="container bootstrap snippets">
    <div class="row decor-default contacts-labels card bg-light mb-3  card-user">
        <?php
        include_once '../Model/User.php';
        ?>
        <div>
            <h4 class="card-header h5">Personal Details</h4>
            <div class="card-body">
                <label>Profile Picture</label><br>
                <img width="200px" src="data:image/jpg;base64, <?php echo base64_encode(unserialize($_SESSION['student_user'])->getImage());?>" /><br>
<!--                <input type="file" id="logo" /><br>-->
                <label>Student Number</label>
                <input type="text" id="stuNumber" value="<?PHP echo unserialize($_SESSION['student_user'])->getUser_id(); ?>"><br>
                <label>First Name</label>
                <input type="text" id="fName" value="<?PHP echo unserialize($_SESSION['student_user'])->getFname(); ?>"><br>
                <label>Last Name</label>
                <input type="text" id="lName" value="<?PHP echo unserialize($_SESSION['student_user'])->getLname(); ?>"><br>
                <label>Email</label>
                <input type="text" id="email" value="<?PHP echo unserialize($_SESSION['student_user'])->getEmail(); ?>"><br>
                <label>Date of Birth</label>
                <input type="date" id="dob" value="<?PHP echo unserialize($_SESSION['student_user'])->getDob(); ?>"><br>
                <label>Mobile</label>
                <input type="tel" id="mobile" value="<?PHP echo unserialize($_SESSION['student_user'])->getTpnumber(); ?>"><br>
                <label>Gender</label>
                <input type="text" id="gender" value="<?PHP echo unserialize($_SESSION['student_user'])->getGender(); ?>"><br>
                <button id="btnPersonal">Update</button>
                <br><br>
<!--                <p>Educational Qualifications</p><hr>-->
<!---->
<!--                <label>Degree</label>-->
<!--                <input type="text" readonly="readonly" id="degree" size="70" value="--><?PHP //echo unserialize($_SESSION['student_user'])->getDegName(); ?><!--"><br>-->
<!--                <label>Faculty</label>-->
<!--                <input type="text" readonly="readonly" id="faculty" value="--><?PHP //echo unserialize($_SESSION['student_user'])->getFacName(); ?><!--"><br>-->
<!--                <button id="btnEducational">Update</button>-->
            </div>
        </div>
    </div>
    <div class="row decor-default contacts-labels card bg-light mb-3  card-user">
        <h4 class="card-header h5">Academic Qualifications</h4>
        <div id="outputAcademic" class="card-body"></div>
        <button id="btnAcademic">Update</button>
    </div>
    <div class="row decor-default contacts-labels card bg-light mb-3  card-user">
        <h4 class="card-header h5">Proffessional Qualifications</h4>
        <div id="outputProfessional" class="card-body"></div>
        <button id="btnProffessional">Update</button>
    </div>
    <div class="row decor-default contacts-labels card bg-light mb-3  card-user">
        <h4 class="card-header h5">Soft Skills</h4>
        <div id="softSkills" class="card-body"></div>
        <button id="btnSoft">Update</button>
    </div>

</div>

<?php $loadingPositon = 'footer'; include '../Common/CommonResources.php'; ?>
<script src="../res/js/EditProfile.js"></script>

<?php
    $id = unserialize($_SESSION['current_user'])->getUser_id();
    echo "
     <script src='../res/js/CommonResources.js'></script>
    <script>
                $( document ).ready(function(){
                 showUnreadCount('".$id."');
                });
            </script>";

?>

</body>
</html>

