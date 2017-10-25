<a class="user-action-add" href="?show=employee&action=add">Add</a>
<ul class="user-listing">
<?php
foreach( $users as $key => $item ) {
?>
	<li class="user">
		<div class="user-user_id"><?php echo $item->user_id; ?></div>
		<div class="user-user_name"><?php echo $item->user_name; ?></div>
		<div class="user-user_password_hash">******</div>
		<div class="user-user_email"><?php echo $item->user_email; ?></div>
		<div class="user-actions">
			<a href="?show=employee&user=<?php echo $item->id; ?>&action=edit" class="user-action-edit">Edit</a>
			<a href="?show=employee&user=<?php echo $item->id; ?>&action=delete" class="user-action-delete" onclick="confirm('Are you sure you want to delete this permanently?');">Delete</a>
		</div>
	</li>
<?php
}
?>
</ul>

<style type="text/css">
.user-listing {
	background: whitesmoke;
	margin: 2%;
	padding: 0;
	width: 96%;
}
.user-listing .user {
	display: table-row;
	list-style: none;
	padding: 10px;
}
.user-listing .user:nth-child(even) {
	background: white;
}
.user-listing .user > div {
	display: table-cell;
}
</style>

