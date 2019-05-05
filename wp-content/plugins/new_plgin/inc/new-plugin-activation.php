<?php

class NewPluginActivation{
        public static function activation(){
            flush_rewrite_rules();
        }
    }
