<?php namespace Tecnotrade\SmallNotes\Models;

use Model;

/**
 * Model
 */
class NoteContainer extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'tecnotrade_smallnotes_containers';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'name' => 'required',
    ];

    /**
     * @var array casts for the model.
     */
    public $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'notes' => [Note::class, 'delete' => true],
    ];
}
