<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   

    public function testLogin(){

    	$this->get('/login')->assertStatus(200);
    }
    public function testRegister(){

    	$this->get('/register')->assertStatus(200);
    }
}
