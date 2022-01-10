<?php

use Illuminate\Database\Seeder;

class NhomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhom')->insert([
            'nhom_ten' => 'Thịt',
        ]);
        DB::table('nhom')->insert([
            'nhom_ten' => 'Rau',
        ]);
        DB::table('nhom')->insert([
            'nhom_ten' => 'Hoa quả',
        ]);
        DB::table('nhom')->insert([
            'nhom_ten' => 'Thực phẩm khô',
        ]);
    }
}
