<?php
    include '../../connect.php';
    use App\Models\user;

    $id = $_GET['id'];
    $sql = user::where('id' , $id)->delete();
    header('Location: lietkesanpham.php?layout=danhsachsp');
?>