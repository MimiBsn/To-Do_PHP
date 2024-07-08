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
        </tr>
        <template x-for="todo in todos" :key="todo.id">
            <tr>
                <td x-data="{todo.completed : false}"><input type="checkbox" @click="todo.completed = ! todo.completed">
                </td>
                <td>
                    <span x-text="todo.name"></span>
                </td>
                <td><a :href="'/update?id=' + todo.id" class="btn btn-light btn-sm">Update</a></td>
                <td><a :href="'/delete?id=' + todo.id" class="btn btn-light btn-sm">Delete</a></td>
        </template>
        </tbody>
    </table>
</div>
<h2>Completed To-do</h2>
<div x-show="todo.completed">
    <td>
        <span x-text="todo.name"></span>
    </td>
</div>

<?php include 'footer.php';?>