<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.rawgit.com/mblode/marx/master/css/marx.min.css">
<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.3.0"></script><script type="text/javascript">
window.onload = function() {
   twemoji.size = '72x72';
   twemoji.parse(document.body);
}
</script>
<style type="text/css">
img.emoji {
  margin: 0px !important;
  display: inline !important;
}

 img{
    width: 32px;
    height: 32px;
}

h1 img{
    width: 64px;
    height: 64px;
}
</style>
</head>
<body>

<h1>☺➕🐟➡❤❓</h1>


<?php

$🎁 = ['🐟','🐠','🐬','🐳','🐋','🐙','🐚','🐡','🦐','🦈'];

$😊 = ['🤖','👲','👳','👮','👷','👴','👵','👸','🤡','👸'];

if(isset($_POST['💫']) && $_POST['💫'] == '💫'){
    unset($_SESSION['🔁']);
    unset($_SESSION['❤']);
    unset($_SESSION['💯']);
}

if(!isset($_SESSION['🔁'])){
    $_SESSION['🔁'] = $🎁;
    shuffle($_SESSION['🔁']);
}
if(!isset($_SESSION['❤'])){
    $_SESSION['❤'] = [];
}
if(!isset($_SESSION['💯'])){
    $_SESSION['💯'] = 0;
}

if(isset($_POST['👍']) && isset($_POST['🎯'])){
    $_SESSION['💯']++;
    if($_SESSION['🔁'][$_POST['🎯']] == $_POST['👍']){

    echo '<h1>'.$😊[$_POST['🎯']].'❤'.$_SESSION['🔁'][$_POST['🎯']].'✅❗</h1>';

        $_SESSION['❤'][] = $😊[$_POST['🎯']];
    }
}


$❌ = false;
foreach ($😊 as $🔑 => $🎀) {
    if(!in_array($🎀,$_SESSION['❤'])){
        $❌ = true;
    }
}

if(!$❌ ){
    echo '<h1>🎉🎊🎆❤❤💖❤❤🎆🎊🎉</h1>';
}


echo '
<hr>
<form action="" method="post">';
foreach ($😊 as $💯 => $❤) {
    echo $❤.'❤';
    if(in_array($❤,$_SESSION['❤'])){
        echo $_SESSION['🔁'][$💯];
    }else{
        echo '❓';
    }
    echo '<br>';
}
echo '<hr>';

$😊❓ = $😊;
for($🔁 = count($😊❓)-1;$🔁 > -1;$🔁--){
    if(in_array($😊[$🔁],$_SESSION['❤'])) {
        unset($😊❓[$🔁]);
    }
}


$🎯 = array_rand($😊❓);

echo '<h1>'.$😊❓[$🎯].'</h1>';

echo '<input type="hidden" name="🎯" value="'.$🎯.'"><br>';

foreach ($_SESSION['🔁'] as $🔑 => $🎀) {
    echo '<button type="submit" name="👍" value="'.$🎀.'">'.$🎀.'</button>'; 
}
echo '<br>';
for($➰ = 0;$➰ < $_SESSION['💯'];$➰++){
    echo '❌';
}
echo '<br><button type="submit" name="💫" value="💫">💫</button></form>';













?>
</body>