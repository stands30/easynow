var Dashboard = function() {

    return {
    
        

        initAmChart1: function() {
            // alert('>>initAnChart4');
            if (typeof(AmCharts) === 'undefined' || $('#chartdiv').size() === 0) {
                return;
            }


            var chart = AmCharts.makeChart("chartdiv", {

                "type": "pie",
                "theme": "light",
                "path": "../assets/global/plugins/amcharts/ammap/images/",
                "dataLoader": {
                    "url": base_url+'account/category_income',
                    "format": "json"
                    },
                "valueField": "acc",
                "titleField": "tck_status",
                "outlineAlpha": 0.4,
                "depth3D": 15,
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "angle": 25,
                "autoMargins": false,
                "marginTop": 0,
                "marginBottom": 0,
                "marginLeft": 0,
                "marginRight": 0,
                 "pullOutRadius": 5,
                "export": {
                    "enabled": true
                }

            });

          
            jQuery('.chart-input').off().on('input change', function() {
                var property = jQuery(this).data('property');
                var target = chart;
                var value = Number(this.value);
                chart.startDuration = 0;

                if (property == 'innerRadius') {
                    value += "%";
                }

                target[property] = value;
                chart.validateNow();
            });
        },

      
        init: function() {
            this.initAmChart1();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(); // init metronic core componets
    });
}


