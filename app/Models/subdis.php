<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subdis extends Model
{
    // use SoftDeletes;
    protected $table ='ec_subdistricts';
    protected $primaryKey = 'subdis_id';  
    protected $fillable = ['subdis_id','dis_id','subdis_name'];
    public $timestamps = false;
    //protected $data=['deleted_at'];

    public function subdis(){
        return $this->hasMany(subdis::class, 'subdis_id');
    }
    public function district(){
        return $this->belongsTo(district::class, 'dis_id');
    }

    public function customer(){
        return $this->hasMany(customer::class, 'id_customer');
    }
}
