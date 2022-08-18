<?php
/*
Plugin Name: pc-market
Plugin URI:w
Description: pc-market
Author: Jakub Troczyńki
Author URI: ttroczynski5@gmail.com
*/

// Hook for adding admin menusf
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('pcmarket','pcmarket'), __('pcmarket','pcmarket'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

   

    
}


add_action('cron','cron_function');

 function cron_function(){

       // $myfile = fopen("/home4/smakolyk/public_html/test_dwa/cron.txt", "w") or die("Unable to open file!");
		$file1 = '/home4/smakolyk/public_html/test_dwa/cron.txt';

        $current = file_get_contents($file1);
        file_put_contents($file1, print_r('kuba',true),FILE_APPEND);


        require_once ABSPATH  . 'wp-content/plugins/pc-market/convert.php';


}

 

// toplevel
function mt_toplevel_page() {
    echo "<h2>" . __( 'pcmarket' ) . "</h2>";


   
        add_filter( 'woocommerce_product_csv_importer_check_import_file_path', '__return_false' );
        wp_enqueue_style( 'custom-design', site_url() . '/wp-content/plugins/my-plugin/design.css' );



    if ( isset( $_GET['action'] ) ) {
        $action = wp_unslash( $_GET['action'] );
      
    }

  


    ?>

        

        <div class=wrapper1>
            <div class="konwertuj">
                <div class="opis1">
                    konwertuj pliki XML do jednego pliku csv
                </div>
                <a  href="<?php echo site_url(); ?>/wp-admin/admin.php?page=mt-top-level-handle&action=convert" class="button1">
                    <button class="button1">
                        konwertuj plik xml
                    </button>
                </a>
               
            
            </div>
            <div class="loadDiv">
                    <img class="loading" style="display:none;" src="loading.gif">
                    <img class="accept" style="display:none;" src="accept.png">
            </div>
        </div>
        <div class="wrapper2">
        <a  href="<?php echo site_url(); ?>/wp-admin/admin.php?page=mt-top-level-handle&action=import" class="button2">
                    <button class="button1">
                        importuj plik xml
                    </button>
                </a>

        </div>
        <script>
            document.querySelector('.button1').onclick=function(){
                document.querySelector('.loading').style.display="block";
                document.querySelector(".accept").style.display="none";
            };
        </script>



    <?php


if($action=='convert'){



    require_once ABSPATH  . 'wp-content/plugins/pc-market/convert.php';

}

if($action=='import'){


    require_once ABSPATH .  'wp-content/plugins/pc-market/import.php';



}



}



?>