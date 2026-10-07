<?php
namespace App\Http\Controllers;
use App\Superhero; use Illuminate\Http\Request;
class SuperheroController extends Controller {
 public function index() { return view('superheroes.index',['heroes'=>Superhero::orderBy('id')->get()]); }
 public function create() { return view('superheroes.create',['hero'=>new Superhero]); }
 public function store(Request $request) { Superhero::create($this->data($request,true)); return redirect()->route('superheroes.index')->with('status','Superhéroe registrado.'); }
 public function show(Superhero $superhero) { return view('superheroes.show',['hero'=>$superhero]); }
 public function edit(Superhero $superhero) { return view('superheroes.edit',['hero'=>$superhero]); }
 public function update(Request $request,Superhero $superhero) { $superhero->update($this->data($request,false)); return redirect()->route('superheroes.show',$superhero)->with('status','Datos actualizados.'); }
 public function destroy(Superhero $superhero) { $superhero->delete(); return redirect()->route('superheroes.index')->with('status','Superhéroe enviado a la papelera. Su fotografía se conserva.'); }
 public function trash() { return view('superheroes.trash',['heroes'=>Superhero::onlyTrashed()->orderBy('id')->get()]); }
 public function restore($id) { Superhero::onlyTrashed()->findOrFail($id)->restore(); return redirect()->route('superheroes.index')->with('status','Superhéroe restaurado.'); }
 protected function data(Request $request,$required) {
  $data=$request->validate(['real_name'=>'required|string|max:255','hero_name'=>'required|string|max:255','information'=>'required|string|max:5000','photo'=>($required?'required':'nullable').'|image|mimes:jpg,jpeg,png,webp|max:4096']);
  unset($data['photo']);
  if($request->hasFile('photo')) $data['photo_path']=$request->file('photo')->store('superheroes','public');
  return $data;
 }
}
