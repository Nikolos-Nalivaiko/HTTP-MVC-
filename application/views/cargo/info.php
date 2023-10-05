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
                <p class="cargo-status">Pro</p>
                <p class="cargo-status">Терміновий вантаж</p>
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

        <p class="note__headline">Примітка для водія :</p>
        <div class="note__descript-wrap">
            <p class="note__descript">Гумотехнічні вироби включають в себе такі продукти, як прокладки,
                ущільнювачі, пружини, шланги, ремені, гумові діагностичні вироби, рукави, гумові протектори для
                шин, амортизатори та багато інших. Вони використовуються у автомобільній промисловості,
                будівництві, сільському господарстві, медицині, електроніці та багатьох інших сферах.</p>

            <div class="note__rating">
                <p class="note__rating-icon __icon-star"></p>
                <div class="note__rating-text-wrap">
                    <p class="note__rating-title"><span>4,6</span> / 5</p>
                    <p class="note__rating-subtitle">Середній рейтинг користувача</p>
                </div>
            </div>
        </div>

        <div class="user-info">
            <a href="" class="user-info__info">
                <img src="img/icon-user.jpg" class="user-info__avatar">
                <div class="user-info__text-wrap">
                    <p class="user-info__name">Михайлов Михайло Михайлович</p>
                    <p class="user-info__status">Фізична особа</p>
                </div>
            </a>

            <div class="user-info__line"></div>

            <div class="user-info__number-wrap">
                <a href="tel:" class="user-info__number">+38(067)-936-41-32</a>
                <p class="user-info__number-subtitle">Контактний номер</p>
            </div>

            <div class="user-info__line"></div>

            <a href="" class="user-info__btn">Детальніше</a>
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

    </section>
</main>
<?php
}
?>