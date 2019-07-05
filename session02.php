<?php
  session_start();  
  $_SESSION['num'] += 1;
 // session変数を取り出して+1する  
   echo $_SESSION['num']; // 結果を出力   
    ?>