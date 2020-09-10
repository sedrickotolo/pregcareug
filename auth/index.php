<?php
if (isset($_POST["submit"])) {
    include_once 'DBConnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $database = new dbConnect();
    
    $db = $database->openConnection();
    $sql1 = "select name, email from tbl_registered_users where email='$email'";
    
    $user = $db->query($sql1);
    $result = $user->fetchAll();
   // $_SESSION['emailname'] = $result[0]['email'];
    
    if (empty($result)) {
        $sql = "insert into tbl_registered_users (name,email, password) values('$name','$email','$password')";
        
        $db->exec($sql);
        
        $database->closeConnection();
        $response = array(
            "type" => "success",
            "message" => "You have registered successfully.<br/><a href='login.php'>Now Login</a>."
        );
    } else {
        $response = array(
            "type" => "error",
            "message" => "Email already in use."
        );
    }
}
?>
<!DOCTYPE html>
<html>
<head>


<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="dist/js/email_validations.js"></script>

</head>
<body>

<div class="pic">
    
	<img src="docs/assets/img/pregcare-text-logo.png">


</div>
    <div class="demo-content">
        <?php
        if (! empty($response)) {
            ?>
        <div id="response" class="<?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
        <?php
        }
        ?>
        <form action="" method="POST" class="createUser"
            onsubmit="return signupvalidation()">
            <div class="row">
                <label>Name</label><span id="name_error"></span>
                <div>
                    <input type="text" class="form-control" name="name"
                        id="name" placeholder="Enter your name">

                </div>
            </div>

            <div class="row">
                <label>Email</label><span id="email_error"></span>
                <div>
                    <input type="text" name="email" id="email"
                        class="form-control"
                        placeholder="Enter your Email ID">

                </div>
            </div>

            <div class="row">
                <label>Password</label><span id="password_error"></span>
                <div>
                    <input type="Password" name="password" id="password"
                        class="form-control"
                        placeholder="Enter your password">

                </div>
            </div>

            <div class="row">
                <label>Confirm Password</label><span
                    id="confirm_password_error"></span>
                <div>
                    <input type="password" name="confirm_pasword"
                        id="confirm_pasword" class="form-control"
                        placeholder="Re-enter your password">

                </div>
            </div>


            <div class="row">
                <div align="center">
                    <button type="submit" name="submit"
                        class="btn signup">Sign Up</button>
                </div>
            </div>

            <div class="row">
                <div>
                    <a href="login.php"><button type="button" name="submit"
                        class="btn login">Login</button></a>
                </div>
            </div>
    
    </div>



    </form>
    </div>
</body>
</html>