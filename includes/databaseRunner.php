<?php 
$message     = '';
$messageLog ='';
$connection = '';
$db_hostname = 'localhost';
$db_username = 'ttUser';
$db_password = 'DMF331';
$db_database = 'Project_tracker';

// Cennecting to the database------------------------------//
$db = new MySQLi($db_hostname, $db_username, $db_password, $db_database);
if ($db->connect_error){
	$message =  '<h2>Database connection problem</h2>' ;//$db->connect_error;
	$connection = '';
}
else{
	$message = '<h2>Database Connection is OK</h2> <br/>';
	$connection = 'OK';
}

echo $message;
// End of Cennecting to the database------------------------------//


// Creation of the database tables------------------------------//
if ($connection == 'OK'){

// Creation of Section tables------------------------------//
	$messageLog = 'Creating Section table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`section` 
						(`sectionCode` VARCHAR(4) NOT NULL PRIMARY KEY, 
						`sectionName` VARCHAR(30) NOT NULL, 
						`branchCode` VARCHAR(5) NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`statusChangeDate` DATETIME NOT NULL, 
						`comments` VARCHAR(100) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Section table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Section table created <br/>';
	}

// Creation of Employee Private Information tables------------------------------//
	$messageLog = $messageLog . 'Creating Employee Personal Information table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`employeePrvt` 
						(`employeeID` int(5) NOT NULL , 
						`status` VARCHAR(10) NOT NULL, 
						`salary` DECIMAL(10,2) NOT NULL, 
						`statusCode` VARCHAR(5) NOT NULL, 
						`category` VARCHAR(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Employee Personal Information table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Employee Personal Information table created <br/>';
	}

// Creation of Branch tables------------------------------//
	$messageLog = $messageLog . 'Creating Branch Information table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`branch` 
						(`branchCode` VARCHAR(4) NOT NULL PRIMARY KEY, 
						`branchName` VARCHAR(30) NOT NULL ,
						`status` VARCHAR(5) NOT NULL, 
						`statusChangeDate` DATETIME NOT NULL, 
						`comments` VARCHAR(300) NOT NULL, 
						`statusCode` VARCHAR(5) NOT NULL, 
						`category` VARCHAR(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Branch Information table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Branch Information table created <br/>';
	}
	
// Creation of ProjectStaff tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Staff Information table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`projectstaff` 
						(`projectCode` VARCHAR(10) NOT NULL , 
						`employeeID` int(5) NOT NULL ,
						`percentageAllocated` DECIMAL(5,2) NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`comments` VARCHAR(300) NOT NULL, 
						`statusCode` VARCHAR(5) NOT NULL, 
						`category` VARCHAR(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Staff Information table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Staff Information table created <br/>';
	}

// Creation of ProjectDesc tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Description table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`projectdesc` 
						(`projectCode` VARCHAR(10) NOT NULL , 
						`projectDescription` VARCHAR(300) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Description table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Description table created <br/>';
	}

// Creation of Address tables------------------------------//
	$messageLog = $messageLog . 'Creating Address table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`Address` 
						(`employeeID` INT(5) NOT NULL,
						`addressSeqNumber` INT(2) NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`houseNumber` VARCHAR(5) NOT NULL, 
						`unitNumber` VARCHAR(4) NOT NULL, 
						`streetName` VARCHAR(30) NOT NULL, 
						`suburb` VARCHAR(30) NOT NULL, 
						`addressLine3` VARCHAR(30) NOT NULL, 
						`state` VARCHAR(25) NOT NULL, 
						`postCode` VARCHAR(10) NOT NULL, 
						`country` VARCHAR(50) NOT NULL, 
						`statusCode` VARCHAR(5) NOT NULL, 
						`category` VARCHAR(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Address table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Address table created <br/>';
	}


// Creation of Employee tables------------------------------//
	$messageLog = $messageLog . 'Creating Employee table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`employee` 
						(`employeeID` INT(5) NOT NULL, 
						`firstName` VARCHAR(30) NOT NULL, 
						`middleName` VARCHAR(30) NOT NULL, 
						`lastName` VARCHAR(30) NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`startDate` DATETIME NOT NULL, 
						`endDate` DATETIME NOT NULL, 
						`addressSeqNumber` INT(2) NOT NULL, 
						`contactNoMobile` VARCHAR(10) NOT NULL, 
						`contactNoHome` VARCHAR(10) NOT NULL, 
						`emailAddress` VARCHAR(30) NOT NULL, 
						`sectionCode` VARCHAR(4) NOT NULL, 
						`projectCode` VARCHAR(10) NOT NULL, 
						`userID` INT(5) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Employee table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Employee table created <br/>';
	}
	
	
	// Creation of Status tables------------------------------//
	$messageLog = $messageLog . 'Creating Status table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`status` 
						(`statusCode` VARCHAR(5) NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`comments` VARCHAR(50) NOT NULL, 
						`category` VARCHAR(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Status table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Status table created <br/>';
	}

// Creation of Projects tables------------------------------//
	$messageLog = $messageLog . 'Creating Project table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`project` 
						(`employeeID` INT(5) NOT NULL, 
						`budgetSeqNumber` VARCHAR(10) NOT NULL, 
						`projectName` VARCHAR(10) NOT NULL, 
						`projectMnemonic` VARCHAR(8) NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`plannedStartDate` DATETIME NOT NULL, 
						`actualStartDate` DATETIME NOT NULL, 
						`plannedEndDate` DATETIME NOT NULL, 
						`actualEndDate` DATETIME NOT NULL, 
						`statusCode` VARCHAR(5) NOT NULL, 
						`category` VARCHAR(3) NOT NULL,
						`projectCode` VARCHAR(10) NOT NULL, 
						`riskID` INT(4) NOT NULL, 
						`issueID` INT(4) NOT NULL, 
						`actionItemID` INT(5) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project table created <br/>';
	}

// Creation of Project Risk tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Risk table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`projectrisk` 
						(`projectCode` VARCHAR(10) NOT NULL, 
						`riskID` INT(4) NOT NULL, 
						`dateIdentified` DATETIME NOT NULL, 
						`closeDate` DATETIME NOT NULL, 
						`headLine` VARCHAR(50) NOT NULL, 
						`riskDescription` VARCHAR(300) NOT NULL, 
						`impact` INT(1) NOT NULL, 
						`likelihood` INT(1) NOT NULL, 
						`magnitude` INT(1) NOT NULL, 
						`riskAddressed` INT(1) NOT NULL, 
						`riskDocumented` INT(1) NOT NULL, 
						`inoperation` INT(1) NOT NULL, 
						`riskControl` INT(1) NOT NULL, 
						`owner` INT(5) NOT NULL, 
						`mitigationPlan` VARCHAR(300) NOT NULL, 
						`contingencyPlan` VARCHAR(300) NOT NULL, 
						`comments` VARCHAR(300) NOT NULL, 
						`riskIdentifiedBy` INT(5) NOT NULL, 
						`categoryCode` INT(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Risk table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Risk table created <br/>';
	}


// Creation of Project Issue tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Issue table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`projectissue` 
						(`projectCode` VARCHAR(10) NOT NULL, 
						`issueID` INT(4) NOT NULL, 
						`dateIdentified` DATETIME NOT NULL, 
						`closeDate` DATETIME NOT NULL, 
						`headLine` VARCHAR(50) NOT NULL, 
						`issueDescription` VARCHAR(300) NOT NULL, 
						`owner` INT(5) NOT NULL, 
						`managementPlan` VARCHAR(300) NOT NULL, 
						`comments` VARCHAR(300) NOT NULL, 
						`issueIdentifiedBy` INT(5) NOT NULL, 
						`categoryCode` INT(3) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Issue table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Issue table created <br/>';
	}

// Creation of Project Budget tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Budget table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`projectbudget` 
						(`projectCode` VARCHAR(10) NOT NULL, 
						`budgetSeqNumber` INT(2) NOT NULL, 
						`plannedBudget` FLOAT(10,2) NOT NULL, 
						`plannedDate` DATETIME NOT NULL, 
						`allocatedBudget` FLOAT(10,2) NOT NULL, 
						`allocatedDate` DATETIME NOT NULL, 
						`currentUtilisation` FLOAT(10,2) NOT NULL, 
						`comments` VARCHAR(300) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Budget table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Budget table created <br/>';
	}

// Creation of Project Action Items tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Action Items table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`projectactionitems` 
						(`projectCode` VARCHAR(10) NOT NULL, 
						`actionItemID` INT(4) NOT NULL, 
						`dateAssigned` DATETIME NOT NULL, 
						`actionDetails` VARCHAR(200) NOT NULL, 
						`expectedEndDate` DATETIME NOT NULL, 
						`meetingDetails` VARCHAR(50) NOT NULL, 
						`actionOwner` INT(5) NOT NULL, 
						`percentageCompleted` FLOAT(6,2) NOT NULL, 
						`dateClosed` DATETIME NOT NULL, 
						`actionComments` VARCHAR(300) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Action Items table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Action Items table created <br/>';
	}

// Creation of Project Category tables------------------------------//
	$messageLog = $messageLog . 'Creating Project Category table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`category` 
						(`categoryCode` INT(3) NOT NULL, 
						`categoryDescription` VARCHAR(10) NOT NULL, 
						`createdBy` INT(5) NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project Category table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project Category table created <br/>';
	}

// Creation of Project User tables------------------------------//
	$messageLog = $messageLog . 'Creating Project User table...<br/>';

	$sql = $db->query("CREATE TABLE `Project_tracker`.`user` 
						(`userID` INT(5) NOT NULL, 
						`createdDate` DATETIME NOT NULL, 
						`status` VARCHAR(5) NOT NULL, 
						`password` VARCHAR(35) NOT NULL, 
						`encryption` VARCHAR(35) NOT NULL, 
						`changeDate` DATETIME NOT NULL) ENGINE = InnoDB"); 
	if ($db->error){
		$messageLog = $messageLog . 'Project User table already exist <br/>';
	}
	else{
		$messageLog = $messageLog . 'Project User table created <br/>';
	}

}

// End of Creation of the database tables------------------------------//

echo $messageLog;

$message = '<h2>Table Creation Completed</h2> <br/>';
echo $message;
?>