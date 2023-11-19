<main class="main">
    <section class="cargo-add __container">
        <h2>Додавання нового вантажу</h2>

        <form action="" method="post" class="cargo-add__form">
            <div class="cargo-add__wrapper-inputs">

                <div class="input-add">
                    <input type="text" id="name" name="name" class="input-add__input">
                    <label for="name" class="input-add__label">Назва товару</label>
                </div>

                <div class="input-add">
                    <input type="text" id="description" name="description" class="input-add__input">
                    <label for="description" class="input-add__label">Опис товару</label>
                </div>

                <div class="input-add select-form">
                    <select name="load_region" id="load_region" class="input-add__input">
                        <option value="" hidden>Оберіть область завантаження</option>
                        <?php 
                        foreach($regions as $region) {
                            $name_region = $region['name'];
                            $value = $region['id_region'];
                            echo "<option value='$value'>$name_region</option>";
                        }
                        ?>
                    </select>
                    <label for="load_region" class="input-add__label">Область завантаження</label>
                </div>

                <div class="input-add select-form">
                    <select name="load_city" id="load_city" class="input-add__input">
                        <option value="" hidden>Оберіть місто завантаження</option>
                    </select>
                    <label for="load_city" class="input-add__label">Місто завантаження</label>
                </div>

                <div class="input-add">
                    <input type="date" id="load_date" name="load_date" class="input-add__input">
                    <label for="load_date" class="input-add__label">Дата завантаження</label>
                </div>

                <div class="input-add">
                    <input type="number" step="any" name="weight" id="weight" class="input-add__input">
                    <label for="weight" class="input-add__label">Вага</label>
                </div>

                <div class="input-add select-form">
                    <select name="body" class="input-add__input">
                        <option value="" hidden>Оберіть тип кузова</option>
                        <?php 
                        foreach($bodies as $body) {
                            $name_body = $body['name'];
                            $value = $body['id_body'];
                            echo "<option value='$value'>$name_body</option>";
                        }
                        ?>
                    </select>
                    <label for="body" class="input-add__label">Тип кузова</label>
                </div>

                <div class="input-add">
                    <input type="number" step="any" name="distance" id="distance" class="input-add__input">
                    <label for="distance" class="input-add__label">Відстань</label>
                </div>

                <div class="input-add select-form">
                    <select name="unload_region" id="unload_region" class="input-add__input">
                        <option value="" hidden>Оберіть область розвантаження</option>
                        <?php 
                        foreach($regions as $region) {
                            $name_region = $region['name'];
                            $value = $region['id_region'];
                            echo "<option value='$value'>$name_region</option>";
                        }
                        ?>
                    </select>
                    <label for="unload_region" class="input-add__label">Область розвантаження</label>
                </div>

                <div class="input-add select-form">
                    <select name="unload_city" id="unload_city" class="input-add__input">
                        <option value="" hidden>Оберіть місто розвантаження</option>
                    </select>
                    <label for="unload_city" class="input-add__label">Місто розвантаження</label>
                </div>

                <div class="input-add">
                    <input type="date" id="unload_date" name="unload_date" class="input-add__input">
                    <label for="unload_date" class="input-add__label">Дата розвантаження</label>
                </div>

                <div class="input-add">
                    <input type="number" step="any" name="price" id="price" class="input-add__input">
                    <label for="price" class="input-add__label">Ціна</label>
                </div>

                <div class="input-add select-form">
                    <select name="pay_method" class="input-add__input">
                        <option value="" hidden>Оберіть тип оплати</option>
                        <?php 
                        foreach($payments as $payment) {
                            $name_payment = $payment['name'];
                            $value = $payment['id_payment'];
                            echo "<option value='$value'>$name_payment</option>";
                        }
                        ?>
                    </select>
                    <label for="pay_method" class="input-add__label">Тип оплати</label>
                </div>

            </div>

            <div class="cargo-add__wrap-btn-form">
                <button type="submit" onclick="event.preventDefault()"
                    class="action-group__button cargo-add__button">Зареєструватись</button>

                <div class="remember-box">
                    <input type="checkbox" id="remember" name="urgent" class="remember-box__input">
                    <label for="remember" class="remember-box__label">Терміновий вантаж</label>
                </div>
            </div>

        </form>
    </section>
</main>

<script>
$('#load_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedLoadValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/cargo/add',
        dataType: 'json',
        data: {
            loadRegion: selectedLoadValue
        },
        success: function(response) {

            $('#load_city').empty();

            $.each(response, function(index, obj) {
                $('#load_city').append('<option value=' + obj.id_city + '>' +
                    obj.name + '</option>');
            });

        },
        error: function(response) {

        }
    })
});

$('#unload_region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedLoadValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/cargo/add',
        dataType: 'json',
        data: {
            loadRegion: selectedLoadValue
        },
        success: function(response) {

            $('#unload_city').empty();

            $.each(response, function(index, obj) {
                $('#unload_city').append('<option value=' + obj.id_city + '>' +
                    obj.name + '</option>');
            });

        },
        error: function(response) {

        }
    })
});

$('.cargo-add__button').on('click', function() {
    var formDataArray = $(".cargo-add__form").serializeArray();

    var formDataObject = {};
    $.each(formDataArray, function(index, field) {
        formDataObject[field.name] = field.value;
    });

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/cargo/add',
        dataType: 'json',
        data: {
            formData: formDataObject
        },
        success: function(response) {

            if (response.status == true) {
                $('.alert-success').fadeIn();

                $('.alert__title').text('Вантаж додано');

                $('.alert__description').text(
                    'Ваш вантаж під номером #' + response.id_cargo +
                    ' було успішно додано до списку перевезень'
                );

                $(".cargo-add__form input").val("");
            } else {
                $('.alert-error').fadeIn();
                $('.alert__description').text(response.message);
            }

        },
        error: function(response) {

        }
    })
})
</script>