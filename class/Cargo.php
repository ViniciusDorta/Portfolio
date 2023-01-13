<?php

    class Cargo 
    {

        public static function pegaCargo($cargo)
        {
            $arr = [
                '0' => 'Normal',
                '1' => 'Master',
                '2' => 'Administrador'
            ];

            return $arr[$cargo];
        }

    }