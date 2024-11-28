<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttendanceControl extends Model
{
    use HasFactory;

    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Mengambil data attendance_recap yang berelasi
     *
     * @return HasMany
     */
    public function recap(): HasMany
    {
        return $this->hasMany(AttendanceRecap::class);
    }
}
