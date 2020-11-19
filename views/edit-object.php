<!-- Edit your objects here. You should rename this file. -->
<?php require_once 'templates/header.tpl.php';

    $key = $_GET['id'];
    $controller = new PersonController;
    $people = $controller->read();

    foreach ($people as $i => $row):
        if ($row['id'] == $key):
            $current = $row['people'];
        endif;
    endforeach;
?>
<div class="container">
    <h2><span class="fa fa-edit"></span>Edit <?php echo Sanitizer::escape_html($current->name) ?></a></h2>
    <?php if (isset($_GET['edit']) && $_GET['edit'] == 'error'): ?>
    <div class="alert alert-danger"><span class="fa fa-exclaimation-triangle"></span> You Didn't fill the form out correctly.</div>
    <?php endif; ?>

    <form action="../controllers/routes.php?action=update" method="post">
        <div class = "form-group">
            <input class = "form-control" type="hidden" name="id" value="<?php echo $key; ?>">

            <label for="name">Name:</label>
            <input class = "form-control" type="text" name="name" value="<?php echo $current->name; ?>" id="name">

            <label for="Age">Age:</label>
            <input class = "form-control" type="number" name="age" value="<?php echo $current->age; ?>" id="age">

            <label for="Age">Balance</label>
            <input class = "form-control" type="number" name="balance" value="<?php echo $current->age; ?>" id="age">

            <label for="image">Image:</label>
            <select class = "form-control" name="image" id="image">
                <option value="bmo.png" <?php if ('bmo.png' == $current->image): echo 'selected'; endif; ?>>Bmo</option>
                <option value="finn.png" <?php if ('finn.png' == $current->image): echo 'selected'; endif; ?>>Finn</option>
                <option value="jake.png" <?php if ('jake.png' == $current->image): echo 'selected'; endif; ?>>Jake</option>
                <option value="lady.png" <?php if ('lady.png' == $current->image): echo 'selected'; endif; ?>>Lady Rainicorn</option>
                <option value="lsp.png" <?php if ('lsp.png' == $current->image): echo 'selected'; endif; ?>>Lumpy Space Princess</option>
                <option value="marcy.png" <?php if ('marcy.png' == $current->image): echo 'selected'; endif; ?>>Marceline the Vampire Queen</option>
                <option value="pb.png" <?php if ('pb.png' == $current->image): echo 'selected'; endif; ?>>Princess Bubblegum</option>
                <option value="simon.png" <?php if ('simon.png' == $current->image): echo 'selected'; endif; ?>>Ice King</option>
            </select>

            <button class = "btn btn-success form-btn form-control" type="submit"><span class="fa fa-plus"></span> Edit <?php echo $current->name?></button>
        </div>
    </form>
</div>
<?php require_once 'templates/footer.tpl.php'; ?>
