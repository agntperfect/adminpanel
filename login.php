<!-- 
    <?php 
    include 'PHP/function.inc.php';
    $message = '';
    $_SESSION['login_attempt'] = 0;
    if(isset($_POST['submit'])){
        unset($_POST['submit']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $email_search = "SELECT * FROM `admin_user` WHERE Email = '$email'";
        $query = mysqli_query($conn, $email_search);
        $email_count = mysqli_num_rows($query);
        if($email_count == 1){
                if($row = mysqli_fetch_assoc($query)) {
                    if ($row['Password'] == $pass) {
                        unset($row['Password']);
                        $message = 'Login Successful';
                        $_SESSION['name'] = $row['Username'];
                        $_SESSION['ID'] = $row['ID'];
                        $_SESSION['email'] = $row['Email'];
                        $_SESSION['user_mode'] = $row['user_mode'];
                        $_SESSION['admin'] = true;
                        // 4
                        header('location: index.php');
                } else {
                    $message = 'Invalid Password';
                    $_SESSION['login_attempt'] = $_SESSION['login_attempt'] + 1;
                }
            } else {
                $message = 'Invalid Password';
                $_SESSION['login_attempt'] =  $_SESSION['login_attempt'] + 1;
            }
        } else {
            $message = "Invalid Email";
            $_SESSION['login_attempt'] = $_SESSION['login_attempt'] + 1;
        }
    } 
    // if($_SESSION['login_attempt'] !== $_COOKIE['l_a']){
    //     $message = '';
    //     if(isset($_POST["submit"])){
    //         unset($_POST);
    //         // $_COOKIE['l_a'] = $_SESSION['login_attempt'];
    //         $_SESSION['login_attempt'] = $_COOKIE['l_a'];
    //     }
    // }
    // echo $_COOKIE['l_a']."<br>";
    // echo $_SESSION['login_attempt'];
    if(isset($_SESSION["ID"])){
        if($_SESSION['ID'] !== ''){
            header('location: index.php');
        }  
    }
?>-->
<!DOCTYPE html>
<html class="no-js" lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>K.A.B Store - Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        <meta name="description" content="K.A.B Store - Online Retail Shopping">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta name="keywords" content="HTML, CSS, Javascript">
        <link rel="preload" href="assets/js/script.js" as="script">
        <link rel="preload" href="assets/css/style.css" as="style">
        <link rel="preload" href="assets/css/responsive.css" as="style">
        <link rel="preload" href="assets/js/sw-app.js" as="script">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="./assets/js/sw-app.js"></script> 
        <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'"> -->
        <meta name="theme-color" content="#066ce0">
        <meta name="msapplication-TileColor" content="#066ce0">
        <meta name="msapplicatiom-navbutton-color" content="#066ce0">
        <meta name="apple-mobile-web-app-bar-style" content="#066ce0">
        <meta name="theme-color" meida="(prefers-color-scheme: light)" content="white">
        <meta name="theme-color" media="(prefers-color-scheme: dark" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
   </head>
   <body class="bg">
        <div class="container">
           <!--Data or Content-->
           <div class="box-1">
               <div class="content-holder">
                   <h2>Hello!</h2>
                   <p>K.A.B Store 
                       <br>Adminpanel
                       <br><span>Log In</span></p>
                    </div>
                </div>
                <!--Forms-->
            <div class="box-2 login-active">
                <div class="alert alert-red"></div>
                <div class="login-form-container login">
                    <form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="post">
                        <h1>Login</h1>
                        <input type="email" name="email" placeholder="Email" class="input-field">
                        <br><br>
                        <input type="password" name="password" placeholder="Password" class="input-field">
                        <br><br>
                        <button class="login-button" name="submit" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
      <script nonce="script" src="assets/js/script.js"></script>
      <script>
            window.onload = ()=>{
                var $value = '<?=$message?>';
                checking_php($value);
            }
        </script>
   </body>
</html>
