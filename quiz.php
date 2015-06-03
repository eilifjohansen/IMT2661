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

<html>
  <head>
    <title>Multiple Choice Questions:  <?php print $title; ?></title>

    <script language='JavaScript'>
    <!-- 
    function Goahead (number){
            if (document.percentaje.response.value==0){
                    if (number==<?php print $a[$randval2][6] ; ?>){
                            document.percentaje.response.value=1
                            document.percentaje.question.value++
                            document.percentaje.ok.value++
                    }else{
                            document.percentaje.response.value=1
                            document.percentaje.question.value++
                    }
            }
            if (number==<?php print $a[$randval2][6] ; ?>){
                    document.question.response.value="Correct"
            }else{
                    document.question.response.value="Incorrect"
            }
    }
    // -->
    </script>

    <!-- Henter JS -->
    <script src="js/script.js"></script>
</head>
<body>

<center>
<h1><?php print "$title"; ?></h1>
<table BORDER=0 CELLSPACING=5 WIDTH=500>

<?php if ($question<$max){ ?>

<tr><td align="right">
<form method="post" name="percentaje" action="<?php print $URL; ?>">

<!--
<BR>Percentaje of correct responses: <?php print $percentaje; ?> %-->
<input type=hidden name=response value=0>
<input type=hidden name=question value=<?php print $question; ?>>
<input type=hidden name=ok value=<?php print $ok; ?>>
<input type=hidden name=Randon value=<?php print $randval; ?>>
<br><?php print $question+1; ?> / <?php print $max; ?>

<hr>
</td></tr>

<tr><td>
<form method="post" name="question" action="">
<?php print "<b>".$a[$randval2][0]."</b>"; ?>
 
<br>     <input type="radio" name="option" value="1"  onClick=" Goahead (1);"><?php print $a[$randval2][1] ; ?>
<br>     <input type="radio" name="option" value="2"  onClick=" Goahead (2);"><?php print $a[$randval2][2] ; ?>
<?php if ($a[$randval2][3]!=""){ ?>
<br>     <input type="radio" name="option" value="3"  onClick=" Goahead (3);"><?php print $a[$randval2][3] ; } ?>
<?php if ($a[$randval2][4]!=""){ ?>
<br>     <input type="radio" name="option" value="4"  onClick=" Goahead (4);"><?php print $a[$randval2][4] ; } ?>
<?php if ($a[$randval2][5]!=""){ ?>
<br>     <input type="radio" name="option" value="5"  onClick=" Goahead (5);"><?php print $a[$randval2][5] ; } ?>
  <!--
<br>     <input type=text name=response size=8>-->

  <br><br><input type=submit value="Neste">
</form>
</form>

<?php
}else{
?>
<tr><td align="center">
The Quiz has finished
<br>Percentaje of correct responses: <?php print $percentaje ; ?> %
<p><a HREF="<?php print $address; ?>">Home Page</a>

<?php } ?>

</td></tr>
</table>

</center>
</body>
</html>