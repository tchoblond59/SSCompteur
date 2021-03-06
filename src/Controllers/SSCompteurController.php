<?php

namespace Tchoblond59\SSCompteur\Controllers;

use App\Http\Controllers\Controller;
use Tchoblond59\SSCompteur\Models\SSCompteurConfig;
use Tchoblond59\SSCompteur\Models\SSCompteurHistory;
use Illuminate\Http\Request;
use App\Widget;
use DB;
class SSCompteurController extends Controller
{
    public function configureWidget($id)
    {
        $widget = Widget::findOrFail($id);
        $compteur = SSCompteurConfig::getFromSensor($widget->sensor_id);

        $stats = SSCompteurHistory::getStats(5);

        $avg_kwh_by_day_of_week = SSCompteurHistory::avgKwhByDayOfWeek($widget->sensor_id);
        $avg_prix_by_day_of_week = SSCompteurHistory::avgPrixByDayOfWeek($widget->sensor_id);
        $consoByMonth = SSCompteurHistory::consoByMonth($widget->sensor_id);
        $history = SSCompteurHistory::where('sensor_id', '=', $compteur->sensor_id)
            ->whereRaw('DAYOFWEEK(`created_at`) = 2')
            ->sum('prix');

        return view('sscompteur::configwidget')->with(['widget' => $widget,
        'history' => $history,
        'stats' => $stats,
        'avg_kwh_by_day_of_week' => $avg_kwh_by_day_of_week,
        'avg_prix_by_day_of_week' => $avg_prix_by_day_of_week,
        'consoByMonth' => $consoByMonth
        ]);

    }
}
