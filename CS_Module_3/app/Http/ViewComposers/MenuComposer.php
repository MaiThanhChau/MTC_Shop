<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\admin\catParents;

class MenuComposer {
    public function compose(View $view)
    {
        $catParents_menu = catParents::all();
        $view->with('catParents_menu', $catParents_menu);
    }
}