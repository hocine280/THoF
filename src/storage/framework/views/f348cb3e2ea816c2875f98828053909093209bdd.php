<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Actualité</h1>
    <h2>Actualités n°<?php echo e($news->id); ?></h2>
    <p>Titre : <?php echo e($news->title); ?></p>
    <p>Message : <?php echo e($news->message); ?></p>
</body>
</html><?php /**PATH /home/hadi0005/public_html/thof/src/resources/views/index.blade.php ENDPATH**/ ?>