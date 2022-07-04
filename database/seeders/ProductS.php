<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Hydro Pants',
                'price'=>'10',
                'description'=>'ADV Endurance Hydro Pants are durable',
                'category'=>'Pants',
                'main_categories'=>'Men',
                'gallery'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdtWhGm5uqROphuJzIcv4a96epjIqYc0ey8g&usqp=CAU'
            ],
            [
                'name'=>'Versace Jackets',
                'price'=>'10',
                'description'=>'Jacket',
                'category'=>'Jackets',
                'main_categories'=>'Women',
                'gallery'=>'https://www.versace.com/dw/image/v2/ABAO_PRD/on/demandware.static/-/Sites-ver-master-catalog/default/dw0eee3137/original/90_1005501-1A03534_5X000_10_RoyalRebellionJacket-Jackets-versace-online-store_1_1.jpg?sw=450&sh=632&sm=fit&sfrm=jpg'
            ],
            [
                'name'=>'Tanming Women Hooded',
                'price'=>'60',
                'description'=>'Removable Hooded Faux Leather Jackets',
                'category'=>'Jackets',
                'main_categories'=>'Women',
                'gallery'=>'https://m.media-amazon.com/images/I/71INuTkDtJL._AC_UX342_.jpg'
            ],
            [
                'name'=>'GUESS Womens Coats',
                'price'=>'30',
                'description'=>'Jackets',
                'category'=>'Jackets',
                'main_categories'=>'Women',
                'gallery'=>'https://img.guess.com/image/upload/f_auto,q_auto:eco,fl_strip_profile,dpr_1.5,fl_advanced_resize,fl_progressive,w_392,c_scale/v1/NA/Style/ECOMM/W2GL08L0P70-G64X-ALT1'
            ],            
            [
                'name'=>'Winter Kids Jackets',
                'price'=>'20',
                'description'=>'Winter Kids Jackets',
                'category'=>'Jackets',
                'main_categories'=>'Kids',
                'gallery'=>'https://5.imimg.com/data5/SELLER/Default/2021/4/VD/UD/AO/21288657/cn-jackets-21-c-500x500.png'
            ],            
            [
                'name'=>'Toddler Kids Winter Coat',
                'price'=>'10',
                'description'=>'3D Bear Ear Hooded Padded Jacket Outfit Body Boys Girls Warm Clothes Outerwear',
                'category'=>'Jackets',
                'main_categories'=>'Kids',
                'gallery'=>'https://www.mother.ly/wp-content/uploads/legacy-images/primary-kids-winter-coat-sale-0.jpg'
            ]

        ]);
    }
}
