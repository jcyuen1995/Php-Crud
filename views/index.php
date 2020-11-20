<!-- Display your objects here. DO NOT RENAME THIS FILE! -->
<?php require 'templates/header.tpl.php'; ?>

    <?php 
        $control = new PersonController;
        $current = $control->read();
        $current = end($current);
        $added_name = $current['people']->name;
    ?>

    <div class="container">
        <h2 class="text-center"> People </h2>
        <?php if (isset($_GET['add']) && $_GET['add'] == 'success'): ?>
        <div class="alert alert-success"><span class="fa fa-check"></span>Successfully added <?php echo Sanitizer::format_name($added_name)?></div>
        <?php elseif (isset($_GET['update']) && $_GET['update'] == 'success'): ?>
        <div class="alert alert-success"><span class="fa fa-check"></span>Successfully edited!</div>
        <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'success'): ?>
        <div class="alert alert-danger"><span class="fa fa-check"></span>Successfully deleted</div>
        <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'error'): ?>
        <div class="alert alert-danger"><span class="fa fa-alert"></span> Error</div>
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
            <h3>Balance:$<?php echo Sanitizer::escape_html($person->balance); ?></h3>
            <img src="../views/img/<?php echo $person->image; ?>" alt="<?php echo $person->name; ?>">

            <form action="../controllers/routes.php?action=delete" method="post">
                <a href="edit-object.php?id=<?php echo $id ?>" class="btn btn-success"><span class="fa fa-edit"></span></a>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <button type="submit" class ="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
<?php require 'templates/footer.tpl.php'; ?>
