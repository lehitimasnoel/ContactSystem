<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\contacts;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showAddContact(){
        return view('add_contact');
    }
    public function showeditContact($id){

        $contact = contacts::where('contact_id',$id)->get();

        return view('edit_contact',compact('contact'));
    }

    public function index()
    {
       // dd(Auth::user()->name);
        $data = contacts::where('users',auth()->id())->get();
        return view('contact')->with('contacts',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $contact = contacts::insert([
            'contact_name'      => $request->name,
            'company'           => $request->company,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'users'             => auth()->id()
        ]);

        return redirect()->route('contact.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $contact = contacts::where('contact_id',$request->contact_id)->update([
            'contact_name'      => $request->contact_name,
            'company'           => $request->company,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'users'             => auth()->id()
        ]);


        return redirect()->route('contact.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        contacts::where('contact_id',$id)->delete();
        return redirect()->route('contact.show');
    }
}
