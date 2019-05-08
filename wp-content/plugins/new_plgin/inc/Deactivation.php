<?php
namespace Inc;

class Deactivation{
        public static function deactivation(){
        flush_rewrite_rules();
        }
    }
?>