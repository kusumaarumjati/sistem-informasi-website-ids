<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    // use SoftDeletes;
    protected $table ='ec_districts';
    protected $primaryKey = 'dis_id';  
    protected $fillable = ['dis_id','dis_name','city_id'];
    public $timestamps = false;
    //protected $data=['deleted_at'];

    public function city(){
        return $this->belongsTo(city::class, 'city_id');
    }
    public function district(){
        return $this->hasMany(district::class, 'dis_id');
    }

}
