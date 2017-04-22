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
    
    if(window.location.pathname.toLowerCase() == '/savethedate') {
        var videoHtml = $('#videoFuturo').html();
        var modalHtml = '<div id="modalSaveTheDate" class="modal fade" tabindex="-1" role="dialog">'+
        '<div class="modal-dialog modal-lg" role="document">'+
          '<div class="modal-content">'+
            '<div class="modal-header">'+
              '<div class="text-center">Reserve Esta Data - 11.11.2017</div>'+
            '</div>' +
            '<div class="modal-body">'+ videoHtml +
          '</div></div></div></div>';

        $('body').append(modalHtml);
        $('#modalSaveTheDate').modal();
    }    
    
    if(window.location.pathname.toLowerCase() == '/thebests.html') {
        var modalHtml = '<div id="modalPadrinho" class="modal fade" tabindex="-1" role="dialog">'+
        '<div class="modal-dialog modal-lg" role="document">'+
          '<div class="modal-content">'+
            '<div class="modal-header">'+
              '<div id="padrinho-content-title" class="text-center"></div>'+
            '</div>' +
            '<div id="padrinho-content-text" class="modal-body"></div>'+
        '</div></div></div>';

        $('body').append(modalHtml);
        
        $('.padrinhos-photos a').click(function() {
            var padrinho = $(this).data('padrinho-name');
            $('#padrinho-content-title').html(padrinho);

            $.ajax({
                url: 'padrinhos-text/'+padrinho+'.html',
                success: function(text) {
                    $('#padrinho-content-text').html(text);
                    $('#modalPadrinho').modal();
                }
            });
        });
    }
});

