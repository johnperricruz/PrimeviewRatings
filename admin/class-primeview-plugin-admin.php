<?php
//Embed the Assets of this Plugin

class Primeview_Plugin_Admin {
	function pv_register_css(){
		wp_enqueue_style('pv-datatable-css','//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css');
		wp_enqueue_style('pvcss',''.plugins_url('css/pv-admin.css',__FILE__ ).'');
	}
	function pv_register_front_css(){
		wp_enqueue_style('pv-frontcss',''.plugins_url('css/pv-review.css',__FILE__ ).'');
		wp_enqueue_style('pv-fa','https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css');
	}
	function pv_register_js(){
		wp_enqueue_script( 'pv-datatable-js', '//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js' );
		wp_enqueue_script( 'pvjs', ''.plugins_url('js/pv-admin.js',__FILE__ ).'' );
	}	

}
