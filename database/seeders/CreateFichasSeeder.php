<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ficha;

class CreateFichasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichas = [
            [
                'file_ficha'=>'300 protecos 453.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 454.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 455.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 456.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 457.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 458.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 459.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 460.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 461.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 462.pdf',
                'monto'=>'300',
            ],
             [
                'file_ficha'=>'300 protecos 463.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 464.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 465.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 466.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 467.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 468.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 469.pdf',
                'monto'=>'300',
            ], [
                'file_ficha'=>'300 protecos 470.pdf',
                'monto'=>'300',
            ],
        ];

        Ficha::insert($fichas);

    }


}
