<?php
  
    session_start();
    if(isset($_SESSION['email'])){
        header('location: index.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../../css/css.css" type="text/css">
<link rel="stylesheet" href="../../css/csskho.css" type="text/css">

<title></title>
    </head>
    <body>
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
        <img src="../../img/usericon.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post"  action="../xuly/xulidangki.php">
      <input type="text" id="login" class="form-control fadeIn second" name="email" placeholder="Vui lòng điền email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
      <input type="password" id="password" class=" form-control fadeIn third" name="password" placeholder="Nhập password" required="true" pattern=".{6,}" style="
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.5s ease-in-out;">
      <input type="number" id="contact" class="fadeIn fourth" name="contact" placeholder="Nhập số điện thoại" style="
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.7s ease-in-out;">
      <input type="submit" name="submit" class="fadeIn fifth" value="Register">
       
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        <a class="underlineHover" href="Dangnhap.php">Login again?</a>
    </div>

  </div>
</div>
        <?php
        // put your code here
        ?>
    </body>
</html>
