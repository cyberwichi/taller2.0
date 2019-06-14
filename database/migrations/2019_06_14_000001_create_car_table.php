<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'car';

    /**
     * Run the migrations.
     * @table car
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcar');
            $table->integer('idclient');
            $table->string('matricula', 15);
            $table->string('modelo', 45)->nullable();

            $table->index(["idclient"], 'cars_client_idx');


            $table->foreign('idclient', 'cars_client_idx')
                ->references('idclient')->on('client')
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
