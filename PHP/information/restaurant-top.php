<!DOCTYPE html>
<?php
include("onsen-information.php");
include("omiyage-information.php");
include("restaurant-information.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>温泉ページ</title>
    <link rel="stylesheet" type="text/css" href="restaurant-top.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider').bxSlider({
                auto: true,
                pause: 5000,
            });
        });
    </script>
</head>

<body>
    <div class="header">
        <div class="header-logo">
            <h2><a href="../top-page/top_page.php">湯～c♨nnect～</a><br><span>温泉から広がる人とのつながり</span></h2>
        </div>
        <nav class="header-list">
            <ul>
                <li><a href="../top-page/top_page.php">トップページ</a></li>
                <li><a href="../onsen/onsen.php">温泉</a></li>
                <li><a href="../restaurant/restaurant.php">飲食店</a></li>
                <li><a href="../omiyage/omiyage.php">お土産</a></li>
                <li>ログイン</li>
            </ul>
        </nav>
    </div>

    <div class="information">
        <?php if (isset($_POST["restaurant"])) : ?>
            <?php
            for ($i = 0; $i < count($restaurant); $i++) {
                if ($_POST["restaurant"] == $restaurant[$i]['店舗名']) {
                    $restaurant_Number = $i;
                }
            }
            ?>

            <h2 class="detailTabs"><?php echo $restaurant[$restaurant_Number]["店舗名"] ?></h2>

            <div class="slider">
                <?php foreach ($restaurant[$restaurant_Number]["写真"] as $photo) : ?>
                    <img src="<?php echo $photo ?>" alt="">
                <?php endforeach ?>
            </div>

            <div class="feature">
                <table border="1">
                    <tr>
                        <th>住所</th>
                        <td><?php echo $restaurant[$restaurant_Number]["住所"] ?></td>
                    </tr>
                    <tr>
                        <th>アクセス方法</th>
                        <td><?php echo $restaurant[$restaurant_Number]["アクセス方法"] ?></td>
                    </tr>
                    <tr>
                        <th>予算</th>
                        <td><?php echo $restaurant[$restaurant_Number]["予算"] ?></td>
                    </tr>
                    <tr>
                        <th>公式HP</th>
                        <td>
                            <?php if ($restaurant[$restaurant_Number]['公式HP'] != "なし") : ?>
                                <h3 class="formula_HP"><a href="<?php echo $restaurant[$restaurant_Number]['公式HP'] ?>"><?php echo $restaurant[$restaurant_Number]['公式HP'] ?></a></h3>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <th>飲食特徴</th>
                        <td><?php echo $restaurant[$restaurant_Number]["メモ"] ?></td>
                    </tr>
                </table>
            </div>
            <div class="near-onsen">
                <?php
                $adress_restaurant = substr($restaurant[$restaurant_Number]["住所"], 0, 10);
                $near_onsen = array();
                for ($i = 0; $i < count($onsen); $i++) {
                    $adress_onsen = substr($onsen[$i]["住所"], 0, 10);

                    if ($adress_onsen == $adress_restaurant) {
                        $near_onsen[] = $onsen[$i];
                    }
                }
                ?>

                <h4>近くの温泉施設はこちら</h4>
                <?php if (count($near_onsen) == 0) : ?>
                    <h5 class="none">申し訳ありません。近くに温泉施設がございません</h5>

                <?php else : ?>
                    <hr>
                    <div class="onsen">
                        <?php for ($i = 0; $i < count($near_onsen); $i++) : ?>
                            <div class="onsen-information">
                                <img src="<?= $near_onsen[$i]['写真'][0] ?>" width='200px' height='200px' class='float'>
                                <div class="one">
                                    <form method='post' action='onsen-top.php'>
                                        <input type='submit' name='onsen' value='<?= $near_onsen[$i]["店舗名"] ?>'>
                                    </form>
                                    <div class='address'>
                                        <?php
                                        print "{$near_onsen[$i]['住所']}";
                                        ?>
                                    </div>
                                    <div class='memo'>
                                        <?php
                                        print "{$near_onsen[$i]['メモ']}";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="near-omiyage">
                <?php
                $adress_restaurant = substr($restaurant[$restaurant_Number]["住所"], 0, 10);
                $near_omiyage = array();
                for ($i = 0; $i < count($omiyage); $i++) {
                    $adress_omiyage = substr($omiyage[$i]["住所"], 0, 10);

                    if ($adress_restaurant == $adress_omiyage) {
                        $near_omiyage[] = $omiyage[$i];
                    }
                }
                ?>

                <h4>近くのお土産店はこちら</h4>
                <?php if (count($near_omiyage) == 0) : ?>
                    <h5 class="none">申し訳ありません。近くに飲食店がございません</h5>
                <?php else : ?>
                    <hr>
                    <div class="omiyage">
                        <?php for ($i = 0; $i < count($near_omiyage); $i++) : ?>
                            <div class="omiyage-information">
                                <img src="<?= $near_omiyage[$i]['写真'][0] ?>" width='200px' height='200px' class='float'>
                                <div class="one">
                                    <form method='post' action='omiyage-top.php'>
                                        <input type='submit' name='omiyage' value='<?= $near_omiyage[$i]["店舗名"] ?>'>
                                    </form>
                                    <div class='address'>
                                        <?php
                                        print "{$near_omiyage[$i]['住所']}";
                                        ?>
                                    </div>
                                    <div class='memo'>
                                        <?php
                                        print "{$near_omiyage[$i]['メモ']}";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>
</body>

</html>