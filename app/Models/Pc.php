<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pc extends Model
{
    use HasFactory;
    public $table = 'pcs';

    public $fillable = [
        'first_name',
        'last_name',
        'id_number',
        'serial_number'
    ];

    /**
     * Get the user that owns the Pc
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(PersonCategory::class, 'person_type_id');
    }

    /**
     * Get all of the comments for the Pc
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pcTypes(): HasMany
    {
        return $this->hasMany(PcCategory::class,'person_id');
    }
    // public function types(){
    //     return $this->belongsTo(personType::class);
    // }
}
