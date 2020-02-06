<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $companies = [
        'РУП "Брестэнерго"',
        'РУП "Витебскэнерго"',
        'РУП "Гомельэнерго"',
        'РУП "Гродноэнерго"',
        'РУП "Минскэнерго"',
        'РУП "Могилевэнерго"',
        'РУП "Белэнергострой-управляющая компания"',
        'РУП "Белтэи"',
        'РУП "Белнипиэнергопром"',
        'РУП "Белэнергосетьпроект"',
    ];
    public function run()
    {
        foreach ( $this->companies as $company ) {
            DB::table('companies')->insert([
                'name' => $company,
            ]);
        }

    }
}
