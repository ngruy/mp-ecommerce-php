<?php

/**
 * Examen de Certificación Developer - Mercado Pago.
 * Archivo con log de Notificaciones Webhook.
 * @link https://http2.mlstatic.com/frontend-assets/dx-devsite/devprogram/examen-certificacion-developers-checkout-pro-2.0.pdf
 */

// LogLevel, registro de notificaciones webhook formato json
error_reporting(E_ALL);
ini_set("display_errors", 1);

error_log("Notificacion Webhook - GET JSON: " . json_encode(var_dump($_GET)));
error_log("\n");
error_log("Notificacion Webhook - POST JSON: " . json_encode(var_dump($_POST)));
error_log("\n");

////// SDK de Mercado Pago
////require 'vendor/autoload.php';
////
////use MercadoPago\SDK;
////
////// AccessToken e Integrator_ID
////SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
////SDK::setIntegratorId('dev_24c65fb163bf11ea96500242ac130004');
////
////if (filter_input(INPUT_GET, 'type') == "payment") {
////    $payment = MercadoPago\Payment::find_by_id(filter_input(INPUT_GET, 'data.id'));
////    if ($payment) {
////        $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
////    }
////}
////
////if (filter_input(INPUT_GET, 'topic') == "merchant_order") {
////    $merchant_order = MercadoPago\MerchantOrder::find_by_id(filter_input(INPUT_GET, 'id'));
////}
////
////
////if (isset($merchant_order)) {
////    error_log("MerchantOrder JSON: " . json_encode($merchant_order));
////}
//
//error_log("Notificacion Webhook - input JSON: " . json_encode(file_get_contents('php://input')));
//error_log("\n\n\n");
//error_log("Notificacion Webhook - POST JSON: " . json_encode($_POST));
//error_log("\n\n\n");
//error_log("Notificacion Webhook - GET JSON: " . json_encode($_GET));
//error_log("\n\n\n");
