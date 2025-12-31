<?php namespace Tecnotrade\SmallNotes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTecnotradeSmallnotesContainers extends Migration
{
    public function up()
    {
        Schema::create('tecnotrade_smallnotes_containers', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tecnotrade_smallnotes_containers');
    }
}
