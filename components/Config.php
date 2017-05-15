<?php

class Config
{
    public static function getConfig($config)
    {
        $configs = array(
            'version' => 5,
            'title' => 'Introduction task #1',
            'db' => array(
                'host' => "dan",
                'dbName' => "vtarasenkovs",
                'user' => "stasadm",
                'password' => "G0a4wa&",
            ),
        );

        return $configs[$config];
    }

}