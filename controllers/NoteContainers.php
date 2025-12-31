<?php namespace Tecnotrade\SmallNotes\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Note Containers backend controller
 */
class NoteContainers extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Tecnotrade.SmallNotes', 'smallnotes');
    }
}
