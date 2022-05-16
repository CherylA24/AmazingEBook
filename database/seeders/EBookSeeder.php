<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('e_books')->insert([
            'title'=>'Divergent',
            'author'=>'Veronica Roth',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Pachinko',
            'author'=>'Min Jin Lee',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Men Explain Things to Me',
            'author'=>'Rebecca Solnit',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'The Rest is Noise',
            'author'=>'Alex Ross',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Meaty',
            'author'=>'Samantha Irby',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Moneyball',
            'author'=>'Michael Lewis',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Dangerous Kiss',
            'author'=>'Jackie Collins',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'In Search of Lost Time',
            'author'=>'Marcel Proust',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Ulysses',
            'author'=>'James Joyce',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);

        DB::table('e_books')->insert([
            'title'=>'Don Quixote',
            'author'=>'Miguel de Cervantes',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        ]);
    }
}
