<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name' => 'CIB',
            'email' => 'cib@cib.com',
            'website' => 'www.cib.com'
        ]);

        Bank::create([
            'name' => 'QNB',
            'email' => 'qnb@qnb.com',
            'website' => 'www.qnb.com'
        ]);

        Bank::create([
            'name' => 'HSBC',
            'email' => 'hsbc@hsbc.com',
            'website' => 'www.hsbc.com'
        ]);
    }
}
