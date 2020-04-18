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
    <link rel="stylesheet" href="../res/css/Home.css">
    <?php $loadingPositon = 'header'; include '../Common/CommonResources.php'; ?>

</head>
<body>
<div>
    <div>
        <?php
        include_once '../Model/User.php';
//        $userImage;
//        $firstName;
//        $lastName;
//        $faculty;
//        $degree;
//        if(isset($_SESSION["student_user"]) || $_SESSION["student_user"] != null){
//            $firstName = unserialize($_SESSION['student_user'])->getFname();
//            $lastName = unserialize($_SESSION['student_user'])->getLname();
//            $userImage = unserialize($_SESSION['student_user'])->getImage();
//            $faculty = unserialize($_SESSION['student_user'])->getFacName();
//            $degree = unserialize($_SESSION['student_user'])->getDegName();
//        }
//        echo '<img width="200px" src="data:image/jpg;base64,'.base64_encode(unserialize($_SESSION['student_user'])->getImage()).'" />';
//        echo  ("
//           <br>
//               <p>Name : ".$firstName." ".$lastName."</p><br>
//               <p>Degree Programme : ".$degree."</p><br>
//               <p>Faculty : ".$faculty."</p><br>
//           "
//        );
        ?>
        <div>
            <p>Personal Details</p><hr>

            <label>Profile Picture</label><br>
            <img width="200px" src="data:image/jpg;base64, <?php echo base64_encode(unserialize($_SESSION['student_user'])->getImage());?>" />
            <input type="file" id="logo" /><br>
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
            <input type="text" id="stuNumber" value="<?PHP echo unserialize($_SESSION['student_user'])->getGender(); ?>"><br>
            <button>Update</button>
            <br><br>
        </div>
        <div>
            <p>Educational Qualifications</p><hr>

            <label>Degree</label>
            <input type="text" id="degree" value="<?PHP echo unserialize($_SESSION['student_user'])->getDegName(); ?>"><br>
            <label>Faculty</label>
            <input type="text" id="faculty" value="<?PHP echo unserialize($_SESSION['student_user'])->getFacName(); ?>"><br>
            <br><br>
        </div>
        <div>
            <p>Academic Qualifications</p>
            <hr>
        </div>
        <div>
            <p>Proffessional Qualifications</p>
            <hr>
        </div>
        <div>
            <p>Soft Skills</p>
            <hr>
        </div>
    </div>
</div>
<?php $loadingPositon = 'footer'; include '../Common/CommonResources.php'; ?>
<script src="../res/js/Profile.js"></script>
</body>
</html>
