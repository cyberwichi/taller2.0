<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'client';

    /**
     * Run the migrations.
     * @table client
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idclient');
            $table->string('nombre', 50);
            $table->string('cif', 45);
            $table->string('direccion')->nullable();
            $table->string('telefono', 15)->nullable();
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
