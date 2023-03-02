<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function save(Request $request, $bookId)
    {
         
        $this->validate($request, [
            'review' => 'required|max:255'
        ], [
            'review.required' => 'Your review is empty!',
            'review.max' => 'Review must be less than 255 characters.'
        ]);

        $review = new Review;
        $review->user_id = auth()->id();
        $review->book_id = $bookId;
        $review->text = $request->input('review');
        $review->save();

        session()->flash('success_message', 'Review submitted!');
 
        return redirect(route('book_detail', $bookId));
    }
}
