<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends BaseController
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $cfg = $this->getConfigApp();
        $nav = $this->getNavMenu('', '');
        $movieMax = 6;
        
        $data = compact(
            'cfg',
            'nav',
            'movieMax',
        );

        return view('home', $data);
    }
}
