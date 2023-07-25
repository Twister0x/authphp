<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <div id="logo">
            <h3>Company Name</h3>
        </div>
        <div id="links">
            <a href="../../../index.php">Home</a>
            <a href="../../../assets/pages/Shop/shop.php">Shop</a>
            <a href="">About</a>
            <a href="">FAQ</a>
        </div>
        <div id="search">
            <input type="search" name="" id="" placeholder="Enter Course Name...">
            <input class="searchBTN" type="submit" value="&#x27A4;">
        </div>
        <div id="user">
          <a  type="button" class="user btn btn-lg btn-primary js-modal" data-modal="#modal_1" href="#"><img src="../../../assets/pages/Head___Footer/images/user.png"></a>
        </div>
  
  <!-- /.wrap-center-middle -->

  <!-- /#modal_1 -->
    </nav>
  <div id="modal_1" class="modal-window">
    <div class="modal-window__title">
        <h3>Admin Login</h3>
        <form action="">
            <label for="username">Username
                <input type="text" name="" id="username">
            </label>
            <label for="password">Email
                <input type="password" name="" id="password">
            </label>
            <input type="submit" value="Log In!">
        </form>
      <a href="#" class="modal-close">Закрыть</a>
    </div>
  </div>
    <script src="../../../assets/pages/Head___Footer/js/modal.js"></script>

    <?php
    if(!isset($_SERVER['PHP_AUTH_USER'])){
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Text to send if user hits Cancel button";
        exit;
    }else{
        echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
        echo "<p>You Entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    }
    
    // log

    $con = mysqli_connect("localhost",'root','','std');

    if(mysqli_connect_errno()){
        echo "Failed to connect : " . mysqli_connect_error();
    }

    $email_i = $_POST['log_email'];
    $password_i = $_POST['log_pas'];

    $message = '0';
    $sql = "SELECT * from 'auth'";
    $run_user = mysqli_query($con,$sql);

    while($row_user = mysqli_fetch_array($run_user)){
        $pass = $row_user['apwd'];
        $user = $row_user['aname'];

        if($pass == $password_i && $user==$email_i ){
            $message = 'ok';
            break;
        }
    }
    echo $message;
    ?>
    <script>
        function log_in(){
            email=document.getElementById('username').value;
            pass = document.getElementById('password').value;

            $.ajax({
                url:'../../../assets/pages/Head__Footer/header.php',
                type:'POST',
                date:{
                    log_email:email,
                    log_pass:pass,
                },
                success:function(response){
                    if(response=='ok'){
                        window.location.href = "../../../assets/pages/Head__Footer/header.php";
                    }
                }
            })
        }
    </script>
</body>

</html>