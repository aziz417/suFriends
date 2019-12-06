<?php
include('conction.php');
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$conn = mysqli_connect('localhost', 'root','', 'friends');
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $getEmail = 0;
    $getPass = 0;
    while($row = $result->fetch_assoc()) {
        if($email == $row["email"] && $password == $row["password"]){
            $getEmail = $row['email'];
            $getPass = $row['password'];
            $getName = $row['name'];
            $getId = $row['id'];
        }
    }
    if($getEmail == $email && $getPass == $password){
        session_start();
        $_SESSION['login_user_email'] = $getEmail;
        $_SESSION['login_user_password'] = $getPass;
        $_SESSION['login_user_name'] = $getName;
        $_SESSION['login_user_id'] = $getId;

        header('Location:index.php');
    }else{
        if($getEmail == $email){
            echo "Email And Password Not Matching";
            echo "<a href='login.php'> Try Again</a><br>";

            echo "If you not register <br>";
            echo "<a href='reg.php'> Register Here</a>";
        }
    }

} else {
    echo "Email or Password Invalid, At first Sing-Up";
    echo "<a href='reg.php'>Sing-Up</a>";
}
?>
