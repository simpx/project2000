function toggleComplete(index) {
    fetch('update_todo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            index: index,
            action: 'toggle'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const todoText = document.querySelectorAll('.todo-text')[index];
            todoText.classList.toggle('completed');
        }
    });
}

function deleteTodo(index) {
    if (confirm('确定要删除这个任务吗？')) {
        fetch('update_todo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                index: index,
                action: 'delete'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
}
