<?php

function make_thumb($image_name,$new_image_name,$thumb_width =40,$quality = 90)
{
    if(!file_exists($image_name)){ echo('<b>bad:'.$image_name.'</b><br>'); return; }
     if(substr_count($image_name,'.png')>0){
         $image = imagecreatefrompng($image_name);
     }else{
         $image = imagecreatefromjpeg($image_name);
     }

     $breite = imagesx($image);
     $hoehe = imagesy($image);

     $ThumbWidth = $thumb_width;
     $imgratio=$breite/$hoehe;
     $newwidth = $ThumbWidth;
     $newheight = $ThumbWidth/$imgratio;
     imagealphablending( $image2, false );
     imagesavealpha( $image2, true );
     $image2 = imagecreatetruecolor($newwidth, $newheight);
     imagecopyresampled ($image2, $image, 0, 0, 0, 0, $newwidth, $newheight, $breite, $hoehe);
     @imagepng($image2,$new_image_name , $quality);
     imagedestroy($image);
     imagedestroy($image2);
     @chmod($new_image_name, 0777);
}

?>