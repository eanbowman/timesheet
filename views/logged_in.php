<div class="status-messages">
<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
        	echo "<div class=\"login-error-message\">";
            echo $error;
            echo "</div>";
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
        	echo "<div class=\"login-messages\">";
            echo $message;
            echo "</div>";
        }
    }
}
?>
</div>

<div class="user-container">
	<div class="user-info">
		<div class="user-info-name"><?php echo $_SESSION['user_name']; ?></div>
	</div>

	<div class="user-logout">
		<a href="index.php?logout">Logout</a>
	</div>
</div>
