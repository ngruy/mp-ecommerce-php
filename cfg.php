<?php

/**
 * Examen de Certificación Developer - Mercado Pago.
 * Archivo con configuraiones pedidas.
 * @link https://http2.mlstatic.com/frontend-assets/dx-devsite/devprogram/examen-certificacion-developers-checkout-pro-2.0.pdf
 */

// URL del sitio
define('SITE_URL',
        ((filter_input(INPUT_SERVER, 'HTTPS') == 'on' || filter_input(INPUT_SERVER, 'HTTPS') == 1) ?
                'https://' : 'http://') . filter_input(INPUT_SERVER, 'HTTP_HOST'));

// Datos personales del pagador
define('PAYER_NAME', 'Lalo');
define('PAYER_SURNAME', 'Landa');
define('PAYER_EMAIL', '"test_user_63274575@testuser.com"');

define('PHONE_CODE', '11');
define('PHONE_NUMBER', '22223333');

// Dirección del pagador
define('ADDR_ST_NAME', 'Falsa');
define('ADDR_ST_NUMBER', '123');
define('ADDR_ZIP_CODE', '1111');

// Datos de Producto
define('PRODUCT_ID', '1234');
define('PRODUCT_DESC', 'Dispositivo móvil de Tienda e-commerce');
define('EX_REF', 'ngr@vera.com.uy');

// Respuestas
define('RES_SUCCESS', 'success');
define('RES_FAILURE', 'failure');
define('RES_PENDING', 'pending');
define('RES_APPROVED', 'approved');

define('BACK_URL_SUCCESS', SITE_URL . '/res.php?res=' . RES_SUCCESS);
define('BACK_URL_FAILURE', SITE_URL . '/res.php?res=' . RES_FAILURE);
define('BACK_URL_PENDING', SITE_URL . '/res.php?res=' . RES_PENDING);

define('NOTIFY_WEBHOOK', 'https://eodbqac2vwnzie6.m.pipedream.net');
