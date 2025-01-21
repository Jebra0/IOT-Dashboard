<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhSensor extends Model
{
    use HasFactory;

    protected $fillable = ['data'];

    public function systemDecision()
    {
        return $this->hasOne(SystemDecision::class);
    }

    protected static function booted()
    {
        static::created(function (PhSensor $model) {
            if ($model->data >= 7) {
                SystemDecision::create([
                    'decision' => 'ADD',
                    'ph_sensor_id' => $model->id,
                    'temp_sensor_id' => null,
                ]);
            } else {
                SystemDecision::create([
                    'decision' => 'NO',
                    'ph_sensor_id' => $model->id,
                    'temp_sensor_id' => null,
                ]);
            }
        });
    }
}
