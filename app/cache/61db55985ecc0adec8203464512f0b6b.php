<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articles menu</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <h1>articles</h1>

    <ul>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <h2><?php echo e($article['title']); ?></h2>
                <p><?php echo e($article['content']); ?></p>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <!-- <h1>welcome <?php echo e($name); ?></h1> -->
</body>
</html>

<?php /**PATH C:\xampp\htdocs\Développement d'une architecture MVC moderne avec PHP et PostgreSQL\app\views\front/home.blade.php ENDPATH**/ ?>