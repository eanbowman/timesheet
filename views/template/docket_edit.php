
<a class="docket-action-add" href="?show=docket&action=add">Add</a>
<form class="docket-edit" method="post">
<?php
foreach( $dockets as $key => $item ) {
?>
	<fieldset class="docket">
		<div class="docket-id"><label for="id">ID:</label> <input name="id" type="text" value="<?php echo $item->id; ?>" /></div>
		<div class="docket-clientCompany"><label for="">clientCompany:</label> Client Company: <input name="clientCompany" type="text" value="<?php echo $item->clientCompany; ?>" /></div>
		<div class="docket-clientContact"><label for="">clientContact:</label> <input name="clientContact" type="text" value="<?php echo $item->clientContact; ?>" /></div>
		<div class="docket-project"><label for="">project:</label> <input name="project" type="text" value="<?php echo $item->project; ?>" /></div>
		<div class="docket-date"><label for="">date:</label> <input name="date" type="text" value="<?php echo $item->date; ?>" /></div>
		<div class="docket-employee"><label for="">employee:</label> <input name="employee" type="text" value="<?php echo $item->employee; ?>" /></div>
		<div class="docket-type"><label for="">type:</label> <input name="type" type="text" value="<?php echo $item->type; ?>" /></div>
		<div class="docket-status"><label for="">status:</label> <input name="status" type="text" value="<?php echo $item->status; ?>" /></div>
		<div class="docket-costs"><label for="">costs:</label> <input name="costs" type="text" value="<?php echo $item->costs; ?>" /></div>
		<div class="docket-timestamp"><label for="">timestamp:</label> <input name="timestamp" type="text" value="<?php echo $item->timestamp; ?>" /></div>
		<div class="docket-deleted"><label for="">deleted:</label> <input name="deleted" type="text" value="<?php echo $item->deleted; ?>" /></div>
		<div class="docket-actions">
			<button type="submit">Submit</button>
		</div>
	</fieldset>
<?php
}
?>
</form>

<style type="text/css">
.docket-listing {
	background: whitesmoke;
	margin: 2%;
	padding: 0;
	width: 96%;
}
.docket-listing .docket {
	display: table;
	list-style: none;
	padding: 10px;
}
.docket-listing .docket:nth-child(even) {
	background: white;
}
.docket-listing .docket > div {
	display: table-row;
}
</style>

