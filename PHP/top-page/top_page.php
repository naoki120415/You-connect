<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>トップページ</title>
    <link rel="stylesheet" type="text/css" href="top_page.css">
</head>

<body>
    <div class="header">
        <div class="header-logo">
            <h2>湯～c♨nnect～<br><span>温泉から広がる人とのつながり</span></h2>
        </div>
        <div class="header-list">
            <ul>
                <li><a href="../top-page/top_page.php">トップページ</a></li>
                <li><a href="../onsen/onsen.php">温泉</a></li>
                <li><a href="../restaurant/restaurant.php">飲食店</a></li>
                <li><a href="../omiyage/omiyage.php">お土産</a></li>
                <li>ログイン</li>
            </ul>
        </div>
    </div>

    <div class="main">
        <div class="search-box">
            <form id="form1" action="">
                <input id="sbox" type="text" placeholder="キーワードを入力" />
                <input id="sbtn" type="submit" value="検索" />
            </form>
        </div>
        <div class="ranking">
            <div class="onsen-ranking">
                <p>人気温泉ランキング</p>
                <ul>
                    <li>
                        <form method='post' action='../information/onsen-top.php'>
                            <img src="../../image/first.png">
                            <input type='submit' name='onsen' value='梅乃屋'>
                        </form></br>
                        <img src="../../image/温泉/梅乃屋/image1.jpg">
                    </li>
                    <li>
                        <form method='post' action='../information/onsen-top.php'>
                            <img src="../../image/second.png">
                            <input type='submit' name='onsen' value='西の雅常盤'>
                        </form></br>
                        <img src="../../image/温泉/西の雅常盤/image1.jpg">
                    </li>
                    <li>
                        <form method='post' action='../information/onsen-top.php'>
                            <img src="../../image/third.png">
                            <input type='submit' name='onsen' value='山水園'>
                        </form></br>
                        <img src="../../image/温泉/山水園/image1.jpg">
                    </li>
                </ul>
            </div>
            <div class="restaurant-ranking">
                <p>人気飲食店ランキング</p>
                <ul>
                    <li>
                        <form method='post' action='../information/restaurant-top.php'>
                            <img src="../../image/first.png">
                            <input type='submit' name='restaurant' value='炉舎'>
                        </form></br>
                        <img src="../../image/レストラン/炉舎/image1.jpg">
                    </li>
                    <li>
                        <form method='post' action='../information/restaurant-top.php'>
                            <img src="../../image/second.png">
                            <input type='submit' name='restaurant' value='B団'>
                        </form></br>
                        <img src="../../image/レストラン/B団/image1.jpg">
                    </li>
                    <li>
                        <form method='post' action='../information/restaurant-top.php'>
                            <img src="../../image/third.png">
                            <input type='submit' name='restaurant' value='磯くら'>
                        </form></br>
                        <img src="../../image/レストラン/磯くら/image1.jpg">
                    </li>
                </ul>
            </div>
            <div class="omiyage-ranking">
                <p>人気お土産ランキング</p>
                <ul>
                    <li>
                        <form method='post' action='../information/omiyage-top.php'>
                            <img src="../../image/first.png">
                            <input type='submit' name='omiyage' value='狐の足跡'>
                        </form></br>
                        <img src="../../image/お土産/狐の足跡/image1.jpg">
                    </li>
                    <li>
                        <form method='post' action='../information/omiyage-top.php'>
                            <img src="../../image/second.png">
                            <input type='submit' name='omiyage' value='パティスリー　フルール'>
                        </form></br>
                        <img src="../../image/お土産/パティスリー　フルール/image1.jpg">
                    </li>
                    <li>
                        <form method='post' action='../information/omiyage-top.php'>
                            <img src="../../image/third.png">
                            <input type='submit' name='omiyage' value='山口風月堂'>
                        </form></br>
                        <img src="../../image/お土産/山口風月堂/image1.jpg">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer">
        <h2>湯～c♨nnect~<br><span>温泉から広がる人とのつながり</span></h2>
    </div>
</body>

</html>