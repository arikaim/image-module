<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Image;

use Intervention\Image\ImageManager;

use Arikaim\Core\Utils\Utils;
use Arikaim\Core\Extension\Module;
use Arikaim\Modules\Image\Facade\Image as ImageFacade;

/**
 * Image class
 */
class Image extends Module
{
    /**
     * Image menagaer class
     *
     * @var ImageManager
     */
    private $manager;

    /**
     * Constructor
     */
    public function __construct()
    {
        // create image manager  
        $this->manager = $this->createImageManager();
    }

    /**
     * Create image manager instance
     *
     * @param string $driver
     * @return ImageManager|null
     */
    public function createImageManager($driver = 'gd') 
    {
        return (class_exists('ImageManager') == true) ? new ImageManager(['driver' => $driver]) : null;
    } 

    /**
     * Call ImageManager method
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args) 
    {
        return Utils::call($this->manager,$method,$args);       
    }

    /**
     * Get ImageManager instance
     *
     * @return ImageManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Test module
     *
     * @return boolean
     */
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
