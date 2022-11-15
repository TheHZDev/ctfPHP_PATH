<?php
    $allDict = [
        "大牛杯" => "https://shimo.im/docs/WCcq3HHDWDWxptgg",
        "吃鸡杯" => "https://shimo.im/docs/vQGgPrYTGXKyhHvk",
        "吃瓜杯" => "https://shimo.im/docs/gwpcxkryVJwyJVHR",
        "月饼杯" => "https://shimowendang.com/docs/wGwx98vXWPYW8QRh",
        "击剑杯" => "https://ctf-show.feishu.cn/docs/doccnNEAk0zZJDhi7bypQhF6eFf",
        "摆烂杯" => "https://ctf-show.feishu.cn/docs/doccnC4EpMhSv1Ni6mbL7BQQdBc",
        "新春欢乐赛" => "https://bbs.ctf.show/thread/83",
        "卷王杯" => "https://ctf-show.feishu.cn/docs/doccntELBOXQWXWrRgiWteZ0Xdh",
        "愚人节欢乐赛" => "https://ctf-show.feishu.cn/docs/doccnxS205koA7xoGv2ud6dBbdg",
        "单身杯" => "https://ctf-show.feishu.cn/docs/doccntPffNO3VIF0LV6087Nzbnc",
        "七夕杯" => "https://ctf-show.feishu.cn/docx/doxcnMfyzo4Ohm3GMBqnOexo6gX",
        "新手杯" => "https://ctf-show.feishu.cn/docx/doxcny4IkmjpSJfmRBkndNXcayg",
        "菜狗杯" => "https://ctf-show.feishu.cn/docx/UpC6dtDqgo7VuoxXlcvcLwzKnqh"
    ];
    function refuseAccess(string $filename): void{
        // 拒绝外部非法访问配置文件等一切问题
        $tVar_url = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        if (end($tVar_url) === $filename){
            die('No Flag!'); // 拒绝访问
        }
    }
    function secondWAF(string $bypassStr): string{
        // 需要后台PY服务保持运行(X)
        // 现在有纯PHP实现了
        return trim(translateBash($bypassStr));
    }
    function translateBash(string $toTranslate): string
    {
        global $allDict;
        $no_data = [];
        $newCMD = $toTranslate;
        foreach ($allDict as $name => $urlAddr){
            $re_search = '/\$\{'.$name.':[0-9]+:[0-9]+}/i';
            preg_match_all($re_search, $toTranslate, $no_data);
            $toDealData = $no_data[0]; // 取出数据
            if (count($toDealData) > 0){
                $urlData = parse_url($urlAddr)['path'];
                foreach ($toDealData as $dataUnit){
                    $tVar1 = explode(':', $dataUnit);
                    $newCMD = str_replace($dataUnit, substr($urlData, intval($tVar1[1]), intval($tVar1[2])), $newCMD);
                }
            }
        }
        return $newCMD;
    }
    $evil_time = "Now it's time for you to offer your sacrifice, HaHaHa!";
    $evil_laugh_1 = "The Sadan laughed after hearing your wish, \"I can only answer your prayer, show you <a href='";
    $evil_laugh_2 = "?give_me_source'>source</a>.\"";
    $system_fail = "连许愿池的翻译员都听不懂你想表达什么。";
    @refuseAccess('config.php');
