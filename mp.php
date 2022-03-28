<?php

/**
 * Examen de Certificación Developer - Mercado Pago.
 * Archivo que crea la preferencia para el Examen.
 * @link https://http2.mlstatic.com/frontend-assets/dx-devsite/devprogram/examen-certificacion-developers-checkout-pro-2.0.pdf
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Valores Definidos de las Configuraciones para el examen.
require_once 'cfg.php';

// SDK de Mercado Pago
require 'vendor/autoload.php';

use MercadoPago\SDK;

// AccessToken Integrator_ID
SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
SDK::setIntegratorId('dev_24c65fb163bf11ea96500242ac130004');

//------------------------------------------------------------------------------
// Nuevo Pagador
$payer = new MercadoPago\Payer();

// Datos personales de pagador
// Parte A
$payer->name = PAYER_NAME;
$payer->surname = PAYER_SURNAME;

// Parte B
$payer->email = PAYER_EMAIL;

// Parte C y D
$payer->phone = array(
    "area_code" => PHONE_CODE,
    "number" => PHONE_NUMBER
);

// Dirección del pagador Partes A, B y C
$payer->address = array(
    "street_name" => ADDR_ST_NAME,
    "street_number" => ADDR_ST_NUMBER,
    "zip_code" => ADDR_ZIP_CODE
);

//------------------------------------------------------------------------------
// PRODUCTO
$item = new MercadoPago\Item();

// Parte A
$item->id = PRODUCT_ID;

// Parte B
$item->title = filter_input(INPUT_POST, 'title');

// Parte C
$item->description = PRODUCT_DESC;

// Parte D
$item->picture_url = SITE_URL . trim(filter_input(INPUT_POST, 'img'), '.');

// Parte E
$item->quantity = filter_input(INPUT_POST, 'unit');

// Parte F
$item->unit_price = filter_input(INPUT_POST, 'price');

// Parte G
$external_reference = EX_REF;

// Category
$item->category_id = 'Cell Phones';
// 
//------------------------------------------------------------------------------

// Back URLs
$back_urls = array(
    "success" => BACK_URL_SUCCESS,
    "failure" => BACK_URL_FAILURE,
    "pending" => BACK_URL_PENDING
);


//------------------------------------------------------------------------------
// Instancia de Preferencia
$preference = new MercadoPago\Preference();

// Agrego las configuraciones.
$preference->items = array($item);
$preference->payer = $payer;
$preference->external_reference = $external_reference;
$preference->back_urls = $back_urls;
$preference->auto_return = RES_APPROVED;
$preference->notification_url = NOTIFY_WEBHOOK;

$preference->payment_methods = array(
  // Excluyo los métodos de pago y tipo solicitados
  "excluded_payment_methods" => array(
    array("id" => "amex")
  ),
  "excluded_payment_types" => array(
    array("id" => "atm")
  ),
  // 
  // Máximo de 6 cuotas.
  "installments" => 6
);

// Ejecuto el pedido de Preferencias.
$preference->save();

// Guardo el punto de inicio de checkout.
$_POST['init_point'] = $preference->init_point;
