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
            <li>
                <span x-text="todo.name"></span>
                <a :href="'/update?id=' + todo.id" class="btn btn-secondary btn-sm">Update</a>
                <a :href="'/delete?id=' + todo.id" class="btn btn-secondary btn-sm">Delete</a>
            </li>
        </template>
    </ul>
</div>

<?php include 'footer.php';?>