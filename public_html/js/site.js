var eventDate = moment('2017-11-11T17:30:00');
firebase.initializeApp({apiKey: "AIzaSyAqLwDb160iEiSA67Jom8qRIoX2eiJ2SEg",authDomain: "dani-e-felippe.firebaseapp.com",databaseURL: "https://dani-e-felippe.firebaseio.com",projectId: "dani-e-felippe",storageBucket: "dani-e-felippe.appspot.com",messagingSenderId: "412465578202"});

function countdownTimer () {
    var now = moment();
    var diff = moment.preciseDiff(eventDate,now,true);
    
    $('#presente_meses').html(diff.months);
    $('#presente_dias').html(diff.days);
    $('#presente_horas').html(diff.hours);
    $('#presente_minutos').html(diff.minutes);
    $('#presente_segundos').html(diff.seconds);
}

function savePadrinhos(opcao, padrinho) {
    const itemsRef = firebase.database().ref('padrinhos_' + opcao);
    const item = {padrinho: padrinho, hora: moment().format('DD/MM/YYYY HH:mm:ss')};
    itemsRef.push(item);
}

function getPadrinhosSim() {
    const itemsRef = firebase.database().ref('padrinhos_sim').once('value').then(function(snapshot) {
        var obj = snapshot.val();
        var padrinhos = [];
        for (var key in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, key)) {
                padrinhos.push(obj[key].padrinho);
            }
        }

        var anomDivContent = '<img class="img-responsive center-block" src="img/thebests/circle_john_doe.png" alt="???" />'+
                             '<span class="padrinhos-caption">???</span>';

        var padrinhosDiv = $('.padrinhos-photo');

        for (var key in padrinhosDiv) {
            if (Object.prototype.hasOwnProperty.call(padrinhosDiv, key)) {
                var div = padrinhosDiv[key];

                if(padrinhos.indexOf($(div).find('a').data('padrinho-name')) == -1) {
                    $(div).html(anomDivContent);
                }
            }
        }

        $('.padrinhos-photos').removeClass('hidden');
    });
}

function padrinhosModal(elem, binds) {
    var padrinho = elem.data('padrinho-name');
    $('#padrinho-content-title').html(padrinho.replace(/\_/g,' '));
    $('#padrinho_aceitou').html('');

    $.ajax({
        url: 'padrinhos-text/'+padrinho+'.html',
        success: function(text) {
            var frasePergunta = '<div class="thebests"><p>Antes de fazermos a <span class="st">pergunta</span>, temos uma <span class="lp">historinha</span> para contar...</p></div>';
            $('#padrinho-content-text').html(frasePergunta + text);

            if(binds) {
                $('#btn_padrinho_aceitou').off().click(function(){padrinho_aceitou(padrinho);});
                $('#btn_padrinho_nao_aceitou').off().click(function(){padrinho_nao_aceitou(padrinho);});

                reset_btn_padrinho_nao_aceitou();
                $('#padrinho-buttons').show();
            }

            $('#modalPadrinho').modal();
        }
    });
}

function padrinho_aceitou(padrinho) {
    reset_btn_padrinho_nao_aceitou();
    savePadrinhos('sim',padrinho);
    $.ajax({
        url: 'padrinhos-text/sim.html',
        success: function(text) {
            $('#modalPadrinho').scrollTop(0);
            $('#padrinho-content-title').html('Uhull!!!!');
            $('#padrinho-content-text').html(text);
            $('#padrinho-buttons').hide();
        }
    });
}

function padrinho_nao_aceitou(padrinho) {
    savePadrinhos('nao',padrinho);
    $.ajax({
        url: 'padrinhos-text/nao.html',
        success: function(text) {
            $('#modalPadrinho').scrollTop(0);
            $('#padrinho-content-title').html('Ops...');
            $('#padrinho-content-text').html(text);

            $('#btn_padrinho_nao_aceitou').off().on('mouseover click', function() {
                var maxLeft = $('#modalPadrinho .modal-body').width();
                var maxTop = $('#modalPadrinho .modal-body').height();

                $(this)
                    .detach()
                    .appendTo('#modalPadrinho .modal-body')
                    .removeClass('btn-block')
                    .css('position','absolute')
                    .css('top', (Math.floor(Math.random() * maxTop) + 1) + 'px')
                    .css('left', (Math.floor(Math.random() * maxLeft) + 1) + 'px');
            });
        }
    });
}

function reset_btn_padrinho_nao_aceitou() {
    $('#btn_padrinho_nao_aceitou')
        .detach()
        .appendTo('#padrinho-button-nao')
        .addClass('btn-block')
        .css('position','');
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

    if(window.location.pathname.toLowerCase() == '/osescolhidos.html') {
        $("<style type='text/css'> .thebests{ display:none;}</style>").appendTo("head");
        var aceitaram = getPadrinhosSim();
        var modalHtml = '<div id="modalPadrinho" class="modal fade" tabindex="-1" role="dialog">'+
        '<div class="modal-dialog modal-lg" role="document">'+
          '<div class="modal-content">'+
            '<div class="modal-header">'+
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<div id="padrinho-content-title" class="text-center"></div>'+
            '</div>' +
            '<div class="modal-body">'+
                '<div id="padrinho-content-text"></div>'+
            '</div>'+
            '<div class="modal-footer">'+
              '<button type="button" class="btn btn-default center-block" data-dismiss="modal">Fechar</button>'+
            '</div>'+
        '</div></div></div>';

        $('body').append(modalHtml);

        $('.padrinhos-photos a').click(function() {padrinhosModal($(this), false);});
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
                    '<div class="col-xs-6" id="padrinho-button-nao"><button type="button" id="btn_padrinho_nao_aceitou" class="btn btn-danger btn-block center-block"><i class="glyphicon glyphicon-thumbs-down"></i> Não</button></div>'+
                '</div>' +
            '</div>'+
            '<div class="modal-footer">'+
              '<button type="button" class="btn btn-default center-block" data-dismiss="modal">Fechar</button>'+
            '</div>'+
        '</div></div></div>';

        $('body').append(modalHtml);

        $('.padrinhos-photos a').click(function() {padrinhosModal($(this), true);});
    }
});

