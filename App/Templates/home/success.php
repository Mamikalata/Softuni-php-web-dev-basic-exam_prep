<?php
/**
 * @var \App\Data\DTO\userDTO $user
 */
$user = $data[0];
?>
<h1>Congratulations <?php echo $user->getFirstName() . " " . $user->getLastName(); ?></h1>
<a href="login.php">Go to login</a>