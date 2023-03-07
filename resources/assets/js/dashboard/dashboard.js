'use strict';
document.addEventListener('turbo:load', loadDashboardData);

function  loadDashboardData(){
    let dashboardChartBGColor = $('#dashboardChartBGColor').val()
    const timeRange = $('#timeRange');
    let start = moment().subtract(30, 'days');
    let end = moment();
    window.cb = function (start, end) {
        timeRange.find('span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        loadChartData(start.format('MMM D, YYYY'), end.format('MMM D, YYYY'));
    };

    timeRange.daterangepicker({
        startDate: start,
        endDate: end,
        opens: 'left',
        maxDate: moment(),
        showDropdowns: true,
        autoUpdateInput: false,
        locale:{
            customRangeLabel: Lang.get('messages.common.custom'),
            applyLabel:Lang.get('messages.common.apply'),
            cancelLabel: Lang.get('messages.common.cancel'),
            fromLabel:Lang.get('messages.common.from'),
            toLabel: Lang.get('messages.common.to'),
            monthNames: [
                Lang.get('messages.months.jan'),
                Lang.get('messages.months.feb'),
                Lang.get('messages.months.mar'),
                Lang.get('messages.months.apr'),
                Lang.get('messages.months.may'),
                Lang.get('messages.months.jun'),
                Lang.get('messages.months.jul'),
                Lang.get('messages.months.aug'),
                Lang.get('messages.months.sep'),
                Lang.get('messages.months.oct'),
                Lang.get('messages.months.nov'),
                Lang.get('messages.months.dec')
            ],
            daysOfWeek: [
                Lang.get('messages.weekdays.sun'),
                Lang.get('messages.weekdays.mon'),
                Lang.get('messages.weekdays.tue'),
                Lang.get('messages.weekdays.wed'),
                Lang.get('messages.weekdays.thu'),
                Lang.get('messages.weekdays.fri'),
                Lang.get('messages.weekdays.sat')
            ],
        },
        ranges: {
            [Lang.get('messages.days.this_week')]: [moment().startOf('week'), moment().endOf('week')],
            [Lang.get('messages.days.last_week')]: [moment().startOf('week').subtract(7, 'days'), moment().startOf('week').subtract(1, 'days')]
        }
    }, cb);
    cb(start, end);

    function loadChartData(startDate, endDate) {
        if (!$('#postChartContainer').length) {
            return
        }
        $.ajax({
            type: 'GET',
            url: '/admin/chart',
            dataType: 'json',
            data: {
                start_date: startDate,
                end_date: endDate,
            },
            success: function (result) {
                chart(result.data)
            }
        });
    }

    function chart(result) {
        if (!$('#postChartContainer').length) {
            return
        }
        $('#postChartContainer').empty();
        $('#postChartContainer').append('<canvas id="postChart" class="post-chart" style="display: block; width: 905px; height: 400px;"></canvas>');

        new Chart("postChart", {
            type: "line",
            data: {
                labels: result.labels,
                datasets: [{
                    label: Lang.get('messages.details.views'),
                    fill: true,
                    lineTension: 0.5,
                    backgroundColor: dashboardChartBGColor,
                    borderColor: "rgba(0,0,255,0.1)",
                    data: result.data,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    },
                }
            }
        });
    }
};
