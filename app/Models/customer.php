<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    // use SoftDeletes;
    protected $table ='customer';
    protected $primaryKey = 'id_customer';  
    protected $fillable = ['id_customer','nama','alamat','foto','filepath','prov_id','subdis_id','postal_id'];
    public $timestamps = false;
    protected $data=['deleted_at'];

    public function subdis(){
        return $this->belongsTo(subdis::class, 'subdis_id');
    }
     public function province(){
        return $this->belongsTo(province::class, 'prov_id');
    }
    public function postal(){
        return $this->belongsTo(postal::class, 'postal_id');
    }
}
