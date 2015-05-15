<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Helper orientado a mantener una estructura con los CSS's y los JS's


// if ( ! function_exists('getLibrary')){
// 	*
// 	 * Get an instance of the library to allow the helper to get and set all the assets
// 	 * @return object CI object
	 
// 	function getLibrary(){
// 		unset($CI);
// 		$CI =& get_instance();
// 		$CI->load->library('my_injectorLib');
// 		return $CI;
// 	}
// }

if ( ! function_exists('addCSS')){
	/**
	 * Called from Views, add a new css file to the library
	 * @param string  $nombre       Name of the asset, to avoid duplicates.
	 * @param string  $ruta         Route of the asset
	 * @param boolean $rutaCompleta Either if the route si full or need the base_url()
	 * @param boolean $activo       If the asset needs to get added to the library
	 */
	function addCSS($ruta, $nombre = '',  $rutaCompleta = FALSE, $activo = TRUE){
		$CI =& get_instance();
		$css = $CI->config->item('css');

		$ruta = $rutaCompleta ? $ruta : base_url().$ruta ;
		$nombre = ($nombre == '') ? pathinfo($ruta)['filename'] : $nombre;
		if (array_key_exists($nombre, $css)){
			trigger_error("Can't add ".$nombre." to css list, already exist", E_USER_WARNING);
		}else{
			$css[$nombre] = $ruta;
			$CI->config->set_item('css',$css);
		}
		
		//$CI->my_injectorLib->setCSS($nombre, $ruta);
		unset($CI);
		
	}
}

if ( ! function_exists('addStyle')){
	/**
	 * @TODO
	 * @param string  $nombre [description]
	 * @param [type]  $style  [description]
	 * @param boolean $activo [description]
	 */
	function addStyle($nombre = '', $style, $activo = TRUE){

	}
}

if ( ! function_exists('addJS')){

	function addJS( $ruta, $nombre = '', $rutaCompleta = FALSE, $activo = TRUE){
		$CI =& get_instance();
		$js = $CI->config->item('js');

		$ruta = $rutaCompleta ? $ruta : base_url().$ruta ;
		$nombre = ($nombre == '') ? pathinfo($ruta)['filename'] : $nombre;
		if (array_key_exists($nombre, $js)){
			trigger_error("Can't add ".$nombre." to js list, already exist", E_USER_WARNING);
		}else{
			$js[$nombre] = $ruta;
			$CI->config->set_item('js',$js);
		}
		
		//$CI->my_injectorLib->setCSS($nombre, $ruta);
		unset($CI);
		
	}
}

if ( ! function_exists('getCSS')){
	/**
	 * Set all the CSS's already stored
	 * @return [type] [description]
	 */
	function getCSS(){
		$CI =& get_instance();		
		$css = $CI->config->item('css');

		if (count($css)>0){	
			foreach ($css as $valor) {
				//$html =+ "<link href='$valor' rel='stylesheet' type='text/css'>\n";
				echo "<link href='$valor' rel='stylesheet' type='text/css' >\n";
			}
		}
		unset($CI);
	}
}

if ( ! function_exists('getStyle')){
	function getStyle(){

	} 
}
if ( ! function_exists('getJS')){

	function getJS(){
		$CI =& get_instance();		
		$js = $CI->config->item('js');

		if (count($js)>0){	
			foreach ($js as $valor) {
				//$html =+ "<link href='$valor' rel='stylesheet' type='text/css'>\n";
				echo "<script src='$valor' type='text/javascript'></script>";
			}
		}
		unset($CI);
	}
}

?>