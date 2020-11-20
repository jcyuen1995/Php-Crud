<!-- Add your objects here. You should rename this file. -->
<?php require_once 'templates/header.tpl.php'; ?>
    <div class="container">
        <h2><span class="fa fa-plus"></span>Add People</h2>
        <?php if (isset($_GET['add']) && $_GET['add'] == 'failed'): ?>
        <div class="alert alert-danger"><span class="fa fa-exclaimation-triangle"></span> You didn't fill the form out corretly. </div>
    <?php endif; ?>

    <form action="../controllers/routes.php?action=create" method="post">
        <div class = "form-group">
            <label for = "name">Name:</label>
            <input type = "text" name="name" value="" id="name" class = "form-control">

            <label for = "age">Age:</label>
            <input type = "number" name="age" value="" id="age" class="form-control">

            <label for="balance">Balance:</label>
            <input type="number" name="balance" value="" id="balance" class = "form-control">

            <label for="image">Image:</label>
            <select name="image" id="image" class = "form-control">
                <option value="bmo.png">BMO</option>
                <option value="finn.png">Finn Mertens</option>
                <option value="jake.png">Jake the Dog</option>
                <option value="lady.png">Lady Rainicorn</option>
                <option value="lsp.png">Lump Space Princess</option>
                <option value="marcy.png">Marceline</option>
                <option value="pb.png">Princess Bubblegum</option>
                <option value="simon.png">Ice King</option>
            </select>

            <button type="submit" class = "btn btn-success form-control form-btn"><span class="fa fa-plus"></span> Add Citizen</button>
        </div>
    </form>
</div>
<?php require_once 'templates/footer.tpl.php'; ?>
