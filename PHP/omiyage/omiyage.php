<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>お土産ページ</title>
    <link rel="stylesheet" type="text/css" href="omiyage.css">
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
        <div class="omiyage-list">
            <?php

            include("../information/omiyage-information.php");

            for ($i = 0; $i < count($omiyage); $i++) :
                if (isset($_POST["keyword"])) :
                    if (preg_match("/" . $_POST['keyword'] . "/", $omiyage[$i]['店舗名'])) :
            ?>
                        <hr>
                        <img src="<?= $omiyage[$i]['写真'][0] ?>" width='200px' height='200px'>
                        <div class="one">
                            <form method='post' action='../information/omiyage-top.php'>
                                <input type='submit' name='omiyage' value='<?= $omiyage[$i]["店舗名"] ?>'>
                            </form>
                            <div class='address'>
                                <?php
                                print "{$omiyage[$i]['住所']}";
                                ?>
                            </div>
                            <div class='memo'>
                                <?php
                                print "{$omiyage[$i]['メモ']}";
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                else :
                    ?>
                    <hr>
                    <img src="<?= $omiyage[$i]['写真'][0] ?>" width='200px' height='200px' class='float'>
                    <div class="one">
                        <form method='post' action='../information/omiyage-top.php'>
                            <input type='submit' name='omiyage' value='<?= $omiyage[$i]["店舗名"] ?>'>
                        </form>
                        <div class='address'>
                            <?php
                            print "{$omiyage[$i]['住所']}";
                            ?>
                        </div>
                        <div class='memo'>
                            <?php
                            print "{$omiyage[$i]['メモ']}";
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