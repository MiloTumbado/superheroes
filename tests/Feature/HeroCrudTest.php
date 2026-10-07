<?php
namespace Tests\Feature;
use Tests\TestCase; use Illuminate\Foundation\Testing\RefreshDatabase; use App\Superhero;
class HeroCrudTest extends TestCase { use RefreshDatabase;
 public function test_crud_and_validation() {
  $this->post('/superheroes',[])->assertSessionHasErrors(['real_name','hero_name','photo_url','information']);
  $data=['real_name'=>'Test Person','hero_name'=>'Test Hero','photo_url'=>'https://example.com/hero.jpg','information'=>'Prueba de CRUD'];
  $this->post('/superheroes',$data)->assertRedirect('/superheroes'); $hero=Superhero::firstOrFail();
  $this->get('/superheroes/'.$hero->id)->assertOk()->assertSee('Test Hero');
  $this->put('/superheroes/'.$hero->id,array_merge($data,['hero_name'=>'Updated Hero']))->assertRedirect();
  $this->assertEquals('Updated Hero',$hero->fresh()->hero_name);
  $this->delete('/superheroes/'.$hero->id)->assertRedirect('/superheroes'); $this->assertEquals(0,Superhero::count());
 }
}
