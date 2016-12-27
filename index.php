
<?php
ini_set('max_execution_time',1000);
  try{
        require_once('public/index.php');
  } catch(Exception $ex){
    return redirect('/');
  }
?>
