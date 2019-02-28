
<!DOCTYPE html>
<html>
<head>
	<title>lecture</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>
	<?php
	include("Session.php");



	function getLectureSections($course, $semester){
		require('config/db.php');		require('config/db.php');		require('config/db.php');		require('config/db.php');
		$stack=array();

		static $table ;

		switch ($semester)
		{
			case 'F':
			global $table;
			$table = 'flec';
			break;
			case 'W':
			global $table;
			$table = 'wlec';
			break;
			case 'S':
			global $table;
			$table = 'slec';
			break;
			default:
			global $table;
			$table = 'error';
		}

		//Create query
		$query = "SELECT * FROM `$table` WHERE `CourseName`='$course'";

		//Get Result
		$result = mysqli_query($conn, $query);

		//Fetch Data
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// Free Result
		mysqli_free_result($result);

		//Instantiating the Fall semster
		foreach($posts as $post)
		{
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = null;
			$lecDay = explode(",",$post ['LecDay']);
			$startLecTime= $post ['StartLecTime'];
			$endLecTime= $post ['EndLecTime'];
			$campus = "SGW";

			//Making a new session object with the course information
			$ham =  new Session($courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);

			array_push($stack, $ham);
		}
		mysqli_close($conn);
		return $stack;
	}


	function getTutorialSection($course, $semester, $section){
		//include('tutorialfunction.php');
		require('config/db.php');

		$stack=array();

		static $table ;

		switch ($semester)
		{
			case 'F':
			global $table;
			$table = 'ftut';
			break;
			case 'W':
			global $table;
			$table = 'wtut';
			break;
			case 'S':
			global $table;
			$table = 'stut';
			break;
			default:
			global $table;
			$table = 'error';
		}

		//Create query
		$query = "SELECT * FROM `$table` WHERE `CourseName`='$course' AND `LecInfo`='$section'";


		//Get Result
		$result = mysqli_query($conn, $query);

		//Fetch Data
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// Free Result
		mysqli_free_result($result);

		//Instantiating the Fall semster
		foreach($posts as $post)
		{
			$courseName = $post['CourseName'];
			$lecInfo = $post ['LecInfo'];
			$subSection = $post['TutSection'];
			$lecDay = explode(",",$post ['TutDay']);
			$startLecTime= $post ['StartTutTime'];
			$endLecTime= $post ['EndTutTime'];
			$campus = "SGW";

			//Making a new session object with the course information
			$ham =  new Session($courseName,$lecInfo,$subSection,$semester,$lecDay,$startLecTime,$endLecTime,$campus);

			array_push($stack, $ham);
		}
		mysqli_close($conn);
		return $stack;

	}

	function getLabSection($course, $semester){

		require('config/db.php');
		$stack=array();
		static $table;
		switch ($semester)
		{
			case 'F':
			global $table;
			$table = 'flab';
			break;
			case 'W':
			global $table;
			$table = 'wlab';
			break;
			case 'S':
			global $table;
			$table = 'slab';
			break;
			default:
			global $table;
			$table = 'error';
		}

	//Create query
		$query = "SELECT * FROM `$table` WHERE `CourseName`='$course'";

	//Get Result
		$result = mysqli_query($conn, $query);

	//Fetch Data
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Free Result
		mysqli_free_result($result);

	//Instantiating the Fall semster
		foreach($posts as $post)
		{
			$courseName = $post['CourseName'];
			$labSection = $post ['LabSection'];
			$labDay = explode(",",$post ['LabDay']);
			$startLabTime= $post ['StartLabTime'];
			$endLabTime= $post ['EndLabTime'];
			$campus = "SGW";

		//Making a new session object with the course information
			$ham =  new Session($courseName,$labSection,null,$semester,$labDay,$startLabTime,$endLabTime,$campus);

			array_push($stack, $ham);
		}

		mysqli_close($conn);
		return $stack;
	}

	//Returns an array of Courses objects this user can take this semester from the remaining courses array of courses
	// DO NOT GENERATE NEW COURSES OBJECTS AND USE THE SAME ELEMENTS FROM $remainingCourses
	function getPermittedCourses($user, $remainingCourses,  $semester)
	{
	  if ($semester=='F')
	  {
	    return array_slice($remainingCourses,0,6);
	  }

	  elseif ($semester=='W')
	    return $remainingCourses;

	}


	//Returns an array of Courses objects for all the courses that the user did not take yet
	//$user will pass the course that user has taken by array
	function getUntakenCourses($user)
	{	  

		require('config/db.php');

		$data = array();
		$query1 ="SELECT C.* FROM `login` L INNER JOIN `course` C ON C.`courseid` = L.`user_id` WHERE L.`user_id`=$user";

		$result1 = mysqli_query($conn1, $query1);

	//Fetch Data
		$posts1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

		

		// To iterate through found rows
		foreach ($posts1 as $u) {
			// iterates through columns
			foreach ($u as $key => $value)
				if ($key != "courseid")
					if ($value == "0")
						var_dump($key);
		}

		//var_dump($posts1);

		mysqli_free_result($result);
		
	}





//Updates the database by changing the status of the courses recently taken
	function updateTakenCourses($passedCourses)
	{


	}

	function getCourse($courseName){

		require('config/db.php');

		$query ="SELECT *FROM `coursesmain` WHERE `CourseName`= '$courseName'";

		$result = mysqli_query($conn, $query);

	//Fetch Data
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

		var_dump($posts);



	}
	 function getID($email){

		require('config/db.php');
		

$query1 ="SELECT L.user_id FROM login L INNER JOIN `course` C ON C.`courseid` = L.`user_id` WHERE L.`email`='$email'";

$result1 = mysqli_query($conn1, $query1);

	//Fetch Data
		$posts1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

		return $posts1;
}
var_dump(getID('sdhjh@gmail.com'));
	?>
</body>
</html>
