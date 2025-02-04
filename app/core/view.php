<?php   
namespace App\Core;

use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\FileEngine;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;

class View {
    protected $factory;

    public function __construct() {
        $filesystem = new Filesystem();
        $viewPaths = [__DIR__ . '/../views/front'];

       
        $resolver = new EngineResolver();
        
        $resolver->register('php', function () {
            return new PhpEngine();
        });

       
        $resolver->register('blade', function () use ($filesystem) {
            return new CompilerEngine(new BladeCompiler($filesystem, __DIR__ . '/../cache'));
        });

       
        $finder = new FileViewFinder($filesystem, $viewPaths);

       
        $this->factory = new Factory($resolver, $finder, new Dispatcher());
    }

    public function render($view, $data = []) {
        echo $this->factory->make($view, $data)->render();
    }
}

