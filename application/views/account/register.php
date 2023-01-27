<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="wrap-header">
                <img src="../public/img/logo.svg" class="logo">
                <img src="../public/img/menu-icon.svg" class="menu-icon" id="popup__navbar-start">
            </div>
        </div>
    </div>
</header>

<div id="kk"></div>

<main>
    <section class="register">
        <div class="container">
            <h2>Реєстрація користувача</h2>
            <p class="description__register">Не повідомляйте нікому свої особисті дані, це може бути небезпечно
                для вашого профілю</p>

            <?php if(!empty($error)) echo $error;?>
            <?php if(!empty($success)) echo $success;?>

            <p class="form-name__register">Дані користувача</p>
            <form method="post" class="form__register">
                <div class="wrap-form__register">
                    <div class="wrap-input__register">
                        <p>Ваш логін</p>
                        <input type="text" name="login" class="input__register" placeholder="Введіть бажаний логін">
                    </div>

                    <div class="wrap-input__register">
                        <p>Ваш пароль</p>
                        <input type="password" name="password" class="input__register"
                            placeholder="Введіть бажаний пароль">
                    </div>

                    <div class="wrap-input__register">
                        <p>Повторіть пароль</p>
                        <input type="password" name="pass_confirm" id="user-confirm__error" class="input__register"
                            placeholder="Повторіть пароль">
                    </div>

                    <div class="wrap-input__register">
                        <p>Ваше ім’я</p>
                        <input type="text" name="user_name" id="user-name__error" class="input__register"
                            placeholder="Введіть ваше ім’я">
                    </div>

                    <div class="wrap-input__register">
                        <p>По-батькові</p>
                        <input type="text" name="user_middle_name" id="user-middle_name__error" class="input__register"
                            placeholder="По-батькові">
                    </div>

                    <div class="wrap-input__register">
                        <p>Ваше прізвище</p>
                        <input type="text" name="user_surname" id="user-surname__error" class="input__register"
                            placeholder="Введіть ваше прізвище">
                    </div>

                    <!-- <div class="wrap-input__register">
                        <p>Ваша область</p>
                        <select class="select__register" name="region" id="regions">
                            <option value="" disabled selected hidden>Оберіть вашу область</option>
                            <?php foreach($regions as $region) {
                                        echo $region;
                                    } ?>
                        </select>
                    </div>

                    <div class="wrap-input__register">
                        <p>Ваше місто</p>
                        <select class="select__register" id="cities" name="city">
                            <option disabled selected hidden>Оберіть ваше місто</option>
                            <?php foreach($cities as $city) {
                                        echo $city;
                                    } ?>
                        </select>
                    </div> -->

                    <!-- <div class="wrap-input__register">
                        <p>Ваш номер телефону</p>
                        <input type="tel" name="phone" class="input__register" placeholder="Введіть ваш номер телефону"
                            id="user_phone">
                        <div class="user-phone__error"></div>
                    </div> -->

                <button type="submit" name="user_submit" class="button__register">Зареєструватись</button>
            </form>
        </div>
    </section>
</main>

<script>
    
// $("#regions").on("change", function() {
//     $.ajax({
//         url: "..\\application\\core\\Controller",
//         method: "POST",
//         data: {
//             region: $(this).val()
//         },
//         success: function(data) {
//             // $("#cities").html(data);
//             $("#kk").html(data);
//         }
//     });
// });
</script>