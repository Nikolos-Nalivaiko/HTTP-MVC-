<main class="main">
    <section class="car-info">
        <h2 class="__container">Інформація про вантаж</h2>

        <div class="car-info__slider-continer">
            <div class="car-info__slider-track">
                <?php
                foreach($car['images'] as $image) {
                    echo "<img src='/HTTP-platform/public/car_uploads/$image' class='car-info__slider-item'>";
                }
                ?>
            </div>
        </div>

        <div class="__container">

            <div class="car-info__slider-arrows">
                <p class="car-info__slider-arrow __icon-slider-left car-info__slider-prev"></p>
                <p class="car-info__slider-arrow __icon-slider-right car-info__slider-next"></p>
                <p class="car-info__slider-count"></p>
            </div>

            <div class="car-info__header-info">
                <div class="car-info__header-left">
                    <p class="car-info__status">Pro</p>
                    <div class="car-info__name-wrap">
                        <p class="car-info__name"><?= $car['brand'] ?> <?= $car['model'] ?></p>
                        <p class="car-info__price"><?= number_format($car['price'], 0, '.', ',') ?>₴ / доба</p>
                    </div>
                </div>

                <div class="car-info__header-right">
                    <div class="car-info__point-wrap">
                        <p class="car-info__city"><?=$car['city']?></p>
                        <p class="car-info__region"><?=$car['region']?></p>
                    </div>
                    <p class="car-info__point-icon __icon-region"></p>
                </div>
            </div>

            <div class="car-info__tech">
                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Привід</p>
                    <p class="car-info__tech-icon __icon-wheels"></p>
                    <p class="car-info__tech-title"><?=$car['wheel_mode']?></p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Тип кузова</p>
                    <p class="car-info__tech-icon __icon-body"></p>
                    <p class="car-info__tech-title"><?=$car['body']?></p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Об'єм двигуна</p>
                    <p class="car-info__tech-icon __icon-engine"></p>
                    <p class="car-info__tech-title"><?=$car['engine']?> л.</p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Потужність</p>
                    <p class="car-info__tech-icon __icon-power"></p>
                    <p class="car-info__tech-title"><?=$car['power']?> к.с</p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Тип КПП</p>
                    <p class="car-info__tech-icon __icon-gearbox"></p>
                    <p class="car-info__tech-title"><?=$car['gearbox']?></p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Пробіг</p>
                    <p class="car-info__tech-icon __icon-milleage"></p>
                    <p class="car-info__tech-title"><?=$car['mileage']?> км.</p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Тип двигуна</p>
                    <p class="car-info__tech-icon __icon-fuel"></p>
                    <p class="car-info__tech-title"><?=$car['engine_type']?></p>
                </div>

                <div class="car-info__tech-card">
                    <p class="car-info__tech-subtitle">Тонажність</p>
                    <p class="car-info__tech-icon __icon-Cweight"></p>
                    <p class="car-info__tech-title"><?=$car['load_volume']?> т.</p>
                </div>
            </div>

            <?php 
            if(!empty($car['description'])) { ?>
            <div class="description">
                <p class="description__headline">Додаткова інформація</p>
                <p class="description__text"><?=$car['description']?></p>
            </div>
            <?php
            }
            ?>

            <div class="user-info">
                <div class="user-info__general">
                    <a href="" class="user-info__name-wrap">
                        <div style="background:url(/HTTP-platform/public/user_uploads/<?= $car['image'] ?>) no-repeat; background-size: cover;"
                            class="user-info__avatar"></div>
                        <div class="user-info__text-wrap">
                            <p class="user-info__name"><?=$car['lastName']?> <?=$car['userName']?>
                                <?=$car['middleName']?></p>
                            <p class="user-info__status"><?=$car['status']?></p>
                        </div>
                    </a>
                    <div class="user-info__line"></div>

                    <div class="user-info__phone-wrap">
                        <a href="tel:<?=$car['phone']?>" class="user-info__phone"><?=$car['phone']?></a>
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
                    <p class="qr-code__headline">Діліться транспортом з легкістю та QR-магією</p>
                    <p class="qr-code__descript">Діліться транспортом з легкістю, створюючи QR-коди, які надають
                        миттєвий
                        доступ до необхідної інформації</p>
                </div>

                <div class="qr-code__qr-wrap">
                    <img src="/HTTP-platform/public/qr_cars/<?= $car['qr_code'] ?>" class="qr-code__qr" alt="">
                    <div class="qr-code__left-border"></div>
                    <div class="qr-code__right-border"></div>
                    <div class="qr-code__top-border"></div>
                    <div class="qr-code__bottom-border"></div>
                </div>
            </div>

        </div>
    </section>
</main>