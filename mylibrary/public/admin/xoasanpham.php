<?php
    include '../../connect.php';
    use App\Models\Product;

    $id = $_GET['id'];
    $sql = Product::where('id' , $id)->delete();
    header('Location: lietkesanpham.php?layout=danhsachsp');
?>