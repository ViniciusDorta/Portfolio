<?php

    class Cargo 
    {

        public static $cargos = [
            '0' => 'Normal',
            '1' => 'Administrador',
            '2' => 'Master'
        ];

        public static function pegaCargo($cargo)
        {
            $arr = [
                '0' => 'Normal',
                '1' => 'Administrador',
                '2' => 'Master'
            ];

            return $arr[$cargo];
        }


    }