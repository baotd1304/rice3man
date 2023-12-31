<?php

namespace App\View\Components;

use App\Models\category_group;
use App\Models\LoaiSP;
use App\Models\SanPham;
use Illuminate\View\Component;

class AppNavbarMobile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories=[];

    public function __construct()
    {
        $this->categories=LoaiSP::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     * 
     */
    public function render()
    {
        return view('components.app-navbar_mobile');
    }
}
