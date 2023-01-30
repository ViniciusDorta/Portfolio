<?php

    class Cargo 
    {

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