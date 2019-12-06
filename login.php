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
                <h2 style="color:white">Login</h2>
            </div>
        </div>
    </div>
    <div class="container ">
        <form action="loginAction.php" method="POST">
            <div class="row">
                <div class="col"><label>Email</label><br><br>
                    <input type="email" value="az@gmail.com" name="email" placeholder="Email" required>
                    <label>Password</label><br><br>
                    <input type="password" name="password" placeholder="Password" required>
                    <br><br>
                    <br><br>
                    <input type="submit" style="width: 103%!important;" value="Login">
                </div>
            </div>
        </form>
    </div>

    <div class="bottom-container">
        <div class="row">
            <div class="col">
                <a href="reg.php" style="color:white" class="btn">Sign up</a>
            </div>
            <div class="col">
                <a href="#" style="color:white" class="btn">Forgot password?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

