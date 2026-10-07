<?php
use Illuminate\Database\Seeder; use App\Superhero;
class SuperheroesSeeder extends Seeder { public function run() {
 $names=[['Alex Vega','Centinela'],['Dana Sol','Aurora'],['Leo Ríos','Titán'],['Maya Cruz','Nova'],['Omar Luna','Vector'],['Sara Vidal','Volt'],['Iván Gil','Cobalto'],['Nora Paz','Eclipse'],['Eric Mar','Órbita'],['Lina Rey','Prisma']];
 foreach($names as $i=>$data) { \Illuminate\Support\Facades\Storage::disk('public')->put('superheroes/hero-'.($i+1).'.png',file_get_contents(database_path('seed-assets/hero-'.($i+1).'.png'))); Superhero::withTrashed()->firstOrCreate(['hero_name'=>$data[1]],['real_name'=>$data[0],'photo_path'=>'superheroes/hero-'.($i+1).'.png', 'information'=>'Personaje ficticio de demostración: un héroe robótico que protege su ciudad. Su retrato es una ilustración de prueba.']); }
} }
