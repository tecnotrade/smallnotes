<?php namespace Tecnotrade\SmallNotes;

use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            \Tecnotrade\SmallNotes\Components\SmallNotes::class => 'smallNotes',
        ];
    }

    public function registerPageSnippets()
    {
        return [
            \Tecnotrade\SmallNotes\Components\SmallNotes::class => 'smallNotes',
        ];
    }
}
