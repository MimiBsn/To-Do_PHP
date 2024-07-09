<?php
include 'header.php';
$todos = Todo::showUpdateForm($id);
?>
<script>
    window.todosData = <?= json_encode($todos);?>
</script>

<h1>Update your To-do</h1>
<div x-data="{ todo: window.todosData }" x-init="console.log(todo)">
    <form action="/update" method="POST">
        <input type="hidden" name="id" x-model="todo.id">
        <div class="form-group">
            <label for="name">Name your to-do</label>
            <input type="text" class="form-control" id="name" name="name" :value="todo.name" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php include 'footer.php';
?>