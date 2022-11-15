<?php
error_reporting(0);
session_start();
require_once 'config.php';
global $allDict;
$error_msg = '';
function completeFirst(): string{
    $fileName_prefix = 'MakeWish_';
    foreach (scandir('.') as $fileName){
        if (str_ends_with($fileName, '.php') && str_starts_with($fileName, $fileName_prefix)){
            return $fileName;
        }
    }
    $true_fileName = $fileName_prefix.sha1(mt_rand()).'.php';
    file_put_contents($true_fileName, base64_decode('PD9waHANCiAgICBlcnJvcl9yZXBvcnRpbmcoMCk7DQogICAgZnVuY3Rpb24gZmlyc3RXQUYoc3RyaW5nICR0b0ZpbHRlcik6IGJvb2x7DQogICAgICAgIGlmIChwcmVnX21hdGNoKCcvW2Etel18IXxAfCN8JXxcXnwmfFwqfFwofFwpfF98XCt8PXxcfHxcW3xdfGB8fnw8fD58LHxcL3w7fCJ8XCcvaW0nLCB0cmltKCR0b0ZpbHRlcikpIHx8IHByZWdfbWF0Y2goJy9cXFxcL20nLCB0cmltKCR0b0ZpbHRlcikpKQ0KICAgICAgICAgICAgcmV0dXJuIGZhbHNlOw0KICAgICAgICByZXR1cm4gdHJ1ZTsNCiAgICB9DQogICAgcmVxdWlyZV9vbmNlICdjb25maWcucGhwJzsNCiAgICBpZiAoaXNzZXQoJF9HRVRbJ2dpdmVfbWVfc291cmNlJ10pICYmICRfU0VSVkVSWydSRVFVRVNUX01FVEhPRCddID09PSAnR0VUJyl7DQogICAgICAgIHNob3dfc291cmNlKF9fRklMRV9fKTsNCiAgICAgICAgZ2xvYmFsICRldmlsX3RpbWU7DQogICAgICAgIGRpZSgkZXZpbF90aW1lKTsNCiAgICB9DQogICAgaWYgKGlzc2V0KCRfUE9TVFsnY21kJ10pICYmICRfU0VSVkVSWydSRVFVRVNUX01FVEhPRCddID09PSAnUE9TVCcpew0KICAgICAgICBpZiAoIWlzX3N0cmluZygkX1BPU1RbJ2NtZCddKSB8fCBzdHJsZW4oJF9QT1NUWydjbWQnXSkgPj0gaW5pX2dldCgncGNyZS5iYWNrdHJhY2tfbGltaXQnKSB8fCAhZmlyc3RXQUYoJF9QT1NUWydjbWQnXSkpew0KICAgICAgICAgICAgZ2xvYmFsICRldmlsX2xhdWdoXzEsICRldmlsX2xhdWdoXzI7DQogICAgICAgICAgICBkaWUoJGV2aWxfbGF1Z2hfMS5wYXJzZV91cmwoJF9TRVJWRVJbJ1JFUVVFU1RfVVJJJ10pWydwYXRoJ10uJGV2aWxfbGF1Z2hfMik7DQogICAgICAgIH0NCiAgICAgICAgJHRWYXJfY21kID0gc2Vjb25kV0FGKCRfUE9TVFsnY21kJ10pOw0KICAgICAgICBpZiAoc3RybGVuKCR0VmFyX2NtZCkgPiAwICYmICFwcmVnX21hdGNoKCcvW0EtWl18XHt8fS9tJywgJHRWYXJfY21kKSl7DQogICAgICAgICAgICAkcmVzdWx0ID0gc2hlbGxfZXhlYygkdFZhcl9jbWQpOw0KICAgICAgICAgICAgaWYgKHN0cl9zdGFydHNfd2l0aChwaHBfdW5hbWUoJ3MnKSwgJ1dpbicpKQ0KICAgICAgICAgICAgICAgIGRpZShpY29udignR0JLJywgJ1VURi04JywgJHJlc3VsdCkpOw0KICAgICAgICAgICAgZGllKCRyZXN1bHQpOw0KICAgICAgICB9DQogICAgICAgIGVsc2Ugew0KICAgICAgICAgICAgZ2xvYmFsICRzeXN0ZW1fZmFpbDsNCiAgICAgICAgICAgIGRpZSgkc3lzdGVtX2ZhaWwpOw0KICAgICAgICB9DQogICAgfQ0KPz4NCjwhRE9DVFlQRSBodG1sPg0KPGh0bWwgbGFuZz0iZW4iPg0KPGhlYWQ+DQogICAgPG1ldGEgY2hhcnNldD0iVVRGLTgiPg0KICAgIDx0aXRsZT5DVEZTSE9XIOiuuOaEv+axoDwvdGl0bGU+DQogICAgPHNjcmlwdCBzcmM9Ii9zdGF0aWMvanF1ZXJ5LTMuNi4xLm1pbi5qcyI+PC9zY3JpcHQ+DQogICAgPHNjcmlwdCBzcmM9Ii9zdGF0aWMvZ2V0SGludC5qcyI+PC9zY3JpcHQ+DQogICAgPGxpbmsgdHlwZT0idGV4dC9jc3MiIGhyZWY9Ii9zdGF0aWMvc2ltcGxlLmNzcyIgcmVsPSJzdHlsZXNoZWV0Ij4NCjwvaGVhZD4NCjxzdHlsZT4NCiAgICBodG1sIHsNCiAgICAgICAgYmFja2dyb3VuZC1pbWFnZTogdXJsKCJzdGF0aWMvYmFja2dyb3VuZC5wbmciKTsNCiAgICAgICAgYmFja2dyb3VuZC1zaXplOiBjb3ZlcjsNCiAgICB9DQo8L3N0eWxlPg0KPGJvZHk+DQo8ZGl2Pg0KICAgIDxwIHN0eWxlPSJmb250LXNpemU6IDE1MHB4Ij48L3A+DQogICAgPHAgYWxpZ249ImNlbnRlciIgc3R5bGU9ImZvbnQtc2l6ZTogeHgtbGFyZ2U7IGZvbnQtZmFtaWx5OiDlrovkvZMiPuasoui/juadpeWIsENURlNIT1cg6K645oS/5rGg77yM5aSn6IOG5Zyw6K+05Ye65L2g55qE5oS/5pyb5ZCn77yBPC9wPg0KICAgIDxkaXYgc3R5bGU9IndpZHRoOiA1MCU7IGhlaWdodDogNTBweDsgbWFyZ2luOiAwIGF1dG8iPg0KICAgICAgICA8aW5wdXQgdHlwZT0idGV4dCIgaWQ9ImlucHV0WW91cldpc2giIHBsYWNlaG9sZGVyPSLorrjmhL/msaDmraPlnKjnrYnlvoXkvaDnmoTnpYjmhL8iPg0KICAgIDwvZGl2Pg0KICAgIDxwIGlkPSJzaG93Q01EUmVzdWx0IiBhbGlnbj0iY2VudGVyIiBzdHlsZT0iZm9udC1zaXplOiB4LWxhcmdlIj7orrjmhL/msaDml7bpkp/vvJo8L3A+DQo8L2Rpdj4NCjwvYm9keT4NCjxzY3JpcHQ+DQogICAgZnVuY3Rpb24gc3VibWl0Q01EKHRvU3VibWl0RGF0YSwgY2FsbGJhY2tGdW5jKSB7DQogICAgICAgICQuYWpheCh7DQogICAgICAgICAgICB1cmw6ICc8Pz1wYXJzZV91cmwoJF9TRVJWRVJbIlJFUVVFU1RfVVJJIl0pWydwYXRoJ107Pz4nLA0KICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsDQogICAgICAgICAgICBkYXRhOiB7J2NtZCc6IHRvU3VibWl0RGF0YX0sDQogICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSwgdGV4dFN0YXR1cywganFYSFIpIHsNCiAgICAgICAgICAgICAgICBjYWxsYmFja0Z1bmMoZGF0YSk7DQogICAgICAgICAgICB9DQogICAgICAgIH0pDQogICAgfQ0KDQogICAgd2luZG93Lm9ubG9hZCA9IGZ1bmN0aW9uICgpIHsNCiAgICAgICAgbGV0IGlucHV0Q01ESUQgPSAnaW5wdXRZb3VyV2lzaCc7DQogICAgICAgIGxldCBzaG93VGV4dElEID0gJ3Nob3dDTURSZXN1bHQnOw0KICAgICAgICByZXF1ZXN0RGF0ZShzaG93VGV4dElEKTsNCiAgICAgICAgJCgnIycgKyBpbnB1dENNRElEKS5iaW5kKCdrZXlwcmVzcycsIGZ1bmN0aW9uIChldmVudCkgew0KICAgICAgICAgICAgaWYgKGV2ZW50LmtleUNvZGUgPT09IDEzKXsNCiAgICAgICAgICAgICAgICBzdWJtaXRDTUQoJCgnIycgKyBpbnB1dENNRElEKS52YWwoKSwgZnVuY3Rpb24gKGV4ZWNEYXRhKSB7DQogICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHNob3dUZXh0SUQpLmlubmVySFRNTCA9IGV4ZWNEYXRhOw0KICAgICAgICAgICAgICAgIH0pOw0KICAgICAgICAgICAgfQ0KICAgICAgICB9KTsNCiAgICB9DQo8L3NjcmlwdD4NCjwvaHRtbD4NCg==', true));
    return $true_fileName;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wpUrl']) && isset($_SESSION['ctfshow'])){
    if (filter_var($_POST['wpUrl'], FILTER_VALIDATE_URL)){
        $originData = parse_url($allDict[$_SESSION['ctfshow']]);
        $userData = parse_url($_POST['wpUrl']);
        if (is_array($userData)){
            if ($userData['path'] === $originData['path'] && $userData['scheme'] === $originData['scheme'] && $userData['host'] === $originData['host']){
                header('Location: '.completeFirst(), true, 302);
                session_abort();
                die();
            } else
                $error_msg = 'CTFSHOW 拒绝了你的访问请求。';
        } else
            $error_msg = '无效URL！';
    } else
        $error_msg = '不是合法的URL！';
}
$tVar_dict_keys = array_keys($allDict);
$_SESSION['ctfshow'] = $tVar_dict_keys[rand() % count($tVar_dict_keys)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CTFSHOW 许愿池</title>
    <link type="text/css" href="/static/simple.css" rel="stylesheet">
    <script src="/static/jquery-3.6.1.min.js"></script>
</head>
<style>
    html {
        background-image: url("static/index.png");
        background-size: cover;
    }
</style>
<body>
<div>
    <p style="font-size: 150px"></p>
    <p align="center" style="font-size: xx-large; font-family: 宋体">请告诉我，哪里可以找到<?=$_SESSION['ctfshow']?>的 Writeup 呢！</p>
    <form enctype="application/x-www-form-urlencoded" method="post" action="index.php"
          style="width: 50%; height: 50px; margin: 0 auto" id="form1">
        <input type="text" id="inputWP" placeholder="请输入WP的网址" name="wpUrl">
        <input type="submit" hidden>
    </form>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#inputWP').bind('keypress', function (event) {
            if (event.keyCode === 13){
                $('#form1').submit();
            }
        });
        let error_msg='<?=$error_msg?>';
        if (error_msg.length > 0)
            alert(error_msg);
    });
</script>
</html>
