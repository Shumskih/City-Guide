function init() {
    // Создаем модель мультимаршрута.
    var multiRouteModel = new ymaps.multiRouter.MultiRouteModel(
        snt_route, {
            reverseGeocoding: true,
        }, {}),

        // Создаём выпадающий список для выбора типа маршрута.
        routeTypeSelector = new ymaps.control.ListBox({
            data: {
                content: 'Как добраться'
            },
            items: [
                new ymaps.control.ListBoxItem({data: {content: "Авто"}, state: {selected: true}}),
                new ymaps.control.ListBoxItem({data: {content: "Общественным транспортом"}}),
                new ymaps.control.ListBoxItem({data: {content: "Пешком"}})
            ],
            options: {
                itemSelectOnClick: false
            }
        }),
        // Получаем прямые ссылки на пункты списка.
        autoRouteItem = routeTypeSelector.get(0),
        masstransitRouteItem = routeTypeSelector.get(1),
        pedestrianRouteItem = routeTypeSelector.get(2);

    // Подписываемся на события нажатия на пункты выпадающего списка.
    autoRouteItem.events.add('click', function (e) {
        changeRoutingMode('auto', e.get('target'));
    });
    masstransitRouteItem.events.add('click', function (e) {
        changeRoutingMode('masstransit', e.get('target'));
    });
    pedestrianRouteItem.events.add('click', function (e) {
        changeRoutingMode('pedestrian', e.get('target'));
    });

    ymaps.modules.require([
        'MultiRouteCustomView'
    ], function (MultiRouteCustomView) {
        new MultiRouteCustomView(multiRouteModel);
    });

    // Создаем карту с добавленной на нее кнопкой.
    var myMap = new ymaps.Map('map', {
            center: [55.750625, 37.626],
            zoom: 11,
            controls: [routeTypeSelector]
        }, {
            buttonMaxWidth: 300
        }),

        // Создаем на основе существующей модели мультимаршрут.
        multiRoute = new ymaps.multiRouter.MultiRoute(multiRouteModel, {
            boundsAutoApply: true
        });

    // Добавляем мультимаршрут на карту.
    myMap.geoObjects.add(multiRoute);

    function changeRoutingMode(routingMode, targetItem) {
        multiRouteModel.setParams({routingMode: routingMode}, true);

        // Отменяем выбор элементов.
        autoRouteItem.deselect();
        masstransitRouteItem.deselect();
        pedestrianRouteItem.deselect();

        // Выбираем элемент и закрываем список.
        targetItem.select();
        routeTypeSelector.collapse();
    }
}

ymaps.ready(init);
