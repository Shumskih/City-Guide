ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
        center: [55.362110, 38.667173],
        zoom: 9,
        behaviors: ['default', 'scrollZoom'],
        controls: ['zoomControl', 'fullscreenControl']
    });
    let clusterer = new ymaps.Clusterer({
        preset: 'islands#invertedVioletClusterIcons',
        gridSize: 64,
        groupByCoordinates: false,
        clusterDisableClickZoom: false,
        clusterHideIconOnBalloonOpen: false,
        geoObjectHideIconOnBalloonOpen: false
    });
    getPointData = function (name, address, url) {
        return {
            balloonContentHeader: '<strong>' + name + '</strong>',
            balloonContentBody: '<b>Адрес:</b> ' + address + '<br>' + '<a href="' + url + '">Открыть</a>',
        };
    };
    getPointOptions = function () {
        return {
            preset: 'islands#violetIcon'
        };
    };
    let geoObjects = [];

    for (let i = 0; i < snt_section_map.length; i++) {
        geoObjects[i] = new ymaps.Placemark(
            [snt_section_map[i].cor_x, snt_section_map[i].cor_y],
            getPointData(
                snt_section_map[i].title,
                snt_section_map[i].address,
                snt_section_map[i].url
            ),
            getPointOptions()
        );
    }

    clusterer.add(geoObjects);
    myMap.geoObjects.add(clusterer);

    myMap.setBounds(clusterer.getBounds(), {
        checkZoomRange: true
    });
});