<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Currency;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @Route("/home/books", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.books.index', [
            'books' => Book::with(['authors', 'prices', 'languages'])->latest()->get(),
        ]);
    }

    /**
     * Display a listing of the books bu author.
     * 
     * @Route("/home/books/author/{author}", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function authorBooks(Author $author)
    {
        $books = $author->books;

        return view('admin-panel.books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @Route("/home/books/create", methods={"GET"})
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.books.create', [
            'authors' => Author::orderBy('name')->get(),
            'languages' => Language::orderBy('name')->get(),
            'currencies' => Currency::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @Route("/home/books", methods={"POST"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string',
                'description' => 'required|string',
                'dimention' => 'required|string',
                'publisher_name' => 'required|string',
                'publication_date' => 'required|string',
                'isbn' => 'required|string|unique:books,isbn',
                'quantity' => 'required|numeric',
                'amount' => 'required|array',
                'amount.*' => 'required|numeric',
                'author_id' => 'required|array',
                'author_id.*' => 'required|exists:authors,id',
                'language_id' => 'required|array',
                'language_id.*' => 'required|exists:languages,id',
                'currency_id' => 'required|array',
                'currency_id.*' => 'required|exists:currencies,id',
            ]);

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'dimention' => $request->dimention,
                'publisher_name' => $request->publisher_name,
                'publication_date' => $request->publication_date,
                'isbn' => $request->isbn,
                'quantity' => $request->quantity,
            ];


            $currencies = [];
            foreach ($request->currency_id as $index => $currency_id) {
                $currencies[$currency_id] = [
                    'amount' => $request->amount[$index]
                ];
            }


            $book = new Book($data);

            if ($book->save()) {
                $book->authors()->sync($request->author_id);
                $book->prices()->sync($currencies);
                $book->languages()->sync($request->language_id);
                Toastr::success('Book added successfully!', 'Book');
                return redirect()->route('home.books.index');
            } else {
                Toastr::error('Something went wrong!', 'Book');
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
     * @Route("/home/books/{book}", methods={"GET"})
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book->loadMissing(['authors', 'prices', 'languages']);
        return view('admin-panel.books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @Route("/home/books/edit/{book}", methods={"GET"})
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book->loadMissing(['authors', 'prices', 'languages']);
        return view('admin-panel.books.edit', [
            'book' => $book,
            'authors' => Author::orderBy('name')->get(),
            'languages' => Language::orderBy('name')->get(),
            'currencies' => Currency::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @Route("/home/books/{book}", methods={"PUT"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string',
                'description' => 'required|string',
                'dimention' => 'required|string',
                'publisher_name' => 'required|string',
                'publication_date' => 'required|string',
                'isbn' => 'required|string|unique:books,isbn,' . $book->id,
                'quantity' => 'required|numeric',
                'amount' => 'required|array',
                'amount.*' => 'required|numeric',
                'author_id' => 'required|array',
                'author_id.*' => 'required|exists:authors,id',
                'language_id' => 'required|array',
                'language_id.*' => 'required|exists:languages,id',
                'currency_id' => 'required|array',
                'currency_id.*' => 'required|exists:currencies,id',
            ]);

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'dimention' => $request->dimention,
                'publisher_name' => $request->publisher_name,
                'publication_date' => $request->publication_date,
                'isbn' => $request->isbn,
                'quantity' => $request->quantity,
            ];


            $currencies = [];
            foreach ($request->currency_id as $index => $currency_id) {
                $currencies[$currency_id] = [
                    'amount' => $request->amount[$index]
                ];
            }


            $book->fill($data);

            if ($book->save()) {
                $book->authors()->sync($request->author_id);
                $book->prices()->sync($currencies);
                $book->languages()->sync($request->language_id);
                Toastr::success('Book updated successfully!', 'Book');
                return redirect()->route('home.books.index');
            } else {
                Toastr::error('Something went wrong!', 'Book');
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
     * @Route("/home/books/{book}", methods={"DELETE"})
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            if ($book->delete()) {
                Toastr::success('Book deleted successfully!', 'Book');
                return redirect()->route('home.books.index');
            } else {
                Toastr::error('Something went wrong!', 'Book');
                return back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Exception');
            return back();
        }
    }
    /**
     * Returning the resource.
     * 
     * @Route("/home/books/api/{data}", methods={"GET"})
     * 
     * @return \Illuminate\Http\Response
     */
    public function apiData(Request $request)
    {
        $data = [
            'author' => $request->author,
            'sortBy' => $request->sortBy,
        ];
        if (!empty($data['author'])) {
            $books = Book::whereHas('authors', function ($query) use ($data) {
                $query->whereIn('author_book.author_id', $data['author']);
            })->with(['authors', 'prices', 'languages'])->orderBy($data['sortBy'])->get();
        } else {
            $books = Book::with(['authors', 'prices', 'languages'])->orderBy($data['sortBy'])->get();
        }
        return $books;
    }
}
