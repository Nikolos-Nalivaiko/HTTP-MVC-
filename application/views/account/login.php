<main class="main">
    <section class="login __container">
        <h2 class="login__headline">Ласкаво просимо</h2>

        <form action="" method="post" class="login__form">
            <fieldset class="login__fieldset">
                <legend class="login__legend">Ваш логін</legend>
                <input type="text" name="login_auth" class="login__input">
            </fieldset>

            <fieldset class="login__fieldset">
                <legend class="login__legend">Ваш пароль</legend>
                <div class="login__wrapper-pass">
                    <input type="password" name="pass_auth" class="login__input">
                    <p class="login__icon-pass __icon-pass-visible"></p>
                </div>
            </fieldset>

            <div class="remember-box">
                <input type="checkbox" id="remember" name="remember_auth" class="remember-box__input">
                <label for="remember" class="remember-box__label">Запам’ятати мене</label>
            </div>

            <button type="submit" name="submit_auth" onclick="event.preventDefault()"
                class="login__button">Авторизуватись</button>

            <p class="login__action-text">Не маєте обліковий запис ? <a href="select"
                    class="login__link">Зареєструйтесь</a></p>

            <a href="" class="login__data">
                <div class="login__data-wrapper">
                    <p class="login__data-icon __icon-setting"></p>
                    <p class="login__data-text">Відновити дані</p>
                </div>

                <p class="login__data-arrow __icon-slider-right"></p>
            </a>
        </form>

    </section>
</main>

<script>
$('.login__button').on('click', function() {
    var formDataArray = $(".login__form").serializeArray();

    var formDataObject = {};
    $.each(formDataArray, function(index, field) {
        formDataObject[field.name] = field.value;
    });

    $.ajax({
        method: 'POST',
        url: '/HTTP-platform/account/login',
        dataType: 'json',
        data: {
            formData: formDataObject
        },
        success: function(response) {

            if (response == true) {
                window.location.href = "/HTTP-platform";
            } else {
                $('.popup-error').fadeIn();
                $('.popup-error__headline').text(response);
            }

        },
        error: function(response) {

        }
    })

})
</script>