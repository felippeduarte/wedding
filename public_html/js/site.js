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
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<div id="padrinho-content-title" class="text-center"></div>'+
            '</div>' +
            '<div class="modal-body">'+
                '<div id="padrinho-content-text"></div><br/>' +
                '<div class="row" id="padrinho-buttons">'+
                    '<div class="col-xs-6"><button type="button" id="btn_padrinho_aceitou" class="btn btn-success btn-block center-block"><i class="glyphicon glyphicon-thumbs-up"></i> Sim</button></div>'+
                    '<div class="col-xs-6"><button type="button" class="btn btn-danger btn-block center-block" data-dismiss="modal"><i class="glyphicon glyphicon-thumbs-down"></i> Não</button></div>'+
                '</div>' +
            '</div>'+
            '<div class="modal-footer">'+
              '<button type="button" class="btn btn-default center-block" data-dismiss="modal">Fechar</button>'+
            '</div>'+
        '</div></div></div>';

        $('body').append(modalHtml);

        $('#btn_padrinho_aceitou').click(function() {
             $.ajax({
                url: 'padrinhos-text/sim.html',
                success: function(text) {
                    $('#modalPadrinho').scrollTop(0);
                    $('#padrinho-content-title').html('Uhull!!!!');
                    $('#padrinho-content-text').html(text);
                    $('#padrinho-buttons').hide();
                }
            });
        });
        
        $('.padrinhos-photos a').click(function() {
            var padrinho = $(this).data('padrinho-name');
            $('#padrinho-content-title').html(padrinho.replace(/\_/g,' '));
            $('#padrinho_aceitou').html('');

            $.ajax({
                url: 'padrinhos-text/'+padrinho+'.html',
                success: function(text) {
                    $('#padrinho-content-text').html(text);
                    $('#padrinho-buttons').show();
                    $('#modalPadrinho').modal();
                }
            });
        });
    }
});

