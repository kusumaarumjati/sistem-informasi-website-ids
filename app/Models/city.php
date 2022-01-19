<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    // use SoftDeletes;
    protected $table ='ec_cities';
    protected $primaryKey = 'city_id';  
    protected $fillable = ['city_id','city_name','prov_id'];
    //protected $fillable = ['city_id','city_name','prov_id','ibukota','k_bsni'];
    public $timestamps = false;
    //protected $data=['deleted_at'];

    public function city(){
        return $this->hasMany(city::class, 'city_id');
    }
    public function province(){
        return $this->belongsTo(province::class, 'prov_id');
    }

}
