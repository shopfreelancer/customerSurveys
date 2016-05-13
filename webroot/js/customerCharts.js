;( function( $, window, document, undefined ) {
    /**
     * plugin builds "product" sub menu for smaller screen resolutions and locale de/en and toggles menu items.
     */
    "use strict";

    // Create the defaults once
    var pluginName = "customerCharts",
        defaults = {
            canvasId : 'customerChartCanvas',
            datasets : [],
            labels : [],
            colors : ['#A9D426','#26D4A8','#D42652','#5536B5','#BF3FBF','#45521C','#ffcccc','#ffff99','#99ff99','#669999']

        };

    function Plugin ( element, options ) {
        this.element = element;
        this.settings = $.extend( {}, defaults, options );
        this._defaults = defaults;
        this._name = pluginName;
        this.init();

    }

    $.extend( Plugin.prototype, {

        /**
         * sets the config according to locale. is called on onLoad() event
         */
        init: function() {
            var me = this,
                opts = me._defaults;

            me.buildAvgChart();
            me.buildCustomerCharts();
            me.showChart();
        },

        /**
         * builds the Chart vor averages and the label list with all timestamps
         *
         */
        buildAvgChart : function(){
            var me = this,
                opts = me._defaults;

            var avgchart = {
                label: "All customers AVG",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: []
            }

            $('.all_survey').each(function(index)
            {
                avgchart.data.push($(this).data('sum'));
                opts.labels.push($(this).data('timestamp'));
            });

            opts.datasets.push(avgchart);
        },
        /**
         * cycle through sets of charts and create config object for every chart
         */
        buildCustomerCharts : function(){
            var me = this,
                opts = me._defaults;

            $('.custom_survey_wrap').each(function(index){
                if(index < 9){
                    var chart = {
                        label: $(this).data('title'),
                        borderColor : opts.colors[index],
                        backgroundColor: opts.colors[index],
                        strokeColor: opts.colors[index],
                        data: []
                    };

                    $(this).find('.custom_survey').each(function(index){
                        chart.data.push($(this).data('sum'));
                    });
                    opts.datasets.push(chart);
                }
            });
        },
        /**
         * build the final chart and show it on canvas element
         */
        showChart : function() {

            var me = this,
                opts = me._defaults;

            var ctx = document.getElementById(opts.canvasId);
            var customerCharts = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: opts.labels,
                    datasets: opts.datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

        },

    } );

    $.fn[ pluginName ] = function( options ) {
        return this.each( function() {
            if ( !$.data( this, "plugin_" + pluginName ) ) {
                $.data( this, "plugin_" +
                              pluginName, new Plugin( this, options ) );
            }
        } );
    };
    $( document ).ready(function()
    {
        $('body').customerCharts();
    });
} )( jQuery, window, document );
