<?php
namespace Drupal\custom_product\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
/**
 * Description of TopHeader
 *
 * @author Sneha
 * @Block(
 *   id = "custom_qrcode",
 *   admin_label = @Translation("QR code Block"),
 *   category = @Translation("QR code Block")
 * )
 */
class customQRcode extends BlockBase{

  public function build() {
  	//Get current node id and details from node
  	$node = \Drupal::routeMatch()->getParameter('node');
	$nid = $node->id();
	$node = \Drupal\node\Entity\Node::load($nid);
	$link = $node->get('field_app_purchase_link')->getValue();  
	$app_link = $link[0]['uri'];
	//Generate QRcode using chillerlan package
  	$options = new QROptions(
  		[
    		'eccLevel' => QRCode::ECC_L,
    		'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    		'version' => 5,
  		]
	);
	//embed app link of product into qrcode
	$qrcode = (new QRCode($options))->render($app_link);
	$data['qrcode'] = $qrcode;

	return [
      '#theme' => 'qr_code_templates',
      '#data' => $data,
      '#cache' => ['max-age' => 0],
    ];
  }

}
