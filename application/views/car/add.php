<main class="main">
    <section class="car-add __container">
        <h2>Додавання нового транспорту</h2>

        <div class="response-container"></div>

        <form action=" " method="POST" class="car-add__form" enctype="multipart/form-data">
            <div class="car-add__form-inner-wrap">

                <div class="input-add select-form">
                    <select name="brand" id="brand" class="input-add__input">
                        <option value="" hidden>Оберіть марку</option>
                        <?php
                        foreach ($brands as $brand) {
                            $name = $brand['name'];
                            $value = $brand['id_brand'];
                            echo "<option value='$value'>$name</option>";
                        }
                        ?>
                    </select>
                    <label for="brand" class="input-add__label">Марка</label>
                </div>

                <div class="input-add select-form">
                    <select name="model" id="model" class="input-add__input">
                        <option value="" hidden>Оберіть модель</option>
                    </select>
                    <label for="model" class="input-add__label">Модель</label>
                </div>

                <div class="input-add">
                    <input type="number" name="engine" step="any" id="engine" class="input-add__input">
                    <label for="engine" class="input-add__label">Об'єм двигуна</label>
                </div>

                <div class="input-add select-form">
                    <select name="wheel-mode" id="wheel-mode" class="input-add__input">
                        <option value="" hidden>Оберіть привід</option>
                        <option value="Передній">Передній</option>
                        <option value="Задній">Задній</option>
                        <option value="Повний">Повний</option>
                    </select>
                    <label for="wheel-mode" class="input-add__label">Привід</label>
                </div>

                <div class="input-add select-form">
                    <select name="gearbox" id="gearbox" class="input-add__input">
                        <option value="" hidden>Оберіть тип КПП</option>
                        <option value="Механіка">Механіка (МКПП)</option>
                        <option value="Автомат">Автомат (АКПП)</option>
                    </select>
                    <label for="gearbox" class="input-add__label">Тип КПП</label>
                </div>

                <div class="input-add">
                    <input type="number" name="power" step="any" id="power" class="input-add__input">
                    <label for="power" class="input-add__label">Потужність</label>
                </div>

                <div class="input-add">
                    <input type="number" name="mileage" step="any" id="mileage" class="input-add__input">
                    <label for="mileage" class="input-add__label">Пробіг</label>
                </div>

                <div class="input-add select-form">
                    <select name="engine-type" id="engine-type" class="input-add__input">
                        <option value="" hidden>Оберіть тип двигуна</option>
                        <option value="Дизель">Дизель</option>
                        <option value="Бензин">Бензин</option>
                        <option value="Газ/Бензин">Газ/Бензин</option>
                    </select>
                    <label for="engine-type" class="input-add__label">Тип двигуна</label>
                </div>

                <div class="input-add select-form">
                    <select name="body" id="body" class="input-add__input">
                        <option value="" hidden>Оберіть тип кузова</option>
                        <?php
                        foreach ($bodies as $body) {
                            $name = $body['name'];
                            $value = $body['id_body'];
                            echo "<option value='$value'>$name</option>";
                        }
                        ?>
                    </select>
                    <label for="body" class="input-add__label">Тип кузова</label>
                </div>

                <div class="input-add">
                    <input type="load-volume" name="load-volume" step="any" id="load-volume" class="input-add__input">
                    <label for="load-volume" class="input-add__label">Вантажопідйомність</label>
                </div>

                <div class="input-add select-form">
                    <select name="region" id="region" class="input-add__input">
                        <option value="" hidden>Оберіть oбласть знаходження</option>
                        <?php
                        foreach ($regions as $region) {
                            $name_region = $region['name'];
                            $value = $region['id_region'];
                            echo "<option value='$value'>$name_region</option>";
                        }
                        ?>
                    </select>
                    <label for="region" class="input-add__label">Область знаходження</label>
                </div>

                <div class="input-add select-form">
                    <select name="city" id="city" class="input-add__input">
                        <option value="" hidden>Оберіть місто знаходження</option>
                    </select>
                    <label for="city" class="input-add__label">Місто знаходження</label>
                </div>

                <div class="input-add">
                    <input type="text" id="description" name="description" class="input-add__input">
                    <label for="description" class="input-add__label">Опис</label>
                </div>

                <div class="input-add">
                    <input type="number" name="price" step="any" id="price" class="input-add__input">
                    <label for="price" class="input-add__label">Ціна / доба</label>
                </div>
            </div>

            <div class="input-file">
                <p class="input-file__headline">Фото транспорту</p>
                <input type="file" multiple name="files[]" id="file" class="input-file__input">

                <label for="file" class="input-file__label">
                    <div class="input-file__btn-label">
                        <p class="input-file__btn-icon __icon-upload"></p>
                        <p class="input-file__btn-text">Оберіть фото</p>
                    </div>
                </label>
            </div>

            <div class="image-upload">
            </div>

            <div class="action-group car-add__action-group">
                <button type="submit" class="action-group__button car-add__submit"
                    onclick="event.preventDefault()">Додати транспорт</button>
                <p class="__icon-arrow-right action-group__icon"></p>
            </div>

        </form>

    </section>
</main>

<script>
$('#region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedLoadValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/car/add',
        dataType: 'json',
        data: {
            region: selectedLoadValue
        },
        success: function(response) {

            $('#city').empty();

            $.each(response, function(index, obj) {
                $('#city').append('<option value=' + obj.id_city + '>' +
                    obj.name + '</option>');
            });

        },
        error: function(response) {

        }
    })
});

$('#brand').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedLoadValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/car/add',
        dataType: 'json',
        data: {
            brand: selectedLoadValue
        },
        success: function(response) {

            $('#model').empty();

            $.each(response, function(index, obj) {
                $('#model').append('<option value=' + obj.id_model + '>' +
                    obj.name + '</option>');
            });

        },
        error: function(response) {

        }
    })
});

var selectedFiles = [];

$('.input-file__input').on('change', function(event) {
    var files = event.target.files;

    async function processFiles(files) {
        for (const file of files) {
            if (file && file.type.startsWith('image')) {
                var reader = new FileReader();

                selectedFiles.push(file);

                const imageLoaded = new Promise(resolve => {
                    reader.onload = function(e) {
                        resolve(e.target.result);
                    };
                });

                reader.readAsDataURL(file);

                const imageUrl = await imageLoaded;

                var image = `<div class="image-upload__wrapper">
                            <p class="image-upload__close __icon-close"></p>
                            <img src="${imageUrl}" alt="" class="image-upload__image">
                        </div>`;

                $('.image-upload').append(image);

                $('.image-upload__close').off('click').on('click', function() {
                    var clickedElement = $(this);
                    var next = $(this).next();

                    var parentElements = $(this).closest('.image-upload__wrapper');
                    var index = $('.image-upload__wrapper').index(parentElements);
                    selectedFiles.splice(index, 1);
                    parentElements.fadeOut();
                });

                var firstWrap = $('.image-upload__image')[0].closest('.image-upload__wrapper')
                $(firstWrap).addClass("image-upload__active");
                $(firstWrap).append('<p class="image-upload__active-icon __icon-check"></p>');
                selectedFiles[0].preview_status = 1;

                $('.image-upload__image').off('click').on('click', function() {
                    var clickedElement = $(this);
                    var clickBlock = $(this).closest('.image-upload__wrapper');

                    var index = $('.image-upload__wrapper').index(clickBlock);
                    previewFile = selectedFiles[index];

                    $.each($('.image-upload__image'), function(index, obj) {
                        var $obj = $(obj);
                        var allBlock = $obj.closest('.image-upload__wrapper');
                        if (allBlock.length > 0) {
                            allBlock.removeClass("image-upload__active");
                            $('.image-upload__wrapper .image-upload__active-icon').remove();
                        }
                    });

                    $.each(selectedFiles, function(index, preview) {
                        preview.preview_status = 0;
                    });

                    clickBlock.addClass("image-upload__active");
                    clickBlock.append('<p class="image-upload__active-icon __icon-check"></p>');
                    previewFile.preview_status = 1;
                });

            }
        }
    }


    var fileInput = $('.input-file__input')[0];
    var files = fileInput.files;
    processFiles(files);

});

$('.car-add__submit').on('click', function() {

    var formData = new FormData($('.car-add__form')[0]);
    var formDataArray = $(".car-add__form").serializeArray();

    var formDataObject = {};
    $.each(formDataArray, function(index, field) {
        formDataObject[field.name] = field.value;
    });

    if (selectedFiles.length > 0) {
        var fileInput = $('.input-file__input')[0];
        var files = fileInput.files;
        var images = new FormData();

        $.each(selectedFiles, function(index, file) {
            images.append('files[]', file);
            images.append('preview[]', file.preview_status);
        });
    }

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/car/add',
        dataType: 'json',
        data: {
            formData: formDataObject,
        },
        success: function(response) {
            if (response.status == true) {

                if (selectedFiles.length > 0) {
                    images.append('car_id', response.id_car);

                    $.ajax({
                        method: 'POST',
                        url: '/HTTP-platform/car/add',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: images,
                        success: function(res) {
                            $('.image-upload').empty();
                            console.log(res);
                        }
                    });
                }

                $('.alert-success').fadeIn();

                $('.alert__description').text(
                    'Ваш транспорт під номером #' + response.id_car +
                    ' було успішно додано до списку транспорту'
                );

                $('.alert__title').text('Транспорт додано');

                $(".car-add__form input").val("");

            } else {
                $('.alert-error').fadeIn();
                $('.alert__description').text(response.message);
            }
        },
    })

})
</script>