<?php
namespace App\Console\Commands;
use Illuminate\Console\Command; use Illuminate\Support\Facades\Storage; use App\Superhero;
class ImportHeroPhotos extends Command {
 protected $signature='photos:import'; protected $description='Migra retratos de demostración a storage local conservando registros';
 public function handle() {
  foreach(Superhero::withTrashed()->orderBy('id')->get() as $i=>$hero) {
   if($hero->photo_path) continue;
   $path='superheroes/hero-'.(($i%10)+1).'.png';
   Storage::disk('public')->put($path,file_get_contents(database_path('seed-assets/hero-'.(($i%10)+1).'.png')));
   $hero->photo_path=$path; $hero->photo_url=null; $hero->save();
  }
  $this->info('Fotografías migradas a storage local.');
 }
}
