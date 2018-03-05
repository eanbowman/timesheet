<?php require_once("classes/Docket.php"); ?>
<div class="timesheet-errors">
<?php
foreach( $timesheet->errors as $key => $item ) {
	echo "<pre class=\"timesheet-error\">" . $item . "</pre>\n";
}
if( $_POST['date'] != "" ) {
	$date = $_POST['date'];
} else {
	$date = date('Y-m-d');
}
if( $_POST['start'] != "" ) {
	$start = $_POST['start'];
} else {
	$start = date('H:i:s');
}
$docket = new Docket();
$dockets = $docket->show();
$dockets = array_reverse($dockets);
$currentDocket = $_POST['docketID'];
?>
</div>

<div class="timesheet-container">
<form class="timesheet-edit" action="?show=timesheet&action=add" method="post" enctype="multipart-formdata">
	<fieldset class="timesheet">
		<div class="timesheet-docketID">
			<label for="">docketID:</label> Client Company: 
			<select name="docketID">
				<?php foreach ($dockets as $key => $item) {
					echo "\n\t\t\t\t<option value=\"";
					echo $item->id;
					echo "\"";
					if($item->id == $currentDocket) {
						echo " selected=\"selected\"";
					}
					echo ">";
					echo $item->id;
					echo " : ";
					echo $item->clientCompany;
					echo ", ";
					echo $item->project;
					echo "</option>";
				} ?>
			</select>
		</div>
		<div class="timesheet-date"><label for="">date:</label> <input name="date" type="date" value="<?php echo $date; ?>" /></div>
		<div class="timesheet-start"><label for="">start:</label> <input name="start" type="time" value="<?php echo $start; ?>" /></div>
		<div class="timesheet-end"><label for="">end:</label> <input name="end" type="time" value="<?php echo $_POST['end']; ?>" /></div>
		<div class="timesheet-empID"><label for="">empID:</label> <input name="empID" type="number" value="<?php echo $_POST['empID']; ?>" /></div>
		<div class="timesheet-description"><label for="">description:</label> <textarea name="description"><?php echo $_POST['description']; ?></textarea></div>
		<div class="timesheet-task"><label for="">task:</label> <input name="task" type="text" value="<?php echo $_POST['task']; ?>" /></div>
		<div class="timesheet-subtask"><label for="">subtask:</label> <input name="subtask" type="text" value="<?php echo $_POST['subtask']; ?>" /></div>
		<div class="timesheet-actions">
			<button type="submit">Submit</button>
		</div>
	</fieldset>
</form>
</div>


