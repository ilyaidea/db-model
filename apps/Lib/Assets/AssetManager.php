<?php
namespace Lib\Assets;


use Phalcon\Assets\Inline;
use Phalcon\Assets\Resource;
use Phalcon\Mvc\User\Component;

class AssetManager extends Component
{
    public function beforeRender($key)
    {
        $this->addRemoteAssets();

        // init base
        $this->assets->addCss('tmp/'. $key.'.css');
        $this->assets->addJs('tmp/'. $key.'.js');
    }

    public function afterRender($key)
    {
//        if(file_exists('assets/fontawesome/css/all.min.css'))
//        {
//            $this->cssmin->add('assets/fontawesome/css/all.min.css');
//        }
//
//        if(file_exists('ilya-theme/ui/assets/themes/template.css'))
//        {
//            $this->cssmin->add('ilya-theme/ui/assets/themes/template.css');
//        }
//
//        if(file_exists('assets/jquery/dist/jquery.min.js'))
//        {
//            $this->jsmin->add('assets/jquery/dist/jquery.min.js');
//        }

        /** @var Resource $resource */
        foreach($this->assetCollection->getResources() as $resource)
        {
            if($resource->getType() == 'css' && $resource->getLocal() && file_exists($resource->getPath()))
            {
                $this->cssmin->add($resource->getPath());
            }
            elseif($resource->getType() == 'js' && $resource->getLocal() && file_exists($resource->getPath()))
            {
                $this->jsmin->add($resource->getPath());
            }
        }

        /** @var Inline $code */
        foreach($this->assetCollection->getCodes() as $code)
        {
            if($code->getType() == 'css')
            {
                $this->cssmin->add($code->getContent());
            }
            elseif($code->getType() == 'js')
            {
                $this->jsmin->add($code->getContent());
            }
        }

        $this->cssmin->minify('tmp/'. $key.'.css');

        $this->jsmin->minify( 'tmp/'. $key.'.js');
    }

    private function addRemoteAssets()
    {
        /** @var Resource $resource */
        foreach($this->assetCollection->getResources() as $resource)
        {
            if($resource->getType() == 'css' && !$resource->getLocal())
            {
                $this->assets->addCss($resource->getPath(), $resource->getLocal(), $resource->getFilter(), $resource->getAttributes());
            }
            elseif($resource->getType() == 'js' && !$resource->getLocal())
            {
                $this->assets->addJs($resource->getPath(), $resource->getLocal(), $resource->getFilter(), $resource->getAttributes());
            }
        }
    }
}