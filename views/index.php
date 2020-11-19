<!-- Display your objects here. DO NOT RENAME THIS FILE! -->
<?php require 'templates/header.tpl.php'; ?>
    <div class="container">
        <h2 class="text-center"><span class="fa fa-eye"></span>View People</a></h2>
        <?php if (isset($_GET['add']) && $_GET['add'] == 'success'): ?>
        <div class="success"><span class="fa fa-check"></span>Successfully added </div>
        <?php elseif (isset($_GET['edit']) && $_GET['edit'] == 'success'): ?>
        <div class="success"><span class="fa fa-check"></span>Successfully edited!</div>
        <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'success'): ?>
        <div class="success"><span class="fa fa-check"></span>Successfully deleted<div>
        <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'error'): ?>
        <div class="error"><span class="fa fa-alert"></span> Error</div>
    <?php endif; ?>

    <div class="grid">
        <?php
            $controller = new PersonController;
            $people = $controller->read();

            foreach ($people as $i => $row):
                $person = $row['people'];
                $id = $row['id'];
        ?>
        <div class="citizens">
            <h2><?php echo Sanitizer::escape_html($person->name); ?></h2>
            <h3>Age: <?php echo Sanitizer::escape_html($person->age); ?></h3>
            <h3>Balance: <?php echo Sanitizer::escape_html($person->balance); ?></h3>
            <p><img src="../views/img/<?php echo $person->image; ?>" alt="<?php echo $person->name; ?>"></p>

            <form action="../controllers/routes.php?action=delete" method="post">
                <a href="edit-object.php?id=<?php echo $id ?>" class="button"><span class="fa fa-edit"></span> Edit</a>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <button type="submit"><span class="fa-fa-trash"></span>Delete</button>
            </form>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
<?php require 'templates/footer.tpl.php'; ?>
