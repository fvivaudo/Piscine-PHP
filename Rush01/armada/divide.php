<?php
$width = 10;
$height = 10;

$source = @imagecreatefrompng( "source.png" );
$source_width = imagesx( $source );
$source_height = imagesy( $source );

for( $col = 0; $col < $source_width / $width; $col++)
{
    for( $row = 0; $row < $source_height / $height; $row++)
    {
        $fn = sprintf( "img%02d_%02d.png", $col, $row );

        echo( "$fn\n" );

        $im = @imagecreatetruecolor( $width, $height );
        imagecopyresized( $im, $source, 0, 0,
            $col * $width, $row * $height, $width, $height,
            $width, $height );
        imagejpeg( $im, $fn );
        imagedestroy( $im );
        }
    } 
    ?>