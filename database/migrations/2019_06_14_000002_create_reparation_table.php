<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReparationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reparation';

    /**
     * Run the migrations.
     * @table reparation
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idreparation');
            $table->integer('idcar');
            $table->string('desrepara');
            $table->date('fecha');
            $table->integer('kilometros');

            $table->index(["idcar"], 'reparation_car_idx');


            $table->foreign('idcar', 'reparation_car_idx')
                ->references('idcar')->on('car')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
