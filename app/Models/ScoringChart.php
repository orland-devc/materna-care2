<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScoringChart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_admission_id',

        'dateScored',
        'heartRate',
        'respiratory',
        'muscleTone',
        'reflexes',
        'color',

        'five_heartRate',
        'five_respiratory',
        'five_muscleTone',
        'five_reflexes',
        'five_color',

        'ten_heartRate',
        'ten_respiratory',
        'ten_muscleTone',
        'ten_reflexes',
        'ten_color',

        'otherHeartRate',
        'otherRespiratory',
        'otherMuscleTone',
        'otherReflexes',
        'otherColor',
    ];

    public function patientRecord(): BelongsTo
    {
        return $this->belongsTo(PatientRecord::class, 'patient_admission_id');
    }
}
