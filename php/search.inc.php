<?php
  //header("Location: ../insight.php?symbol=".strtoupper($_POST['search']));
  //exit();
  $input = strtoupper($_POST['search']);

  $command = escapeshellcmd($input.' ../python/symbolcheck.py');
  $output = shell_exec($command);
  echo $output;

  //$output = 'true';
/*
  if($output == '1'){
    header("Location: ../insight-error.php?symbol=".$input);
    exit();
  }
  else if($output == '0'){
    header("Location: ../insight.php?symbol=".$input);
    exit();
  }
  else{
    header("Location: ../insight-error.php?symbol=".$input);
    exit();
  }
*/
?>
