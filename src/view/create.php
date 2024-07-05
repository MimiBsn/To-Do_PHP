<?php include 'header.php'?>

<h1>Create a To-do</h1>
<form action="/create" method="POST">
    <div class="form-group">
        <label for="name">Name your to-do</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

<?php include 'footer.php';
