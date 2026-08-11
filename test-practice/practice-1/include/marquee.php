<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    
<?php

$ads = $Ad->all(["status" => 1]);
foreach ($ads as $ad) {
    echo "&nbsp;&nbsp";
    echo $ad['content'];
    echo "&nbsp;&nbsp";
}

?>

</marquee>