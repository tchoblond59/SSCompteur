<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 24/07/17
 * Time: 15:30
 */

namespace Tchoblond59\SSCompteur\Models;
use Illuminate\Database\Eloquent\Model;

class SSCompteurConfig extends Model
{
    protected $table = 'sscompteur_config';

    public $timestamps = false;

    public static function getFromSensor($sensor_id)
    {
        return SSCompteurConfig::where('sensor_id', '=', $sensor_id)->first();
    }
}