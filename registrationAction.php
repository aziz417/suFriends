<?php
include('conction.php');
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $status =  $_POST['status'];
    $address =  $_POST['address'];
    $password =  $_POST['password'];
    $about =  $_POST['about'];
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
    $checkEmail = 'NULL';
    $sql = "SELECT * FROM registration";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {

        if( $email == $row['email']){
            $checkEmail =  $row['email'];
        }
    }

    if($checkEmail == $_POST['email']){

        echo "This email already exist ".$email;
        echo "<a href='reg.php'>Try again!</a>";
    }else{
        $sql = "INSERT INTO registration (name, email, phone, address, password, image,about,status)
        VALUES ('$name', '$email', '$phone','$address','$password','$file_nameCom','$about','$status')";

    }
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['login_user_email'] = $email;
        $_SESSION['login_user_password'] = $password;
        $_SESSION['login_user_name'] = $name;
        //$_SESSION['login_user_id'] = $getId;
        header('Location:index.php');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
