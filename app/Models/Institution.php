<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institution extends Model
{
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'fantasy_name',
        'email',
        'password',
        'cnpj',
        'inep',
        'admin_dependency',
        'phases',
        'modalities',
        'type',
        'is_admin',
        'state_registration',
        'phone',
        'address',
        'metadata',
        'status',
    ];

    protected $dates = ['deleted_at'];

    /** Relationship with users */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
