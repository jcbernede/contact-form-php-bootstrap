<?php include'./mail/_inc.php'?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Navbar</span>
    </nav>
    <div class="container bg-light">
        <div class="starter-template">
        <?php if (array_key_exists('errors', $_SESSION)): ?>
				<div class="alert alert-danger">
				<?= implode ('<br>', $_SESSION['errors']); ?>
				</div>
			<?php endif; ?>

            <?php if (array_key_exists('success', $_SESSION)): ?>
				<div class="alert alert-success">
				    Votre email a bien été envoyé
				</div>
                <?php endif; ?>

            <form action="./mail/post_contact.php" method="POST">
                <?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>

                <?= $form->text('name', 'Votre Nom'); ?>

                <?= $form->email('email', 'Votre Email'); ?>

                <!-- <?= $form->select('select', 'service', ['contact', 'général' ]); ?> -->

                <?= $form->textarea('message', 'Votre message'); ?>

                <?= $form->submit('Envoyer'); ?>
          
            </form>
            <!-- <?= var_dump($_SESSION)  ?> -->
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
    <?php
        unset($_SESSION['inputs']);
        unset($_SESSION['errors']);
        unset($_SESSION['success']); 
	?>