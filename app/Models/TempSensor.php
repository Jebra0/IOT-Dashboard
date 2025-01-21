<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempSensor extends Model
{
    use HasFactory;

    protected $fillable = ['data'];

    public function systemDecision()
    {
        return $this->hasOne(SystemDecision::class);
    }

    protected static function booted()
    {
        static::created(function (TempSensor $model) {
            $phSensor = PhSensor::latest()->first();

            if ($phSensor) {
                $decision = SystemDecision::where('ph_sensor_id', $phSensor->id)->latest()->first();

                if ($decision) {
                    $decision->update([
                        'temp_sensor_id' => $model->id,
                    ]);
                }
            }
        });
    }
}
