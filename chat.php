<?php
date_default_timezone_set('UTC');

$users = array (
    "sophia"=>"11",
    "alex"=>"10"
);

$login = $_GET['login'];
$password = $_GET['password'];
$txt = $_GET['txt'];
$date = date('l jS \of F Y h:i:s A');

if(($users[$login]  === $password) && ($login != null))
{
    $message = array(
        'login' => $login,
        'txt' => $txt,
        'date' => $date
    );

    $file = json_decode(file_get_contents('file.json'));
    array_push($file->message, $message);
    file_put_contents('file.json', json_encode($file));
}
else
{
    echo "Пользователь не авторизован" . "<br/>";
}

$file = file_get_contents('file.json');
echo $file;


