<?php
class Session
{
  private $courseName;  // String
  private $section;     // String
  private $subSection;  // String
  private $semester;    // String ("F"or"W"or"S")
  private $days;        // array of strings ("M","T","W","J","F")
  private $startTime;   // int
  private $endTime;     // int
  private $campus;      // String

  public function __construct($courseName, $section, $subSection,
                              $semester, $days, $startTime, $endTime, $campus)
  {
    $this->courseName = $courseName;
    $this->section = $section;
    $this->subSection = $subSection;
    $this->semester = $semester;
    $this->days = $days;
    $this->startTime = $startTime;
    $this->endTime = $endTime;
    $this->campus = $campus;
  }

  public function getCourseName()
  {
    return $this->courseName;
  }

  public function getSection()
  {
    return $this->section;
  }

  public function getSubSection()
  {
    return $this->subSection;
  }

  public function getSemester()
  {
    return $this->semester;
  }

  public function getDays()
  {
    return $this->days;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function getCampus()
  {
    //error here
    return $this->campus;
  }


  public function dispInfo ()
  {
    echo "Course name: " . $this->getCourseName() . " section: " . $this->getSection()  .
    " Subsection: " . $this->getSubSection() . " time: ". $this->getStartTime() . " to ". $this->getEndTime() .
    " Dates: "
    //this part is added
    .$this -> getDays();
  //  foreach($this->getDays() as $d)
  //    echo $d . ", ";

    echo "<br>";
  }
}
?>