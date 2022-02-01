<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Igmetricm extends Model
{
    protected $table ="igmetricms";
    protected $primary_key ="id";

    // public $timestamps = true;
    // protected $foreign_key ="igmd_id";

    protected $fillable = [
        'id','funcareas_id','igm_desc','igm_func_area','igm_active' 
    ];

    public function igmetricsr(){
        return $this->hasMany("App\Igmetricd","igmetricms_id","id");
    }

}
