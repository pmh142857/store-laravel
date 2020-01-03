<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    // loi CSDL them s
    protected $table ='articles';

    // Trang thai bai viet
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
    
    // Thay doi trang thai 
    public function getStatus(){
        return array_get($this->status,$this->a_active,'[N\A]');
    }



}
