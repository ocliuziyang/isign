<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bus
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $is_active
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereIsActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $seat_count
 * @method static \Illuminate\Database\Query\Builder|\App\Bus whereSeatCount($value)
 */
class Bus extends Model
{
    //
    protected $fillable = ['name', 'description', 'seat_count', 'is_active', 'status'];
}
