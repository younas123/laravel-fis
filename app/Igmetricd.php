<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Igmetricd extends Model
{
    // protected $table ="Igmetricds";
    // protected $primary_key ="id";

    // public $timestamps = true;

    protected $fillable = [
        'id','igmetricms_id','igd_desc','igd_active','created_at','updated_at'
    ];

    // public function igmetric(){
    //     return $this->belongsTo("App\Igmetricm","igmetricms_id","id");
    // }
}
