<?php 
if(isset($cargo)) {
$average_price = $cargo['price'] / $cargo['distance'];
$load_date = date("m.d.Y", strtotime($cargo['load_date']));
$unload_date = date("m.d.Y", strtotime($cargo['unload_date']));
?>
<main class="main">
    <section class="cargo __container">
        <h2>Інформація про вантаж</h2>

        <div class="cargo__headblock">
            <div class="cargo__name-wrap">
                <?php
                if ($cargo['tariff'] != 'basic') {
                echo '<p class="cargo-status">Pro</p>';
                }
                ?>
                <?php
                if ($cargo['urgent'] == 'yes') {
                echo '<p class="cargo-status">Терміновий вантаж</p>';
                }
                ?>
                <p class="cargo__name"><?= $cargo['name'] ?></p>
            </div>

            <div class="cargo__price-wrapper">
                <p class="cargo__price"><?= number_format($cargo['price'], 0, '.', ',') ?>₴</p>
                <p class="cargo__price-info"><?= number_format($average_price, 2, ',', ','); ?>₴ / км.</p>
            </div>
        </div>

        <div class="cargo__middle-info">
            <div class="cargo__points">
                <div class="point-track cargo__point-track">
                    <div class="point-track__lap cargo__point-track__lap"></div>
                    <div class="point-track__line cargo__point-track__line"></div>
                    <div class="point-track__lap cargo__point-track__lap"></div>
                </div>

                <div class="cargo__point">
                    <p class="cargo__point-headline">Місце завантаження</p>

                    <div class="cargo__point-info">
                        <div class="cargo__point-textblock">
                            <p class="cargo__point-title"><?=$cargo['load_city']?></p>
                            <p class="cargo__point-subtitle"><?=$cargo['load_region']?></p>
                        </div>
                        <div class="cargo__point-line"></div>
                        <div class="cargo__point-textblock">
                            <p class="cargo__point-title"><?=$load_date?></p>
                            <p class="cargo__point-subtitle">Дата завантаження</p>
                        </div>
                    </div>
                </div>

                <div class="cargo__point">
                    <p class="cargo__point-headline">Місце розвантаження</p>

                    <div class="cargo__point-info">
                        <div class="cargo__point-textblock">
                            <p class="cargo__point-title"><?= $cargo['unload_city'] ?></p>
                            <p class="cargo__point-subtitle"><?= $cargo['unload_region'] ?></p>
                        </div>
                        <div class="cargo__point-line"></div>
                        <div class="cargo__point-textblock">
                            <p class="cargo__point-title"><?= $unload_date ?></p>
                            <p class="cargo__point-subtitle">Дата розвантаження</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cargo__info">
                <p class="cargo__info-headline">Технічні характеристики</p>

                <div class="cargo__info-blocks">

                    <div class="cargo__info-block">
                        <p class="cargo__info-icon __icon-weight"></p>
                        <div class="cargo__block-text-wrap">
                            <p class="cargo__info-title"><?= $cargo['weight'] ?> тон</p>
                            <p class="cargo__info-subtitle">Вага</p>
                        </div>
                    </div>

                    <div class="cargo__info-block">
                        <p class="cargo__info-icon __icon-pay"></p>
                        <div class="cargo__block-text-wrap">
                            <p class="cargo__info-title"><?= $cargo['payment'] ?></p>
                            <p class="cargo__info-subtitle">Тип оплати</p>
                        </div>
                    </div>

                    <div class="cargo__info-block">
                        <p class="cargo__info-icon __icon-shipped"></p>
                        <div class="cargo__block-text-wrap">
                            <p class="cargo__info-title"><?=$cargo['id_body']?></p>
                            <p class="cargo__info-subtitle">Тип кузова</p>
                        </div>
                    </div>

                    <div class="cargo__info-block">
                        <p class="cargo__info-icon __icon-distance"></p>
                        <div class="cargo__block-text-wrap">
                            <p class="cargo__info-title">≈ <?= $cargo['distance'] ?> км.</p>
                            <p class="cargo__info-subtitle">Відстань</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        if ($cargo['description'] != null) { ?>
        <div class="description">
            <p class="description__headline">Додаткова інформація</p>
            <p class="description__text"><?= $cargo['description'] ?></p>
        </div>
        <?php
        }
        ?>

        <div class="user-info">
            <div class="user-info__general">
                <a href="" class="user-info__name-wrap">
                    <div style="background:url(/HTTP-platform/public/user_uploads/<?= $cargo['image'] ?>) no-repeat; background-size: cover;"
                        class="user-info__avatar"></div>
                    <div class="user-info__text-wrap">
                        <p class="user-info__name"><?=$cargo['lastName']?> <?=$cargo['userName']?>
                            <?=$cargo['middleName']?></p>
                        <p class="user-info__status"><?= $cargo['status'] ?></p>
                    </div>
                </a>
                <div class="user-info__line"></div>

                <div class="user-info__phone-wrap">
                    <a href="tel:<?= $cargo['phone'] ?>" class="user-info__phone"><?= $cargo['phone'] ?></a>
                    <p class="user-info__subtitle">Контактний номер</p>
                </div>
            </div>

            <div class="user-info__rating">
                <p class="user-info__rating-icon __icon-star"></p>
                <div class="user-info__rating-text-wrap">
                    <p class="user-info__rating-number"> <span class="user-info__rating-number--span">4,6
                        </span>/ 5</p>
                    <p class="user-info__rating-subtitle">Середній рейтинг користувача</p>
                </div>
            </div>
        </div>

        <div class="reviews slider-reviews">

            <div class="reviews__top-wrapper">
                <h2>Відгуки користувачів</h2>
                <div class="reviews__arrows-slider">
                    <p class="reviews__arrow-slider __icon-slider-left reviews__left"></p>
                    <p class="reviews__arrow-slider __icon-slider-right reviews__right"></p>
                </div>
            </div>

            <div class="reviews__slider slider-container">
                <div class="slider-track reviews__track">

                    <div class="reviews__block">
                        <hr class="reviews__top-line">

                        <div class="reviews__head">
                            <img src="img/icon-user.jpg" class="reviews__user-image"></img>
                            <div class="reviews__text-wrapper">
                                <p class="reviews__user-name">ТОВ «АГРОХОЛДИНГ ФАРМЕКСПО»</p>
                                <p class="reviews__user-status">Підприємство</p>
                            </div>
                        </div>

                        <div class="reviews__grade">
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star"></p>
                            <p class="reviews__grade-element __icon-star"></p>
                        </div>

                        <p class="reviews__description">
                            Я працюю в сфері логістики вже багато років і можу сказати, що ця платформа є дійсно
                            корисною і ефективною. Завдяки її інноваційному підходу до обробки замовлень та
                            відстеження вантажів, я зміг економити значну кількість часу та зусиль. Якщо
                            виникають
                            якісь проблеми або запитання, служба підтримки завжди на зв'язку та готова надати
                            допомогу. Я рекомендую цю платформу всім колегам та партнерам, які працюють в
                            логістичній галузі
                        </p>
                    </div>

                    <div class="reviews__block">
                        <hr class="reviews__top-line">

                        <div class="reviews__head">
                            <img src="img/icon-user.jpg" class="reviews__user-image"></img>
                            <div class="reviews__text-wrapper">
                                <p class="reviews__user-name">ТОВ «АГРОХОЛДИНГ ФАРМЕКСПО»</p>
                                <p class="reviews__user-status">Підприємство</p>
                            </div>
                        </div>

                        <div class="reviews__grade">
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star"></p>
                            <p class="reviews__grade-element __icon-star"></p>
                        </div>

                        <p class="reviews__description">
                            Я працюю в сфері логістики вже багато років і можу сказати, що ця платформа є дійсно
                            корисною і ефективною. Завдяки її інноваційному підходу до обробки замовлень та
                            відстеження вантажів, я зміг економити значну кількість часу та зусиль. Якщо
                            виникають
                            якісь проблеми або запитання, служба підтримки завжди на зв'язку та готова надати
                            допомогу. Я рекомендую цю платформу всім колегам та партнерам, які працюють в
                            логістичній галузі
                        </p>
                    </div>

                    <div class="reviews__block">
                        <hr class="reviews__top-line">

                        <div class="reviews__head">
                            <img src="img/icon-user.jpg" class="reviews__user-image"></img>
                            <div class="reviews__text-wrapper">
                                <p class="reviews__user-name">ТОВ «АГРОХОЛДИНГ ФАРМЕКСПО»</p>
                                <p class="reviews__user-status">Підприємство</p>
                            </div>
                        </div>

                        <div class="reviews__grade">
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star reviews__grade-element--active"></p>
                            <p class="reviews__grade-element __icon-star"></p>
                            <p class="reviews__grade-element __icon-star"></p>
                        </div>

                        <p class="reviews__description">
                            Я працюю в сфері логістики вже багато років і можу сказати, що ця платформа є дійсно
                            корисною і ефективною. Завдяки її інноваційному підходу до обробки замовлень та
                            відстеження вантажів, я зміг економити значну кількість часу та зусиль. Якщо
                            виникають
                            якісь проблеми або запитання, служба підтримки завжди на зв'язку та готова надати
                            допомогу. Я рекомендую цю платформу всім колегам та партнерам, які працюють в
                            логістичній галузі
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="qr-code">
            <div class="qr-code__text">
                <p class="qr-code__headline">Діліться вантажем з легкістю та QR-магією</p>
                <p class="qr-code__descript">Діліться вантажем з легкістю, створюючи QR-коди, які надають
                    миттєвий
                    доступ до необхідної інформації</p>
            </div>

            <div class="qr-code__qr-wrap">
                <img src="/HTTP-platform/public/qr_cargos/<?= $cargo['qr_code'] ?>" class="qr-code__qr" alt="">
                <div class="qr-code__left-border"></div>
                <div class="qr-code__right-border"></div>
                <div class="qr-code__top-border"></div>
                <div class="qr-code__bottom-border"></div>
            </div>
        </div>

    </section>
</main>
<?php
}
?>