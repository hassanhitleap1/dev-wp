<?php
/**
* Plugin Name: new plgin
* Plugin URI: http://localhost/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: by hasan kiwan
* Author URI: http://localhost/
**/

defined('ABSPATH') or die('exit ya baby ');


class AlecaddPlgin{
    function __construct( ) {
        add_action('init',[$this,'custum_post_type']) ;
    }

    public function register(){
        add_action('admin_enqueue_scripts',[$this,'enqueue']) ;//admin_enqueue_scripts  admin panel // wp_enqueue_scripts for users 
    }

    public function activate(){
        $this->custum_post_type();
        flush_rewrite_rules();
    }

    public function deactivate(){
        flush_rewrite_rules();
    }

    public function uninstall(){

    }


    public function custum_post_type(){
        register_post_type('book',['public'=>true,'label'=>'books']);
    }

    public function enqueue(){
        // enqueue ouer secrpts 
        wp_enqueue_style('myplginstyle', plugins_url('/assets/mystyle.css',__FILE__)); // $deps = array(), $ver = false, $media = 'all'
        wp_enqueue_script('myplginscript', plugins_url('/assets/myjs.css',__FILE__));
    }
}

if(class_exists('AlecaddPlgin')){
 $alecaddPlgin= new AlecaddPlgin();
 $alecaddPlgin->register();
}

// activate hook
register_activation_hook(__FILE__,array($alecaddPlgin,'activate'));

// deactivate hook
register_deactivation_hook(__FILE__,array($alecaddPlgin,'deactivate'));

register_uninstall_hook(__FILE__,array($alecaddPlgin,'deactivate'));

