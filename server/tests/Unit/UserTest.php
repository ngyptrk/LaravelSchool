<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    protected $expectedSchema = [
        'id'         => 'bigint',
        'name'       => 'varchar',
        'email'      => 'varchar',
        'password'   => 'varchar',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];


    //Létezik-e a tábla
    public function test_exists_users_table()
    {
        // Ellenőrizzük, hogy a tábla létezik
        $this->assertTrue(Schema::hasTable('users'), "A users tábla nem létezik");
    }

    //Megvan-e az összes mező
    public function test_does_the_user_table_contain_all_fields()
    {
        //A felsorolt mezők megvannak-e
        foreach ($this->expectedSchema as $column => $type) {
            # code...
            $this->assertTrue(Schema::hasColumn('users', $column), "A '$column' oszlop nem található a 'users' táblában.");
        }
    }


    //A user tábla oszlopainak és típusainak ellenőrzése

    //Megvan-e a user id alapján?

    //A users tábla rekorjainak száma

    //Létezik-e a user?

    //Jelszó ellenőrzés
}
