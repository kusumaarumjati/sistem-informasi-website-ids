<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postal extends Model
{
    // use SoftDeletes;
    protected $table ='ec_postalcode';
    protected $primaryKey = 'postal_id';  
    protected $fillable = ['postal_id','subdis_id','dis_id','city_id','prov_id','postal_code'];
    public $timestamps = false;
    //protected $data=['deleted_at'];

    public function subdis(){
        return $this->belongsTo(subdis::class, 'subdis_id');
    }//lek de db dee menerima fk teko parents
    public function district(){
        return $this->belongsTo(district::class, 'dis_id');
    }//lek de db dee menerima fk teko parents
    public function city(){
        return $this->belongsTo(city::class, 'city_id');
    }//lek de db dee menerima fk teko parents
    public function province(){
        return $this->belongsTo(province::class, 'prov_id');
    }//lek de db dee menerima fk teko parents

    public function postal(){
        return $this->hasMany(postal::class, 'postal_id');
    }
}
