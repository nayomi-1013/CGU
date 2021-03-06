<?php include_once '../Controller/UserController.php'; loadData();?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CGU - Profile</title>
        <meta name="description" content="Career Guidance Unit - System">
        <meta name="author" content="CGU-UOK">
        <link rel="stylesheet" href="../res/css/Profile.css">
        <?php $loadingPositon = 'header'; include '../Common/CommonResources.php'; ?>
        <script src="../res/js/Profile.js"></script>
    </head>

    <body>
        <link rel="stylesheet" href="../res/css/staffProfile.css">
        <script src="../res/js/staffHome.js"></script>
        <div class="container bootstrap snippets">
        <div class="row decor-default">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div id="leftCol" class="contacts-labels">
                    <br>
                    <h4><?php echo unserialize($_SESSION['current_user'])->getFname()." ".unserialize($_SESSION['current_user']    )->getLname() ?></h4>
                    <br>
                    <div class="pro_pic_frame" >
                        <?php echo '<img class="pro_pic" src="data:image/jpg;base64,'.base64_encode(unserialize($_SESSION['current_user'])->getImage()).'" />'; ?>
                    </div>

                    <div id="home_profile_summary">
                        <br>
                        <h5  style = "text-transform:capitalize;"><?php echo unserialize($_SESSION['current_user'])->getCguPosition()?> <span style = "text-transform:none;">at</span> CGU</h5>
                        <h6><?php echo unserialize($_SESSION['current_user'])->getAcademicPosition()?></h6>
                        <p style="margin-top: -10px"><?php echo unserialize($_SESSION['current_user'])->getFacName()?></p>
                        <br>
                        <p style="margin-top: -10px">Phone: <?php echo unserialize($_SESSION['current_user'])->getTpnumber()?></p>
                        <p style="margin-top: -10px">E-mail: <?php echo unserialize($_SESSION['current_user'])->getEmail()?></p>
                        <br>
                        <div>
                            <button id="editProfileBtn" class="btn btn-default editProfileBtn">Edit profile</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="contacts-list">
                    <div>
                        <form class="ac-custom ac-checkbox ac-checkmark" autocomplete="off"></form>
                            <div class="allUnits">
                                <br>
                                   <div><span style="color:#868686">Service period:&nbsp&nbsp</span><?php echo unserialize($_SESSION['current_user'])->getExperience()?> </div>
                                <hr>
                                    <div><span style="color:#868686">Academic Qualifications:&nbsp&nbsp</span><?php
                                        foreach (unserialize($_SESSION['current_user'])->getAcademic_q_array() as $i){
                                            echo "<p>".$i["aq_title"]." - ".$i["aq_institute"]."</p>";
                                        }
                                        ?>
                                    </div>
                                <hr>
                                    <div><span style="color:#868686">Professional Qualifications:&nbsp&nbsp</span>

                                     <?php
                                     foreach (unserialize($_SESSION['current_user'])->getProf_q_array() as $i){
                                         echo "<p>".$i["pq_title"]." - ".$i["pq_institute"]."</p>";
                                     }

                                     ?>

                                     </div>
                                <hr>
                                    <div><span style="color:#868686">Specialized Areas:&nbsp&nbsp</span><?php echo unserialize($_SESSION['current_user'])->getSpecialized_area()?> </div>
                                <hr>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 stu_no">
                        <img src="../res/img/students_icon.png" width="150px">
                        <h2>Number of Students</h2>
                        <h6>Allocated by CGU</h6>

                    </div>
                    <div class="col-md-3 stu_no_count">
                        <h1><?php echo studentCount()?></h1>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="../res/js/StaffProfile.js"></script>
<?php
    $id = unserialize($_SESSION['current_user'])->getUser_id();
    echo "
     <script src='../res/js/CommonResources.js'></script>
    <script>
                $( document ).ready(function(){
                 showUnreadCount('".$id."');
                });
            </script>";

    function studentCount(){
        $con = DbCon::connection();
        $sql = "SELECT COUNT(stu_id) as c FROM student_counselor WHERE staff_id = '".unserialize($_SESSION['current_user'])->getUser_id()."'";

        $res = $con->query($sql);

        $conn = null; //closing connection

        $aQArray = array();

        if ($res) {
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    return $row["c"];
            }
        }
    }
?>
</body>

</html>
