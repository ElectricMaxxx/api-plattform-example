<?php


function getAction($message) {
    http_response_code(200);
    $message['message'] = 'got it';
    echo json_encode($message);

}

function putAction($message) {
    http_response_code(200);
    $message['message'] = 'put';
    echo json_encode($message);
}

function postAction($message) {
    http_response_code(201);
}

function DeleteAction($message) {
    http_response_code(206);
    $message['message'] = 'deleted';
    echo json_encode($message);
}

$message = ['message' => '', 'errors' => [], 'payload' => []];
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        getAction($message);
        break;
    case 'POST':
        postAction($message);
        break;
    case 'PUT':
        putAction($message);
        break;
    case 'DELETE':
        deleterAction($message);
        break;
    default:
        throw new Exception('Rquest method unknown: '.$_SERVER['REQUEST_METHOD']);
}