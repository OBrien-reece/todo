<?php

$taskToDo = [];
if(file_exists('todo.json')) {
    $taskToDo = file_get_contents('todo.json');
    $jsonArray = json_decode($taskToDo, true);
}

?>

<form method="POST" action="addtodo.php" style="margin-top: 40px">
    <input name="tasktodo" placeholder="Enter To Do" type="text">
    <button type="submit">Submit To DO</button>
</form>

<?php foreach ( $jsonArray as $tasktodo => $tasks) { ?>

    <div style="padding: 12px">
        <form style="display: inline-block" method="POST" action="change_status.php">
            <input type="hidden" name="todonamechange" value="<?php echo $tasktodo?>">
            <input type="checkbox" name="check" <?php echo $tasks['completed'] ? 'checked' : '' ?>>
        </form>
        <?php echo $tasktodo;?>

        <form style="display: inline-block" action="deletetodo.php" method="POST">
            <button type="submit" name="deletetodo" value="<?php echo $tasktodo?>">Delete</button>
        </form>

    </div>

<?php } ;?>

<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox][name=check]');
    checkboxes.forEach(ch => {
        ch.onclick = function () {
            this.parentNode.submit();
        }
    })
</script>


