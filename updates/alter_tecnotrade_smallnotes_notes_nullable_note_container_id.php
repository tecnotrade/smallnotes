<?php namespace Tecnotrade\SmallNotes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AlterTecnotradeSmallnotesNotesNullableNoteContainerId extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tecnotrade_smallnotes_notes')) {
            return;
        }

        if (!Schema::hasColumn('tecnotrade_smallnotes_notes', 'note_container_id')) {
            return;
        }

        $database = resolve('db');

        if ($database->getDriverName() === 'mysql') {
            $database->statement('ALTER TABLE `tecnotrade_smallnotes_notes` MODIFY `note_container_id` INT UNSIGNED NULL');
            $database->statement('ALTER TABLE `tecnotrade_smallnotes_notes` MODIFY `content` LONGTEXT NULL');
            $database->statement('ALTER TABLE `tecnotrade_smallnotes_notes` MODIFY `publish_start` DATETIME NULL');
        }

        if ($database->getDriverName() === 'pgsql') {
            $database->statement('ALTER TABLE tecnotrade_smallnotes_notes ALTER COLUMN note_container_id DROP NOT NULL');
            $database->statement('ALTER TABLE tecnotrade_smallnotes_notes ALTER COLUMN content DROP NOT NULL');
            $database->statement('ALTER TABLE tecnotrade_smallnotes_notes ALTER COLUMN publish_start DROP NOT NULL');
        }

        // SQLite does not support ALTER COLUMN, handled on new installs.
    }

    public function down()
    {
        // Keeping column nullable to avoid breaking deferred binding.
    }
}
