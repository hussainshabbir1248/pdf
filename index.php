<?php 
if(isset($_POST['submit'])){
    $number1 =$_POST['number1'];
    $number2 =$_POST['number2'];
    $problems = $_POST['problems'];
    $num1=[];$num2=[];$result = [];
    for($i=1;$i<=$problems;$i++){
        $num1[$i-1]=rand($number1,$number2);
        $num2[$i-1]=rand($number1,$number2);
        $result[$i-1]=$num2[$i-1]+$num1[$i-1];
    }
    require_once('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    
    $pdf->AddFont('Roboto-Medium','','Roboto-Medium.php');
    $pdf->SetFont('Roboto-Medium','',16);
    $pdf->Cell(120,10, 'Name: _________' );
    $pdf->Cell(120,10, 'Date: _________' );
    $pdf->ln();
    for($i=1;$i<=$problems;$i++){
        $output = $i.' ) ' . $num1[$i-1] . ' + '. $num2[$i-1] ;
        $pdf->Cell(120,16,  $output . ' = ' );
        if($i%2==0){
        $pdf->ln();
        }
    }

    if(isset($_POST['answer'])){
       
        $pdf->Cell(38,12, '' );
        $pdf->Cell(48,12, 'brought to you by ' );
        $pdf->Cell(10,12,'www.example.com' );
        $pdf->AddPage();
        $pdf->Cell(120,10, 'Name: _________' );
        $pdf->Cell(120,10, 'Date: _________' );
        for($i=1;$i<=$problems;$i++){
            $output = $i.' ) ' . $num1[$i-1] . ' + '. $num2[$i-1] ;
            $pdf->Cell(120,16,  $output . ' = ' . $result[$i-1] );
            if($i%2==0){
            $pdf->ln();
            }
        }
    } 

    $pdf->Cell(38,12, '' );
    $pdf->Cell(48,12, 'brought to you by ' );
    $pdf->Cell(10,12,'www.example.com' );
    $pdf->Output();
    exit;
} ?>

<form  action="" method="Post" >
<h3>Lower Range of Numbers Begin At: </h3>
<select name="number1" value="number1">

<?php for($i=10;$i<=49;$i++){
    echo '<option value="'.$i.'">' .$i. '</option>'; 
}?>
</select>
<h3>Upper Range of Numbers Begin At:
 </h3>
<select name="number2" value="number2">
<?php for($i=50;$i<=99;$i++){
    echo '<option value="'.$i.'">' .$i. '</option>'; 
}?>
</select>
<h3>Number of Problems for Each Addition Worksheet </h3>
<input type ="radio" name="problems" value ="12" checked/> 12 Problems <br>
<input type ="radio" name="problems" value ="16"/> 16 Problems <br>
<input type ="radio" name="problems" value ="20"/> 20 Problems <br>
<input type ="radio" name="problems" value ="24"/> 24 Problems <br>
<input type ="radio" name="problems" value =30/> 30 Problems <br>
<h3>Addition Worksheet Answer Page </h3>
<input type ="checkbox" name="answer" value ="answer" checked/>Include Addition Worksheet Answer Page  <br>
<br>
<input type="submit" value="Create it" name="submit"/>
</form>
