<?php  
  function preShow( $arr, $returnAsString) {
    $ret  = '<pre>' . print_r($arr, true) . '</pre>';
    if ($returnAsString)
      return $ret;
    else 
      echo $ret; 
  }

  function printMyCode() {
    $lines = file($_SERVER['SCRIPT_FILENAME']);
    echo "<pre class='mycode'><ol>";
    foreach ($lines as $line)
       echo '<li>'.rtrim(htmlentities($line)).'</li>';
    echo '</ol></pre>';
  }  

  function php2js( $arr, $arrName ) {
    $lineEnd="";
    echo "<script>\n";
    echo "/* Generated with A4's php2js() function */";
    echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);
    echo "</script>\n\n";
  }

  function validation()
{
  $isTicket=FALSE;
  $isPhone=FALSE;
  $isCard=FALSE;
  $isValid=FALSE;
  $phoneRegex = '/^\+?([0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{3})$/';
  $phoneRegex1 = '/^04(\s?[0-9]{2}\s?)([0-9]{3}\s?[0-9]{3}|[0-9]{2}\s?[0-9]{2}\s?[0-9]{2})$/';
  
  $seats=$_POST['seats'];
  foreach($seats as $seat){
     if($seat!=0){
        $isTicket=TRUE;
     }
  }
  unset($seat);

  if(!$isTicket){
    echo '<script type="text/javascript">';
    echo ' alert("You did book any seats");history.go(-1);';  //not showing an alert box.
    echo '</script>';
  }
    

  

    if(preg_match($phoneRegex, $_POST["cust"]["mobile"])||preg_match($phoneRegex1,$_POST["cust"]["mobile"])){
        $isPhone=TRUE;
    }
    else{
        
      echo '<script type="text/javascript">';
      echo ' alert("Your phone number is invalid.");history.go(-1);';  //not showing an alert box.
      echo '</script>';
    }

    $_POST["cust"]["mobile"];

    $cardRegex = '/^\d{3}([ \-]?)((\d{6}\1?\d{5,10})|(\d{4}\1?\d{4}\1?\d{4}))$/';

    if(preg_match($cardRegex,$_POST["cust"]["card"])){
        $isCard=TRUE;
    }
    else{
      echo '<script type="text/javascript">';
      echo ' alert("Your card number is invalid.");history.go(-1);';  //not showing an alert box.
      echo '</script>';
    }

    $expires = \DateTime::createFromFormat('my', $_POST["cust"]["expiryMonth"].$_POST["cust"]["expiryYear"])->modify('+1 month first day of midnight');
    $now     = new \DateTime();

    if ($expires >= $now) {
        $isValid=TRuE;
    }
    else{
      echo '<script type="text/javascript">';
      echo ' alert("Your card is expired.");history.go(-1);';  //not showing an alert box.
      echo '</script>';
    }

    if($isPhone&&$isCard&&$isValid&&$isTicket){
        return TRUE;
    }
    return FALSE;
  }
  // if (isset($_POST['session-reset'])) {
  //   foreach($_SESSION as $something => &$whatever) {
  //     unset($whatever);
  //   }
  // }
  

  // the if not working fors some reason
  // if(isset($_REQUEST['index.php'])){
    
    // header("Location: ".$_SERVER['HTTP_REFERER']);
  // }
  // else{
  //   header("Location: index.php")
  // }
?>