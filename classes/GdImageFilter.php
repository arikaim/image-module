<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Image\Classes;

/**
 * Gd image filter helpers
 */
class GdImageFilter 
{
    /**
     * Image opacity filter
     *
     * @param \GdImage|resource $image GD image resource
     * @param float $opacity
     * @return \GdImage|resource GD image resource
     */
    public static function opacity($image, float $opacity = 0.5)
    {       
        \imagealphablending($image,false); 
        \imagesavealpha($image,true); 
        $transparency = 1 - $opacity;
        \imagefilter($image,IMG_FILTER_COLORIZE,0,0,0,(127 * $transparency)); 
        
        return $image;
    }
}
