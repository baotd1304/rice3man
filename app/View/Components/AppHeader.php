<?php

namespace App\View\Components;

use App\Models\category_group;
use App\Models\LoaiSP;
use Illuminate\View\Component;

class AppHeader extends Component{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories=[];
    public $cartFarmApp=[];

    public function __construct()
    {
        
        $this->categories=LoaiSP::get();
        if (isset($_COOKIE["cartFarmApp"])) {
            $json = $_COOKIE["cartFarmApp"];
            $this->cartFarmApp = json_decode($json, true);
        }

        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app-header');
    }
}
