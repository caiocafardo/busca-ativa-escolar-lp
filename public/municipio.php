<!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Busca Ativa Escolar</title>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content=""/>
    <meta name="description" content=""/>

    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <link rel="stylesheet" href="dist/css/libs.css?v=2.0"/>
    <link rel="stylesheet" href="dist/css/app.css?v=2.0"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111014746-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-111014746-1');
    </script>
</head>
<body id="municipio">

<div class="loading">Loading&#8230;</div>

<div id="top"></div>

<header>
    <div class="navbar">
        <div class="wrapper">
            <a href="/">
                <img class="logo" src="../../images/logo-busca-ativa-escolar.png">
            </a>
            <a href="#" class="hamburger">
                <span></span>
            </a>

            <?php
            include('menu.php');
            ?>

        </div>
    </div>

    <br/><br/><br/><br/><br/><br/><br/>
</header>

<section id="info">
    <div class="city-wrapper">

        <h2 class="c-blue"> Quadro geral da <br/> <span>Busca Ativa Escolar</span></h2>

        <div class="form-wrapper">

            <form class="search-city" name="form-city">
                <div class="form-row">
                    <label class="c-blue">
                        <select name="state" id="uf" class="field-half">
                            <option value="">Todos os estados</option>
                        </select>
                    </label>
                    <label class="c-blue">
                        <select name="city" id="city" class="field-half">
                            <option value="">Todas as cidades</option>
                        </select>
                    </label>
                </div>
            </form>

            <div class="box_alert_danger" style="display: none">
                Este município ainda não fez adesão ao Busca Ativa Escolar!
            </div>

            <div class="box_alert_success" style="display: none">
                Aderiu em <span id="created"></span> - <span id="status"></span>
            </div>

        </div>

        <div class="data_wrapper" style="display: none">

            <div class="alerts">
                <div class="header">ALERTAS (<span id="alert_count">0</span>)</div>
                <div class="body">
                    <div class="section">
                        <span class="label">APROVADOS</span>
                        <span class="label-total" id="approved">0</span>
                    </div>
                    <div class="section">
                        <span class="label">PENDENTES</span>
                        <span class="label-total" id="pending">0</span>
                    </div>
                    <div class="section">
                        <span class="label">REJEITADOS</span>
                        <span class="label-total" id="rejected">0</span>
                    </div>
                </div>
            </div>

            <div class="cases">
                <div class="header">CASOS (<span id="cases_count">0</span>)</div>
                <div class="body">

                    <div class="section">
                        <span class="label" data-tippy-content="Caso em andamento: de pesquisa até (re)matrícula">EM ANDAMENTO/ FORA DA ESCOLA*</span>
                        <span class="label-total" id="out_of_school">0</span>
                    </div>

                    <div class="section">
                        <span class="label" data-tippy-content="Estudantes (re)matriculados: de 1ª à 4ª observação">EM ANDAMENTO/ DENTRO DA ESCOLA*</span>
                        <span class="label-total" id="in_observation">0</span>
                    </div>


                    <div class="section">
                        <span class="label" data-tippy-content="Casos concluídos: caso finalizado com sucesso após a 4ª observação">CONCLUÍDOS*</span>
                        <span class="label-total" id="in_school">0</span>
                    </div>

                </div>

                <div class="body">

                    <div class="section">
                        <span class="label" data-tippy-content="Casos cancelados: em qualquer etapa do processo">CANCELADOS*</span>
                        <span class="label-total" id="cancelled">0</span>
                    </div>

                    <div class="section">
                        <span class="label" data-tippy-content="Casos que foram transferidos para outros municípios que fizeram adesão à Busca Ativa Escolar">TRANSFERIDOS*</span>
                        <span class="label-total" id="transferred">0</span>
                    </div>

                    <div class="section">
                        <span class="label" data-tippy-content="Estudantes que evadiram durante as etapas de observação e cujo o caso original foi interrompido e caso correlato foi criado na etapa de pesquisa">INTERROMPIDOS*</span>
                        <span class="label-total" id="interrupted">0</span>
                    </div>

                </div>
            </div>

            <div class="cases">
                <div class="header"><span class="label">CRIANÇAS E ADOLESCENTES NA ESCOLA</span>
                </div>
                <div class="body">
                    <div class="section">
                        <span class="label" data-tippy-content="Em andamento/ Dentro da escola + Concluídos">TOTAL* </span>
                        <span class="label-total" id="enrollment">0</span>
                    </div>
                </div>
            </div>

            <div class="title_chart">
                MOTIVOS DOS ALERTAS
            </div>
            <br/><br/>

            <div class="chart">
                <div class="canvas-con-inner">
                    <canvas id="chartCity" height="200" width="375"></canvas>
                </div>
                <div id="my-legend" class="legend"></div>
            </div>

        </div>

    </div>

</section>

<section id="contact" class="no-pad">
    <div class="contact--wrapper">
        <h2 class="c-white">
            Entre em <br/>
            <span>Contato</span>
        </h2>

        <p class="contact--subtitle">
            Se você desejar falar conosco, preencha o formulário a seguir que entraremos em contato o mais breve
            possível.<br/>&nbsp;
        </p>

        <form action="/enviar.php" method="post">
            <div class="form-row">
                <input type="text" name="name" placeholder="Seu nome" class="field-full" required>
            </div>

            <div class="form-row">
                <input type="email" name="mail" placeholder="Seu e-mail" class="field-half" required>
                <input type="text" name="tel" placeholder="Seu telefone" class="field-half mask-phone" required>
            </div>

            <div class="form-row">
                <label class="select select-big">
                    <input type="text" name="mun" class="field" placeholder="Município" required/>
                </label>

                <label class="select select-small">
                    <input type="text" name="mun" class="field" placeholder="UF" required/>
                </label>
            </div>

            <div class="form-row">
                <textarea rows="4" cols="50" name="text" class="field-text">Escreva sua mensagem aqui!</textarea>
            </div>

            <button class="button yellow">
						<span>
							Enviar <i></i>
						</span>
            </button>
        </form>
    </div>

    <div class="wrapper">
        <div class="img-desc">
            Foto: João Laet
        </div>
    </div>

    <div class="contact--gestor">
        <h2 class="contact-phone"><i class="ico-telefone"></i>0800 729 2872</h2>
        <strong>Canal preferencial</strong> para membros do Comitê Gestor da Busca Ativa Escolar nos municípios e
        estados.
    </div>
</section>

<footer class="grey">
    <div class="footer--wrapper">
        <a href="https://undime.org.br/" target="_blank">
            <img src="images/logo-undime.png" alt="Undime"/>
        </a>
        <a href="http://www.congemas.org.br/" target="_blank">
            <img src="images/logo-congemas.png" alt="Congemas"/>
        </a>
        <a href="http://www.conasems.org.br/" target="_blank">
            <img src="images/logo-conasems.png" alt="Conasems"/>
        </a>
        <a href="https://www.unicef.org/brazil/pt/" target="_blank">
            <img src="images/logo-unicef.png" alt="Unicef"/>
        </a>
    </div>
</footer>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<link rel="stylesheet" href="dist/css/libs.css?v=2.0"/>
<link rel="stylesheet" href="dist/css/app.css?v=2.0"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<script src="dist/js/libs.js"></script> <!-- Libraries -->
<script src="dist/js/chart_2.7.3.js"></script>

<script>

    var url_prod = '//api.buscaativaescolar.org.br/api/v1/lp/';
    var url_test = '//api.testes.buscaativaescolar.org.br/api/v1/lp/';
    var url_dev = '//api.dev.buscaativaescolar.org.br/api/v1/lp/';
    var url_local = '//api.busca-ativa-escolar.test/api/v1/lp/';

    var debug = {
        url:'?XDEBUG_SESSION_START=PHPSTORM',
        active:true
    }

    var url_country_report = url_prod + "report";
    var url_uf_report = url_prod + "report/uf";
    var url_city_report = url_prod + "report/city";
    var url_list_cities = url_prod + "report/list/cities";

    if ('site.testes.buscaativaescolar.org.br' === location.host) {
        url_country_report = url_test + "report";
        url_uf_report = url_test + "report/uf";
        url_city_report = url_test + "report/city";
        url_list_cities = url_test + "report/list/cities";
    }

    if ('lp.dev.buscaativaescolar.org.br' === location.host) {
        url_country_report = url_dev + "report";
        url_uf_report = url_dev + "report/uf";
        url_city_report = url_dev + "report/city";
        url_list_cities = url_dev + "report/list/cities";
    }

    if ('lp.busca-ativa-escolar.test' === location.host) {
        url_country_report = url_local + "report" + (debug.active ? debug.url : '');
        url_uf_report = url_local + "report/uf" + (debug.active ? debug.url : '');
        url_city_report = url_local + "report/city" + (debug.active ? debug.url : '');
        url_list_cities = url_local + "report/list/cities" + (debug.active ? debug.url : '');
    }

    var data_graph = {
        val: [],
        causes: []
    };

    var options_graph = {
        responsive: true,
        legend: false,
        legendCallback: function (chart) {
            var legendHtml = [];
            legendHtml.push('<ul>');
            var item = chart.data.datasets[0];
            for (var i = 0; i < item.data.length; i++) {
                legendHtml.push('<li>');
                legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] + '"></span>');
                legendHtml.push('<span class="chart-legend-label-text"> <strong>' + item.data[i] + ' alertas </strong> - ' + chart.data.labels[i] + '</span>');
                legendHtml.push('</li>');
            }

            legendHtml.push('</ul>');
            return legendHtml.join("");
        },
        tooltips: {
            enabled: true
        }
    }

    var backgroundColor = [
        '#A93226',
        '#CB4335',
        '#884EA0',
        '#7D3C98',
        '#2471A3',
        '#2E86C1',
        '#17A589',
        '#138D75',
        '#229954',
        '#28B463',
        '#D4AC0D',
        '#D68910',
        '#CA6F1E',
        '#BA4A00',
        '#D0D3D4',
        '#A6ACAF',
        '#839192',
        '#707B7C',
        '#2E4053',
        '#273746',
        '#17202A'
    ];

    function load_data(chartCity) {

        $('.loading').css('display', 'block');
        $('.box_alert_success').css('display', 'none');

        $.ajax(
            {
                url: url_country_report,
                success: function (result) {

                    $("#approved").text(0 /*result._data.alerts._approved*/);
                    $("#pending").text(0 /*result._data.alerts._pending*/);
                    $("#rejected").text(0 /*result._data.alerts._rejected*/);

                    $("#in_school").text(0 /*result._data.cases._in_school*/);
                    $("#out_of_school").text(0 /*result._data.cases.out_of_school*/);
                    $("#cancelled").text(0 /*result._data.cases._cancelled*/);
                    $("#interrupted").text(0 /*result._data.cases._interrupted*/);
                    $("#transferred").text(0 /*result._data.cases._transferred*/);
                    $("#in_observation").text(0 /*result._data.cases._in_observation*/);

                    $("#alert_count").text(0);
                    $("#cases_count").text(0);

                    $("#enrollment").text(0);

                    $('#uf').empty();
                    $('#uf').append("<option value=\"\">Todos os estados</option>");
                    result._data.states_in_tenants.forEach(function (current) {
                        $('#uf').append("<option value=\"" + current + "\">" + current + "</option>");
                    });


                    $('.loading').css('display', 'none');
                    $('.data_wrapper').css('display', 'none');
                }
            }
        );

    }

    function load_data_uf(dados, chartCity) {

        if (dados.uf != "") {

            $('.loading').css('display', 'block');
            $('.box_alert_success').css('display', 'none');
            $('.box_alert_danger').css('display', 'none');

            $.ajax(
                {
                    url: url_uf_report,
                    data: dados,
                    success: function (result) {

                        $('#approved').text(result._data.alerts._approved);
                        $('#pending').text(result._data.alerts._pending);
                        $('#rejected').text(result._data.alerts._rejected);

                        $('#alert_count').text(sum(result._data.alerts));

                        $('#in_school').text(result._data.cases._in_school);
                        $('#out_of_school').text(result._data.cases._out_of_school);
                        $('#cancelled').text(result._data.cases._cancelled);
                        $('#interrupted').text(result._data.cases._interrupted);
                        $('#transferred').text(result._data.cases._transferred);
                        $('#in_observation').text(result._data.cases._in_observation);

                        $('#cases_count').text(sum(result._data.cases));

                        $("#enrollment").text( parseInt(result._data.cases._in_school)+parseInt(result._data.cases._in_observation));

                        chartCity.data.labels = [];
                        chartCity.data.datasets.forEach((dataset) => {
                            dataset.data = [];
                        });

                        result._data.causes.forEach(function (current) {
                            chartCity.data.labels.push(current.cause);
                            chartCity.data.datasets.forEach((dataset) => {
                                dataset.data.push(current.qtd);
                            });
                        });

                        chartCity.options = options_graph;
                        chartCity.update();
                        $('#my-legend').html(chartCity.generateLegend());

                        $('.loading').css('display', 'none');
                        $('.data_wrapper').css('display', 'block');
                    }
                }
            );

        } else {
            load_data(chartCity);
        }

    }

    function sum( obj ) {
        var sum = 0;
        for( var el in obj ) {
            if( obj.hasOwnProperty( el ) ) {
                sum += parseFloat( obj[el] );
            }
        }
        return sum;
    }

    function load_data_city(dados, chartCity, selectedUf) {

        if (dados.city != "") {

            $('.loading').css('display', 'block');
            $('.box_alert_success').css('display', 'none');

            $.ajax(
                {
                    url: url_city_report,
                    data: dados,

                    success: function (result) {

                        if (result._data.data_city != null) {

                            $('#approved').text(result._data.alerts._approved);
                            $('#pending').text(result._data.alerts._pending);
                            $('#rejected').text(result._data.alerts._rejected);

                            $('#alert_count').text(sum(result._data.alerts));

                            $('#in_school').text(result._data.cases._in_school);
                            $('#out_of_school').text(result._data.cases._out_of_school);
                            $('#cancelled').text(result._data.cases._cancelled);
                            $('#interrupted').text(result._data.cases._interrupted);
                            $('#transferred').text(result._data.cases._transferred);
                            $('#in_observation').text(result._data.cases._in_observation);

                            $('#created').text(result._data.data_city.created);
                            $('#status').text(result._data.data_city.status);

                            $('#cases_count').text(sum(result._data.cases));

                            $("#enrollment").text( parseInt(result._data.cases._in_school)+parseInt(result._data.cases._in_observation) );

                            chartCity.data.labels = [];
                            chartCity.data.datasets.forEach((dataset) => {
                                dataset.data = [];
                            });

                            result._data.causes.forEach(function (current) {
                                chartCity.data.labels.push(current.cause);
                                chartCity.data.datasets.forEach((dataset) => {
                                    dataset.data.push(current.qtd);
                                });
                            });

                            chartCity.options = options_graph;
                            chartCity.update();

                            $('#my-legend').html(chartCity.generateLegend());

                            $('.box_alert_success').css('display', 'block');
                            $('.data_wrapper').css('display', 'block');
                            $('.box_alert_danger').css('display', 'none');
                            $('.loading').css('display', 'none');

                        } else {

                            $('.data_wrapper').css('display', 'none');
                            $('.box_alert_danger').css('display', 'block');
                            $('.loading').css('display', 'none');

                        }
                    }

                }
            );

        } else {
            //var dados = {'uf': selectedUf};
            //load_data_uf(dados, chartCity);
        }

    }

    $(document).ready(function () {

        var chartCity = new Chart(document.getElementById("chartCity"), {
            type: 'doughnut',
            options: {},
            backgroundColor: backgroundColor,
            data: {
                datasets: [{
                    backgroundColor: backgroundColor,
                    data: data_graph.val
                }],
                labels: data_graph.causes
            },
        });

        load_data(chartCity);

        var selectedUf = null;

        $('#uf').on('change', function () {

            $('.loading').css('display', 'block');

            selectedUf = $(this).children("option:selected").val();
            var dados = {'uf': selectedUf};
            $.ajax(
                {
                    url: url_list_cities,
                    data: dados,
                    success: function (result) {
                        $('#city').empty();
                        $('#city').append("<option value=\"\">Todas as cidades</option>");
                        result._data.cities_in_tenants.forEach(function (current) {
                            $('#city').append("<option value=\"" + current + "\">" + current + "</option>");
                        });
                        //load_data_uf(dados, chartCity);
                        $('.loading').css('display', 'none');
                    },error: function (request) {
                        $('.loading').css('display', 'none');
                    }
                }
            );

        });

        $('#city').on('change', function () {
            var selectedCity = $(this).children("option:selected").val();
            var dados = {'city': selectedCity, 'uf': selectedUf};
            load_data_city(dados, chartCity, selectedUf);
        });

    });

</script>

<script src="dist/js/app.js"></script> <!-- Development -->
<link rel="stylesheet" href="dist/css/sweetalert.css"/>
<!--script src="dist/js/app.min.js"></script--> <!-- Production -->

</body>
</html>