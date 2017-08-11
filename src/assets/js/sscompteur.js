/****************SSCompteur JS Plugin****************/
$(function () {
    e.channel('sscompteur-channel')
        .listen('.Tchoblond59.SSCompteur.Events.SSCompteurEvent', function (e) {
            console.log('SSCompteurEvent', e)
            $('span.figures[data-sscompteur=kwh][data-sensorid='+e.sensor.id+']').animate({'opacity': 0}, 500, function () {
                $('span.figures[data-sscompteur=kwh][data-sensorid='+e.sensor.id+']').text(e.conso[0].kwh)
            }).animate({'opacity': 1}, 500);
            $('span.figures[data-sscompteur=prix][data-sensorid='+e.sensor.id+']').animate({'opacity': 0}, 500, function () {
                $('span.figures[data-sscompteur=prix][data-sensorid='+e.sensor.id+']').text(e.conso[0].prix)
            }).animate({'opacity': 1}, 500);
        })
})

/*************************************************/
