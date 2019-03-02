<?php
echo "<h1>Login Page</h1>";
?>

<ul>
    <?php foreach ($params->users as $user) : ?>
        <li><?php echo $user->content; ?></li>
    <?php endforeach; ?>
</ul>
echo <img src="<?php echo asset("/imgs/baby.PNG"); ?>">