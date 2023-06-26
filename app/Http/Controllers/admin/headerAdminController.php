<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class headerAdminController extends Controller
{
     // Hiển thị chi tiết đơn hàng
     public function searchFollowCategory($keyword = '')
     {
         $object = $this->querySearchKeywords($keyword);
         return view('admin.header.tests', ['spName' => $object]);
     }
     public function index()
     {
         $Order = new Order();
         $orders = $Order->getAllOrders();
 
         return view('admin.qlyhoadon.index', ['orders' => $orders]);
     }
 
     // tim kiem thong tin 2 ban tu DB va tra ra ket qua la mot JSON
     protected function querySearchKeywords($keyword) {
         $spName = DB::table('sanpham')
             ->where('sanpham.tenSP', 'LIKE', "%" . $keyword . "%")
             ->get();
             
         $tenNgDungName = DB::table('nguoidung')
             ->where('nguoidung.sdt', $keyword)->get();
                     //TODO: lam them tim kiem cho nhung bang khac neu co
          
         if(!empty($tenNgDungName) && count($spName) != 0) {
             return $tenNgDungName;
         }    
         if(!empty($spName) && count($spName) > 0) {
             return $spName;
         }
         else {
             return ['Not Found keyword ' . $keyword];
         }
     }
 
     // check column of each tables
     protected function checkKeyValue($object) {
         if(isset($object['idSP'])) {
             return $object['idSP'];
         }
         else if(isset($object['tenSP'])) {
             return $object['tenSP'];
         }
         else if(isset($object['ten'])) {
             return $object['ten'];
         }
         else if(isset($object['sdt'])) {
             return $object['sdt'];
         }else
             return 'Not Found';
     }
}
