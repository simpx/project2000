<?php
// 初始化todos数组
$todos = [];
$todosFile = 'todos.json';

// 如果todos.json存在，读取数据
if (file_exists($todosFile)) {
    $todos = json_decode(file_get_contents($todosFile), true);
}

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new_todo'])) {
        $newTodo = trim($_POST['new_todo']);
        if (!empty($newTodo)) {
            $todos[] = [
                'text' => $newTodo,
                'completed' => false
            ];
            file_put_contents($todosFile, json_encode($todos));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2000年代风格Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>我的Todo列表</h1>
        <form method="POST">
            <input type="text" name="new_todo" placeholder="添加新任务">
            <button type="submit">添加</button>
        </form>
        <ul id="todo-list">
            <?php foreach ($todos as $index => $todo): ?>
                <li>
                    <span class="todo-text"><?php echo htmlspecialchars($todo['text']); ?></span>
                    <button onclick="toggleComplete(<?php echo $index; ?>)">完成</button>
                    <button onclick="deleteTodo(<?php echo $index; ?>)">删除</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="todos.js"></script>
</body>
</html>
