<?php

namespace App\Http\Controllers;

use Illuminate\View\View,
    Illuminate\Http\Request;
use App\Models\External\PeopleModel;

class PeopleController extends BaseController
{
    protected function getModel()
    {
        return new PeopleModel();
    }
    
    public function popular(Request $req): view
    {
        $title = 'Popular Peoples';
        $ep = 'peoples';
        $path = 'popular';
        
        $cfg = $this->getConfigApp();
        $nav = $this->getNavMenu($ep, $path);
        $peopleMax = 8;
        $data = compact(
            'cfg',
            'nav',
            'title',
            'path',
            'peopleMax',
        );
        
        return view('peoples/list', $data);
    }
}
