<?php
    error_reporting(0);
    function firstWAF(string $toFilter): bool{
        if (preg_match('/[a-z]|!|@|#|%|\^|&|\*|\(|\)|_|\+|=|\||\[|]|`|~|<|>|,|\/|;|"|\'/im', trim($toFilter)) || preg_match('/\\\\/m', trim($toFilter)))
            return false;
        return true;
    }
    require_once 'config.php';
    if (isset($_GET['give_me_source']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
        show_source(__FILE__);
        global $evil_time;
        die($evil_time);
    }
    if (isset($_POST['cmd']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        if (!is_string($_POST['cmd']) || strlen($_POST['cmd']) >= ini_get('pcre.backtrack_limit') || !firstWAF($_POST['cmd'])){
            global $evil_laugh_1, $evil_laugh_2;
            die($evil_laugh_1.parse_url($_SERVER['REQUEST_URI'])['path'].$evil_laugh_2);
        }
        $tVar_cmd = secondWAF($_POST['cmd']);
        if (strlen($tVar_cmd) > 0 && !preg_match('/[A-Z]|\{|}/m', $tVar_cmd)){
            $result = shell_exec($tVar_cmd);
            if (str_starts_with(php_uname('s'), 'Win'))
                die(iconv('GBK', 'UTF-8', $result));
            die($result);
        }
        else {
            global $system_fail;
            die($system_fail);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CTFSHOW 许愿池</title>
    <script src="/static/jquery-3.6.1.min.js"></script>
    <script src="/static/getHint.js"></script>
    <link type="text/css" href="/static/simple.css" rel="stylesheet">
</head>
<style>
    html {
        background-image: url("static/background.png");
        background-size: cover;
    }
</style>
<body>
<div>
    <p style="font-size: 150px"></p>
    <p align="center" style="font-size: xx-large; font-family: 宋体">欢迎来到CTFSHOW 许愿池，大胆地说出你的愿望吧！</p>
    <div style="width: 50%; height: 50px; margin: 0 auto">
        <input type="text" id="inputYourWish" placeholder="许愿池正在等待你的祈愿">
    </div>
    <p id="showCMDResult" align="center" style="font-size: x-large">许愿池时钟：</p>
</div>
</body>
<script>
    function submitCMD(toSubmitData, callbackFunc) {
        $.ajax({
            url: '<?=parse_url($_SERVER["REQUEST_URI"])['path'];?>',
            method: 'POST',
            data: {'cmd': toSubmitData},
            success: function (data, textStatus, jqXHR) {
                callbackFunc(data);
            }
        })
    }

    window.onload = function () {
        let inputCMDID = 'inputYourWish';
        let showTextID = 'showCMDResult';
        requestDate(showTextID);
        $('#' + inputCMDID).bind('keypress', function (event) {
            if (event.keyCode === 13){
                submitCMD($('#' + inputCMDID).val(), function (execData) {
                    document.getElementById(showTextID).innerHTML = execData;
                });
            }
        });
    }
</script>
</html>
