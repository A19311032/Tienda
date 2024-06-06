<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'celular',
        'empresa',
        'estatus',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define la relación muchos a muchos con el modelo Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
