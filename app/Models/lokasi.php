<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    protected $table ='lokasi_toko';
    //protected $primaryKey = 'barcode';  
    protected $fillable = ['barcode','nama_toko','latitude','longitude','accuracy'];
    public $timestamps = false;
}
