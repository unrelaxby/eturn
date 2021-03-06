<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthColumnsToDleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::/*connection(config('dleconfig.db_connection_name', config('database.default')))->*/table(with(new App\Models\User)->getTable(), function (Blueprint $table) {
            $table->increments('user_id')->change();
            $table->string('email', 255)->change();
            $table->string('password', 255)->change();
            $table->string('name', 255)->change();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::/*connection(config('dleconfig.db_connection_name', config('database.default')))->*/statement('ALTER TABLE '. with(new App\Models\User)->getTable() .' ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::/*connection(config('dleconfig.db_connection_name', config('database.default')))->*/table(with(new App\Models\User)->getTable(), function (Blueprint $table) {
            $table->integer('user_id')->change();
            $table->string('email', 50)->change();
            $table->string('password', 32)->change();
            $table->string('name', 40)->change();
            $table->dropRememberToken();
            $table->dropTimestamps();
        });

        DB::/*connection(config('dleconfig.db_connection_name', config('database.default')))->*/statement('ALTER TABLE '. with(new App\Models\User)->getTable() .' ENGINE = MyISAM');
    }
}
