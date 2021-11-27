<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalModel extends Model
{
    use HasFactory;
    protected $table='personal';
    protected $primaryKey='id';
    protected $fillable=['latitud','longitud','fecha','hora','cliente','estado'];
    public function clienteper(){
        return $this->hasOne(ClienteModel::class,'id','cliente');
    }
    
}
