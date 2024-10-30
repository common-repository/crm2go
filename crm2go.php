<?php
/*
Plugin Name: CRM 2go - Formulario de contacto
Description: Este plugin te permite integrar un formulario de contacto conectado a la base de datos de CRM 2go. Recibe avisos en tu móvil  y no pierdas más oportunidades de venta.
Author: CRM 2go
Version: 1.0
Author URI: https://www.crm2go.net/
*/

// Add Shortcode
function crm2go_contacto( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'slang' => '',
                        'reducido' => 1,
                        'estilo' => 'ls',
			'altura' => 0,
		),
		$atts
	);
	if($atts['slang'] == ''){
		$htmlCode = '
		<div style="font-size:0.9em;margin:20px 0px;background:#f9f9f9;border:2px solid #ddd;padding:10px;">
		<img src="https://cdn.nmg.systems/logos/crm2go_logo_small.png" border="0"><br />
		<span style="font-weight:bold;color:#069;">Debes tener una cuenta de CRM 2go para mostrar un formulario de contacto. Si ya tienes una cuenta s&oacute;lo debes especificar el slang:</span><br />' .
		'La parte al final en la direcci&oacute;n de tu sistema: https://app.crm2go.net/<strong>slang</strong><br /><br />' .
		'<div style="text-align:right;">&iquest;Dudas? En <a href="https://www.crm2go.net/kb/integrar-tu-sitio-wordpress/?utm_source=c2g_plugin_wordpress&utm_medium=weblink&utm_campaign=how_to&utm_term=noslang&utm_content=" style="text-decoration:underline;color:#069;">este link</a> encontrar&aacute;s m&aacute;s informaci&oacute;n</div>' .
		'</div>';
	}
	else{
		$htmlCode = '<div id="c2gContactFormContainer" style="min-width:300px;overflow:visible;">' .
		'<iframe id="c2gContactFormIframe" border="0" style="border:0px;width:100%;height:' .(($atts['altura'] == 0) ? (($atts['reducido'] == 1) ? '550' : '730') : $atts['altura']). 'px;overflow:visible;" src="https://app.crm2go.net/' .$atts['slang']. '/landing?iframe=1' .(($atts['reducido'] == 1) ? '&nolabels=1' : ''). '&style=' .$atts['estilo']. '&embedby=wordpress"></iframe>' .
		'</div>';
	}
	return $htmlCode;

}
add_shortcode( 'crm2go_contacto', 'crm2go_contacto' );

?>
