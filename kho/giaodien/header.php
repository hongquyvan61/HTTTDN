

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="font-size: large;">
            <a class="navbar-brand" style="font-size: large; font-family: Times New Roman, Times, serif;"  href="index.php">Quản lí kho</a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
    
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="nhapkho.php">Nhập kho</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="xuatkho.php">Xuất kho</a>
    </li><!-- comment -->
    <li class="nav-item">
        <a class="nav-link" href="lichsu.php">Lịch sử</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="nhacungung.php">Nhà cung ứng</a>
    </li>
  </ul>
 <ul class="navbar-nav ml-auto">
    <?php if(!isset($_SESSION['id'])){?>
     <li class="nav-item"><a href="Dangnhap.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>

    <?php }
            else{
                ?>
                     <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Thoát</a></li>
     <?php
            }
?>
    </ul>
</nav>