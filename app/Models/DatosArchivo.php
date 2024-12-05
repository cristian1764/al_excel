<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DatosArchivo extends Model
{
    use HasFactory;

    protected $table = 'datos_archivo';

    // Asegúrate de incluir los campos fillable para proteger contra asignación masiva
    protected $fillable = ['dato1', 'dato2', 'dato3', 'dato4', 'dato5', 'dato6'];
}
