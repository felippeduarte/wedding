<!DOCTYPE html>
<html>
    <head>
        <title>Dani & Felippe - 11.11.2017</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/site.css" rel="stylesheet">
        <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script type="text/javascript" src="js/lib/moment-precise-range.min.js"></script>
    </head>
    <body>
        <div id="wrap">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">
                            <img alt="D & F" src="img/logodf.png" class="img-responsive"> <span>D&F 11.11.17</span>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="osescolhidos.html">Os Escolhidos</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row row-table row-logo">
                <div class="col-xs-12">
                    <p class="logo">
                        <a href="/">
                            <img class="img-responsive" alt="Dani e Felippe" src="img/logo.png" />
                        </a>
                    </p>
                </div>
            </div>
            <div class="row row-table row-background">
                <div class="col-xs-12 content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="center-block text-center">
                                <h1 class="time">Passado</h1>
                                <div class="video embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YEX_MirPvNw"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="center-block text-center">
                                <h1 class="time">Presente</h1>
                                <p class="presente">faltam<br/>
                                    <span id="presente_meses"></span> meses<br/>
                                    <span id="presente_dias"></span> dias<br/>
                                    <span id="presente_horas"></span> horas<br/>
                                    <span id="presente_minutos"></span> minutos<br/>
                                    <span id="presente_segundos"></span> segundos
                                </p>
                                <p class="hidden-xs"><br/><br/></p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="center-block text-center">
                                <h1 class="time">Futuro</h1>
                                <div id="videoFuturo">
                                    <div class="video embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h4-BBsEjXZI"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="text-muted text-center"><small>Dani & Felippe - 11.11.2017</small></p>
            </div>
        </footer>
        <script src="js/site.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-96202656-1', 'auto');ga('send', 'pageview');
        </script>
    </body>
</html>