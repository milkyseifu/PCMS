<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonCategory extends Model
{
    use HasFactory;
    public $table = 'person_categories';

    public $fillable = [
        'name'
    ];

    /**
     * Get all of the comments for the personType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function persons(): HasMany
    {
        return $this->hasMany(Pc::class, 'person_type_id');
    }

    /**
     * Get all of the comments for the personType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pctypes(): HasMany
    {
        return $this->hasMany(PcCategory::class);
    }
}
