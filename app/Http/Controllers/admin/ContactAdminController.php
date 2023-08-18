<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactAdminRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $listcontact = Contact::orderBy('id', 'DESC')->paginate($perPage);
        return view('admin.contact.index', compact('listcontact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactAdminRequest $request)
    {
        $validatedData = $request->validate([
            'name' => '',
            'logo' => '',
            'email' => '',
            'hotline' => '',
            'address' => '',
            'description' => '',
            'active' => '',
        ]);
        if ($request->has('logo')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->move('upload/images/contact', $fileName);
            $validatedData["logo"] = '/'.$path;
        }
        Contact::create($validatedData);
        return redirect()->route('contact.index')
            ->with('success', 'Tạo thông tin liên hệ thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactAdminRequest $request, $id)
    {
        $contact = Contact::find($id);
        if ($contact==null) {
            $request->session()->flash('thongbao', "Thông tin liên hệ ".$id. " không tồn tại");
            redirect("/thongbao");
        }
        $validatedData = $request->validate([
            'name' => '',
            'logo' => '',
            'email' => '',
            'hotline' => '',
            'address' => '',
            'description' => '',
            'active' => '',
        ]);
        if ($request->has('logo')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->move('upload/images/contact', $fileName);
            $validatedData["logo"] = '/'.$path;
        }
        Contact::where('id', $id)->update($validatedData);
        return redirect()->route('contact.index')
            ->with('success', 'Cập nhật thông tin liên hệ thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('contact.index')
            ->with('success', 'Xoá thông tin liên hệ thành công.');
    }
}
