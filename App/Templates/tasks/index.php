<h1>All Tasks</h1><br>
<a href="create.php">Add new task</a> | <a href="./index.php">logout</a>. <br>
<?php /** @var \App\Data\DTO\taskDTO[] $data */ ?>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($data as $task): ?>
        <tr>
            <td><?=$task->getTitle()?></td>
            <td><?=$task->getCategory()?></td>
            <td><?=$task->getAuthor()?></td>
            <td><a href="edit.php?id=<?php echo $task->getId(); ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $task->getId(); ?>">Delete</a></td>
        </tr>
    <?php endforeach;?>
</table>
