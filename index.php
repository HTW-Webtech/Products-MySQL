<?php

   require_once('Storage.php');

   $storage = new Storage('products');
   // $storage = new Storage('_beierm__products', 'db.f4.htw-berlin.de', 'beierm', 'PASSWORT');

   $method = $_SERVER['REQUEST_METHOD'];
   $form_header = 'Neuen Artikel eintragen';

   if ($method === 'GET') {
      $command = $_GET['command'];
      $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

      if ($command === 'delete') {
         $storage->delete($id);
         $message = '<strong>Artikel gelöscht.</strong> Sorg für Nachschub!';
      }
      elseif ($command === 'edit') {
         $product = $storage->get($id);
         $form_header = 'Artikel bearbeiten';
      }
   }

   elseif ($method === 'POST') {
      $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
      $image = filter_var($_POST['image'], FILTER_SANITIZE_URL);
      $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);

      if ($id) {
         $storage->edit(array($name, $url, $image, $price, $id));
         $message = '<strong>Artikel aktualisiert.</strong> Gute Arbeit!';
      }
      else {
         $storage->add(array($name, $url, $image, $price));
         $message = '<strong>Artikel hinzugefügt.</strong> Immer weiter so!';
      }
   }

   $products = $storage->all();
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <title>Formular</title>
   <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>

   <div class="container">
      <div class="panel panel-default">

         <div class="panel-heading">
            <h3 class="panel-title"><?= $form_header ?></h3>
         </div>

         <div class="panel-body">

            <?php if (isset($message)) : ?>
               <div class="alert alert-success">
                  <?= $message ?>
               </div>
            <?php endif; ?>

            <?php if (isset($command) && $command == 'edit') : ?>

            <form role="form" action="index.php" method="POST">
               <input class="form-control" type="text" name="name" placeholder="Produktname" value="<?= $product['name'] ?>">
               <input class="form-control" type="url" name="url" placeholder="Artikel-URL" value="<?= $product['url'] ?>">
               <input class="form-control" type="url" name="image" placeholder="Artikel-Bild" value="<?= $product['image'] ?>">
               <div class="row">
                  <div class="col-xs-6 input-group">
                     <input type="number" class="form-control" name="price" placeholder="Preis" value="<?= $product['price'] ?>">
                     <span class="input-group-addon">€</span>
                  </div>
                  <div class="col-xs-6">
                     <button type="submit" class="btn btn-primary btn-block">Aktualisieren</button>
                  </div>
               </div>
               <input type="hidden" name="id" value="<?= $product['id'] ?>">
            </form>

            <?php else : ?>

            <form role="form" action="index.php" method="POST">
               <input class="form-control" type="text" name="name" placeholder="Produktname">
               <input class="form-control" type="url" name="url" placeholder="Artikel-URL">
               <input class="form-control" type="url" name="image" placeholder="Artikel-Bild">
               <div class="row">
                  <div class="col-xs-6 input-group">
                     <input type="number" class="form-control" name="price" placeholder="Preis">
                     <span class="input-group-addon">€</span>
                  </div>
                  <div class="col-xs-6">
                     <button type="submit" class="btn btn-primary btn-block">Anlegen</button>
                  </div>
               </div>
            </form>

         <?php endif; ?>

         </div> <!-- / .panel-body -->
      </div> <!-- / .panel -->

      <div class="row list-group products">

         <?php
            if (!sizeof($products)) {
               echo '<div class="alert alert-info">Derzeit gibt es keine Artikel. Leg gleich welche an!</div>';
            }
            else {
               foreach ($products as $product) {
                  echo
                  '<div class="item col-xs-4">
                     <div class="thumbnail">
                        <a href="' . $product['url'] . '" title="' . $product['name'] . '"><img src="' . $product['image'] . '" alt="Produktbild"></a>
                        <div class="buttons-edit">
                           <a class="btn btn-default btn-sm" href="index.php?command=edit&id=' . $product['id'] . '">Edit</a>
                           <a class="btn btn-default btn-sm" href="index.php?command=delete&id=' . $product['id'] . '">Delete</a>
                        </div>
                        <div class="caption">
                           <h4><a href="' . $product['url'] . '" title="' . $product['name'] . '">' . $product['name'] . '</a></h4>
                           <span class="lead">' . $product['price'] . '€</span>
                        </div>
                     </div>
                  </div>';
               }
            }
         ?>

      </div> <!-- / .products -->
   </div> <!-- / .container -->

</body>

</html>