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
                'monto'=>'500',
            ],
             [
                'file_ficha'=>'300 protecos 454.pdf',
                'monto'=>'500',
            ],
             [
                'file_ficha'=>'300 protecos 455.pdf',
                'monto'=>'500',
            ],
             [
                'file_ficha'=>'300 protecos 456.pdf',
                'monto'=>'500',
            ],
             [
                'file_ficha'=>'300 protecos 457.pdf',
                'monto'=>'1000',
            ],
             [
                'file_ficha'=>'300 protecos 458.pdf',
                'monto'=>'1000',
            ],
             [
                'file_ficha'=>'300 protecos 459.pdf',
                'monto'=>'1000',
            ],
             [
                'file_ficha'=>'300 protecos 460.pdf',
                'monto'=>'1000',
            ],
            
             [
                'file_ficha'=>'300 protecos 461.pdf',
                'monto'=>'600',
            ],
             [
                'file_ficha'=>'300 protecos 462.pdf',
                'monto'=>'600',
            ],
             [
                'file_ficha'=>'300 protecos 463.pdf',
                'monto'=>'600',
            ], [
                'file_ficha'=>'300 protecos 464.pdf',
                'monto'=>'600',
            ], [
                'file_ficha'=>'300 protecos 465.pdf',
                'monto'=>'1200',
            ], [
                'file_ficha'=>'300 protecos 466.pdf',
                'monto'=>'1200',
            ], [
                'file_ficha'=>'300 protecos 467.pdf',
                'monto'=>'1200',
            ], [
                'file_ficha'=>'300 protecos 468.pdf',
                'monto'=>'1200',
            ], [
                'file_ficha'=>'300 protecos 469.pdf',
                'monto'=>'700',
            ], [
                'file_ficha'=>'300 protecos 470.pdf',
                'monto'=>'700',
            ], [
                'file_ficha'=>'300 protecos 471.pdf',
                'monto'=>'700',
            ], [
                'file_ficha'=>'300 protecos 472.pdf',
                'monto'=>'700',
            ], [
                'file_ficha'=>'300 protecos 473.pdf',
                'monto'=>'1400',
            ], [
                'file_ficha'=>'300 protecos 474.pdf',
                'monto'=>'1400',
            ], [
                'file_ficha'=>'300 protecos 475.pdf',
                'monto'=>'1400',
            ], [
                'file_ficha'=>'300 protecos 476.pdf',
                'monto'=>'1400',
            ],
        ];

        Ficha::insert($fichas);

    }


}
