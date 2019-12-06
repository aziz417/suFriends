
<?php
include('conction.php');
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    if(isset($_SESSION['login_user_id'])){
        $usId = $_SESSION['login_user_id'];
    }
    $note =  $_POST['note'];
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_nameCom = 'Fictionsoft'.rand().$file_name;
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $extensions= array("jpeg","jpg","png");
        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"images/".$file_nameCom);

        }else{
            print_r($errors);
        }
    }

    $sql = "SELECT * FROM profile where usId = $usId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $count = 0;
        while($row = $result->fetch_assoc()) {
            $count++;
        }

    } else {
        echo "0 results";
    }

    if($count <= 6){
        $sql = "INSERT INTO profile (note,image,usId)
                    VALUES ('$note','$file_nameCom','$usId')";

        if ($conn->query($sql) === TRUE) {
            header('Location:profile.php#pid');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }else{

        echo 'Sorry Bro only 6 images uploaded';
        echo "<a href='index.php'>Go Back</a><br>";
    }
}
?>
