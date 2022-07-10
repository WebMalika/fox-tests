<?php

// Роутинг, основная функция
function route($data) {
    $fileName = '../../tests.json';
    // GET /tests
    if ($data['method'] === 'GET' && count($data['urlData']) === 1) {
        $arTests = json_decode(file_get_contents($fileName), true);

        echo json_encode($arTests);
        exit;
    }

    // GET /tests/5
    if ($data['method'] === 'GET' && count($data['urlData']) === 2) {
        $arTests = json_decode(file_get_contents($fileName), true);
        $id = (int)$data['urlData'][1];

        foreach($arTests as $test){
            if($test['id'] == $id){
                echo json_encode($test);
                exit;
            } 
        }
    }

    // // POST /tests
    if($data['method'] === 'POST' 
    && count($data['urlData']) === 1
    && isset($data['formData']['newTest'])){
        $arTests = json_decode(file_get_contents($fileName), true);
        $newTest = json_decode($data['formData']['newTest'], true);
        $newTest['id'] = end($arTests)['id'] + 1; 

        $arTests[] = $newTest;
        
        if($result = file_put_contents($fileName, json_encode($arTests))){
            echo json_encode(['status' => 'ok', 'result' => $result]);
            exit;
        }
    }
    // if (
    //     $data['method'] === 'POST' &&
    //     count($data['urlData']) === 1 &&
    //     isset($data['formData']['title']) &&
    //     isset($data['formData']['categoryId']) &&
    //     isset($data['formData']['brandId']) &&
    //     isset($data['formData']['price']) &&
    //     isset($data['formData']['rating'])
    // ) {
    //     $title = $data['formData']['title'];
    //     $categoryId = (int)$data['formData']['categoryId'];
    //     $brandId = (int)$data['formData']['brandId'];
    //     $price = (int)$data['formData']['price'];
    //     $rating = (int)$data['formData']['rating'];

    //     echo json_encode(addProduct($title, $categoryId, $brandId, $price, $rating));
    //     exit;
    // }

    // // PUT /tests/5
    // if (
    //     $data['method'] === 'PUT' &&
    //     count($data['urlData']) === 2 &&
    //     isset($data['formData']['title']) &&
    //     isset($data['formData']['categoryId']) &&
    //     isset($data['formData']['brandId']) &&
    //     isset($data['formData']['price']) &&
    //     isset($data['formData']['rating'])
    // ) {
    //     $id = (int)$data['urlData'][1];
    //     $title = $data['formData']['title'];
    //     $categoryId = (int)$data['formData']['categoryId'];
    //     $brandId = (int)$data['formData']['brandId'];
    //     $price = (int)$data['formData']['price'];
    //     $rating = (int)$data['formData']['rating'];

    //     echo json_encode(updateProduct($id, $title, $categoryId, $brandId, $price, $rating));
    //     exit;
    // }

    // // DELETE /tests/5
    // if ($data['method'] === 'DELETE' && count($data['urlData']) === 2) {
    //     $id = (int)$data['urlData'][1];

    //     echo json_encode(deleteProduct($id));
    //     exit;
    // }


    // Если ни один роутер не отработал
    \Helpers\throwHttpError('invalid_parameters', 'invalid parameters');
}