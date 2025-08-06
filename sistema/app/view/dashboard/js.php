<script type="text/javascript" src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/highcharts/highcharts.js"></script>
<script src="js/bootstrap/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script>
let container_acesso = Highcharts.chart('container_acesso', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Acessos ao Site'
    },
    xAxis: {
        categories: [
            <?php 
            echo "'".implode("', '", $dados_site['categories'])."'"; 
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '',
        data: [
            <?php 
            echo implode(', ', $dados_site['series']);
            ?>            
        ]
    }]
});

$(".data_acesso").on("change", function(e) {
    $.ajax({
        type: "POST",
        url: "ajax/gt_dash_acesso",
        data: "&data_inicio_acesso="+$("#data_inicio_acesso").val()+"&data_fim_acesso="+$("#data_fim_acesso").val(),
        cache: false,
        dataType: 'json',
        success: function( data ){
            var data_categories = data.categories;
            var data_series = data.series;
            container_acesso.xAxis[0].update({ categories: data_categories });
            container_acesso.series[0].update({ data: data_series });
            container_acesso.redraw();
        }
    });    
});


let container_videos = Highcharts.chart('container_videos', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Visualizações de Vídeo'
    },
    xAxis: {
        categories: [
            <?php 
            echo "'".implode("', '", $dados_videos['categories'])."'";
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '',
        data: [
            <?php 
            echo implode(', ', $dados_videos['series']);
            ?>
        ]
    }]
});

$(".data_videos").on("change", function(e) {
    $.ajax({
        type: "POST",
        url: "ajax/gt_dash_videos",
        data: "&data_inicio_videos="+$("#data_inicio_videos").val()+"&data_fim_videos="+$("#data_fim_videos").val(),
        cache: false,
        dataType: 'json',
        success: function( data ){
            var data_categories = data.categories;
            var data_series = data.series;
            container_videos.xAxis[0].update({ categories: data_categories });
            container_videos.series[0].update({ data: data_series });
            container_videos.redraw();
        }
    });    
});


let container_relatorios = Highcharts.chart('container_relatorios', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Relatórios de Alta Gerados'
    },
    xAxis: {
        categories: [
            <?php 
            echo "'".implode("', '", $dados_relatorios['categories'])."'";
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '',
        data: [
            <?php 
            echo implode(', ', $dados_relatorios['series']);
            ?>
        ]
    }]
});

$(".data_relatorios").on("change", function(e) {
    $.ajax({
        type: "POST",
        url: "ajax/gt_dash_relatorios",
        data: "&data_inicio_relatorios="+$("#data_inicio_relatorios").val()+"&data_fim_relatorios="+$("#data_fim_relatorios").val()+"&uf="+$("#ufs_relatorios").val()+"&tipo="+$("#tipos_relatorios").val(),
        cache: false,
        dataType: 'json',
        success: function( data ){
            var data_categories = data.categories;
            var data_series = data.series;
            container_relatorios.xAxis[0].update({ categories: data_categories });
            container_relatorios.series[0].update({ data: data_series });
            container_relatorios.redraw();
        }
    });    
});

$(function(){
    $('.data').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true
    });

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    var tb_log = $('.tb_log')
    .on( 'init.dt', function() {
    }).DataTable({
        select: true,
        order: [[4, 'desc']],
        "pageLength": 10,
        "processing": false,
        "stripeClasses": [ 'odd-row', 'even-row' ],
        "responsive": true,
        "language": { "url": "assets/plugins/datatables/js/Portuguese-Brasil.json"}
    });
});

/*
Highcharts.setOptions({
  title: {
    text: ''
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
      text: 'Temperature (°C)'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  }
});

Highcharts.chart('container1', {
  chart: {
    type: 'line'
  },
  series: [{
    name: 'Tokyo',
    data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5]
  }]
});

Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  series: [{
    name: 'London',
    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2]
  }]
});

Highcharts.chart('container3', {
  chart: {
    type: 'scatter'
  },
  series: [{
    name: 'Manufacturing',
    data: [24.4, 24.2, 29.9, 29.2, 32.1, 30.8]
  }]
});

$('#update').bind('click', function() {
  var newData = [66, 66, 66, 99, 99, 99]
  Highcharts.charts.forEach(function(chart, index) {
    chart.series[0].setData(newData);
  });
});

*/
</script>