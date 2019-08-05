<?php
/**
 * @var \App\Data\DTO\categoryDTO[] $data
 */
?>
<h1>Add new task</h1>
<form method="post">
    <div>
        Title:
        <input type="text" name="title" minlength="3"  maxlength="50">
    </div>
    <div>
        Description:
        <input type="text" name="description" minlength="10" maxlength="10000">
    </div>
    <div>
        Category:
        <select name="category">
            <?php foreach ($data as $category): ?>
                <option value="<?= $category->getId() ?>" id="<?= $category->getId() ?>" name="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        Location:
        <input type="text" name="location" minlength="3"  maxlength="100">
    </div>
    <div>
        Started on:
        <input type="datetime" name="started_on">
    </div>
    <div>
        Due date:
        <input type="datetime" name="due_date">
    </div>
    <input type="submit" value="Add!" name="create">
</form>