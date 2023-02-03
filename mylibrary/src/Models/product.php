<?php

namespace App\Models;

class Product extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'product';
    protected $fillable = ['tenSP','maSp','chatLieu', 'size', 'image', 'kieuGiay', 'theLoai', 'hinhAnh', 'soLuong', 'gia'];
    public $timestamps = false;

}
    
?>