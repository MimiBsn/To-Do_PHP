<?php
include 'header.php';
$todos = Todo::getAllTodos();
?>
<script>
    window.todosData = <?= json_encode($todos);?>
</script>

<h1>Update your To-do</h1>
<div x-data="{
    todo: <?php echo json_encode($todos); ?>
}">
    <form action="/update" method="POST">
        <input type="hidden" name="id" x-model="todo.id">
        <div class="form-group">
            <label for="name">Name your to-do</label>
            <input type="text" class="form-control" id="name" name="name" x-model="todo.name" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php include 'footer.php';
?>