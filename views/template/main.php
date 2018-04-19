<div id="site">
<?php 
include("navigation.php");
if( !array_key_exists( 'show', $_REQUEST ) ) $_REQUEST['show'] = 'home';
if( !array_key_exists( 'action', $_REQUEST ) ) $_REQUEST['action'] = 'show';

switch( $_REQUEST['show'] ) {
	
	case "docket":
		include("classes/Docket.php");
		$docket = new Docket();
		switch( $_REQUEST['action'] ) {
			case "add": echo "add docket"; break;
			case "edit": 
				$dockets = $docket->get($_REQUEST['docket']);
				include("docket_edit.php");
				break;
			case "delete": echo "delete docket"; break;
			default:
				$dockets = $docket->show();
				include("docket_listing.php");
		} // end switch
		break;
		
	case "timesheet":		
		include("classes/Timesheet.php");
		$timesheet = new Timesheet();
		switch( $_REQUEST['action'] ) {
			case "add":
				if(isset($_POST['docketID'])) {
					$timesheetID = $timesheet->add();
					include("timesheet_add.php");
				} else {
					include("timesheet_add.php");
				}
				break;
			case "edit":
				if(isset($_POST['id'])) {
					$timesheet->set($_POST['id']);
				}
				$timesheets = $timesheet->get($_REQUEST['timesheet']);
				include("timesheet_edit.php");
				break;
			case "delete":
				$timesheet->delete($_GET['timesheet']); // delete it
				$timesheets = $timesheet->show(); // and show the listing after deletion	
				include("timesheet_listing.php");
				break;
			default: 
				$timesheets = $timesheet->show();				
				include("timesheet_listing.php");
		} // end switch
		break;
		
	case "employee":		
		include("classes/Users.php");
		$user = new User();
		switch( $_REQUEST['action'] ) {
			case "add": echo "add employee"; break;
			case "edit": echo "edit employee"; break;
			case "delete": echo "delete employee"; break;
			default: $users = $user->show();
		} // end switch
		include("user_listing.php");
		break;
		
	default: include("home.php"); break;
	
} // end switch
?>
</div>

