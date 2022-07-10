<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');

// Подключаем библиотеки и хелперы
include_once 'lib/underscore.php';
include_once 'common/helpers.php';

// Получаем данные из запроса
$data = \Helpers\getRequestData();
$router = $data['router'];

// Проверяем роутер на валидность
if (\Helpers\isValidRouter($router)) {

    // Подключаем файл-роутер
    include_once "routers/$router.php";

    // Запускаем главную функцию
    route($data);

} else {
    // Выбрасываем ошибку
    \Helpers\throwHttpError('invalid_router', 'router not found');
}
