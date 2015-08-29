<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function createThumbnail($info, $target_path, $target_path_mini, $thumbWidth) {
    if ( strtolower($info['extension']) == 'jpg' ) {
        $img = imagecreatefromjpeg( "{$target_path}" );
        $width = imagesx( $img );
        $height = imagesy( $img );
        $new_width = $thumbWidth;
        $new_height = floor( $height * ( $thumbWidth / $width ) );
        $tmp_img = imagecreatetruecolor( $new_width, $new_height );
        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
        imagejpeg( $tmp_img, "{$target_path_mini}" );
        echo "The thumbnail ".$target_path_mini." has been created";
    } else if ( strtolower($info['extension']) == 'png' ) {
        $img = imagecreatefrompng( "{$target_path}" );
        $width = imagesx( $img );
        $height = imagesy( $img );
        $new_width = $thumbWidth;
        $new_height = floor( $height * ( $thumbWidth / $width ) );
        $tmp_img = imagecreatetruecolor( $new_width, $new_height );
        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
        imagepng( $tmp_img, "{$target_path_mini}" );
        echo "The thumbnail ".$target_path_mini." has been created";
   }
}

?>
