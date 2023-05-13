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
    <link rel="stylesheet" type="text/css" href="onsen-top.css">
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
        <?php if (isset($_POST["onsen"])) : ?>
            <?php
            for ($i = 0; $i < count($onsen); $i++) {
                if ($_POST["onsen"] == $onsen[$i]['店舗名']) {
                    $onsen_Number = $i;
                }
            }
            ?>

            <h2 class="detailTabs"><?php echo $onsen[$onsen_Number]["店舗名"] ?></h2>

            <div class="slider">
                <?php foreach ($onsen[$onsen_Number]["写真"] as $photo) : ?>
                    <img src="<?php echo $photo ?>" alt="">
                <?php endforeach ?>
            </div>

            <div class="feature">
                <table border="1">
                    <tr>
                        <th>住所</th>
                        <td><?php echo $onsen[$onsen_Number]["住所"] ?></td>
                    </tr>
                    <tr>
                        <th>アクセス方法</th>
                        <td><?php echo $onsen[$onsen_Number]["アクセス方法"] ?></td>
                    </tr>
                    <tr>
                        <th>予算</th>
                        <td><?php echo $onsen[$onsen_Number]["予算"] ?></td>
                    </tr>
                    <tr>
                        <th>公式HP</th>
                        <td>
                            <?php if ($onsen[$onsen_Number]['公式HP'] != "なし") : ?>
                                <h3 class="formula_HP"><a href="<?php echo $onsen[$onsen_Number]['公式HP'] ?>"><?php echo $onsen[$onsen_Number]['公式HP'] ?></a></h3>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <th>温泉特徴</th>
                        <td><?php echo $onsen[$onsen_Number]["メモ"] ?></td>
                    </tr>
                </table>
            </div>
            <div class="near-inshoku">
                <?php
                $adress_onsen = substr($onsen[$onsen_Number]["住所"], 0, 10);
                $near_inshoku = array();
                for ($i = 0; $i < count($restaurant); $i++) {
                    $adress_inshoku = substr($restaurant[$i]["住所"], 0, 10);

                    if ($adress_onsen == $adress_inshoku) {
                        $near_inshoku[] = $restaurant[$i];
                    }
                }
                ?>

                <h4>近くの飲食店はこちら</h4>
                <?php if (count($near_inshoku) == 0) : ?>
                    <h5 class="none">申し訳ありません。近くに飲食店がございません</h5>
                <?php else : ?>
                    <div class="inshoku">
                        <?php for ($i = 0; $i < count($near_inshoku); $i++) : ?>
                            <div class="inshoku-information">
                                <img src="<?= $near_inshoku[$i]['写真'][0] ?>" width='200px' height='200px' class='float'>
                                <div class="one">
                                    <form method='post' action='restaurant-top.php'>
                                        <input type='submit' name='restaurant' value='<?= $near_inshoku[$i]["店舗名"] ?>'>
                                    </form>
                                    <div class='address'>
                                        <?php
                                        print "{$near_inshoku[$i]['住所']}";
                                        ?>
                                    </div>
                                    <div class='memo'>
                                        <?php
                                        print "{$near_inshoku[$i]['メモ']}";
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
                $adress_onsen = substr($onsen[$onsen_Number]["住所"], 0, 10);
                $near_omiyage = array();
                for ($i = 0; $i < count($omiyage); $i++) {
                    $adress_omiyage = substr($omiyage[$i]["住所"], 0, 10);

                    if ($adress_onsen == $adress_omiyage) {
                        $near_omiyage[] = $omiyage[$i];
                    }
                }
                ?>

                <h4>近くのお土産店はこちら</h4>
                <?php if (count($near_omiyage) == 0) : ?>
                    <h5 class="none">申し訳ありません。近くに飲食店がございません</h5>
                <?php else : ?>
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