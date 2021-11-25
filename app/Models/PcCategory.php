<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PcCategory extends Model
{
    use HasFactory;
    public $table = 'pc_categories';

    public $fillable = [
        'pc_name',
        'serial_number'
    ];

    /**
     * Get the peroson that owns the pcType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personPc(): BelongsTo
    {
        return $this->belongsTo(Pc::class,'person_id');
    }
}
