<?php namespace Tecnotrade\SmallNotes\Models;

use Model;

/**
 * Model
 */
class Note extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array behaviours implemented by this model.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array attributes made translatable.
     */
    public $translatable = ['content'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'tecnotrade_smallnotes_notes';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'content' => 'required',
        'publish_start' => 'required|date',
        'publish_end' => 'nullable|date',
    ];

    /**
     * @var array casts for the model.
     */
    public $casts = [
        'publish_start' => 'datetime',
        'publish_end' => 'datetime',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'note_container' => [NoteContainer::class],
    ];
}
