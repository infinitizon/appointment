<?php

use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            ['card_number' => '1123Kste', 'first_name' => 'Awe', 'last_name'=>'Ojo', 'phone'=>'07065725667'
                ,'email'=>'infinitizon@gmail.com','dob'=>date('Y-m-d'), 'sex'=>1
                ,'addr_line_1'=> 'Lagos', 'addr_line_2'=>'Lagos', 'addr_city'=>'Lagos'
                , 'addr_state'=>13, 'addr_country'=>11, 'place_of_origin'=>'Lagos'
                , 'nok_name'=>'Ojo Son', 'nok_address'=>'Lagos', 'nok_relationship'=>8],
            ['card_number' => '12345ABC', 'first_name' => 'Lade', 'last_name'=>'Samuel', 'phone'=>'07065725667'
                ,'email'=>'infinitizon@gmail.com','dob'=>date('Y-m-d'), 'sex'=>1
                ,'addr_line_1'=> 'Lagos', 'addr_line_2'=>'Lagos', 'addr_city'=>'Lagos'
                , 'addr_state'=>15, 'addr_country'=>11, 'place_of_origin'=>'Lagos'
                , 'nok_name'=>'Lade Son', 'nok_address'=>'Lagos', 'nok_relationship'=>9],
            ['card_number' => '4423GSFG', 'first_name' => 'Johnson', 'last_name'=>'Banjo', 'phone'=>'07065725667'
                ,'email'=>'abimbola.hassan@gmail.com','dob'=>date('Y-m-d'), 'sex'=>2
                ,'addr_line_1'=> 'Lagos', 'addr_line_2'=>'Lagos', 'addr_city'=>'Lagos'
                , 'addr_state'=>17, 'addr_country'=>11, 'place_of_origin'=>'Lagos'
                , 'nok_name'=>'Ojo Son', 'nok_address'=>'Lagos', 'nok_relationship'=>10],
        ];
        $clinics = [
            ['name' => 'Antenatal'],
            ['name' => 'Surgical operation'],
            ['name' => 'Out-Patient'],
            ['name' => 'Heart-to-Heart'],
        ];
        $doctors = [
            ['first_name' => 'Abimbola', 'last_name' => 'Hassan', 'phone'=>'07065725667','email'=>'infinitizon@gmail.com',],
            ['first_name' => 'Abisolu', 'last_name' => 'Hassan', 'phone'=>'07062153031','email'=>'preciousbisolu@gmail.com',]
        ];
        $doctors = [
            ['first_name' => 'Abimbola', 'last_name' => 'Hassan', 'phone'=>'07065725667','email'=>'infinitizon@gmail.com',],
            ['first_name' => 'Abisolu', 'last_name' => 'Hassan', 'phone'=>'07062153031','email'=>'preciousbisolu@gmail.com',]
        ];
        foreach ($clients as $item) {
            \App\Client::create($item);
        }
        foreach ($clinics as $clinic) {
            \App\Service::create($clinic);
        }
        foreach ($doctors as $doctor) {
            \App\Employee::create($doctor);
        }
    }
}
