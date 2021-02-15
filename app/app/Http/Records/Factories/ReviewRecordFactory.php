<?php


namespace App\Http\Records\Factories;


use App\Domain\Models\Review;
use App\Http\Records\ReviewRecord;

class ReviewRecordFactory
{
    public static function crateFromModel(Review  $review)
    {
        $record = new ReviewRecord();
        $record->title = $review->title;
        $record->text = $review->text;
        $record->score = $review->score;
        $record->date = $review->created_at->format('M, Y');

        return $record;
    }
}
