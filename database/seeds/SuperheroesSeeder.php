<?php
use Illuminate\Database\Seeder; use App\Superhero;
class SuperheroesSeeder extends Seeder { public function run() {
 $names=[['Alex Vega','Centinela'],['Dana Sol','Aurora'],['Leo Ríos','Titán'],['Maya Cruz','Nova'],['Omar Luna','Vector'],['Sara Vidal','Volt'],['Iván Gil','Cobalto'],['Nora Paz','Eclipse'],['Eric Mar','Órbita'],['Lina Rey','Prisma']];
 foreach($names as $i=>$data) Superhero::firstOrCreate(['hero_name'=>$data[1]],['real_name'=>$data[0],'photo_url'=>'https://api.dicebear.com/9.x/bottts/png?seed=Hero'.($i+1), 'information'=>'Personaje ficticio de demostración: un héroe robótico que protege su ciudad. Su retrato es una ilustración de prueba.']);
} }
