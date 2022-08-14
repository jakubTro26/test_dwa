<?php
/*
Plugin Name: Menu Test
Plugin URI: http://codex.wordpress.org/Adding_Administration_Menus
Description: Menu Test
Author: Codex authorsf
Author URI: http://example.comf
*/

// Hook for adding admin menusf
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('pcmarket_import','menu-test'), __('pcmarket','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

   

    
}



// toplevel
function mt_toplevel_page() {
    echo "<h2>" . __( 'pcmarket_import', 'menu-test' ) . "</h2>";

    if ( isset( $_GET['action'] ) ) {
        $action = wp_unslash( $_GET['action'] );
      
    }

  


    ?>

        

        <div class=wrapper1>
            <div class="konwertuj">
                <div class="opis1">
                    konwertuj pliki XML do jednego pliku csv
                </div>
                <a  href="<?php echo ABSPATH ?>wp-admin/admin.php?page=mt-top-level-handle&action=convert" class="button1">
                    <button class="button1">
                        konwertuj
                    </button>
                </a>
               
            
            </div>
            <div class="loadDiv">
                    <img class="loading" style="display:none;" src="loading.gif">
                    <img class="accept" style="display:none;" src="accept.png">
            </div>
        </div>
        <div class="wrapper2">
        <a  href="<?php echo ABSPATH ?>wp-admin/admin.php?page=mt-top-level-handle&action=import" class="button2">
                    <button class="button1">
                        importuj
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



    require_once ABSPATH . 'convert.php';

}

if($action=='import'){

    require_once ABSPATH . 'import.php';



}



}



?>