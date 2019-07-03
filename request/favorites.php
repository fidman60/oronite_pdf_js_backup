<?php
//setcookie('favorite_pages','',time() - 19291999900,'/',NULL,NULL,false);
//die();
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$action = isset($_GET['action']) && is_string($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 0;

if ($action == 'pages'){
    if(isset($_COOKIE['favorite_pages']))
        echo json_encode(['pages' => unserialize($_COOKIE['favorite_pages'])]);
    else echo json_encode(['pages' => []]);
} else if (!$page) {
    echo json_encode(['status' => false]);
} else {
     if ($action == 'exists'){
        if (isset($_COOKIE['favorite_pages'])){
            $favoritePages = unserialize($_COOKIE['favorite_pages']);
            $inArray = in_array($page, $favoritePages);
            echo json_encode(['status' => $inArray]);
        } else {
            echo json_encode(['status' => false]);
        }
    } else if ($action == 'toggle'){
        if(isset($_COOKIE['favorite_pages'])){
            $favoritePages = unserialize($_COOKIE['favorite_pages']);

            $index = array_search($page, $favoritePages);

            if ($index === false){
                $toggleAction = 'add';
                $favoritePages[] = $page;
                setcookie('favorite_pages', serialize($favoritePages),time() + 3600 * 24 * 30,'/',NULL,NULL,false);
            } else {
                $toggleAction = 'remove';
                $newArray = [];
                foreach ($favoritePages as $key => $value){
                    if ($key !== $index){
                        $newArray[] = $value;
                    }
                }
                setcookie('favorite_pages', serialize($newArray),time() + 3600 * 24 * 30,'/',NULL,NULL,false);
                $favoritePages = $newArray;
            }

            sort($favoritePages);

            echo json_encode(['status' => true, 'action' => $toggleAction, 'pages' => $favoritePages]);
        } else {
            setcookie("favorite_pages", serialize([$page]),time() + 3600 * 24 * 30,'/',NULL,NULL,false);
            echo json_encode(['status' => true, 'action' => 'add', 'pages' => [$page]]);
        }
    }
}