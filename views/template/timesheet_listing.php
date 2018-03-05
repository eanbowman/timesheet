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
		<div class="timesheet-id"><label>ID:</label> <?php echo $item->id; ?></div>
		<div class="timesheet-docketID"><label>Docket:</label> <?php echo $item->docketID; ?></div>
		<div class="timesheet-date"><label>Date:</label> <?php echo $item->date; ?></div>
		<div class="timesheet-start"><label>Started:</label> <?php echo $item->start; ?></div>
		<div class="timesheet-end"><label>Finished:</label> <?php echo $item->end; ?></div>
		<div class="timesheet-empID"><label>Employee</label> <?php echo $item->empID; ?></div>
		<div class="timesheet-description"><label>Description</label><br><?php echo $item->description; ?></div>
		<div class="timesheet-task"><label>Task:</label> <?php echo $item->task; ?></div>
		<!-- div class="timesheet-lastModified"><label>Modified:</label> <?php echo $item->lastModified; ?></div -->
		<div class="timesheet-subtask"><label>Subtask:</label> <?php echo $item->subtask; ?></div>
		<div class="timesheet-isAClientChange"><label>Change:</label> 
			<?php 
			if ($item->isAClientChange != 0) {
				echo "<span class=\"timesheet-change-client\">Client Requested</span>";
			} else {
				echo "<span class=\"timesheet-change-normal\">Normal</span>";
			} 
			?>
		</div>
		<div class="timesheet-actions">
			<a href="?show=timesheet&timesheet=<?php echo $item->id; ?>&action=edit" class="timesheet-action-edit">Edit</a>
			<a href="?show=timesheet&timesheet=<?php echo $item->id; ?>&action=delete" class="timesheet-action-delete" onclick="confirm('Are you sure you want to delete this permanently?');">Delete</a>
		</div>
	</li>
<?php
}
?>
</ul>

