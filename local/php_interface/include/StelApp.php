<?php
namespace Twim\Helper;  
/**
 * StelApp application main class
 */
class StelApp{
    /**
     * clearPhone 
     * @param string $phone - no format phone
     * @return string - format phone
     */
    public static function clearPhone($phone){
        $rmSymbols = ["(", ")", " ", "-"];
        return str_replace($rmSymbols, "", $phone);
    }
}
/**
 * data exchange between components
 */
class GarbageStorage{
   private static $storage = array();
   public static function set($name, $value){ self::$storage[$name] = $value;}
   public static function get($name){ return self::$storage[$name];}
}