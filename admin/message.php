<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thư Viện</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">Thư Viện </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Hồ Sơ</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Đăng Xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Trang Chủ
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Tin Nhắn</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Quản Lý Sinh Viên </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>Tất Cả Sách </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Thêm Sách </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Yêu Cầu Mượn/Trả</a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Giới Thiệu Sách</a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Sách Hiện Đã Trả</a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Đăng Xuất </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->

                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Gửi Tin Nhắn</h3>
                            </div>
                            <div class="module-body">

                                    <br >

                                    <form class="form-horizontal row-fluid" action="message.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Rollno"><b>Tên Người Dùng:</b></label>
                                            <div class="controls">
                                                <input type="text" id="RollNo" name="RollNo" placeholder="Tên Người Dùng" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Message"><b>Nội Dung:</b></label>
                                            <div class="controls">
                                                <input type="text" id="Message" name="Message" placeholder="Enter Message" class="span8" required>
                                            </div>
                                            <hr>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Gửi Tin Nhắn</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2021 Hệ Thống Quản Lý Thư Viện </b>Đã đăng ký Bản quyền.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
if(isset($_POST['submit']))
{
    $rollno=$_POST['RollNo'];
    $message=$_POST['Message'];

$sql1="insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno','$message',curdate(),curtime())";

if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?>
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>