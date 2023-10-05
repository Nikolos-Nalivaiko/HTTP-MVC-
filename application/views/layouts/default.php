<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/HTTP-platform/public/css/style.css">
    <link rel="stylesheet" href="/HTTP-platform/public/css/iconsfont.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Головна сторінка</title>
</head>

<body>

    <div class="popup-rules">
        <div class="popup-rules__body">
            <p class="popup-rules__headline">Вас вітає платформа HTTP - Logistic service</p>
            <p class="popup-rules__descript">Наша веб-платформа — це місце, де кожен крок і дія важливі. Ми
                докладаємо максимум зусиль, щоб забезпечити зручність, надійність та безпеку наших користувачів.
                Тому, ми розробили спеціальні правила використання, які допомагають створити відмінне враження та
                забезпечити комфортну взаємодію для всіх.</p>
            <p class="popup-rules__prompt">Натиснувши ви даєтє згоду з ознайомленням правил платформи</p>
            <div class="popup-rules__btn-nav">
                <p class="popup-rules__btn popup-rules__btn--close">Згоден</p>
                <a href="" class="popup-rules__btn">Переглянути правила</a>
            </div>
        </div>
    </div>

    <div class="popup-success">
        <div class="popup-success__body">

            <div class="popup-success__icon-wrap">
                <div class="popup-success__icon-inner-wrap">
                    <p class="popup-success__icon __icon-check"></p>
                </div>
            </div>

            <p class="popup-success__headline">Профіль успішно створено</p>
            <p class="popup-success__descript">Тепер у вас є можливість використовувати всі функції та можливості нашої
                платформи
            </p>

            <div class="popup-success__btns">
                <a href="" class="popup-success__btn">На головну</a>
                <a href="" class="popup-success__btn">Особистий кабінет</a>
            </div>

            <div class="popup-success__line"></div>
            <p class="popup-success__close">Закрити</p>

        </div>
    </div>

    <!-- <div class="popup-success popup-success__cargo">
        <div class="popup-success__body">

            <div class="popup-success__icon-wrap">
                <div class="popup-success__icon-inner-wrap">
                    <p class="popup-success__icon __icon-check"></p>
                </div>
            </div>

            <p class="popup-success__headline popup-success__headline-cargo"></p>
            <p class="popup-success__descript popup-success__descript-cargo"></p>

            <div class="popup-success__btns">
                <a href="/HTTP-platform/cargo/add" class="popup-success__btn">Додати новий</a>
                <a href="" class="popup-success__btn">Переглянути</a>
            </div>

            <div class="popup-success__line"></div>
            <p class="popup-success__close">Закрити</p>

        </div>
    </div> -->

    <div class="popup-error">
        <div class="popup-error__body">

            <div class="popup-error__icon-wrap">
                <div class="popup-error__icon-inner-wrap">
                    <p class="popup-error__icon __icon-close"></p>
                </div>
            </div>

            <p class="popup-error__headline"></p>
            <p class="popup-error__descript">Будь ласка, перевірте введені дані, щоб уникнути подібних ситуацій у
                майбутньому
            </p>

            <div class="popup-error__line"></div>
            <p class="popup-error__close">Закрити</p>

        </div>
    </div>

    <div class="wrapper">
        <div class="navbar">
            <div class="navbar__wrapper wrapper__container">
                <img src="/HTTP-platform/public/img/logo.svg" alt="logo" class="logo">
                <div class="navbar__list">
                    <a href="/HTTP-platform" class="navbar__link">Головна</a>
                    <a href="/HTTP-platform/cargo/list" class="navbar__link">Вантажі</a>
                    <a href="" class="navbar__link">Транспорт</a>
                    <a href="/HTTP-platform/cargo/add" class="navbar__link">Додати вантаж</a>
                    <a href="" class="navbar__link">Додати транспорт</a>
                </div>
                <a href="/HTTP-platform/account/login" class="navbar__button">Увійти</a>
            </div>
        </div>

        <?= $content ?>

        <footer class="footer">
            <div class="footer__wrapper __container">
                <img src="/HTTP-platform/public/img/logo_footer.svg" class="logo">

                <div class="footer__navbar">
                    <a href=" " class="footer__navbar-element">Головна</a>
                    <a href="" class="footer__navbar-element">Вантажі</a>
                    <a href="" class="footer__navbar-element">Транспорт</a>
                    <a href="" class="footer__navbar-element">Додати вантаж</a>
                    <a href="" class="footer__navbar-element">Додати транспорт</a>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="/HTTP-platform/public/js/script.js"></script>
    <script type="text/javascript" src="/HTTP-platform/public/js/jquery.mask.min.js"></script>
    <script>
    Slider();
    popupRules()
    activeLabel();
    visiblePass();
    phoneMask();
    closeInfoPopup();
    </script>
</body>

</html>