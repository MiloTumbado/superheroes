<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
class AddStorageAndSoftDeletesToSuperheroesTable extends Migration {
 public function up() { Schema::table('superheroes',function(Blueprint $table){$table->string('photo_path')->nullable();$table->softDeletes();}); }
 public function down() { Schema::table('superheroes',function(Blueprint $table){$table->dropSoftDeletes();$table->dropColumn('photo_path');}); }
}
