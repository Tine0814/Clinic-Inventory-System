<?php


    require_once 'connection.php';

    $id = 0;
    $update = false;
    $name = '';
    $section = '';
    $reason = '';
    $actionTaken = '';


    /*========================FOR FORM INPUT===========*/


    
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $section = $_POST['section'];
        $reason = $_POST['reason'];
        $actionTaken = $_POST['actionTaken'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        $mysqli->query("INSERT INTO student_log (name, section, reason, action_taken, time, date, year, month) VALUES('$name', '$section', '$reason', '$actionTaken','$time', '$date', '$year','$month')") or die($mysqli->error);

        header("location: ../studentRecords");
    }


    
    /*=====================FOR DELETE=============*/
    
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM student_log WHERE id=$id") or die($mysqli->error);
        
        header("location: ../studentRecords");
    }
    
    /*=====================FOR EDIT=============*/
    
    if(isset($_GET['edit'])){
        $id =$_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM student_log WHERE id=$id") or die($mysqli->error);
        
        $row = $result->fetch_array();
        $name = $row['name'];
        $section = $row['section'];
        $date = $row['date'];
        $reason = $row['reason'];
        $timeIn = $row['time'];
        $timeOut = $row['time_out'];
        $actionTaken = $row['action_taken'];
        
        // if(count($result)==1){
        //     $row = $result->fetch_array();
        //     $name = $row['name'];
        //     $section = $row['section'];
        //     $reason = $row['reason'];
        // }
    }

    /*=====================FOR UPDATE=============*/

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $section = $_POST['section'];
        $reason = $_POST['reason'];
        $actionTaken = $_POST['actionTaken'];

        $mysqli->query("UPDATE student_log SET name='$name', section='$section', reason='$reason', action_taken='$actionTaken' WHERE id = $id")or die($mysqli->error);

        header("location: ../studentRecords");

    }

    if(isset($_POST['timeUpdate'])){
        $id = $_POST['id'];
        $timeOut = $_POST['timeOut'];

        $mysqli->query("UPDATE student_log SET time_out='$timeOut' WHERE id = $id")or die($mysqli->error);


    }

    /*=====================FOR search=============*/
    $error_message = '';
    $stud_id = ' ';
    
    if(isset($_GET['stud_id'])){
        $stud_id =$_GET['stud_id'];
        $result = $mysqli->query("SELECT * FROM health_records WHERE id_number =$stud_id") or die($mysqli->error);
        
        
        if(mysqli_num_rows($result) > 0){
            $row = $result->fetch_array();
            $midName = $row['middle_name'];

            $stud_id = $row['id_number'];
            $section = $row['section'];

            
            if(empty($midName)){
                
                $name = array($row['first_name'], $row['last_name']);
                $full_name = $name[0].' '.$name[1];
                $_SESSION['full_name'] = $full_name;
            }
            else{
                $name = array($row['first_name'], $midName[0],'. ', $row['last_name']);
                $full_name = $name[0].' '. $name[1].''. $name[2].''. $name[3];
                $_SESSION['full_name'] = $full_name;
            }
        }
        else{
            $error_message = 'Warning! No data Found';
            $full_name = '';
            $_SESSION['full_name'] = $full_name;
        }
    }


?>