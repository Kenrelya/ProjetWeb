<?php
  function AddAffectationEG($eid, $gid)
  {
    $gid = mysql_real_escape_string($_POST['gid']);
    $eid = mysql_real_escape_string($_POST['eid']);
    $SQL = "INSERT INTO affectations VALUES ('$eid','$gid')";
    $res=mysql_query($SQL);
    
    if(!$res) 
    {
      return false;
    }
    else 
    {
      return true;
    }    
  }
  
  function AddAffectionMG($mid, $gid)
  {
    $gid = mysql_real_escape_string($_POST['gid']);
    $mid = mysql_real_escape_string($_POST['mid']);
    $intitule = mysql_real_escape_string($_POST['intitule']);
    $SQL = "UPDATE groupes SET mid=$mid WHERE gid =$gid";
    $res=mysql_query($SQL);
    
    if(!$res) 
    {
      return false;
    }
    else 
    {
      return true;
    }  
  }
?>

