<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Image\Facade;

use Arikaim\Core\Utils\StaticFacade;

/**
 * Image facade class
 */
class Image extends StaticFacade
{
    /**
     * Class name
     *
     * @return string
     */
    public static function getInstanceClass()
    {
        return 'Arikaim\\Modules\\Image\\Image';
    }

    /**
     * Container item name
     *
     * @return string
     */
    public static function getContainerItemName()
    {
        return 'image';
    }
}
