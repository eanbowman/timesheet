<div class="timesheet-errors">
<?php
foreach( $timesheet->errors as $key => $item ) {
	echo "<pre class=\"timesheet-error\">" . $item . "</pre>\n";
}
?>
</div>

<a class="timesheet-action-add" href="?show=timesheet&action=add"><button>Add</button></a>
<ul class="timesheet-listing">
<?php
$count = 0;
foreach( $timesheets as $key => $item ) {
	$count++;
	if( $count > 20 ) break;
?>
	<li class="timesheet">
		<div class="timesheet-id"><?php echo $item->id; ?></div>
		<div class="timesheet-docketID"><?php echo $item->docketID; ?></div>
		<div class="timesheet-date"><?php echo $item->date; ?></div>
		<div class="timesheet-start"><?php echo $item->start; ?></div>
		<div class="timesheet-end"><?php echo $item->end; ?></div>
		<div class="timesheet-empID"><?php echo $item->empID; ?></div>
		<div class="timesheet-description"><?php echo $item->description; ?></div>
		<div class="timesheet-task"><?php echo $item->task; ?></div>
		<div class="timesheet-lastModified"><?php echo $item->lastModified; ?></div>
		<div class="timesheet-subtask"><?php echo $item->subtask; ?></div>
		<div class="timesheet-isAClientChange"><?php echo $item->isAClientChange; ?></div>
		<div class="timesheet-actions">
			<a href="?show=timesheet&timesheet=<?php echo $item->id; ?>&action=edit" class="timesheet-action-edit">Edit</a>
			<a href="?show=timesheet&timesheet=<?php echo $item->id; ?>&action=delete" class="timesheet-action-delete" onclick="confirm('Are you sure you want to delete this permanently?');">Delete</a>
		</div>
	</li>
<?php
}
?>
</ul>

<style type="text/css">
.timesheet-listing {
	background: whitesmoke;
	margin: 2%;
	padding: 0;
	width: 96%;
}
.timesheet-listing .timesheet {
	display: table-row;
	list-style: none;
	padding: 10px;
}
.timesheet-listing .timesheet:nth-child(even) {
	background: white;
}
.timesheet-listing .timesheet > div {
	display: table-cell;
}
</style>


