<?php
error_reporting(0);

// #########################################
// In this page you will find the code required to create multiple choice exams
// Copy this code and save it to a file name "whatever.php"
// The file name must finish with ".php"
// Save the file to a PHP unable server.
// Please consider adding a link to this service:
//      http://www.phptutorial.info/scripts/multiple_choice/
//
// A website was created based in this script at which allows
//   to create and maintain the test online at:
//      http://www.testak.org
//
// #########################################
//      CONFIGURATION
$title = "Vår quiz!";
$address = ".";
$randomizequestions ="yes"; // set up as "no" to show questions without randomization
//    END CONFIGURATION
// #########################################

$a = array(
1 => array(
   0 => "Hvor skal OL være i 2016?",
   1 => "Norge",
   2 => "Sverige",
   3 => "Danmark",
   4 => "Brasil",
   5 => "Russland",
   6 => 1
),
2 => array(
   0 => "I hvilken by skal OL være?",
   1 => "Fredrikstad",
   2 => "Bergen",
   3 => "Gjøvik",
   4 => "Lillehammer",
   6 => 4
),
3 => array(
   0 => "Hvilke år skal OL være",
   1 => "2014",
   2 => "2015",
   3 => "2016",
   6 => 3
),
);

$max=3;

$question=$_POST["question"] ;

if ($_POST["Randon"]==0){
        if($randomizequestions =="yes"){$randval = mt_rand(1,$max);}else{$randval=1;}
        $randval2 = $randval;
        }else{
        $randval=$_POST["Randon"];
        $randval2=$_POST["Randon"] + $question;
                if ($randval2>$max){
                $randval2=$randval2-$max;
                }
        }
        
$ok=$_POST["ok"] ;

if ($question==0){
        $question=0;
        $ok=0;
        $percentaje=0;
        }else{
        $percentaje= Round(100*$ok / $question);
        }
?>
<!DOCTYPE html>
<html lang="no">
<head>
	<meta charset="UTF-8">
	<title>Quiz</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<H1><?php print "$title"; ?></H1>
<TABLE BORDER=0 CELLSPACING=5 WIDTH=500>

<?php if ($question<$max){ ?>

<TR><TD ALIGN=RIGHT>
<FORM METHOD=POST NAME="percentaje" ACTION="<?php print $URL; ?>">

<!--
<BR>Percentaje of correct responses: <?php print $percentaje; ?> %-->
<input type=hidden name=response value=0>
<input type=hidden name=question value=<?php print $question; ?>>
<input type=hidden name=ok value=<?php print $ok; ?>>
<input type=hidden name=Randon value=<?php print $randval; ?>>
<br><?php print $question+1; ?> / <?php print $max; ?>

<HR>
</TD></TR>

<TR><TD>
<FORM METHOD=POST NAME="question" ACTION="">
<?php print "<b>".$a[$randval2][0]."</b>"; ?>
 
<BR>     <INPUT TYPE=radio NAME="option" VALUE="1"  onClick=" Goahead (1);"><?php print $a[$randval2][1] ; ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="2"  onClick=" Goahead (2);"><?php print $a[$randval2][2] ; ?>
<?php if ($a[$randval2][3]!=""){ ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="3"  onClick=" Goahead (3);"><?php print $a[$randval2][3] ; } ?>
<?php if ($a[$randval2][4]!=""){ ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="4"  onClick=" Goahead (4);"><?php print $a[$randval2][4] ; } ?>
<?php if ($a[$randval2][5]!=""){ ?>
<BR>     <INPUT TYPE=radio NAME="option" VALUE="5"  onClick=" Goahead (5);"><?php print $a[$randval2][5] ; } ?>
  <!--
<BR>     <input type=text name=response size=8>-->

  <br><BR><input type=submit value="Neste">
</FORM>

</FORM>

<?php
}else{
?>
<TR><TD ALIGN=Center>
The Quiz has finished
<BR>Percentaje of correct responses: <?php print $percentaje ; ?> %
<p><A HREF="<?php print $address; ?>">Home Page</a>

<?php } ?>

</TD></TR>
</TABLE>


	<script src="js/script.js"></script>
</body>
</html>