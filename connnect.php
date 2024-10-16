<?php
$connect = mysqli_connect('localhost', 'root', '', 'db_giuaky');
if (mysqli_connect_errno() !== 0) {
    die("Lỗi: Không thể kết nối tời cơ sở dữ liệu 
" . mysqli_connect_error() . " ocurred.");
}
mysqli_set_charset($connect, 'utf8');
