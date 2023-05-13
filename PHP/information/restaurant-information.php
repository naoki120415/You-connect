<?php
    $csv_File = file_get_contents('../../Excel/inshoku.csv');
    $aryHoge = explode("\n", $csv_File);

    $restaurant = array();

    $name = ["店舗名", "写真", "住所", "アクセス方法", "公式HP", "予算", "クリック回数", "メモ", "ジャンル"];

    foreach($aryHoge as $key => $value)
    {
        if($key == 0) continue;
        $each_restaurant = explode(",", $value);
        $restaurant[] = array_combine($name, $each_restaurant);

        $restaurant[$key-1]["写真"] = restaurant_photo($restaurant[$key-1]["店舗名"]);
    }
    //print_r($restaurant);

    //写真を配列に代入
    function restaurant_photo($restaurant_Name)
    {
        $Photo = array();
        $target_Dir = '../../image/レストラン/'.$restaurant_Name;

        if(!(file_exists($target_Dir)))
        {
            mkdir($target_Dir, 0777);
        }
        
        $jpeg_Files = glob($target_Dir.DIRECTORY_SEPARATOR."*.jpg");

        if(count($jpeg_Files) == 0)
        {
            $Photo[] = "No Image";
        }
        else
        {
            for($i = 1; $i < count($jpeg_Files)+1; $i++)
            {
                $Photo[] = $target_Dir.'/image'.$i.'.jpg';
            }
        }
        return $Photo;
    }
?>