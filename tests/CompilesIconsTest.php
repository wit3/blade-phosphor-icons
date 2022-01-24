<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladePhosphorIcons\BladePhosphorIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('phosphor-alarm')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.9-59.9A96.1,96.1,0,1,1,128,32,95.7,95.7,0,0,1,195.9,60.1ZM208,128a79.9,79.9,0,1,0-23.4,56.6A79.5,79.5,0,0,0,208,128Zm27.5-73.5-34-34a8,8,0,1,0-11.3,11.3l34,34a8,8,0,0,0,5.6,2.3,8.3,8.3,0,0,0,5.7-2.3A8,8,0,0,0,235.5,54.5ZM65.8,20.5a8,8,0,0,0-11.3,0l-34,34a8,8,0,0,0,0,11.3,8.3,8.3,0,0,0,5.7,2.3,8,8,0,0,0,5.6-2.3l34-34A8,8,0,0,0,65.8,20.5Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('phosphor-alarm', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.9-59.9A96.1,96.1,0,1,1,128,32,95.7,95.7,0,0,1,195.9,60.1ZM208,128a79.9,79.9,0,1,0-23.4,56.6A79.5,79.5,0,0,0,208,128Zm27.5-73.5-34-34a8,8,0,1,0-11.3,11.3l34,34a8,8,0,0,0,5.6,2.3,8.3,8.3,0,0,0,5.7-2.3A8,8,0,0,0,235.5,54.5ZM65.8,20.5a8,8,0,0,0-11.3,0l-34,34a8,8,0,0,0,0,11.3,8.3,8.3,0,0,0,5.7,2.3,8,8,0,0,0,5.6-2.3l34-34A8,8,0,0,0,65.8,20.5Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('phosphor-alarm', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.9-59.9A96.1,96.1,0,1,1,128,32,95.7,95.7,0,0,1,195.9,60.1ZM208,128a79.9,79.9,0,1,0-23.4,56.6A79.5,79.5,0,0,0,208,128Zm27.5-73.5-34-34a8,8,0,1,0-11.3,11.3l34,34a8,8,0,0,0,5.6,2.3,8.3,8.3,0,0,0,5.7-2.3A8,8,0,0,0,235.5,54.5ZM65.8,20.5a8,8,0,0,0-11.3,0l-34,34a8,8,0,0,0,0,11.3,8.3,8.3,0,0,0,5.7,2.3,8,8,0,0,0,5.6-2.3l34-34A8,8,0,0,0,65.8,20.5Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-phosphor-icons.class', 'awesome');

        $result = svg('phosphor-alarm')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.9-59.9A96.1,96.1,0,1,1,128,32,95.7,95.7,0,0,1,195.9,60.1ZM208,128a79.9,79.9,0,1,0-23.4,56.6A79.5,79.5,0,0,0,208,128Zm27.5-73.5-34-34a8,8,0,1,0-11.3,11.3l34,34a8,8,0,0,0,5.6,2.3,8.3,8.3,0,0,0,5.7-2.3A8,8,0,0,0,235.5,54.5ZM65.8,20.5a8,8,0,0,0-11.3,0l-34,34a8,8,0,0,0,0,11.3,8.3,8.3,0,0,0,5.7,2.3,8,8,0,0,0,5.6-2.3l34-34A8,8,0,0,0,65.8,20.5Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-phosphor-icons.class', 'awesome');

        $result = svg('phosphor-alarm', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.9-59.9A96.1,96.1,0,1,1,128,32,95.7,95.7,0,0,1,195.9,60.1ZM208,128a79.9,79.9,0,1,0-23.4,56.6A79.5,79.5,0,0,0,208,128Zm27.5-73.5-34-34a8,8,0,1,0-11.3,11.3l34,34a8,8,0,0,0,5.6,2.3,8.3,8.3,0,0,0,5.7-2.3A8,8,0,0,0,235.5,54.5ZM65.8,20.5a8,8,0,0,0-11.3,0l-34,34a8,8,0,0,0,0,11.3,8.3,8.3,0,0,0,5.7,2.3,8,8,0,0,0,5.6-2.3l34-34A8,8,0,0,0,65.8,20.5Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladePhosphorIconsServiceProvider::class,
        ];
    }
}
