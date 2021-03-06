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
$title = "YOG Lillehammer 2016 Quiz";
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
   4 => "2017",
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
    <title><?php print $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#E5B33A">
    <meta name="theme-color" content="#E5B33A">
    <script src="js/script.js"></script>
    <SCRIPT LANGUAGE='JavaScript'>
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

    </SCRIPT>

    <!-- Henter JS -->
    <script src="js/script.js"></script>
</head>
<body>

<section>
    <!--<h1><?php print "$title"; ?></h1>-->
    <table BORDER="0" CELLSPACING="5">

    <?php if ($question<$max){ ?>

    <tr><td align="center">
      <br><?php print $question+1; ?> / <?php print $max; ?>
    <hr>
    </td></tr>

    <tr><td>
    <form method="post" name="question" action="">
    <p id="question"><?php print "<b>".$a[$randval2][0]."</b>"; ?></p>
    
    <div id="before" class="segmented">

        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="1" value="1"  onClick=" Goahead (1);">
        <label class="label1" onClick="clicked1()" for="1"><?php print $a[$randval2][1] ; ?></label>
        </div>

        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="2" value="2"  onClick=" Goahead (2);">
        <label class="label1" onClick="clicked2()" for="2"><?php print $a[$randval2][2] ; ?></label>
        </div>

        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="3" value="3"  onClick=" Goahead (3);">
        <label class="label1" onClick="clicked3()" for="3"><?php print $a[$randval2][3] ; ?></label>
        </div>
        
        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="4" value="4"  onClick=" Goahead (4);">
        <label class="label1" onClick="clicked4()" for="4"><?php print $a[$randval2][4] ; ?></label>
        </div>



       <?php 
      //{ if (1==$a[$randval2][6]){
      //document.getElementById('1').style.visibility = 'visible';
      //}}  ?>

  <div id="riktig" class="space initiallyHidden">
    <input type="radio" type=text name=response >
         <input type="radio" name="option" value="<?php print $a[$randval2][6] ; ?>" id="q5">
        <label for="q5">Riktig svar er nr: <?php print $a[$randval2][6] ; ?></label>
      </div>

    </div>


      <div id="after" class="segmented initiallyGone">
        
           <!-- Feil -->

        <?php { if (1!=$a[$randval2][6]){ ?> <!-- Feil -->
        <div id="a" class="space initiallyGone">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="1" value="1"  onClick=" Goahead (1);">
        <label  class="label3" for="1"><?php print $a[$randval2][1] ; ?></label>
        </div>
        <?php }} ?>

  
        <?php { if (2!=$a[$randval2][6]){ ?>  <!-- Feil -->
        <div id="b" class="space initiallyGone">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="2" value="2"  onClick=" Goahead (2);">
        <label class="label3" for="2"><?php print $a[$randval2][2] ; ?></label>
        </div>
        <?php }} ?>

      
        <?php { if (3!=$a[$randval2][6]){ ?>  <!-- Feil -->
        <div id="c" class="space initiallyGone">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="3" value="3"  onClick=" Goahead (3);">
        <label  class="label3" for="3"><?php print $a[$randval2][3] ; ?></label>
        </div>
        <?php }} ?>
        
  
        <?php { if (4!=$a[$randval2][6]){ ?> <!-- Feil --> 
        <div id="d" class="space initiallyGone">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="4" value="4"  onClick=" Goahead (4);">
        <label  class="label3" for="4"><?php print $a[$randval2][4] ; ?></label>
        </div>
        <?php }} ?>

         <!-- Slutt feil -->
        <!-- Riktig -->

        <?php { if (1==$a[$randval2][6]){ ?> <!-- Riktig -->
        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="1" value="1"  onClick=" Goahead (1);">
        <label class="label2" for="1"><?php print $a[$randval2][1] ; ?></label>
        </div>
        <?php }} ?>

        <?php { if (2==$a[$randval2][6]){ ?>  <!-- Riktig -->
        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="2" value="2"  onClick=" Goahead (2);">
        <label class="label2" for="2"><?php print $a[$randval2][2] ; ?></label>
        </div>
        <?php }} ?>

        <?php { if (3==$a[$randval2][6]){ ?>  <!-- Riktig -->
        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="3" value="3"  onClick=" Goahead (3);">
        <label class="label2" for="3"><?php print $a[$randval2][3] ; ?></label>
        </div>
        <?php }} ?>

        <?php { if (4==$a[$randval2][6]){ ?> <!-- Riktig --> 
        <div class="space">
        <input type="radio" name="option" value="<?php print $a[$randval2][1] ; ?>" id="4" value="4"  onClick=" Goahead (4);">
        <label class="label2" for="4"><?php print $a[$randval2][4] ; ?></label>
        </div>
        <?php }} ?>

        <!-- Slutt riktig -->

      </div>

     </form>
     <form method="post" name="percentaje" action="<?php print $URL; ?>">
        <!--
        <BR>Percentaje of correct responses: <?php print $percentaje; ?> %-->
        <input type=hidden name=response value=0>
        <input type=hidden name=question value=<?php print $question; ?>>
        <input type=hidden name=ok value=<?php print $ok; ?>>
        <input type=hidden name=Randon value=<?php print $randval; ?>>
        <input type="submit" class="button initiallyHidden" id="next" value="Next">
    </form>

    <?php
    }else{
    ?>
    <tr><td align="center">
    <p>Quizen er ferdig!
    <br>Du fikk: <?php print $percentaje ; ?> % riktig!
    <br><br>
    Del ditt resultat med andre!</p><br>

    <button type="button" class="button" id="rankings">Del på Facebook</button>
    <br>
    <button type="button" class="button" id="rankings">Del på Twitter</button>
    <br>
    <button type="button" class="button" id="rankings">Del på Google +</button>
    <br>
    <a href="<?php print $address; ?>">
        <button type="button" class="button" id="settings">Avslutt quizen</button>
      </a>

    <?php } ?>

    </td></tr>
    </table>

  </section>

</body>
</html>
