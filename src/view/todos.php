<?php
include 'header.php';
$todos = Todo::getAllTodos();
?>
<script>
    window.todosData = <?= json_encode($todos);?>
</script>

<h1>To-do List</h1>
<div class="mx-auto my-2" style="width: 200px;">
    <a href="/create" class="btn btn-primary">Add a To-do</a>
</div>
<div x-data="{todos: window.todosData}" class="my-1">
    <table class="table">
        <tr>
            <th scope="col">Completed</th>
            <th scope="col">Name</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
            <th scope="col">Creation date</th>
            <th scope="col">Modification date</th>
        </tr>
        <template x-for="todo in todos" :key="todo.id">
            <tr>
                <td><input type="checkbox" x-model="todo.completed" onchange="this.form.submit()" value="completed">
                </td>
                <td>
                    <span x-text="todo.name"></span>
                </td>
                <td><a :href="'/update?id=' + todo.id" class="btn btn-light btn-sm">Update</a></td>
                <td><a :href="'/delete?id=' + todo.id" class="btn btn-light btn-sm">Delete</a></td>
                <td><span x-text="todo.creation_date"></span></td>
                <td><span x-text="todo.modification_date"></span></td>
            </tr>
    </table>
    </template>
</div>


<?php include 'footer.php';?>