<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = [
            /* Sharma Springs */
            [
                'name' => 'Sharma Springs',
                'price' => '2644',
                'type' => \App\Models\Place::TYPE_OFFBEAT,
                'images' => [
                    'img/sharma1.jpg',
                    'img/sharma2.jpg',
                ],
                'city' => 'Bali',
                'country' => 'Indonesia',
                'description' => 'A unique bamboo house and a work of art. Both the river valley view & interior are remarkable, providing such a marvelous feast to the eyes that guests find it extraordinary to live so in touch with nature but in complete luxury',
                'is_kitchen' => true,
                'is_wifi' => false
            ],
            /* Sharma Springs */

            /* Eco Bamboo Home */
            [
                'name' => 'Eco Bamboo Home',
                'price' => '797',
                'type' => \App\Models\Place::TYPE_OFFBEAT,
                'images' => [
                    'img/eco1.jpeg',
                    'img/eco2.jpeg',
                ],
                'city' => 'Bali',
                'country' => 'Indonesia',
                'description' => 'Your perfect little staycation in Bali is right here. We take relaxation seriously. Now more than ever, we can be your safe hide-away from the world epidemic. Special discounts running now!',
                'is_kitchen' => true,
                'is_wifi' => true
            ],
            /* Eco Bamboo Home */

            /* Grand Villa */
            [
                'name' => 'Grand Villa',
                'price' => '2606',
                'type' => \App\Models\Place::TYPE_LUXE,
                'images' => [
                    'img/grand1.jpg',
                    'img/grand2.jpg',
                ],
                'city' => 'Phuket',
                'country' => 'Thailand',
                'description' => 'Perched on a hillside amongst lush tropical greenery, this extremely well-appointed luxury rental earns the name Grand Villa with ease!',
                'is_kitchen' => true,
                'is_wifi' => true
            ],
            /* Grand Villa */

            /* Baan Santisuk */
            [
                'name' => 'Baan Santisuk',
                'price' => '7688',
                'type' => \App\Models\Place::TYPE_LUXE,
                'images' => [
                    'img/baan1.jpg',
                    'img/baan2.jpg',
                ],
                'city' => 'Phuket',
                'country' => 'Thailand',
                'description' => 'Your perfect little staycation in Bali is right here. We take relaxation seriously. Now more than ever, we can be your safe hide-away from the world epidemic. Special discounts running now!',
                'is_kitchen' => true,
                'is_wifi' => true
            ],
            /* Baan Santisuk */
            

            
        ];

        foreach ($places as $place) {
            $p = new \App\Models\Place();
            $p->name = $place['name'];
            $p->price = $place['price'];
            $p->type = $place['type'];
            $p->images = json_encode($place['images']);
            $p->city = $place['city'];
            $p->country = $place['country'];
            $p->description = $place['description'];
            $p->is_kitchen = $place['is_kitchen'];
            $p->is_wifi = $place['is_wifi'];
            $p->save();
        }
    }
}
