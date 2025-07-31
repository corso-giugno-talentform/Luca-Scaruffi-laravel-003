<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $latestBooks = Book::latest()->take(3)->get();
        return view('books.home', compact('latestBooks'));
    }

    public function manageIndex()
    {
        $libri = Book::all();
        return view('welcome', compact('libri'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFilename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $filenameToStore = time() . '_' . Str::slug(pathinfo($originalFilename, PATHINFO_FILENAME)) . '.' . $extension;

            Storage::disk('public')->putFileAs('images', $file, $filenameToStore);

            $validatedData['image'] = $filenameToStore;
        } else {
            $validatedData['image'] = null;
        }

        Book::create($validatedData);

        return redirect()->route('books.manage.index')->with('success', 'Libro aggiunto con successo!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(StoreBookRequest $request, Book $book)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($book->image && Storage::disk('public')->exists('images/' . $book->image)) {
                Storage::disk('public')->delete('images/' . $book->image);
            }

            $file = $request->file('image');
            $originalFilename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameToStore = time() . '_' . Str::slug(pathinfo($originalFilename, PATHINFO_FILENAME)) . '.' . $extension;

            Storage::disk('public')->putFileAs('images', $file, $filenameToStore);
            $validatedData['image'] = $filenameToStore;
        } elseif ($request->input('clear_image')) {
            if ($book->image && Storage::disk('public')->exists('images/' . $book->image)) {
                Storage::disk('public')->delete('images/' . $book->image);
            }
            $validatedData['image'] = null;
        } else {
            $validatedData['image'] = $book->image;
        }

        $book->update($validatedData);

        return redirect()->route('books.manage.index')->with('success', 'Libro aggiornato con successo!');
    }

    public function destroy(Book $book)
    {
        if ($book->image && Storage::disk('public')->exists('images/' . $book->image)) {
            Storage::disk('public')->delete('images/' . $book->image);
        }

        $book->delete();

        return redirect()->route('books.manage.index')->with('success', 'Libro eliminato con successo!');
    }
}
