<?php

use Illuminate\Database\Seeder;

class LovSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['par_id' => 0, 'def_id' => '00-SEX', 'val_id'=>'1', 'val_dsc'=>'Male'],
            ['par_id' => 0, 'def_id' => '00-SEX', 'val_id'=>'2', 'val_dsc'=>'Female'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'WF', 'val_dsc'=>'Spouse'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'SN', 'val_dsc'=>'Son'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'DT', 'val_dsc'=>'Daughter'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'MT', 'val_dsc'=>'Mother'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'FT', 'val_dsc'=>'Father'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'BT', 'val_dsc'=>'Brother'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'ST', 'val_dsc'=>'Sister'],
            ['par_id' => 0, 'def_id' => 'CTC-RLT', 'val_id'=>'PT', 'val_dsc'=>'Parent / Guardian'],
            ['id'=>11,'par_id' => 0, 'def_id' => 'CTC-CTR', 'val_id'=>'NIG', 'val_dsc'=>'Nigeria'],
            ['id'=>12,'par_id' => 0, 'def_id' => 'CTC-CTR', 'val_id'=>'USA', 'val_dsc'=>'United State Of America'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'AB', 'val_dsc'=>'Abia'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'AD', 'val_dsc'=>'Adamawa'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'AK', 'val_dsc'=>'Akwa Ibom'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'AN', 'val_dsc'=>'Anambra'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'BA', 'val_dsc'=>'Bauchi'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'BY', 'val_dsc'=>'Bayelsa'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'BE', 'val_dsc'=>'Benue'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'BO', 'val_dsc'=>'Borno'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'CR', 'val_dsc'=>'Cross River'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'DE', 'val_dsc'=>'Delta'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'EB', 'val_dsc'=>'Ebonyi'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'ED', 'val_dsc'=>'Edo'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'EK', 'val_dsc'=>'Ekiti'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'EN', 'val_dsc'=>'Enugu'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'FC', 'val_dsc'=>'Federal Capital Territory'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'GO', 'val_dsc'=>'Gombe'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'IM', 'val_dsc'=>'Imo'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'JI', 'val_dsc'=>'Jigawa'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'KD', 'val_dsc'=>'Kaduna'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'KN', 'val_dsc'=>'Kano'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'KT', 'val_dsc'=>'Katsina'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'KE', 'val_dsc'=>'Kebbi'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'KO', 'val_dsc'=>'Kogi'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'KW', 'val_dsc'=>'Kwara'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'LA', 'val_dsc'=>'Lagos'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'NA', 'val_dsc'=>'Nasarawa'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'NI', 'val_dsc'=>'Niger'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'OG', 'val_dsc'=>'Ogun'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'ON', 'val_dsc'=>'Ondo'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'OS', 'val_dsc'=>'Osun'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'OY', 'val_dsc'=>'Oyo'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'PL', 'val_dsc'=>'Plateau'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'RI', 'val_dsc'=>'Rivers'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'SO', 'val_dsc'=>'Sokoto'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'TA', 'val_dsc'=>'Taraba'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'YO', 'val_dsc'=>'Yobe'],
            ['par_id' => 11, 'def_id' => 'CTC-STA', 'val_id'=>'ZA', 'val_dsc'=>'Zamfara'],
            ['par_id' => 12, 'def_id' => 'CTC-STA', 'val_id'=>'AL', 'val_dsc'=>'Alabama'],
            ['par_id' => 12, 'def_id' => 'CTC-STA', 'val_id'=>'AK', 'val_dsc'=>'Alaska'],

        ];

        foreach ($items as $item) {
            \App\Lov::create($item);
        }
    }
}
