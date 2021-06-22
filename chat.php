<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>SoChat</title>
</head>
<body>
<?php
$login = $_GET['login'];
$password = $_GET['password'];

$logPas = json_decode(file_get_contents('src/file.json'));
$num = 0;

for ($i = 0; $i < sizeof($logPas->usersData); $i++) {
    if($logPas->usersData[$i]->login === $login) {
        $num = $i;
        break;
    }
}

if(($logPas->usersData[$num]->login === $login) && ($logPas->usersData[$num]->password === $password)) {
    $text = $_GET['text'];
    $date = date('Y-m-d H:i:s');
    $messenger = array('login' => $login, 'mess' => $text, 'date' => $date);
    array_push($logPas->message, $messenger);
    file_put_contents('src/file.json', json_encode($logPas));
}
else {
    echo "Wrong login or password";
}

$logPas = json_decode(file_get_contents("src/file.json"));

for ($i = 0; $i < sizeof($logPas->message); $i++) {
    echo "----------------------------";
    echo "<br/>";
    echo $logPas->message[$i]->login;
    echo "<br/>";
    echo $logPas->message[$i]->mess;
    echo "<br/>";
    echo $logPas->message[$i]->date;
    echo "<br/>";
}
?>
</body>
</html>