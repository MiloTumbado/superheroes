<?php
namespace Tests\Feature; use Tests\TestCase;
class ExampleTest extends TestCase { public function test_home_redirects() { $this->get('/')->assertRedirect('/superheroes'); } }
