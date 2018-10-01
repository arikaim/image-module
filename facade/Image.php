<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c) 2017-2018 Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license.html
 * 
*/
namespace Arikaim\Modules\Image\Facade;

use Arikaim\Core\Utils\StaticFacade;

class Image extends StaticFacade
{
    public static function getInstanceClass()
    {
        return 'Arikaim\\Modules\\Image\\Image';
    }

    public static function getContainerItemName()
    {
        return 'image';
    }
}
