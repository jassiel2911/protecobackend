<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
class CreateCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = [
                [
                    'nombre'=>'Python Básico',
                    'semestre'=>'22-1',
                    'fecha_inicio'=>'2021-11-11',
                    'fecha_fin'=>'2021-11-14',
                    'hora_inicio'=> '03:34',
                    'hora_fin'=> '09:34',
                    'dias'=>'L-V',
                    'antecedentes'=>'ninguno',
                    'equipo'=>'computadora propia',
                    'tipo'=>'intersemestral',
                    'precio_unam'=>'500',
                    'precio_ext'=>'600',
                    'precio_gral'=>'700',
                    'temario'=>'Temario_AWS_22-1.xlsx',
                    'imagen'=>'ImagenAWS.svg',
                    'cat'=>'programación',
                    'nivel'=>'basico',
                    'cupo'=>'40',
                    'titular'=>DB::table('users')->pluck('id'),
                    'inscritos'=>'0',
                    'publicado'=>'0',

                ],
        ];

        Curso::insert($cursos);


    }
}
