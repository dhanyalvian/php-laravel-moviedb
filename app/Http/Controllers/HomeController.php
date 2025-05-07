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
        $limit = $cfg['limits']['home'];
        
        $data = compact(
            'cfg',
            'nav',
            'limit',
        );

        return view('home', $data);
    }
}
