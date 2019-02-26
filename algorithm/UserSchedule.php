<?php

require_once __DIR__.'/../Databases/DBinterface3functions/DBinterface3.php';
require_once 'Session.php';
require_once 'Course.php';
require_once 'Semester.php';
require_once 'heapSort.php';


class UserSchedule
{


private $firstSem;        // Input obtained from user ("F" or "W" or "S")
private $firstYear;       // Input obtained from user (int)
private $coursesPerSem;   // Input obtained from user (int)
private $listOfSemesters; // Array of semesters

public function __construct($fSem, $fYear, $numCourses)
{
  $this->firstSem = $fSem;
  $this->firstYear = $fYear;
  $this->coursesPerSem = $numCourses;
  $listOfSemesters = array ();
}

public function getListOfSemesters ()
{
  return $this->listOfSemesters;
}

public function getFirstSem ()
{
  return $this->$firstSem;
}

public function genProgramSched ($user)
{
  $semesters = array("W", "S","F");

  // Obtain untaken courses by the user
  $untakenCourses = getUntakenCourses($user);

  // Get the key for first semester in the array of semesters
  $currentSemKey = array_search($this->firstSem, $semesters);
  $currentYear = $this->firstYear;

  while (count($untakenCourses) != 0)
  {
    echo 'Hello'
    // Update the priority of all courses unfinished
    updateAllPriority($untakenCourses);

    // Get the permitted courses to be taken this semester
    $permittedCourses = getPermittedCourses ($user, $untakenCourses, $semesters[$currentSemKey]);

    // Sort the array based on their priority
    heap_sort($permittedCourses);

    // Generate a schedule for a semester
    $sem = new Semester ($semesters[$currentSemKey], $currentYear, $this->coursesPerSem);
    $sem->semesterGenerator($permittedCourses);
    array_push($this->listOfSemesters, $sem);

    // Exclude the taken courses from the untaken array
    foreach ($sem->getLecs() as $taken)
      deleteCourse($taken, $untakenCourses);

    // Increment year if the current semester was fall
    if ($semesters[$currentSemKey] == "F")
      $currentYear++;

    // Increment semester
    $currentSemKey = ($currentSemKey + 1) % 3;

  }
}
}

?>