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

if (class_exists('AlecaddPlgin')) {
    class AlecaddPlgin{
        function __construct( ) {
        
        }

        public  function register(){
            add_action('admin_enqueue_scripts',[ 'AlecaddPlgin','enqueue']) ;//admin_enqueue_scripts  admin panel // wp_enqueue_scripts for users 
        }

        public  function activate(){
            //  $this->custum_post_type();
            // activate hook
            require_once plugin_dir_url(__FILE__) . 'inc/new-plugin-activation.php';
            register_activation_hook(__FILE__,array( 'NewPluginActivation','activate'));
        }

        public static function deactivate(){
            // deactivate hook
            require_once plugin_dir_url(__FILE__) . 'inc/new-plugin-deactivation.php';
            register_deactivation_hook(__FILE__,array( 'NewPluginDeactivation','deactivate'));
        }

        protected   function create_posts_type(){
            add_action('init',[$this,'custum_post_type']) ;
        }
        public static function uninstall(){

        }


        public  static function custum_post_type(){
            register_post_type('book',['public'=>true,'label'=>'books']);
        }

        public static function enqueue(){
            // enqueue ouer secrpts 
            wp_enqueue_style('myplginstyle', plugins_url('/assets/mystyle.css',__FILE__)); // $deps = array(), $ver = false, $media = 'all'
            wp_enqueue_script('myplginscript', plugins_url('/assets/myjs.css',__FILE__));
        }

    }

     $alecaddPlgin= new AlecaddPlgin();
     $alecaddPlgin->register();

    register_activation_hook(__FILE__, array( $alecaddPlgin, 'activate'));

    register_deactivation_hook(__FILE__, array($alecaddPlgin, 'deactivate'));







//register_uninstall_hook(__FILE__,array($alecaddPlgin,'uninstall'));
}

