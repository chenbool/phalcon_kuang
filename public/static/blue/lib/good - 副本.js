//数据模型 time0 open1 close2 min3 max4 vol5 tag6 macd7 dif8 dea9
//['2015-10-19',18.56,18.25,18.19,18.56,55.00,0,-0.00,0.08,0.09] 

var data0 = splitData([]);

function splitData(rawData) {
    var categoryData = [];
    var values = [];
    var macds = [];
    var difs = [];
    var deas = [];
    for (var i = 0; i < rawData.length; i++) {
        categoryData.push(rawData[i].splice(0, 1)[0]);
        values.push(rawData[i])
        macds.push(rawData[i][6]);
        difs.push(rawData[i][7]);
        deas.push(rawData[i][8]);
    }
    return {
        categoryData: categoryData,
        values: values,
        macds: macds,
        difs: difs,
        deas: deas
    };
}

var option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross'
        }
    },
    grid: [{
        left: '3%',
        top: '1%',
        height: '52%'
    }, {
        left: '3%',
        right: '10%',
        top: '60%',
        height: '15%'
    }],
    xAxis: [{
        type: 'category',
        data: data0.categoryData,
        scale: true,
        boundaryGap: false,
        axisLine: {
            onZero: false,
            lineStyle: {
                color: 'red',
            }
        },
        splitLine: {
            show: false
        },
        splitNumber: 20
    }, {
        type: 'category',
        gridIndex: 1,
        data: data0.categoryData,
        axisLabel: {
            show: true
        },

    }],
    yAxis: [{
        scale: true,
        splitArea: {
            show: true
        },
        axisLine: {
            lineStyle: {
                color: 'red',
            }
        },
        position: 'right'
    }, {
        gridIndex: 1,
        splitNumber: 5,
        axisLine: {
            onZero: true
        },
        axisTick: {
            show: false
        },
        splitLine: {
            show: true
        },
        axisLabel: {
            show: true
        },
        axisLine: {
            lineStyle: {
            color: 'red'
            }
        },
        position: 'right'
    }],
    series: [{
            type: 'candlestick',
            data: data0.values,
            markLine: {
                silent: true,
                data: [{
                    yAxis: 2222,
                }]
            }
        }, {
            name: 'DIF',
            type: 'line',
            // xAxisIndex: 1,
            // yAxisIndex: 1,
            data: data0.difs,
            gridIndex: 1,
            axisLabel: {
                show: true
            }
        }, {
            name: 'DIF',
            type: 'line',
            xAxisIndex: 1,
            yAxisIndex: 1,
            data: data0.difs,
        }



    ]
};

