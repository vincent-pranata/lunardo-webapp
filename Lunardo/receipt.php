<?php
    session_start();
    include_once 'tools.php';
    $name=$_SESSION['cart']['cust']['name'];
    $discountPricesArrayPHP = array("STA"=>"14", "STP"=>"12.50", "STC"=>"11", "FCA"=>"24", "FCP"=>"22.50", "FCC"=>"21");
    $pricesArrayPHP = array("STA"=>"19", "STP"=>"17.50", "STC"=>"15.30", "FCA"=>"30", "FCP"=>"27", "FCC"=>"24");
    if(!isset($_SESSION['cart'])){
    	header("Location: index.php");
    } 
    else{  
        $totalcost=0;
        $cost1=0;
        $cost2=0;
        $cost3=0;
        $cost4=0;
        $cost5=0;
        $cost6=0;
        if(checkDiscount()) {
            $cost1=$_SESSION['cart']['seats']['STA']*$discountPricesArrayPHP['STA'];
            $cost2=$_SESSION['cart']['seats']['STP']*$discountPricesArrayPHP['STP'];
            $cost3=$_SESSION['cart']['seats']['STC']*$discountPricesArrayPHP['STC'];
            $cost4=$_SESSION['cart']['seats']['FCA']*$discountPricesArrayPHP['FCA'];
            $cost5=$_SESSION['cart']['seats']['FCP']*$discountPricesArrayPHP['FCP'];
            $cost6=$_SESSION['cart']['seats']['FCC']*$discountPricesArrayPHP['FCC'];
        }
        else{
            $cost1=$_SESSION['cart']['seats']['STA']*$pricesArrayPHP['STA'];
            $cost2=$_SESSION['cart']['seats']['STP']*$pricesArrayPHP['STP'];
            $cost3=$_SESSION['cart']['seats']['STC']*$pricesArrayPHP['STC'];
            $cost4=$_SESSION['cart']['seats']['FCA']*$pricesArrayPHP['FCA'];
            $cost5=$_SESSION['cart']['seats']['FCP']*$pricesArrayPHP['FCP'];
            $cost6=$_SESSION['cart']['seats']['FCC']*$pricesArrayPHP['FCC'];
        }
        $cost1=number_format($cost1, 2);
        $cost2=number_format($cost2, 2);
        $cost3=number_format($cost3, 2);
        $cost4=number_format($cost4, 2);
        $cost5=number_format($cost5, 2);
        $cost6=number_format($cost6, 2);
        $totalcost=$cost1+$cost2+$cost3+$cost4+$cost5+$cost6;
        $totalcost=number_format($totalcost, 2);
        $gst=$totalcost/11;
        $gst=number_format($gst,2);
        $ticketExpiry="1 month after today";
        if(!($fp = fopen('bookings.txt', 'a'))){
            echo "File Unavalaible";
        }
        flock($fp, LOCK_EX);
        if(isset($_SESSION['cart']['cust']['name'])){
            if(!(fputcsv($fp,[date('Y-m-d'), $_SESSION['cart']['cust']['name'], $_SESSION['cart']['cust']['email'], $_SESSION['cart']['cust']['mobile'], $_SESSION['cart']['movie']['id'],$_SESSION['cart']['movie']['day'],$_SESSION['cart']['movie']['hour'],$_SESSION['cart']['seats']['STA'],$_SESSION['cart']['seats']['STP'],$_SESSION['cart']['seats']['STC'],$_SESSION['cart']['seats']['FCA'],$_SESSION['cart']['seats']['FCP'],$_SESSION['cart']['seats']['FCC'], "$$totalcost"], "\t"))){
                echo "File unwrittable"; die();
            }
            unset($_SESSION['cart']['cust']['name']);
        }
        else if(!empty($_REQUEST['cust']['name'])){
            $_SESSION['cart']['cust']['name']=htmlentities($_REQUEST['cust']['name'], ENT_QUOTES);
            if(!(fputcsv($fp,[date('Y-m-d'), $_SESSION['cart']['cust']['name'], $_SESSION['cart']['cust']['email'], $_SESSION['cart']['cust']['mobile'], $_SESSION['cart']['movie']['id'],$_SESSION['cart']['movie']['day'],$_SESSION['cart']['movie']['hour'],$_SESSION['cart']['seats']['STA'],$_SESSION['cart']['seats']['STP'],$_SESSION['cart']['seats']['STC'],$_SESSION['cart']['seats']['FCA'],$_SESSION['cart']['seats']['FCP'],$_SESSION['cart']['seats']['FCC'], "$$totalcost"], "\t"))){
                echo "File unwrittable"; die();
            }
        }
        flock($fp, LOCK_UN);
        fclose($fp);
    }

    function checkDiscount()
    {
        if($_SESSION['cart']['movie']['day']==="MON" ||$_SESSION['cart']['movie']['day']==="WED")
        {
            return true;
        }
        else if($_SESSION['cart']['movie']['day']==='TUE' || $_SESSION['cart']['movie']['day']==='THU' || $_SESSION['cart']['movie']['day']==='FRI')
        {
            if($_SESSION['cart']['movie']['hour']==="T12")
            {
                return true;
            }
        }
        return false;
    }
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link id='stylecss' type="text/css" rel="stylesheet" href="receipt.css">
    </head>
    <body>
        <div id="wrapper">
            <header><b>RECEIPT</b></header>
            <div class="info" id="company">
                <h2>Lunardo</h2>
                <p>123-456 ABC Street
                <br>Melbourne CBD, 3000
                <br>000-0000-000</p>
            </div>
            <div class="info" id="customers">
                <h2>Customer Detail:</h2>
                <p>Name: <?php echo $name?>
                <br>Email: <?php echo $_SESSION['cart']['cust']['email']?>
                <br>Mobile: <?php echo $_SESSION['cart']['cust']['mobile']?> </p>
            </div>
            <div id="orderTable">
                <h2>Order Detail</h2>
                <p>Movie ID: <?php echo $_SESSION['cart']['movie']['id']?>
                <br>Movie Day/ Hour: <?php echo $_SESSION['cart']['movie']['day']?>/ <?php echo $_SESSION['cart']['movie']['hour']?>
                <br>Order Date: <?php echo date('Y-m-d')?>
                <br>Expiry Date: <?php echo $ticketExpiry?></p>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Order</th>
                        <th>Quantity</th>
                        <th>Costs</th>
                    </tr>
                    <?php if($_SESSION['cart']['seats']['STA']>0):?>
                         <tr>
                         <td>1</td>
                         <td>Standard Adult</td>
                         <td><?php echo $_SESSION['cart']['seats']['STA']?></td>
                         <td>$<?php echo $cost1?></td>
                     </tr>
                     <?php endif; ?>
                    
                
                     <?php if($_SESSION['cart']['seats']['STP']>0):?>
                    <tr>
                        <td>2</td>
                        <td>Standard Concession</td>
                        <td><?php echo $_SESSION['cart']['seats']['STP']?></td>
                        <td>$<?php echo $cost2?></td>
                    </tr>   
                    <?php endif; ?>

                    <?php if($_SESSION['cart']['seats']['STC']>0):?>           
                    <tr>
                        <td>3</td>
                        <td>Standard Child</td>
                        <td><?php echo $_SESSION['cart']['seats']['STC']?></td>
                        <td>$<?php echo $cost3?></td>
                    </tr>       
                    <?php endif; ?> 

                    <?php if($_SESSION['cart']['seats']['FCA']>0):?>  
                    <tr>
                        <td>4</td>
                        <td>First Class Adult</td>
                        <td><?php echo $_SESSION['cart']['seats']['FCA']?></td>
                        <td>$<?php echo $cost4?></td>
                    </tr> 
                    <?php endif; ?>  

                    <?php if($_SESSION['cart']['seats']['FCP']>0):?>    
                    <tr>
                        <td>5</td>
                        <td>First Class Concession</td>
                        <td><?php echo $_SESSION['cart']['seats']['FCP']?></td>
                        <td>$<?php echo $cost5?></td>
                    </tr>
                    <?php endif; ?> 

                    <?php if($_SESSION['cart']['seats']['FCC']>0):?>    
                    <tr>
                        <td>6</td>
                        <td>First Class Child</td>
                        <td><?php echo $_SESSION['cart']['seats']['FCC']?></td>
                        <td>$<?php echo $cost6?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="3">GST</td>
                        <td>$<?php echo $gst?></td></td>
                    </tr>
                    <tr>
                        <td colspan="3">Total Cost</td>
                        <td>$<?php echo $totalcost?></td></td>
                    </tr>
                </table>
            </div>
        </div>
        <footer>
            <div>&copy;<script>
            document.write(new Date().getFullYear());
            </script>Vincent Pranata/ s3665858, Guoxin Shan/ s3641701 and Fantastic 2. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
            <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
            <?php
                echo '<pre>SESSION: </pre>';
                preShow($_SESSION['cart'],false);
            ?>
        </footer>
    </body>
</html>
