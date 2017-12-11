<?php require_once("classes/Docket.php"); ?>
<div class="timesheet-errors">
<?php
$docket = new Docket();
$dockets = $docket->show();
$dockets = array_reverse($dockets);
$currentDocket = $_POST['docketID'];
if(!$currentDocket) $currentDocket = $timesheets[0]->docketID;

foreach( $timesheet->errors as $key => $item ) {
	echo "<pre class=\"timesheet-error\">" . $item . "</pre>\n";
}
?>
</div>

<a class="timesheet-action-add" href="?show=timesheet&action=add"><button>Add</button></a>
<form class="timesheet-edit" method="post" enctype="multipart-formdata">
<?php
foreach( $timesheets as $key => $item ) {
?>
	<fieldset class="timesheet">
		<div class="timesheet-id"><label for="id">ID:</label> <input name="id" type="text" value="<?php echo $item->id; ?>" /></div>
		<div class="timesheet-docketID">
			<label for="">docketID:</label> Client Company: 
			<select name="docketID">
				<?php foreach ($dockets as $dkey => $ditem) {
					echo "\n\t\t\t\t<option value=\"";
					echo $ditem->id;
					echo "\"";
					if($ditem->id == $currentDocket) {
						echo " selected=\"selected\"";
					}
					echo ">";
					echo $ditem->id;
					echo " : ";
					echo $ditem->clientCompany;
					echo ", ";
					echo $ditem->project;
					echo "</option>";
				} ?>
			</select>
		</div>
		<div class="timesheet-date"><label for="">date:</label> <input name="date" type="date" value="<?php echo $item->date; ?>" /></div>
		<div class="timesheet-start"><label for="">start:</label> <input name="start" type="time" value="<?php echo $item->start; ?>" /></div>
		<div class="timesheet-end"><label for="">end:</label> <input name="end" type="time" value="<?php echo $item->end; ?>" /></div>
		<div class="timesheet-empID"><label for="">empID:</label> <input name="empID" type="number" value="<?php echo $item->empID; ?>" /></div>
		<div class="timesheet-description"><label for="">description:</label> <textarea name="description"><?php echo $item->description; ?></textarea></div>
		<div class="timesheet-task"><label for="">task:</label> <input name="task" type="text" value="<?php echo $item->task; ?>" /></div>
		<div class="timesheet-lastModified"><label for="">lastModified:</label> <input name="lastModified" type="text" value="<?php echo $item->lastModified; ?>" /></div>
		<div class="timesheet-subtask"><label for="">subtask:</label> <input name="subtask" type="text" value="<?php echo $item->subtask; ?>" /></div>
		<div class="timesheet-actions">
			<button type="submit">Submit</button>
		</div>
	</fieldset>
<?php
}
?>
</form>

