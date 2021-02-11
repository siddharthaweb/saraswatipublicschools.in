<div class="alpha-serach">
    <div class="alpha-serach-title">Search By Alphabet</div>
    <div class="clear"></div>
    <?php
    $linksalphabet = array('a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D', 'e' => 'E', 'f' => 'F', 'g' => 'G', 'h' => 'H', 'i' => 'I', 'j' => 'J', 'k' => 'K', 'l' => 'L', 'm' => 'M', 'n' => 'N', 'o' => 'O', 'p' => 'P', 'q' => 'Q', 'r' => 'R', 's' => 'S', 't' => 'T', 'u' => 'U', 'v' => 'V','w' => 'W', 'x' => 'X', 'y' => 'Y', 'z' => 'Z');
    foreach($linksalphabet as $key=>$alpha):
    ?>    
    <a href="?<?php echo $fieldname;?>=<?php echo lcfirst($alpha);?>"><?php echo $alpha;?></a>
    <?php
    endforeach;
    ?>
</div>