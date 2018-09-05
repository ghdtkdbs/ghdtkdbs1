<?
session_start();

function get_CurUrl(){

  $basename=basename($_SERVER["PHP_SELF"]);

  $set_className = "";
  switch ($basename) {
    case strpos($basename, "company"):
    $set_className = "company";
    break;
    case strpos($basename, "software"):
    $set_className = "software";
    break;
    case strpos($basename, "solution"):
    $set_className = "solution";
    break;
    case strpos($basename, "news"):
    $set_className = "news";
    break;
    case strpos($basename, "contactus"):
    $set_className = "contactus";
    break;
    default:
    $set_className = "";
  }

  return $set_className;

}


?>
