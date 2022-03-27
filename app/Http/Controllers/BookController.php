<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

class BookController extends Controller
{
    // all books
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    // add book
    public function add(StoreRequest $request)
    {
        $book = new Book([
            'name' => $request->input('name'),
            'author' => $request->input('author')
        ]);
        $book->save();

        return response()->json('The book successfully added');
    }

    // edit book
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    // update book
    public function update($id, UpdateRequest $request)
    {
        $book = Book::findOrfail($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->update();

        return $book;
    }

    // delete book
    public function delete($id)
    {
        $book = Book::findOrfail($id);
        $book->delete();

        return $book;
    }
}