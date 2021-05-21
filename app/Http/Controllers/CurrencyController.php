<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @Route("/home/currencies", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.currencies.index', [
            'currencies' => Currency::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @Route("/home/currencies/create", methods={"GET"})
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @Route("/home/currencies", methods={"POST"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'symbol' => 'required|string|max:10',
                'code' => 'required|string|max:50|unique:currencies,code',
            ]);

            $data = [
                'name' => $request->name,
                'code' => $request->code,
                'symbol' => $request->symbol,
            ];

            $currency = new Currency($data);
            if ($currency->save()) {
                Toastr::success('Currency added successfully!', 'Currency');
                return redirect()->route('home.currencies.index');
            } else {
                Toastr::error('Something went wrong!', 'Currency');
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
     * @Route("/home/currencies/{currency}", methods={"GET"})
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('admin-panel.currencies.show', [
            'currency' => $currency,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @Route("/home/currencies/edit/{currency}", methods={"GET"})
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('admin-panel.currencies.edit', [
            'currency' => $currency
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @Route("/home/currencies/{currency}", methods={"PUT"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'symbol' => 'required|string|max:10',
                'code' => 'required|string|max:50|unique:currencies,code,' . $currency->id,
            ]);

            $data = [
                'name' => $request->name,
                'code' => $request->code,
                'symbol' => $request->symbol,
            ];

            $currency->fill($data);

            if ($currency->save()) {
                Toastr::success('Currency updated successfully!', 'Currency');
                return redirect()->route('home.currencies.index');
            } else {
                Toastr::error('Something went wrong!', 'Currency');
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
     * @Route("/home/currencies/{currency}", methods={"DELETE"})
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        try {
            if ($currency->delete()) {
                Toastr::success('Currency deleted successfully!', 'Currency');
                return redirect()->route('home.currencies.index');
            } else {
                Toastr::error('Something went wrong!', 'Currency');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }
}
