<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FunctionArea extends Model
{
    protected  $primaryKey = 'Fam_Id';
    
    protected $fillable =[
        'Fam_Desc',
        'Fam_Year'
    ];
}
