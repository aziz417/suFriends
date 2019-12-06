<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<br>
<div class="fsContainer">
    <div class="bottom-container">
        <div class="row">
            <div class="col">
                <h2 style="color:white">Registration</h2>
            </div>
        </div>
    </div>
    <div class="container ">
        <form action="registrationAction.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name" ><br><br>
                    <label>Email</label>
                    <input type="email" name="email" value="az@gmail.com" placeholder="Email" ><br><br>
                    <label>Phone</label>
                    <input type="text" name="phone" placeholder="Phone" ><br><br>
                    <label>Current Condition</label>
                    <input type="text" name="status" placeholder="Current Condition" ><br><br>
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" ><br><br>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" ><br><br>
                    <label>Profile Image</label>
                    <input type="file" name="image" placeholder="Profile Photo" ><br><br>
                    <label>About Your Self</label><br>
                    <textarea style="width: 80%; height: 50px" name="about" placeholder="About Your Self" ></textarea><br><br>
                    <br><br>
                    <br><br>
                    <input type="submit" style="width: 103%!important;" value="Registration">
                </div>
            </div>
        </form>
    </div>
    <div class="bottom-container">
        <div class="row">
            <div class="col">
                <a href="http://fictionsoft.com/" style="color:#EDB73C" class="btn">Fictionsoft</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
