<?php

if (!function_exists('generate_indonesian_product_name')) {
    function generate_indonesian_product_name(): string
    {
        $adjectives = [
            'Cepat', 'Baru', 'Kuat', 'Ringan', 'Canggih', 'Modern',
            'Praktis', 'Ekonomis', 'Elegan', 'Multifungsi'
        ];

        $nouns = [
            'Kipas Angin', 'Rice Cooker', 'Kompor Gas', 'Lemari Es', 'Laptop',
            'Smartphone', 'Headset', 'Kamera', 'Blender', 'TV LED'
        ];

        $brands = [
            'Sakura', 'MegaTech', 'IndoElectro', 'Prima', 'SinarMas',
            'Nusantara', 'Andalas', 'GarudaTech', 'Surya', 'ElektronikKu'
        ];

        $adj = $adjectives[array_rand($adjectives)];
        $noun = $nouns[array_rand($nouns)];
        $brand = $brands[array_rand($brands)];

        return "$noun $adj $brand";
    }
}