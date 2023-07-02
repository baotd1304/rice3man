<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CouponCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public $list;
    public $maGiamGia;
    public $chiTiet;
    public $ngayBatDau;
    public $ngayKetThuc;
    public function __construct($maGiamGia=null,$chiTiet=null,$ngayBatDau=null,$ngayKetThuc=null)
    {    
        // $this->list=json_decode($list);
        $this->maGiamGia=$maGiamGia;
        $this->chiTiet=$chiTiet;
        $this->ngayBatDau=$ngayBatDau;
        $this->ngayKetThuc=$ngayKetThuc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        return view('components.coupons-card');
    }
}
