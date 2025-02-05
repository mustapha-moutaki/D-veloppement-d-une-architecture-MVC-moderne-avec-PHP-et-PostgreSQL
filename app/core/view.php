<?php   
namespace App\Core;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Filesystem\Filesystem;

class View {
    protected static $viewFactory;

    public static function make($view, $data = []) {
        $fileSystem = new Filesystem();
        $viewFinder = new FileViewFinder($fileSystem, [
            __DIR__ . '/../views',
        ]);
        $compiler = new BladeCompiler($fileSystem, __DIR__ . '/../cache');
        $engine = new CompilerEngine($compiler);
        self::$viewFactory = new Factory($viewFinder, $engine);

        return self::$viewFactory->make($view, $data)->render();
    }
}