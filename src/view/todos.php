<?php
include 'header.php';
$todos = Todo::getAllTodos();
?>
<script>
    window.todosData = <?= json_encode($todos);?>
</script>

<h1>To-do List</h1>
<a href="/create" class="btn btn-primary">Add a To-do</a>
<div x-data="{todos: window.todosData}">
    <ul>
        <template x-for="todo in todos" :key="todo.id">
            <li x-text="todo.name"></li>
        </template>
    </ul>
</div>

<?php include 'footer.php';?>