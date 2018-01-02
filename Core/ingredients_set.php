<?php

class ingredients_set{
    public static function addNaehrwerteFields(){
        $oConfig = oxRegistry::getConfig();
        $sqlFile = $oConfig->getModulesDir().'sw_inserv/sw_inserv_ingredients/sql/ingredients.sql';
        $sSql = file_get_contents($sqlFile);
        oxDb::getDb()->execute($sSql);
    }
    //public static function rmNaehrwerteFields(){
    //    $sSql = "ALTER TABLE `oxcategories` DROP `OXLONGDESCB`, DROP `OXLONGDESCB_1`, DROP `OXLONGDESCB_2`";
    //    oxDb::getDb()->execute( $sSql );
    //}
    public static function onActivate(){
        self::addNaehrwerteFields();
    }
    public static function onDeactivate(){
        //self::rmNaehrwerteFields();
    }
}