<?php
echo "<b><font color='grey'>This is php Project #3</font></b>";
echo "</br>";
echo "<b><font color='grey'>php + nginx</font></b>";
echo "</br>";
echo "</br>";
echo 'Версия php : <b>7.3</b>';
echo "</br>";

$var1 = "one";
$var2 = "two";
echo 'Просто переменные в php : <b>'.$var1.' - '.$var2.'</b>';
echo "</br>";
echo '═══════════════════════════════════════════════</br>';
echo "</br>";
echo 'Проверка на подключение к базе <b>POSTGRES</b>';
echo "</br>";
/* ══ CHECKING THE CONNECTION TO THE POSTGRES ════════╗ START ╔═ */
function pg_con_base(){
    $myDomain = "pg_host";
    $myBase = "postgres";
    $pgpass = "w0ut";
    $pguser = "w0ut";
    $conn_string = "host='".$myDomain."' port=5432 dbname='".$myBase."' user='".$pguser."' password='".$pgpass."'";
    $dbconn = pg_connect($conn_string);
    $stat = pg_connection_status($dbconn);
    if($stat !== PGSQL_CONNECTION_OK){
        echo '&nbsp&nbsp&nbsp&nbsp <b><font color="red">НЕТ</font></b> подключения к Базе данных <b>'.$myBase.'</b>';
    } else {
        echo '&nbsp&nbsp&nbsp&nbsp Подключение к Базе <b>'.$myBase.' <font color="green">УСТАНОВЛЕНО</font></b>';
    }
    /* ══ CHECKING THE CONNECTION TO THE POSTGRES ════════╝  END  ╚═ */
}
pg_con_base();
echo "</br>";

echo "</br>";
echo '═══════════════════════════════════════════════</br>';
echo "</br>";
echo 'Проверка на подключение к базе <b>REDIS</b>';
echo "</br>";

require __DIR__ . '/vendor/autoload.php';
$client = new Predis\Client([
    'scheme'   => 'tcp',
    'host'     => 'redis_host',
    'password' => 'w0ut',
    'port'     => 6379,
]);
$client->set('iconn', '&nbsp&nbsp&nbsp&nbsp Подключение к Базе <b>REDIS <font color="green">УСТАНОВЛЕНО</font></b>');
$value = $client->get('iconn');
if ( $value != '' ) {
    echo $value;
} else {
    echo '&nbsp&nbsp&nbsp&nbsp <b><font color="red">НЕТ</font></b> подключения к Базе данных <b>REDIS</b>';
}


phpinfo();
?>