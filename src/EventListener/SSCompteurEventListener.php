<?php

namespace Tchoblond59\SSCompteur\EventListener;

use App\Events\MSMessageEvent;
use Tchoblond59\SSCompteur\Events\SSCompteurEvent;
use App\Sensor;
use Tchoblond59\SSCompteur\Models\SSCompteurHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SSCompteurEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MSMessageEvent  $event
     * @return void
     */
    public function handle(MSMessageEvent $event)
    {
        $sensor = Sensor::where('node_address', '=', $event->message->getNodeId())->where('classname', '=', '\Tchoblond59\SSCompteur\Models\SSCompteur')->first();
        if($sensor)
        {
            $sscompteur_history = new SSCompteurHistory();
            $sscompteur_history->sensor_id = $sensor->id;
            $sscompteur_history->kwh = $event->message->getMessage();
            $sscompteur_history->prix = $sscompteur_history->kwh * 0.14490;
            $sscompteur_history->save();

            $conso = SSCompteurHistory::getMonthConso($sensor->id);
            $conso[0]->prix = round($conso[0]->prix,2);
            $my_event = new SSCompteurEvent($sensor, $conso);
            event($my_event);
        }
    }
}
