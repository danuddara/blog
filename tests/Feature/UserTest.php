<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\User;

class UserTest extends TestCase
{
    /**
     * There should be an admin user to create and manage content
     *
     * @return void
     */
    public function testisAdmin()
    {
      $response = $this->assertDatabaseHas('users', [
        'is_admin' => 1
      ]);;

      if(!$response){
        $this->assertEmpty($response,'There should be atleaset one admin user' );
      } else {
        $this->assertTrue(true);
      }
    }

  /**
   *  the user table should not have any empty emails
   */
    public function testGotNoEmail()
    {
      $response = $this->assertDatabaseMissing('users', [
        'email' => null
      ]);;

      if(!$response){
        $this->assertEmpty($response,'The email should not be null' );
      } else {
        $this->assertTrue(true);
      }
    }
}
