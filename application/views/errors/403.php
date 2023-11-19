<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/HTTP-platform/public/css/style.css">
    <link rel="stylesheet" href="/HTTP-platform/public/css/iconsfont.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Доступ заборонено</title>
</head>

<body>
    <div class="wrapper">
        <div class="navbar">
            <div class="navbar__wrapper wrapper__container">
                <div class="logo__wrapper--mobile">
                    <img src="/HTTP-platform/public/img/logo.svg" alt="logo" class="logo">

                    <p class="navbar--mobile__open __icon-menu"></p>
                </div>

                <div class="navbar__list">
                    <a href="index.php" class="navbar__link">Головна</a>

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
                <a href="/HTTP-platform/account/login" class="navbar__button">Увійти</a>
            </div>
        </div>

        <main class="main">
            <section class="no-access __container">
                <div class="no-access__block">
                    <p class="no-access__icon __icon-lock"></p>
                    <h2 class="no-access__headline">Авторизуйтесь або створіть профіль</h2>
                    <p class="no-access__descript">Авторизація дозволить вам користуватися всіма перевагами нашої
                        платформи
                        та мати можливість налаштувати персоналізовані параметри.</p>
                    <div class="no-access__btn-wrap">
                        <a href="/HTTP-platform/account/login" class="no-access__btn">Увійти</a>
                        <a href="/HTTP-platform/account/select" class="no-access__btn">Створити профіль</a>
                    </div>
                </div>
            </section>
        </main>

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
</body>

</html>