<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSuperheroesTable extends Migration {
    public function up() { Schema::create('superheroes', function (Blueprint $table) {
        $table->id();
        $table->string('real_name');
$table->string('hero_name');
$table->string('photo_url',2048)->nullable();
$table->text('information');
        $table->timestamps();
    }); }
    public function down() { Schema::dropIfExists('superheroes'); }
}
