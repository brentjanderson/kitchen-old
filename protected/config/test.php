<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'components' => array(
                'db' => array(
                    'connectionString' => 'mysql:host=localhost;dbname=aclan_kitchen',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'root',
                    'charset' => 'utf8',
                ),
            ),
                )
);
