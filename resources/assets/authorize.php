<?php
// Username and password for authentification
$username = 'admin';
$password = 'password';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
($_SERVER['PHP_AUTH_USER']) != $username || ($_SERVER['PHP_AUTH_PW']) != $password) {
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="Up2Date"');
exit('<h2>Incorrect username and or password</h2>');
};

?>