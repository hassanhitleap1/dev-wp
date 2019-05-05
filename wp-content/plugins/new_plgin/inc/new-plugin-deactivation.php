<?php

class NewPluginDeactivation{
        public static function deactivation(){
        flush_rewrite_rules();
        }
    }
?>