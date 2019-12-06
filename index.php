<?php
    include('conction.php');
    session_start();
?>

<html>
<head>
    <title>Friends</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<header id="header" class="reveal">
    <div class="logo"><a href="index.php"><img src="images/logo4.png" style="margin-top: 20px!important;: " width="300px" height="40px"></a></div>
    <?php $name = $_SESSION['login_user_name']; ?>
    <div class="name"><a href="profile.php"><h2 style="color: #fff; margin-right: 90px" ><?php echo $name ?></h2></a></div>
</header>

<section id="banner">
    <div class="inner">
        <nav id="menu">
            <ul class="links">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="https://github.com/aziz417">Abdul Aziz</a></li>
                <li><a href="#allfriend">All Friends</a></li>
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


    </div>
</section>

<!-- Main -->
<div id="main">

    <!-- Section -->
    <?php
        $sql = "SELECT * FROM registration";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $i = 10;
            while($row = $result->fetch_assoc()) {
                $i++;
                if($i%2 == 1){?>
                    <section class="wrapper style1" id="allfriend">
                        <div class="inner">
                            <!-- 2 Columns -->
                            <div class="flex flex-2">
                                <div class="fsDDDDD">
                                    <div class="fsDDDDD1">
                                        <a href="https://www.facebook.com/Mehedimm" class="link"><img src="images/<?php echo $row['image']?>" width="200px" height="250px" alt="" /></a>
                                    </div>
                                </div>
                                <div class="col col2">
                                    <h3><?php echo $row['name'] ?></h3>
                                    <p><?php echo $row['about'] ?></p>
                                    <p>Sed congue malesuada nibh, a varius odio vehicula aliquet. Aliquam consequat, nunc quis sollicitudin aliquet, enim magna cursus auctor lacinia nunc ex blandit augue. Ut vitae neque fermentum, luctus elit fermentum, porta augue. Nullam ultricies, turpis at fermentum iaculis, nunc justo dictum dui, non aliquet erat nibh non ex.
                                    <a href="frindsProfile.php?id=<?php echo $row['id'];?>">More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
               <?php }else {
                    ?>
                    <section class="wrapper style2">
                        <div class="inner">
                            <div class="flex flex-2">
                                <div class="col col2">
                                    <h3><?php echo $row['name'] ?></h3>
                                    <p><?php echo $row['about'] ?> .</p>
                                    <p>Sed congue malesuada nibh, a varius odio vehicula aliquet. Aliquam consequat,
                                        nunc quis sollicitudin aliquet, enim magna cursus auctor lacinia nunc ex blandit
                                        augue. Ut vitae neque fermentum, luctus elit fermentum, porta augue. Nullam
                                        ultricies, turpis at fermentum iaculis, nunc justo dictum dui, non aliquet erat
                                        nibh non ex. <a href="frindsProfile.php?id=<?php echo $row['id'];?>">More</a></p>
                                </div>
                                <div class="fsDDDDD">
                                    <div class="fsDDDDD1">
                                        <a href="https://www.facebook.com/tanjila.tanha.3979" class="link"><img
                                            src="images/<?php echo $row['image'] ?>" width="200px"
                                            height="250px" alt=""/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }}
        } else {
            echo "0 results";
        }
    ?>
</div>

<!-- Footer -->
<footer id="footer">
    <h2 style="text-align: center; font-size: 30px">Footer</h2>
</footer>

</body>
</html>
