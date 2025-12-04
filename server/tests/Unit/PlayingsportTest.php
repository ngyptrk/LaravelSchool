<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class PlayingsportTest extends TestCase
{
    protected $expectedSchema = [
        'id' => 'bigint',
        'studentId' => 'bigint',
        'sportId' => 'bigint',
    ];

    public static function expectedSchemaDataProvider()
    {
        return [
            'id oszlop' => ['id', 'bigint'],
            'studentId oszlop' => ['studentId', 'bigint'],
            'sportId oszlop' => ['sportId', 'bigint'],
        ];
    }

    #[DataProvider('expectedSchemaDataProvider')]
    public function test_does_the_playingsports_table_contain_all_fields_provider(string $column, string $type): void
    {
        //Ellenőrizze, hogy megvannak-e a tábla mezői
        $this->assertTrue(Schema::hasColumn('playingsports', $column), "A '$column' oszlop nem letezik");
    }

    #[DataProvider('expectedSchemaDataProvider')]
    public function test_the_playingsports_table_columns_have_the_expected_types_provider($columnName, $expectedLaravelType)
    {
        //Ellenőrizze, hogy jók-e a típusai

        $actualDbSqlType = Schema::getColumnType('playingsports', $columnName);

        $isTypeMatch = $actualDbSqlType == $expectedLaravelType;
        $this->assertTrue(
            $isTypeMatch,
            "A '{$columnName}' oszlop típusa nem egyezik. Várt: '{$expectedLaravelType}', Kapott DB-típus: '{$actualDbSqlType}'."
        );
    }



    public function test_exists_playingsports_table(): void
    {
        //Ellenőrizze, hogy megvan-e a tábla

        $this->assertTrue(Schema::hasTable('playingsports'), "A playingsports tábla nem létezik");
    }

    public function test_does_the_playingsports_table_contain_all_fields(): void
    {
        //Ellenőrizze, hogy megvannak-e a tábla mezői
        foreach ($this->expectedSchema as $column => $type) {

            $this->assertTrue(Schema::hasColumn('playingsports', $column), "A '$column' oszlop nem letezik");
        }
    }

    public function test_the_playingsports_table_columns_have_the_expected_types()
    {
        //Ellenőrizze, hogy jók-e a típusai

        $columns = Schema::getColumnListing('playingsports');


        $this->assertEmpty(
            array_diff(array_keys($this->expectedSchema), $columns),
            'Hiányzó oszlopok a students táblában.'
        );

        foreach ($this->expectedSchema as $columnName => $expectedLaravelType) {

            $actualDbSqlType = Schema::getColumnType('playingsports', $columnName);

            $isTypeMatch = $actualDbSqlType == $expectedLaravelType;
            $this->assertTrue(
                $isTypeMatch,
                "A '{$columnName}' oszlop típusa nem egyezik. Várt: '{$expectedLaravelType}', Kapott DB-típus: '{$actualDbSqlType}'."
            );
        }
    }
}
