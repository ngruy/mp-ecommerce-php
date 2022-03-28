<?php

/**
 * Examen de Certificación Developer - Mercado Pago.
 * Archivo con log de Notificaciones Webhook.
 * @link https://http2.mlstatic.com/frontend-assets/dx-devsite/devprogram/examen-certificacion-developers-checkout-pro-2.0.pdf
 */

// SDK de Mercado Pago
require 'vendor/autoload.php';

use MercadoPago\SDK;

// AccessToken Integrator_ID
SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
SDK::setIntegratorId('dev_24c65fb163bf11ea96500242ac130004');

if (filter_input(INPUT_GET, 'type') == "payment") {
    $payment = MercadoPago\Payment::find_by_id(filter_input(INPUT_GET, 'data.id'));
    if ($payment) {
        $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
    }
}

if (filter_input(INPUT_GET, 'topic') == "merchant_order") {
    $merchant_order = MercadoPago\MerchantOrder::find_by_id(filter_input(INPUT_GET, 'id'));
}


if (isset($merchant_order)) {
    error_log("Notificacion Webhook " . json_encode($merchant_order));
}

error_log('GET: type='.filter_input(INPUT_GET, 'type'));
error_log('GET: data.id='.filter_input(INPUT_GET, 'data.id'));
error_log('GET: topic='.filter_input(INPUT_GET, 'topic'));
error_log('GET: id='.filter_input(INPUT_GET, 'id'));
error_log("Notificacion Webhook - " . file_get_contents('php://input'));
error_log(print_r($_GET));
