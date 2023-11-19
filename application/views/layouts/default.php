<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/HTTP-platform/public/css/style.css">
    <link rel="stylesheet" href="/HTTP-platform/public/css/iconsfont.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title><?= $title ?></title>
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

    <div class="alert alert-success">
        <div class="alert__body">

            <div class="alert__header">
                <p class="alert__icon alert__icon __icon-check"></p>
                <div class="alert__header-text">
                    <p class="alert__subtitle">Статус</p>
                    <p class="alert__title">Профіль створено</p>
                </div>
            </div>

            <p class="alert__description">Ваш профіль під номером #45215 було успішно створено</p>

            <p class="alert__close">Закрити</p>

        </div>
    </div>

    <div class="alert alert-error">
        <div class="alert__body">

            <div class="alert__header">
                <p class="alert__icon alert__icon--error __icon-close"></p>
                <div class="alert__header-text">
                    <p class="alert__subtitle">Статус</p>
                    <p class="alert__title">Виникла помилка</p>
                </div>
            </div>

            <p class="alert__description">Ваш профіль під номером #45215 було успішно створено</p>

            <p class="alert__close">Закрити</p>

        </div>
    </div>

    <div class="wrapper">
        <div class="navbar">
            <div class="navbar__wrapper wrapper__container">
                <div class="logo__wrapper--mobile">
                    <img src="/HTTP-platform/public/img/logo.svg" alt="logo" class="logo">

                    <p class="navbar--mobile__open __icon-menu"></p>
                </div>

                <div class="navbar__list">
                    <a href="/HTTP-platform" class="navbar__link">Головна</a>

                    <div class="navbar__list--cargo-on navbar__link">
                        <p class="navbar__dropdown-sublink">Вантажі</p>
                        <div class="navbar__dropdown dropdown-cargo">
                            <a class="navbar__dropdown-link" href="/HTTP-platform/cargo/list">
                                <p class="navbar__dropdown-icon __icon-cargos"></p>
                                <div class="navbar__dropdown-text">
                                    <p class="navbar__dropdown-headline">Біржа вантажів</p>
                                    <p class="navbar__dropdown-descript">Ваш шлях до надійних перевезень</p>
                                </div>
                            </a>

                            <a class="navbar__dropdown-link" href="/HTTP-platform/cargo/add">
                                <p class="navbar__dropdown-icon __icon-cargo_add"></p>
                                <div class="navbar__dropdown-text">
                                    <p class="navbar__dropdown-headline">Додати вантаж</p>
                                    <p class="navbar__dropdown-descript">Віддайте свої вантажі у надійні руки
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="navbar__list--car-on navbar__link">
                        <p class="navbar__dropdown-sublink">Транспорт</p>
                        <div class="navbar__dropdown dropdown-car">
                            <a class="navbar__dropdown-link" href="/HTTP-platform/car/list">
                                <p class="navbar__dropdown-icon __icon-truck_one"></p>
                                <div class="navbar__dropdown-text">
                                    <p class="navbar__dropdown-headline">Біржа транспорту</p>
                                    <p class="navbar__dropdown-descript">Знайдіть свій ідеальний транспорт</p>
                                </div>
                            </a>

                            <a class="navbar__dropdown-link" href="/HTTP-platform/car/add">
                                <p class="navbar__dropdown-icon __icon-truck_second"></p>
                                <div class="navbar__dropdown-text">
                                    <p class="navbar__dropdown-headline">Додати транспорт</p>
                                    <p class="navbar__dropdown-descript">Кожне авто - це ключ до можливостей
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php 
                if ($auth['auth'] == true) { ?>
                <a href="" class="profile-link">
                    <div class="profile-link__text">
                        <p class="profile-link__name"><?= $auth['last_name']?> <?= $auth['user_name']?>
                            <?= $auth['middle_name']?></p>
                        <p class="profile-link__status"><?= $auth['status']?></p>
                    </div>
                    <?php
                        if($auth['image'] != 'default.jpg') {
                            echo "<img src='/HTTP-platform/public/user_uploads/".$auth['image']."' class='profile-link__image'>";
                        } else {
                            echo "<img src='/HTTP-platform/public/img/non-avatar.jpg' class='profile-link__image'>";
                        }
                    ?>
                </a>
                <?php
                } else {
                    echo "<a href='/HTTP-platform/account/login' class='navbar__button'>Увійти</a>";
                }
                ?>
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
    SliderCarImages();
    </script>
</body>

</html>