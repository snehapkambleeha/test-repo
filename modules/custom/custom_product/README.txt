##Custom product listing

##Requirements
This functionality requires Drupal core >= 9.0.
PHP 7.4 with the GD extension installed.
Composer installed globally.

##Installation
1. We need to install the project's dependency for QR code generation, chillerlan/php-qrcode. To do that, run the command below:

composer require chillerlan/php-qrcode
2. enable the "Custom QRcode" block and place it in "Side bar" for "node/*" page. Else you can also install the db which already had content type and block created.
db name : mario

Thank you