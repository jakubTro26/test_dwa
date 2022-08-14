<?php
	 function do_ajax_product_import() {
		global $wpdb;


	
		

		//check_ajax_referer( 'wc-product-import', 'security' );
       
		// if ( ! $this->import_allowed() || ! isset( $_POST['file'] ) ) { // PHPCS: input var ok.
		// 	wp_send_json_error( array( 'message' => __( 'Insufficient privileges to import products.', 'woocommerce' ) ) );
		// }

		include_once WC_ABSPATH . 'includes/admin/importers/class-wc-product-csv-importer-controller.php';
		include_once WC_ABSPATH . 'includes/import/class-wc-product-csv-importer.php';
        
		// $file   = wc_clean( wp_unslash( $_POST['file'] ) ); // PHPCS: input var ok.
		// $params = array(
		// 	'delimiter'       => ! empty( $_POST['delimiter'] ) ? wc_clean( wp_unslash( $_POST['delimiter'] ) ) : ',', // PHPCS: input var ok.
		// 	'start_pos'       => isset( $_POST['position'] ) ? absint( $_POST['position'] ) : 0, // PHPCS: input var ok.
		// 	'mapping'         => isset( $_POST['mapping'] ) ? (array) wc_clean( wp_unslash( $_POST['mapping'] ) ) : array(), // PHPCS: input var ok.
		// 	'update_existing' => isset( $_POST['update_existing'] ) ? (bool) $_POST['update_existing'] : false, // PHPCS: input var ok.
		// 	'lines'           => apply_filters( 'woocommerce_product_import_batch_size', 30 ),
		// 	'parse'           => true,
		// );
      
            $file =site_url() ."/test_dobry.csv";


			echo $file;

          		$params = array(
			'delimiter'       => ',', 
			'start_pos'       => 0, // PHPCS: input var ok.
			'mapping'         => array(
                'from' => array('towar_id','kod','cku','plik_zdjecia','czy_opakowanie','nazwa'),

                'to' => array('','sku','','','','name')


            ), // PHPCS: input var ok.
			'update_existing' => true, // PHPCS: input var ok.
			'lines'           => 30,
			'parse'           => 1,
		);

		// Log failures.
		if ( 0 !== $params['start_pos'] ) {
			$error_log = array_filter( (array) get_user_option( 'product_import_error_log' ) );
		} else {
			$error_log = array();
		}




		$importer         = WC_Product_CSV_Importer_Controller::get_importer( $file, $params );
		
		
		// $myfile = fopen("/home4/smakolyk/public_html/test/newfile.txt", "w") or die("Unable to open file!");
		// $file1 = '/home4/smakolyk/public_html/test/newfile.txt';

        // $current = file_get_contents($file1);
        // file_put_contents($file1, print_r($result,true));
// Write the contents back to the file




		$results          = $importer->import();
        
        echo 'results';
        var_dump($results);
		$percent_complete = $importer->get_percent_complete();
		$error_log        = array_merge( $error_log, $results['failed'], $results['skipped'] );

		update_user_option( get_current_user_id(), 'product_import_error_log', $error_log );

		if ( 100 === $percent_complete ) {
			// @codingStandardsIgnoreStart.
			$wpdb->delete( $wpdb->postmeta, array( 'meta_key' => '_original_id' ) );
			$wpdb->delete( $wpdb->posts, array(
				'post_type'   => 'product',
				'post_status' => 'importing',
			) );
			$wpdb->delete( $wpdb->posts, array(
				'post_type'   => 'product_variation',
				'post_status' => 'importing',
			) );
			// @codingStandardsIgnoreEnd.

			// Clean up orphaned data.
			$wpdb->query(
				"
				DELETE {$wpdb->posts}.* FROM {$wpdb->posts}
				LEFT JOIN {$wpdb->posts} wp ON wp.ID = {$wpdb->posts}.post_parent
				WHERE wp.ID IS NULL AND {$wpdb->posts}.post_type = 'product_variation'
			"
			);
			$wpdb->query(
				"
				DELETE {$wpdb->postmeta}.* FROM {$wpdb->postmeta}
				LEFT JOIN {$wpdb->posts} wp ON wp.ID = {$wpdb->postmeta}.post_id
				WHERE wp.ID IS NULL
			"
			);
			// @codingStandardsIgnoreStart.
			$wpdb->query( "
				DELETE tr.* FROM {$wpdb->term_relationships} tr
				LEFT JOIN {$wpdb->posts} wp ON wp.ID = tr.object_id
				LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
				WHERE wp.ID IS NULL
				AND tt.taxonomy IN ( '" . implode( "','", array_map( 'esc_sql', get_object_taxonomies( 'product' ) ) ) . "' )
			" );
			// @codingStandardsIgnoreEnd.

			// Send success.
			// wp_send_json_success(
			// 	array(
			// 		'position'   => 'done',
			// 		'percentage' => 100,
			// 		'url'        => add_query_arg( array( '_wpnonce' => wp_create_nonce( 'woocommerce-csv-importer' ) ), admin_url( 'edit.php?post_type=product&page=product_importer&step=done' ) ),
			// 		'imported'   => count( $results['imported'] ),
			// 		'failed'     => count( $results['failed'] ),
			// 		'updated'    => count( $results['updated'] ),
			// 		'skipped'    => count( $results['skipped'] ),
			// 	)
			// );
		} else {
			// wp_send_json_success(
			// 	array(
			// 		'position'   => $importer->get_file_position(),
			// 		'percentage' => $percent_complete,
			// 		'imported'   => count( $results['imported'] ),
			// 		'failed'     => count( $results['failed'] ),
			// 		'updated'    => count( $results['updated'] ),
			// 		'skipped'    => count( $results['skipped'] ),
			// 	)
			// );
		}
	}

    do_ajax_product_import();


?>