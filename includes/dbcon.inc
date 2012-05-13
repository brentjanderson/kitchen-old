<?PHP

function errorTerminate($errorCode, $errorMessage) {
    $result['status'] = $errorCode;
    $result['msg']    = $errorMessage;
    print json_encode($result);
    die;
}

$dsn = array(
        'username' => 'aclan_kitchen',
        'password' => '0k29s43H517Qj9O60tGb87o',
        'hostname' => 'mysql.andersonclan.org',
        'database' => 'aclan_kitchen'
            );

$dsn = array(
        'username' => 'root',
        'password' => 'root',
        'hostname' => 'localhost',
        'database' => 'aclan_kitchen'
            );

$link = mysql_connect($dsn['hostname'], $dsn['username'], $dsn['password']);
mysql_select_db($dsn['database']);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

?>