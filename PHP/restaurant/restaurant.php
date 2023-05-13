<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>レストランページ</title>
    <link rel="stylesheet" type="text/css" href="restaurant.css">
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

    <div class=search>
        <form method="post" id="form1" action="">
            <input id="sbox" type="text" name="keyword" placeholder="キーワードを入力" />
            <input id="sbtn" type="submit" name="submit" value="検索" />
        </form>
    </div>

    <div class="main">
        <div class="restaurant-list">
            <?php

            include("../information/restaurant-information.php");

            for ($i = 0; $i < count($restaurant); $i++) :
                if (isset($_POST["keyword"])) :
                    if (preg_match("/" . $_POST['keyword'] . "/", $restaurant[$i]['店舗名'])) :
            ?>
                        <hr>
                        <img src="<?= $restaurant[$i]['写真'][0] ?>" width='200px' height='200px'>
                        <div class="one">
                            <form method='post' action='../information/restaurant-top.php'>
                                <input type='submit' name='restaurant' value='<?= $restaurant[$i]["店舗名"] ?>'>
                            </form>
                            <div class='address'>
                                <?php
                                print "{$restaurant[$i]['住所']}";
                                ?>
                            </div>
                            <div class='memo'>
                                <?php
                                print "{$restaurant[$i]['メモ']}";
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                else :
                    ?>
                    <hr>
                    <img src="<?= $restaurant[$i]['写真'][0] ?>" width='200px' height='200px' class='float'>
                    <div class="one">
                        <form method='post' action='../information/restaurant-top.php'>
                            <input type='submit' name='restaurant' value='<?= $restaurant[$i]["店舗名"] ?>'>
                        </form>
                        <div class='address'>
                            <?php
                            print "{$restaurant[$i]['住所']}";
                            ?>
                        </div>
                        <div class='memo'>
                            <?php
                            print "{$restaurant[$i]['メモ']}";
                            ?>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="side-menu">
            <h3>地域選択</h3>
            <?php include("./japan.html"); ?>
        </div>
    </div>

    <div class="footer">
        <h2>湯～c♨nnect~<br><span>温泉から広がる人とのつながり</span></h2>
    </div>
</body>

</html>