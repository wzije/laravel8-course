<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phones = (new Phone())->filter($request);
        return view('phones.index')->with('phones', $phones);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        try {
            //validasi

            // $phone = new Phone();
            // $phone->name = $request->input('name');
            // $phone->founded = $request->input('founded');
            // $phone->description = $request->input('description');
            // $phone->save();

            // $request->validate([
            // "name" => 'required',
            // "founded" => 'required|max:4'
            // ]);

            Phone::create($request->all());
            return redirect('/phones');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $phone = Phone::find($id);

        return view('phones.detail')->with('phone', $phone);
    }

    public function showByName($name)
    {

        $phone = (new Phone())->findByName($name);

        return view('phones.detail')->with('phone', $phone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = Phone::find($id);
        return view('phones.edit', ['phone' => $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        // $phone = Phone::find($id);
        // $phone->name = $request->input('name');
        // $phone->founded = $request->input('founded');
        // $phone->description = $request->input('description');
        // $phone->save();


        Phone::find($id)->update($request->all());
        return redirect('/phones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        return redirect()->back();
    }
}
