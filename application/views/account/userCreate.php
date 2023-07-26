<div id="ajax">

</div>

<main class="main">
    <section class="register __container">
        <h2>Реєстрація за один крок</h2>


        <?= $error ?>
        <?= $success ?>
        <!-- {$error} -->

        <form action="" method="post" class="register__form">
            <div class="register__wrapper-form">
                <div class="input-add">
                    <input type="text" name="login" id="login" class="input-add__input">
                    <label for="login" class="input-add__label">Ваш логін</label>
                </div>

                <div class="input-add">
                    <div class="input-add__pass-wrapper">
                        <input type="password" name="password" id="password"
                            class="input-add__input input-add__input-pass">
                        <p class="input-add__icon-pass __icon-pass-visible"></p>
                    </div>
                    <label for="password" class="input-add__label">Ваш пароль</label>
                </div>

                <div class="input-add">
                    <div class="input-add__pass-wrapper">
                        <input type="password" id="confirm" name="confirm"
                            class="input-add__input input-add__input-pass">
                        <p class="input-add__icon-pass __icon-pass-visible"></p>
                    </div>
                    <label for="confirm" class="input-add__label">Повторіть пароль</label>
                </div>

                <div class="input-add">
                    <input type="text" id="user-name" name="user-name" class="input-add__input">
                    <label for="user-name" class="input-add__label">Ваше ім’я</label>
                </div>

                <div class="input-add">
                    <input type="text" id="middle-name" name="middle-name" class="input-add__input">
                    <label for="middle-name" class="input-add__label">По-батькові</label>
                </div>

                <div class="input-add">
                    <input type="text" id="last-name" name="last-name" class="input-add__input">
                    <label for="last-name" class="input-add__label">Ваше прізвище</label>
                </div>

                <div class="dropdown">
                    <div class="dropdown__wrapper">
                        <button onclick="event.preventDefault()" class="dropdown__button">gfdf</button>
                        <label for="button" class="dropdown__label">Ваша область</label>
                    </div>
                    <ul class="dropdown__list">
                        <?php 
                        foreach($regions as $region) {
                            $name_region = $region['region_name'];
                            $value = $region['id_region'];
                            echo "<li class='dropdown__list-item s' data-value='$value'>$name_region</li>";
                        }
                        ?>
                    </ul>
                    <input type="text" value="" name="region" hidden class="dropdown__input--hidden">
                </div>

                <div class="dropdown">
                    <div class="dropdown__wrapper">
                        <button onclick="event.preventDefault()" class="dropdown__button">gfdf</button>
                        <label for="button" class="dropdown__label">Ваша область</label>
                    </div>
                    <ul class="dropdown__list">
                        <li class="dropdown__list-item" data-value="option1">Полтава</li>
                        <li class="dropdown__list-item" data-value="option2">Одеса</li>
                        <li class="dropdown__list-item" data-value="option2">Дніпро</li>
                        <li class="dropdown__list-item" data-value="option2">Київ</li>
                        <li class="dropdown__list-item" data-value="option2">Миколаїв</li>
                    </ul>
                    <input type="text" name="city" value="" hidden class="dropdown__input--hidden">
                </div>

                <div class="input-add">
                    <input type="text" id="phone" name="phone" class="input-add__input">
                    <label for="phone" class="input-add__label">Ваш номер телефона</label>
                </div>

                <div class="input-file">
                    <p class="input-file__headline">Фото профілю</p>

                    <div class="input-file__wrapper-input">
                        <input type="file" name="file" id="file" class="input-file__input">
                        <label for="file" class="input-file__label">
                            <p class="input-file__icon-label __icon-upload"></p> Фото не обрано
                        </label>
                    </div>

                </div>
            </div>

            <div class="image-download__wrapper">
                <div class="image-download">
                    <img src="/HTTP-platform/public/img/ava2.jpg" class="image-download__image">
                    <p class="image-download__close __icon-close"></p>
                </div>
            </div>

            <div class="action-group">
                <button type="submit" name="submit" class="action-group__button">Зареєструватись</button>
                <p class="__icon-arrow-right action-group__icon"></p>
            </div>

        </form>
    </section>
</main>

<script>
let region = $('.s');

region.each(function(index, item) {
    $(this).on("click", function() {
        let region = $(this).attr("data-value");

        region = JSON.stringify(region);

        // console.log(region);

        $.ajax({
            url: "/HTTP-platform/account/user-create",
            method: "POST",
            contentType: "application/json",
            dataType: 'json',
            data: {
                data: region
            },
            success: function(data) {
                console.log(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                console.log('error')
            }
        });

    });
})
</script>