<?php
/**
 * @var \App\Data\DTO\categoryDTO[] $categories
 */
$categories = $data[0];
/**
 * @var \App\Data\DTO\taskDTO $task
 */
$task = $data[1];
?>
<h1>Add new task</h1>
<form method="post">
    <div>
        Title:
        <input type="text" name="title" minlength="3" maxlength="50" value="<?= $task->getTitle() ?>">
    </div>
    <div>
        Description:
        <input type="text" name="description" minlength="10" maxlength="10000" value="<?= $task->getDescription() ?>">>
    </div>
    <div>
        Category:
        <select name="category">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->getId() ?>" id="<?= $category->getId() ?>"
                        name="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        Location:
        <input type="text" name="location" minlength="3" maxlength="100" value="<?= $task->getLocation() ?>">
    </div>
    <div>
        Started on:
        <input type="datetime" name="started_on" value="<?= $task->getStartedOn() ?>">
    </div>
    <div>
        Due date:
        <input type="datetime" name="due_date" value="<?= $task->getDuoDate() ?>">
    </div>
    <input type="submit" value="Edit!" name="edit">
</form>