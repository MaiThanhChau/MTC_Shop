<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\catParents;

class catParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catParent = new catParents();
        $catParent->name = 'Đồ da Nam';
        $catParent->save();

        $catParent = new catParents();
        $catParent->name = 'Đồ da Nữ';
        $catParent->save();
    }
}
