<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @Route("/home/countries", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.countries.index', [
            'countries' => Country::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @Route("/home/countries/create", methods={"GET"})
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @Route("/home/countries", methods={"POST"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'code' => 'required|string|max:50|unique:countries,code',
            ]);

            $data = [
                'name' => $request->name,
                'code' => $request->code,
            ];

            $country = new Country($data);
            if ($country->save()) {
                Toastr::success('Country added successfully!', 'Country');
                return redirect()->route('home.countries.index');
            } else {
                Toastr::error('Something went wrong!', 'Country');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }

    /**
     * Display the specified resource.
     * 
     * @Route("/home/countries/{country}", methods={"GET"})
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('admin-panel.countries.show', [
            'country' => $country,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @Route("/home/countries/edit/{country}", methods={"GET"})
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin-panel.countries.edit', [
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @Route("/home/countries/{country}", methods={"PUT"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'code' => 'required|string|max:50|unique:countries,code,' . $country->id,
            ]);

            $data = [
                'name' => $request->name,
                'code' => $request->code,
            ];

            $country->fill($data);

            if ($country->save()) {
                Toastr::success('Country updated successfully!', 'Country');
                return redirect()->route('home.countries.index');
            } else {
                Toastr::error('Something went wrong!', 'Country');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @Route("/home/countries/{country}", methods={"DELETE"})
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            if ($country->delete()) {
                Toastr::success('Country deleted successfully!', 'Country');
                return redirect()->route('home.countries.index');
            } else {
                Toastr::error('Something went wrong!', 'Country');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }
}
