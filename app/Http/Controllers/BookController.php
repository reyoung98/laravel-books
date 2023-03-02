<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookUser;

class BookController extends Controller
{
   public function show($bookId)
   {

       $book = Book::with('authors')->findOrFail($bookId); 

       $bookUser = BookUser::where('user_id', auth()->id())
       ->where('book_id', $bookId)
       ->first();

       return view('books.bookdetail', compact('book', 'bookUser'));
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
            $record->save();
         } else {
            $record->onReadingList = !$record->onReadingList;
            $record->save();
         }

         // if($record->onReadingList) {
         //    session()->flash('success_message','Book added to reading list!');
         // } else {
         //    session()->flash('success_message','Book removed from reading list!');
         // }
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

      // if($record->onReadingList) {
      //    session()->flash('success_message','Book added to reading list!');
      // } else {
      //    session()->flash('success_message','Book removed from reading list!');
      // }
      return redirect()->route('book_detail', $bookId);
   }


   
}
