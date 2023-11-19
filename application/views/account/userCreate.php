<main class="main">
    <section class="register __container">
        <h2>Реєстрація за один крок</h2>

        <form action="" method="post" class="register__form">
            <div class="register__wrapper-form">
                <div class="input-add">
                    <input type="text" required name="login" id="login" class="input-add__input">
                    <label for="login" class="input-add__label">Ваш логін</label>
                </div>

                <div class="input-add">
                    <div class="input-add__pass-wrapper">
                        <input type="password" required name="password" id="password"
                            class="input-add__input input-add__input-pass">
                        <p class="input-add__icon-pass __icon-pass-visible"></p>
                    </div>
                    <label for="password" class="input-add__label">Ваш пароль</label>
                </div>

                <div class="input-add">
                    <div class="input-add__pass-wrapper">
                        <input type="password" required id="confirm" name="confirm"
                            class="input-add__input input-add__input-pass">
                        <p class="input-add__icon-pass __icon-pass-visible"></p>
                    </div>
                    <label for="confirm" class="input-add__label">Повторіть пароль</label>
                </div>

                <div class="input-add">
                    <input type="text" required id="user-name" name="user-name" class="input-add__input">
                    <label for="user-name" class="input-add__label">Ваше ім’я</label>
                </div>

                <div class="input-add">
                    <input type="text" required id="middle-name" name="middle-name" class="input-add__input">
                    <label for="middle-name" class="input-add__label">По-батькові</label>
                </div>

                <div class="input-add">
                    <input type="text" required id="last-name" name="last-name" class="input-add__input">
                    <label for="last-name" class="input-add__label">Ваше прізвище</label>
                </div>

                <div class="input-add select-form">
                    <select name="region" required id="region" class="input-add__input select-form__select-region">
                        <option value="" hidden>Оберіть область</option>
                        <?php 
                        foreach($regions as $region) {
                            $name_region = $region['name'];
                            $value = $region['id_region'];
                            echo "<option value='$value'>$name_region</option>";
                        }
                        ?>
                    </select>
                    <label for="region" class="input-add__label">Ваш регіон</label>
                </div>

                <div class="input-add select-form">
                    <select name="city" required id="city" class="input-add__input select-form__select-city">
                        <option value="" hidden>Оберіть місто</option>
                    </select>
                    <label for="city" class="input-add__label">Ваше місто</label>
                </div>

                <div class="input-add">
                    <input type="text" required id="phone" name="phone" class="input-add__input">
                    <label for="phone" class="input-add__label">Ваш номер телефона</label>
                </div>
            </div>

            <div class="input-file">
                <p class="input-file__headline">Фото транспорту</p>
                <input type="file" name="file" id="file" class="input-file__input">

                <label for="file" class="input-file__label">
                    <div class="input-file__btn-label">
                        <p class="input-file__btn-icon __icon-upload"></p>
                        <p class="input-file__btn-text">Оберіть фото</p>
                    </div>
                </label>
            </div>

            <div class="image-upload"></div>

            <div class="action-group">
                <button type="submit" name="submit" onclick="event.preventDefault()"
                    class="action-group__button popup-success__start">Зареєструватись</button>
                <p class="__icon-arrow-right action-group__icon"></p>
            </div>

        </form>
    </section>
</main>

<script>
$('.select-form__select-region').on('change', function() {
    var selectedOption = $(this).find(":selected");
    var selectedValue = selectedOption.val();

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/account/user-create',
        dataType: 'json',
        data: {
            isAjax: true,
            region: selectedValue
        },
        success: function(response) {

            $('.select-form__select-city').empty();

            $.each(response, function(index, obj) {
                $('.select-form__select-city').append('<option value=' + obj.id_city + '>' +
                    obj.name + '</option>');
            });

        },
        error: function(response) {

        }
    })
});

var selectedFile;

$('.input-file__input').on('change', function(event) {
    var file = event.target.files[0];

    async function processFiles(file) {
        if (file && file.type.startsWith('image')) {

            var reader = new FileReader();

            selectedFile = file;

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

            $('.image-upload').empty();

            $('.image-upload').append(image);
        }
    }

    processFiles(file);

});

$('.action-group__button').on('click', function() {
    var formDataArray = $(".register__form").serializeArray();

    var formDataObject = {};
    $.each(formDataArray, function(index, field) {
        formDataObject[field.name] = field.value;
    });

    var image = new FormData();
    image.append('file', selectedFile);

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/account/user-create',
        dataType: 'json',
        data: {
            formData: formDataObject
        },
        success: function(response) {
            if (response.status == true) {

                image.append('user_id', response.id_user);

                $.ajax({
                    method: 'POST',
                    url: '/HTTP-platform/account/user-create',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: image,
                    success: function(resp) {
                        $('.image-upload').empty();
                    }
                });

                $('.alert-success').fadeIn();
                $('.alert__title').text('Профіль створено');
                $(".register__form input").val("");
            } else {
                $('.alert-error').fadeIn();
                $('.alert__description').text(response + ', будь ласка, перевірте введені дані');
            }
        },
    })

})
</script>