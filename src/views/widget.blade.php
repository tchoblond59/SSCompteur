<div class="card-container">
    <div class="card-icon card-power"><i class="fa fa-4x fa-bolt text-center"></i></div>
    <div class="card-title text-center">
        <a href="{{url('/widget/SSCompteur/'.$widget->id)}}" class="btn btn-success">{{$widget->name}}</a>
    </div>
    <div class="card-figures row">
        <div class="col-md-6">
            @if(!empty($sscompteur_history))
                <span class="figures text-center" data-sscompteur="kwh" data-sensorid="{{$widget->sensor_id}}">{{$sscompteur_history[0]->kwh}}</span>
            @else
                <span class="figures text-center" data-sscompteur="kwh" data-sensorid="{{$widget->sensor_id}}">??</span>
            @endif
            <span class="figures-label text-center">kWh</span>
        </div>
        <div class="col-md-6">
            @if(!empty($sscompteur_history))
                    <span class="figures text-center" data-sscompteur="prix" data-sensorid="{{$widget->sensor_id}}">{{round($sscompteur_history[0]->prix,2)}}</span>
                @else
                    <span class="figures text-center" data-sscompteur="kwh" data-sensorid="{{$widget->sensor_id}}">??</span>
            @endif
            <span class="figures-label text-center">€</span>
        </div>
    </div>
</div>