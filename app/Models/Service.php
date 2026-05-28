<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //Campos que permitimos rellenar desde un formulario (Protección Mass Assignment)
    protected $fillable = ['name', 'description', 'duration_minutes', 'price'];

    /**
     * Obtenemos las citas asociadas a este servicio
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
