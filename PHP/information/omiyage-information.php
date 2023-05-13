<?php
    $csv_File = file_get_contents('../../Excel/omiyage.csv');
    $aryHoge = explode("\n", $csv_File);

    $omiyage = array();

    $name = ["店舗名", "写真", "住所", "アクセス方法", "公式HP", "予算", "クリック回数", "メモ", "ジャンル"];


    foreach($aryHoge as $key => $value)
    {
        if($key == 0) continue;
        $each_omiyage = explode(",", $value);
        $omiyage[] = array_combine($name, $each_omiyage);

        $omiyage[$key-1]["写真"] = omiyage_photo($omiyage[$key-1]["店舗名"]);
    }
    //print_r($omiyage);


    //写真を配列に代入
    function omiyage_photo($omiyage_Name)
    {
        $Photo = array();
        $target_Dir = '../../image/お土産/'.$omiyage_Name;

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