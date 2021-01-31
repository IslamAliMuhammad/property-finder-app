<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentOption;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PaymentOption::create([
            'option' => 'Cash',
        ]);

        PaymentOption::create([
            'option' => 'Cash or Installment',
        ]);

        PaymentOption::create([
            'option' => 'Installment',
        ]);
    }
}
