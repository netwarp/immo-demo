<?php

use Illuminate\Database\Seeder;
use App\Models\Property;
use Faker\Factory;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Appartement',
            'Maison',
            'Propriété',
            'Hôtel Particulier',
            'Château',
            'Ferme',
            'Bureau / Commerce',
            'Loft / Atelier',
            'Immeuble',
            'Parking',
            'Terrain',
            'Viager',
            'Chalet',
            'Villa',
            'Autre',
        ];

        $amenities = [
            'Cave',
            'Parking fermé / Box',
            'Jardin',
            'Parquet',
            'Ascenseur',
            'Garage',
            'Balcon',
            'Piscine',
            'Toilettes indépendantes',
            'Rénové',
            'Parking',
            'Terrasse',
            'Cheminée',
            'Air conditionné'
        ];

        $securities = [
            'Gardien',
            'Interphone',
            'Digicode',
        ];

        function getRandomArrayElement($array)
        {
            $randomIndex = array_rand($array);
            $randomElement = $array[$randomIndex];
            return $randomElement;
        }

        for ($i = 0; $i < 50; $i++) {
            $faker = Factory::create();

            $property = new Property;

            $property->service = getRandomArrayElement(['acheter', 'louer']);

            $property->title = $faker->text;

            $property->slug = Str::slug($property->title);


            $cities = ['Paris', 'Lyon', 'Lille'];

            $property->city = getRandomArrayElement($cities);

            $property->description = $faker->text(150);

            $property->price = random_int(150000, 500000);

            $property->surface = random_int(30, 100);

            $property->rooms = random_int(3, 10);

            $property_types = [];
            foreach ($types as $key => $item) {
                $bool = (boolean) random_int(0, 1);
                if ($bool) {
                    $property_types[$item] = 'on';
                }
            }
            $property->types = $property_types;

            $property_amenities = [];
            foreach ($amenities as $key => $item) {
                $bool = (boolean) random_int(0, 1);
                if ($bool) {
                    $property_amenities[$item] = 'on';
                }
            }
            $property->amenties = $property_amenities;

            $property_securities = [];
            foreach ($securities as $key => $item) {
                $bool = (boolean) random_int(0, 1);
                if ($bool) {
                    $property_securities[$item] = 'on';
                }
            }
            $property->securities = $property_securities;

            $property->save();
        }
    }
}
