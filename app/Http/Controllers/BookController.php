<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Review;

class BookController extends Controller
{
   public function show($bookId)
   {

       $book = Book::with('authors')->findOrFail($bookId); 

       $bookUser = BookUser::where('user_id', auth()->id())
       ->where('book_id', $bookId)
       ->first();

       $reviews = Review::where('book_id', $bookId)
       ->with('user')
       ->get();

       return view('books.bookdetail', compact('book', 'bookUser', 'reviews'));
   }

   public function addToReadingList($bookId)
   {
      $record = BookUser::where('user_id', auth()->id())
         ->where('book_id', $bookId)
         ->first();

      if(!$record) {
         $record = new BookUser([
            'user_id' => auth()->id(),
            'book_id' => $bookId,
            'onReadingList' => true
        ]);
            $record->timestamps = false;
            $record->created_at = now();
            $record->save();
         } else {
            $record->onReadingList = !$record->onReadingList;
            $record->timestamps = false;
            $record->save();
         }

         return redirect()->route('book_detail', $bookId);
      
   }

   public function reserveBook($bookId)
   {
      $record = BookUser::where('user_id', auth()->id())
      ->where('book_id', $bookId)
      ->first();

   if(!$record) {
      $record = new BookUser([
         'user_id' => auth()->id(),
         'book_id' => $bookId,
         'isReserved' => true
     ]);
         $record->save();
      } else {
         $record->isReserved = !$record->isReserved;
         $record->save();
      }

      return redirect()->route('book_detail', $bookId);
   }


   
}
