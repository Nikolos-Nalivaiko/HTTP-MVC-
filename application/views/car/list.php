<main class="main">
    <section class="cars __container">
        <div class="cars__headline-nav">
            <h2>Біржа вантажів</h2>
        </div>

        <div class="cars__list">

            <?php
            foreach($cars as $car) {
        ?>

            <a href="/HTTP-platform/car/info/<?=$car['id_car']?>" class="cars__card">
                <div class="cars__card-line"></div>
                <div style="background:url(/HTTP-platform/public/car_uploads/<?=$car['image']?>) no-repeat center; background-size: cover;" class="cars__card-image">
                </div>

                <p class="cars__card-name"><?=$car['brand']?> <?=$car['model']?></p>

                <p class="cars__card-city"><?=$car['city']?></p>
                <p class="cars__card-region"><?=$car['region']?></p>

                <div class="cars__card-info">
                    <p class="cars__card-info-elem"><?= $car['body'] ?></p>
                    <div class="cars__card-dot"></div>
                    <p class="cars__card-info-elem"><?=$car['engine']?> <?=$car['engine_type']?></p>
                    <div class="cars__card-dot"></div>
                    <p class="cars__card-info-elem"><?=$car['load_volume']?> тон</p>
                </div>

                <p class="cars__card-price"><?= number_format($car['price'], 0, '.', ',') ?>₴ / доба</p>
            </a>

            <?php
            }
        ?>

        </div>

    </section>
</main>