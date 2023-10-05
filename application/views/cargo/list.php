<main class="main">
    <section class="cargos __container">
        <div class="cargos__headline-nav">
            <h2>Біржа вантажів</h2>
        </div>


        <?php
            if(!empty($cargos)) {?>

        <div class="cargos__list">

            <?php
            foreach($cargos as $cargo) {
                $average_price = $cargo['price'] / $cargo['distance'];
            ?>

            <a href="info/<?=$cargo['id_cargo']?>" class="cargos__block">
                <p class="cargos__line"></p>

                <div class="cargos__headline-block">
                    <div class="cargos__name-wrap">
                        <p class="cargo-status">Pro</p>
                        <?php
                        if($cargo['urgent'] == 'yes') {
                            echo '<p class="cargo-status">Терміновий вантаж</p>';
                        }
                        ?>
                        <p class="cargos__name"><?= $cargo['name'] ?></p>
                    </div>

                    <div class="cargos__price-wrap">
                        <p class="cargos__price"><?= number_format($cargo['price'], 0, '.', ',') ?>₴</p>
                        <p class="cargos__price-info"><?= number_format($average_price, 2, ',', ','); ?>₴ / км.</p>
                    </div>
                </div>

                <div class="cargos__points">
                    <div class="point-track">
                        <div class="point-track__lap"></div>
                        <div class="point-track__line"></div>
                        <div class="point-track__lap"></div>
                    </div>
                    <div class="cargos__point-block">
                        <p class="cargos__point-city"><?= $cargo['load_city'] ?></p>
                        <p class="cargos__point-region"><?= $cargo['load_region'] ?></p>
                    </div>

                    <p class="cargos__point-icon __icon-right-chevron"></p>

                    <div class="cargos__point-block">
                        <p class="cargos__point-city"><?= $cargo['unload_city'] ?></p>
                        <p class="cargos__point-region"><?= $cargo['unload_region'] ?></p>
                    </div>
                </div>

                <div class="cargos__info">
                    <p class="cargos__info-elem"><?= $cargo['weight'] ?> т.</p>
                    <p class="cargos__info-elem"><?= $cargo['id_body'] ?></p>
                    <p class="cargos__info-elem"><?= $cargo['payment'] ?></p>
                    <p class="cargos__info-elem">≈ <?= $cargo['distance'] ?> км.</p>
                </div>
            </a>

            <?php
            }
            ?>
        </div>
        <?php
            } else { ?>

        <div class="cargos__empty-message">
            <div class="cargos__empty-line"></div>
            <p class="cargos__empty-text">Активних вантажів не знайдено</p>
        </div>

        <?php
            }
            ?>



    </section>
</main>