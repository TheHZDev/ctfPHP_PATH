<?php
header('Content-Type: text/html; charset=UTF-8');
if (!(isset($_GET['cmd']) && is_string($_GET['cmd']) && strlen($_GET['cmd']) > 0))
    die("usage: ".parse_url($_SERVER['REQUEST_URI'])['path']."?cmd=");
else {
    require_once 'config.php';
    // build Cache
    global $allDict;
    $choiceCache = [];
    foreach ($allDict as $item=>$value){
        foreach (str_split(parse_url($value)['path']) as $charID=>$char){
            if ((ord($char) >= 97 && ord($char) <= 122) || $char === '/'){
                if(!array_key_exists($char, $choiceCache))
                    $choiceCache[$char] = [];
                $choiceCache[$char][] = '${' . $item . ':' . $charID . ':1}';
            }
        }
    }
    // start Translate
    $sourceCMD = str_split(trim(urldecode($_GET['cmd'])));
    $resultCMD = '';
    foreach ($sourceCMD as $char){
        if ((ord($char) >= 97 && ord($char) <= 122) || $char === '/'){
            $resultCMD .= $choiceCache[$char][rand() % count($choiceCache[$char])];
        } else {
            $resultCMD .= $char;
        }
    }
    echo 'CMD '.urldecode(trim($_GET['cmd'])).' encrypt Code is <br>';
    die($resultCMD);
}