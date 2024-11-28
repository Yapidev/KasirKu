<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
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
     * @return BelongsTo
     */
    public function attendance_recap(): BelongsTo
    {
        return $this->belongsTo(AttendanceRecap::class);
    }
}
