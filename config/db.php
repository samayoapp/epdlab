<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', 'Shialebeouf30', 'epd_labdata');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}