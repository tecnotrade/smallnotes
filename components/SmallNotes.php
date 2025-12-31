<?php namespace Tecnotrade\SmallNotes\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Tecnotrade\SmallNotes\Models\NoteContainer;

/**
 * Small Notes frontend component
 */
class SmallNotes extends ComponentBase
{
    /**
     * @var string|null HTML for the active note.
     */
    public $noteHtml;

    public function componentDetails()
    {
        return [
            'name' => 'Small Notes',
            'description' => 'Mostra una nota HTML valida per data dal contenitore selezionato.',
        ];
    }

    public function defineProperties()
    {
        return [
            'container' => [
                'title' => 'Note Container',
                'description' => 'Seleziona un contenitore di note attivo.',
                'type' => 'dropdown',
                'placeholder' => 'Seleziona',
            ],
        ];
    }

    public function getContainerOptions()
    {
        return NoteContainer::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }

    public function onRun()
    {
        $this->noteHtml = $this->loadNoteHtml();
        $this->page['noteHtml'] = $this->noteHtml;
    }

    protected function loadNoteHtml(): ?string
    {
        $containerId = $this->property('container');

        if (!$containerId) {
            return null;
        }

        $container = NoteContainer::query()
            ->where('is_active', true)
            ->find($containerId);

        if (!$container) {
            return null;
        }

        $now = Carbon::now();

        $note = $container->notes()
            ->where('publish_start', '<=', $now)
            ->where(function ($query) use ($now) {
                $query->whereNull('publish_end')
                    ->orWhere('publish_end', '>=', $now);
            })
            ->orderBy('publish_start', 'desc')
            ->first();

        return $note ? $note->content : null;
    }
}
