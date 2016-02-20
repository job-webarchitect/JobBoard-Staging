// Morris.js Charts sample data for SB Admin template

$(function() {

    // Area Chart
    Morris.Line({
        element: 'morris-area-chart',
        data: [{
            Duration: '2010 Q1',
            position: 2666,
            Jobs: 1914,
            itouch: 2293
        }, {
            Duration: '2010 Q2',
            position: 2778,
            Jobs: 1914,
            itouch: 2293
        }, {
            Duration: '2010 Q3',
            position: 4912,
            Jobs: 1914,
            itouch: 2293
        }, {
            Duration: '2010 Q4',
            position: 3767,
            Jobs: 1914,
            itouch: 2293
        }, {
            Duration: '2011 Q1',
            position: 6810,
            Jobs: 1914,
            itouch: 2293
        }, {
            Duration: '2011 Q2',
            position: 5670,
            Jobs: 4293,
            itouch: 1881
        }, {
            Duration: '2011 Q3',
            position: 4820,
            Jobs: 3795,
            itouch: 1588
        }, {
            Duration: '2011 Q4',
            position: 15073,
            Jobs: 5967,
            itouch: 5175
        }, {
            Duration: '2012 Q1',
            position: 10687,
            Jobs: 4460,
            itouch: 2028
        }, {
            Duration: '2012 Q2',
            position: 8432,
            Jobs: 5713,
            itouch: 1791
        }],
        xkey: 'Duration',
        ykeys: ['position'],
        labels: ['Position','Jobs','Amount','position'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    
    

});
