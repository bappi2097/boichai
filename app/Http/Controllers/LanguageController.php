<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @Route("/home/languages", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.languages.index', [
            'languages' => Language::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @Route("/home/languages/create", methods={"GET"})
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @Route("/home/languages", methods={"POST"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'local_name' => 'required|string|max:100',
                'code' => 'required|string|max:50|unique:languages,code',
            ]);

            $data = [
                'name' => $request->name,
                'local_name' => $request->local_name,
                'code' => $request->code,
            ];

            $language = new Language($data);
            if ($language->save()) {
                Toastr::success('Language added successfully!', 'Language');
                return redirect()->route('home.languages.index');
            } else {
                Toastr::error('Something went wrong!', 'Language');
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
     * @Route("/home/languages/{language}", methods={"GET"})
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return view('admin-panel.languages.show', [
            'language' => $language,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @Route("/home/languages/edit/{language}", methods={"GET"})
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin-panel.languages.edit', [
            'language' => $language
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @Route("/home/languages/{language}", methods={"PUT"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'local_name' => 'required|string|max:100',
                'code' => 'required|string|max:50|unique:languages,code,' . $language->id,
            ]);

            $data = [
                'name' => $request->name,
                'local_name' => $request->local_name,
                'code' => $request->code,
            ];

            $language->fill($data);

            if ($language->save()) {
                Toastr::success('Language updated successfully!', 'Language');
                return redirect()->route('home.languages.index');
            } else {
                Toastr::error('Something went wrong!', 'Language');
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
     * @Route("/home/languages/{language}", methods={"DELETE"})
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        try {
            if ($language->delete()) {
                Toastr::success('Language deleted successfully!', 'Language');
                return redirect()->route('home.languages.index');
            } else {
                Toastr::error('Something went wrong!', 'Language');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }
}
