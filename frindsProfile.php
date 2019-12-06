
<?php
include('conction.php');

session_start();
if(isset($_SESSION['login_user_email']) && isset($_SESSION['login_user_id'])){

}else{
    header('Location:login.php');
}
if(isset($_SESSION['login_user_id'])){
    $id = $_SESSION['login_user_id'];
}
?>

<html>
<head>
    <title>Friends</title>
    <link rel="stylesheet" href="assets/css/style1.css" />
</head>
<body>
<header id="header" class="reveal">
    <div class="logo"><a href="index.php"><img src="images/logo4.png" style="margin-top: 20px!important;: " width="300px" height="40px"></a></div>


    <nav style="float: right" id="menu">
        <ul class="links">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="https://github.com/aziz417">Abdul Aziz</a></li>
            <li><a href="index.php#allfriend">All Friends</a></li>
            <li><a href="https://www.facebook.com/SonargaonUniversityCSE/">Teachers</a></li>
            <li><a href="http://fictionsoft.com/">Fictionsoft</a></li>
            <li><a href="http://fictionsoft.com/">Contract</a></li>
            <?php

            if(isset($_SESSION['login_user_email'])){?>
                <li><a href="logout.php">Logout</a></li>
            <?php }else{?>
                <li><a href="login.php">Login</a></li>
            <?php }?>
        </ul>
    </nav>
    <br>
    <br>
    <br>

</header>
<section class="wrapper">
    <div class="inner">
        <header class="align-center">
            <h1 style="font-size: 30px">Profile</h1>
            <p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
        </header>
        <div class="flex flex-2">
            <div class="col col2">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM registration where id = $id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {?>
                        <h3 style="font-size: 20px"><b><?php echo $row['name'] ?></b></h3>
                        <br>
                        <p><?php echo $row['about'] ?></p>
                        <br><br>
                        <p>Etiam posuere hendrerit arcu, ac blandit nulla. Sed congue malesuada nibh, a varius odio vehicula aliquet. Aliquam consequat, nunc quis sollicitudin aliquet, enim magna cursus auctor lacinia nunc ex blandit augue. Ut vitae neque fermentum, luctus elit fermentum, porta augue. Nullam ultricies, turpis at fermentum iaculis, nunc justo dictum dui, non aliquet erat nibh non ex.</p>
                    <?php  }
                } else {
                    echo "0 results";
                }
                ?>

            </div>
            <div class="col col1 first">
                <div class="image round fit">
                    <?php
                    $sql = "SELECT * FROM registration where id = $id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {?>
                            <a class="link"><img style="width: 320px;height: 310px;" src="images/<?php echo $row['image'] ?>" width="150px" height="400px" alt=""></a>
                        <?php  }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <h2 style="font-size: 30px">Basic Information</h2>
        <br>
        <?php
        $sql = "SELECT * FROM registration where id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {?>
                <p><span class="fontBold">Name: </span><?php echo $row['name'] ?></p>
                <p><span class="fontBold">Mobile: </span><?php echo $row['phone'] ?></p>
                <p><span class="fontBold">Email: </span><?php echo $row['email'] ?></p>
                <p><span class="fontBold">Address: </span><?php echo $row['address'] ?></p>
                <p><span class="fontBold">Current Condition: </span><?php echo $row['status'] ?></p>
            <?php  }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</section>
<section class="wrapper style1" id="pid">
    <div class="inner">

        <br><br>
        <br><br>
        <header class="align-center">
            <h2 style="font-size: 30px">Gallery</h2>
            <p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
        </header>
        <div class="flex flex-3" style="width: 60%; margin: 0 auto" >
            <?php
            if(isset($_SESSION['login_user_id'])){
                $id = $_SESSION['login_user_id'];
            }
            $id = $_GET['id'];
            $sql = "SELECT * FROM profile where usId = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {?>
                    <div class="col align-center">
                        <div class="4u"><span class="image fit"><img height="160px" width="150px" src="images/<?php echo $row['image'] ?>" alt=""></span></div>
                        <p><?php echo $row['note'] ?></p>
                        <br>
                        <br>
                        <br>
                    </div>

                <?php  }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <h2 style="text-align: center; font-size: 30px">Footer</h2>
</footer>
<br>
<br>
<br>
</body>

