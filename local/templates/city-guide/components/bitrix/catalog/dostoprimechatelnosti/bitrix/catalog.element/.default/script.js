$(document).ready(function () {

    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
            center: [snt_cor_x, snt_cor_y],
            zoom: 12,
            behaviors: ['default', 'scrollZoom'],
            controls: ['zoomControl', 'fullscreenControl']
        }, {});

        myMap.geoObjects
            .add(new ymaps.Placemark([snt_cor_x, snt_cor_y], {
                balloonContent: '<strong>' + snt_title + '</strong>'
            }, {
                preset: 'islands#icon',
                iconColor: '#ff0000'
            }))
    });
});