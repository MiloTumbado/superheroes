<?php
namespace Tests\Feature;
use Tests\TestCase; use Illuminate\Foundation\Testing\RefreshDatabase; use Illuminate\Http\UploadedFile; use Illuminate\Support\Facades\Storage; use App\Superhero;
class HeroCrudTest extends TestCase { use RefreshDatabase;
 public function test_crud_soft_delete_restore_and_retention() {
  Storage::fake('public');
  $this->post('/superheroes',[])->assertSessionHasErrors(['real_name','hero_name','photo']);
  $data=['real_name'=>'Test Person','hero_name'=>'Test Hero','photo'=>UploadedFile::fake()->image('hero.png'),'information'=>'Prueba de CRUD'];
  $this->post('/superheroes',$data)->assertRedirect('/superheroes'); $hero=Superhero::firstOrFail(); $old=$hero->photo_path;
  Storage::disk('public')->assertExists($old);
  $this->get('/superheroes/'.$hero->id)->assertOk()->assertSee('Test Hero');
  unset($data['photo']); $this->put('/superheroes/'.$hero->id,array_merge($data,['hero_name'=>'Updated Hero']))->assertRedirect();
  $this->assertEquals($old,$hero->fresh()->photo_path);
  $data['photo']=UploadedFile::fake()->image('replacement.png'); $this->put('/superheroes/'.$hero->id,$data)->assertRedirect();
  Storage::disk('public')->assertExists($old); $new=$hero->fresh()->photo_path;
  $this->delete('/superheroes/'.$hero->id)->assertRedirect(); $this->assertEquals(0,Superhero::count());
  $this->get('/superheroes')->assertDontSee('Test Hero'); $this->get('/superheroes/'.$hero->id)->assertNotFound();
  $this->get('/superheroes/trash')->assertOk()->assertSee('Test Hero');
  Storage::disk('public')->assertExists($old); Storage::disk('public')->assertExists($new);
  $this->post('/superheroes/'.$hero->id.'/restore')->assertRedirect(); $this->assertEquals(1,Superhero::count());
  Storage::disk('public')->assertExists($new);
 }
 public function test_rejects_nonimage_uploads() {
  Storage::fake('public');
  $this->post('/superheroes',['real_name'=>'Test','hero_name'=>'Test','information'=>'Test','photo'=>UploadedFile::fake()->create('file.pdf',20)])->assertSessionHasErrors('photo');
 }
}
