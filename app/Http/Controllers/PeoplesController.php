<?php

namespace App\Http\Controllers;

use Illuminate\View\View,
    Illuminate\Http\Request;
use App\Models\Peoples;

class PeoplesController extends BaseController
{
    protected function getModel()
    {
        return new Peoples();
    }
    
    public function popular(Request $req): view
    {
        $title = 'Popular Peoples';
        $path = 'popular';
        // $page = 1;
        // $model = $this->getModel();
        // $records = $model->getPeoplesPopular($page);
        
        $cfg = $this->getConfigApp();
        // $maxpage = $this->getPageMax();
        $data = compact(
            'cfg',
            // 'maxpage',
            'title',
            'path',
            // 'records'
        );
        
        return view('peoples/list', $data);
    }
}
