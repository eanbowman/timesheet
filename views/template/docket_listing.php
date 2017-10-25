
<a class="docket-action-add" href="?show=docket&action=add">Add</a>
<ul class="docket-listing">
<?php
foreach( $dockets as $key => $item ) {
?>
	<li class="docket">
		<div class="docket-id"><?php echo $item->id; ?></div>
		<div class="docket-clientCompany"><?php echo $item->clientCompany; ?></div>
		<div class="docket-clientContact"><?php echo $item->clientContact; ?></div>
		<div class="docket-project"><?php echo $item->project; ?></div>
		<div class="docket-date"><?php echo $item->date; ?></div>
		<div class="docket-employee"><?php echo $item->employee; ?></div>
		<div class="docket-type"><?php echo $item->type; ?></div>
		<div class="docket-status"><?php echo $item->status; ?></div>
		<div class="docket-costs"><?php echo $item->costs; ?></div>
		<div class="docket-timestamp"><?php echo $item->timestamp; ?></div>
		<div class="docket-deleted"><?php echo $item->deleted; ?></div>
		<div class="docket-actions">
			<a href="?show=docket&docket=<?php echo $item->id; ?>&action=edit" class="docket-action-edit">Edit</a>
			<a href="?show=docket&docket=<?php echo $item->id; ?>&action=delete" class="docket-action-delete" onclick="confirm('Are you sure you want to delete this permanently?');">Delete</a>
		</div>
	</li>
<?php
}
?>
</ul>

<style type="text/css">
.docket-listing {
	background: whitesmoke;
	margin: 2%;
	padding: 0;
	width: 96%;
}
.docket-listing .docket {
	display: table-row;
	list-style: none;
	padding: 10px;
}
.docket-listing .docket:nth-child(even) {
	background: white;
}
.docket-listing .docket > div {
	display: table-cell;
}
</style>

