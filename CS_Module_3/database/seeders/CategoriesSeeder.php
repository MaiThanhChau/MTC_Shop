<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = new categories();
        $categories->name = 'Túi da';
        $categories->catParent_id = 1;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Cặp da';
        $categories->catParent_id = 1;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Balo da';
        $categories->catParent_id = 1;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Ví da';
        $categories->catParent_id = 1;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Thắt lưng da';
        $categories->catParent_id = 1;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Dày da';
        $categories->catParent_id = 1;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Dây đồng hồ';
        $categories->catParent_id = 1;
        $categories->save();



        $categories = new categories();
        $categories->name = 'Clutch cầm tay';
        $categories->catParent_id = 2;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Ví da';
        $categories->catParent_id = 2;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Balo da';
        $categories->catParent_id = 2;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Túi đeo chéo';
        $categories->catParent_id = 2;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Túi da';
        $categories->catParent_id = 2;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Dày da';
        $categories->catParent_id = 2;
        $categories->save();

        $categories = new categories();
        $categories->name = 'Cặp da';
        $categories->catParent_id = 2;
        $categories->save();
        
        $categories = new categories();
        $categories->name = 'Thắt lưng';
        $categories->catParent_id = 2;
        $categories->save();
    }
}
