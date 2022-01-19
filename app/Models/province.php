<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    // use SoftDeletes;
    protected $table ='ec_provinces';
    protected $primaryKey = 'prov_id';  
    protected $fillable = ['prov_id','prov_name','locationid','status'];
    public $timestamps = false;
    //protected $data=['deleted_at'];

    
    public function province(){
        return $this->hasMany(province::class, 'prov_id');
    }

}
