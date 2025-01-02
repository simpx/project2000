<?php
header('Content-Type: application/json');

$todosFile = 'todos.json';
$todos = [];

if (file_exists($todosFile)) {
    $todos = json_decode(file_get_contents($todosFile), true);
}

$input = json_decode(file_get_contents('php://input'), true);
$index = $input['index'];
$action = $input['action'];

$response = ['success' => false];

if (isset($todos[$index])) {
    switch ($action) {
        case 'toggle':
            $todos[$index]['completed'] = !$todos[$index]['completed'];
            $response['success'] = true;
            break;
        case 'delete':
            array_splice($todos, $index, 1);
            $response['success'] = true;
            break;
    }
    
    if ($response['success']) {
        file_put_contents($todosFile, json_encode($todos));
    }
}

echo json_encode($response);
?>
