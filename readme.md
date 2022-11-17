### 另类RCE代码执行

本题参考了"ctfshow 月饼杯"的"Web3_莫负婵娟"的第二部分代码执行，那题使用了${PATH:1:1}的方式来拼凑出cat /flag进而成功读取flag。本题在其基础上进一步深化。

static目录为存放静态资源（css、js和png背景）。  
index.php、config.php和randomDate.php为本题必须的执行文件，func.php仅仅作为源码备份。

CMDHelp.php和config.php用于提供验题时的代码参考。