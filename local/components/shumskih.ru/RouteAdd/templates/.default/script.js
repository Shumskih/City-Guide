let points_max = 90;

function updateBoxCount() {
    points_current = 65;
    $('.box-form .box-count').each(function (index, item) {
        $(this).html(String.fromCharCode(points_current));
        points_current++;
    })
}

function updateRoute() {
    snt_route = [];
    $('.box-form select').each(function (index, item) {
        let id = $(item).val();
        if (id > 0) {
            let el = [
                places[id]['MAP'][0],
                places[id]['MAP'][1]
            ];
            snt_route.push(el);
        }
    });

    $('#map').html('');
    $('#viewContainer').html('');
    init();
}

$(document).ready(function () {
    $('.box-form').on('click', '.select-delete', function () {
        $(this).parents('.form-row').remove();
        updateBoxCount();
        updateRoute();
    });

    $('.box-form').on('change', 'select', function () {
        updateRoute();
    });

    $('#select-add').on('click', function () {
        if (points_current < points_max) {
            select_count++;
            let select_text = '<div class="form-row">\n' +
                '                        <div class="col-1">\n' +
                '                            <div class="box-count">\n' +
                String.fromCharCode(points_current) +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-10 col-md-6">\n' +
                '                            <select name="place[]" id="place' + select_count + '" class="form-control">\n' +
                '                                <option value="0">Не выбрано</option>\n' +
                '                                \n' +
                '                            </select>\n' +
                '                        </div>\n' +
                '                        <div class="col-1">\n' +
                '                            <a data-select="' + select_count + '" class="btn btn-danger select-delete">\n' +
                '                                <i class="fas fa-trash-alt"></i>\n' +
                '                            </a>\n' +
                '                        </div>\n' +
                '                    </div>';

            $('.box-form').append(select_text);

            for (let item in places) {
                $('#place' + select_count).append('<option value="' + item + '">' + places[item]['NAME'] + '</option>');
            }

            points_current++;
        } else {
            alert('Превышено максимально допустимое количество точек!');
        }
    })
});