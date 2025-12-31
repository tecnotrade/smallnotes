<?php namespace Tecnotrade\SmallNotes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTecnotradeSmallnotesNotes extends Migration
{
    public function up()
    {
        Schema::create('tecnotrade_smallnotes_notes', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('note_container_id')->unsigned()->nullable()->index();
            $table->longText('content')->nullable();
            $table->dateTime('publish_start')->nullable();
            $table->dateTime('publish_end')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tecnotrade_smallnotes_notes');
    }
}
