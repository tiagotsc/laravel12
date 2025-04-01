<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allStatusBD = DB::table('status')->pluck('name')->toArray();
        $status = [
            [
                'name' => 'Aberto',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Em Análise',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Finalizado',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Cancelado',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ];

        foreach($status as $st){
            if(!in_array($st['name'], $allStatusBD)){
                DB::table('status')->insert($st);
            }
        }
    }
}
