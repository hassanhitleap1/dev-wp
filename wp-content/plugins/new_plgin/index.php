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
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
use Inc\Activation;
use Inc\Deactivation;

if (class_exists('AlecaddPlgin')) {
    class AlecaddPlgin{
        public $plugin;

        function __construct( ) {
            $this->plugin= plugin_basename(__FILE__);
        }

        public  function register(){
            add_action('admin_enqueue_scripts',[ 'AlecaddPlgin','enqueue']) ;//admin_enqueue_scripts  admin panel // wp_enqueue_scripts for users 
            add_action('admin_menu',array($this,'add_admin_pages'));
            add_filter( "plugin_action_links_$this->plugin", [$this,'settings_link'] );

        }

        public function settings_link($links){
            // add custum settings
            $settings_link='<a href="admin.php?page=new_plugin">Settings</a>';
            array_push($links,$settings_link);
            return $links;

        }

        public function add_admin_pages(){
            add_menu_page('newplgin', ' new', 'manage_options', 'slg', [$this,'admin_index'], 'dashicons-admin-site', 110);
        }
        public function admin_index(){
            //set template a defulate 
            require_once plugin_dir_url(__FILE__) . 'templates/admin.php';
        }
        public  function activate(){
            //  $this->custum_post_type();
            // activate hook
            // require_once plugin_dir_url(__FILE__) . 'inc/new-plugin-activation.php';
            Activation::activation();

        }

        public static function deactivate(){
            // deactivate hook
            //require_once plugin_dir_url(__FILE__) . 'inc/new-plugin-deactivation.php';
            Deactivation::deactivation();
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

