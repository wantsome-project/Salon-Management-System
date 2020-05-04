<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Service([
            'price' => '100'
        ]);
        $service->save();

        $service = new Service([
            'price' => '65'
        ]);
        $service->save();

        $service = new Service([
            'price' => '70'
        ]);
        $service->save();

        $service = new Service([
            'price' => '25'
        ]);
        $service->save();

        $service = new Service([
            'price' => '50'
        ]);
        $service->save();
    }
}
