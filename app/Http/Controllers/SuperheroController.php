<?php
namespace App\Http\Controllers;
use App\Superhero; use Illuminate\Http\Request;
class SuperheroController extends Controller {
 public function index() { return view('superheroes.index',['heroes'=>Superhero::orderBy('id')->get()]); }
 public function create() { return view('superheroes.create',['hero'=>new Superhero]); }
 public function store(Request $request) { Superhero::create($this->data($request)); return redirect()->route('superheroes.index')->with('status','Superhéroe registrado.'); }
 public function show(Superhero $superhero) { return view('superheroes.show',['hero'=>$superhero]); }
 public function edit(Superhero $superhero) { return view('superheroes.edit',['hero'=>$superhero]); }
 public function update(Request $request,Superhero $superhero) { $superhero->update($this->data($request)); return redirect()->route('superheroes.show',$superhero)->with('status','Datos actualizados.'); }
 public function destroy(Superhero $superhero) { $superhero->delete(); return redirect()->route('superheroes.index')->with('status','Superhéroe eliminado.'); }
 protected function data(Request $request) { return $request->validate(['real_name'=>'required|string|max:255','hero_name'=>'required|string|max:255','photo_url'=>'required|url|max:2048','information'=>'required|string|max:5000']); }
}
