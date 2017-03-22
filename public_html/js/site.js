var eventDate = moment('2017-11-11T17:30:00');

function countdownTimer () {
    var now = moment();
    var diff = moment.preciseDiff(eventDate,now,true);
    
    $('#presente_meses').html(diff.months);
    $('#presente_dias').html(diff.days);
    $('#presente_horas').html(diff.hours);
    $('#presente_minutos').html(diff.minutes);
    $('#presente_segundos').html(diff.seconds);
}

$(document).ready(function() {
    setInterval(countdownTimer, 1000);
});