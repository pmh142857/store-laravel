<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;


    // Trang thai 
    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-success'
        ]

    ];
    // Thay doi trang thai cua danh muc
    public function getStatus()
    {
        return array_get($this->status, $this->c_active, '[N\A]');
    }
     // Ham lay ten danhmuc va id
     public function category(){
        return $this->belongsTo(Category::class,'c_ative');
    }
}