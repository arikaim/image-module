<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c) 2017-2018 Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license.html
 * 
*/
namespace Arikaim\Modules\Image;

use Intervention\Image\ImageManager;

use Arikaim\Core\Utils\Utils;
use Arikaim\Core\Module\Module;
use Arikaim\Core\Module\ModulesManager;
use Arikaim\Core\Form\Properties;

use Arikaim\Modules\Image\Facade\Image as ImageFacade;

class Image extends Module
{
    private $manager;

    public function __construct()
    {
        $properties = new Properties(ModulesManager::getModuleConfigFileName('image'));
        $config = $properties->toArray();
     
        $this->manager = new ImageManager($config);
        // module details
        $this->setServiceName('image');  
        $this->setBootable(false);
    }

    public function __call($method, $args) 
    {
        return Utils::call($this->manager,$method,$args);       
    }

    public function get()
    {
        return $this->manager;
    }

    public function test()
    {
        $image_data = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12NgaAQAAIQAghhgRykAAAAASUVORK5CYII=";
        try {
            $image = ImageFacade::make($image_data);
        } catch(\Exception $e) {
            $this->error = $e->getMessage();         
            return false;
        }
        return true;
    }
}
