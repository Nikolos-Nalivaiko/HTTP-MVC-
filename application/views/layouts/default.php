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
    <div class="wrapper">

        <div class="navbar">
            <div class="navbar__wrapper wrapper__container">
                <img src="/HTTP-platform/public/img/logo.svg" alt="logo" class="logo">
                <div class="navbar__list">
                    <a href="" class="navbar__link">Головна</a>
                    <a href="" class="navbar__link">Вантажі</a>
                    <a href="" class="navbar__link">Транспорт</a>
                    <a href="" class="navbar__link">Додати вантаж</a>
                    <a href="" class="navbar__link">Додати транспорт</a>
                </div>
                <a href="account/login" class="navbar__button">Увійти</a>
            </div>
        </div>

        <?= $content ?>

        <footer class="footer">
            <div class="footer__wrapper __container">
                <img src="/HTTP-platform/public/img/logo_footer.svg" class="logo">

                <div class="footer__navbar">
                    <a href="" class="footer__navbar-element">Головна</a>
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
    // 
    selectJS();
    activeLabel();
    visiblePass();
    phoneMask();
    closeMessage();
    </script>
</body>

</html>