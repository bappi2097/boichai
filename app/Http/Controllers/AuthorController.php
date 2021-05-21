<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @Route("/home/authors", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.authors.index', [
            'authors' => Author::with('country')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @Route("/home/authors/create", methods={"GET"})
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.authors.create', [
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @Route("/home/authors", methods={"POST"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'address' => 'required|string',
                'country_id' => 'required|exists:countries,id',
            ]);

            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'country_id' => $request->country_id,
            ];

            $author = new Author($data);

            if ($author->save()) {
                Toastr::success('Author added successfully!', 'Author');
                return redirect()->route('home.authors.index');
            } else {
                Toastr::error('Something went wrong!', 'Author');
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
     * @Route("/home/authors/{author}", methods={"GET"})
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('admin-panel.authors.show', [
            'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @Route("/home/authors/edit/{author}", methods={"GET"})
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin-panel.authors.edit', [
            'countries' => Country::orderBy('name')->get(),
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @Route("/home/authors/{author}", methods={"PUT"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'address' => 'required|string',
                'country_id' => 'required|exists:countries,id',
            ]);

            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'country_id' => $request->country_id,
            ];

            $author->fill($data);

            if ($author->save()) {
                Toastr::success('Author updated successfully!', 'Author');
                return redirect()->route('home.authors.index');
            } else {
                Toastr::error('Something went wrong!', 'Author');
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
     * @Route("/home/authors/{author}", methods={"DELETE"})
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        try {
            if ($author->delete()) {
                Toastr::success('Author deleted successfully!', 'Author');
                return redirect()->route('home.authors.index');
            } else {
                Toastr::error('Something went wrong!', 'Author');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }
}
