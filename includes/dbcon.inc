<?php
$dsn = array(
        'username' => 'aclan_kitchen',
        'password' => '0k29s43H517Qj9O60tGb87o',
        'hostname' => 'mysql.andersonclan.org',
        'database' => 'a_clan'
    );
        
$db = new mysqli($dsn['hostname', $dsn['username'], $dsn['password'], $dsn['database']);

if (!$db) {
die();
}

?>