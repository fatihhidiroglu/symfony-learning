<?php

namespace App\Service;

class NameGenerator {
    public function randomName() {
        $names = [
            'Fatih',
            'Ahmet',
            'Esra',
            'Buse',
        ];

        $index = array_rand($names);

        return $names[$index];
    }
}