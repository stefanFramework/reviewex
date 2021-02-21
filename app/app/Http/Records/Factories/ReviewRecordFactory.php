<?php


namespace App\Http\Records\Factories;


use App\Domain\Models\Review;
use App\Http\Records\ReviewRecord;

class ReviewRecordFactory
{
    public static function crateFromModel(Review  $review, array $tags = [])
    {
        $record = new ReviewRecord();
        $record->id = $review->id;
        $record->title = $review->title;
        $record->text = $review->text;
        $record->score = $review->score;
        $record->date = $review->created_at;
        $record->company = $review->company->name;
        $record->companyCode = $review->company->code;
        $record->businessSector = $review->company->businessSector->name;
        $record->city = $review->company->city;
        $record->state = $review->company->state->name;
        $record->socialScore = $review->social_score;
        $record->likes = $review->likes;
        $record->dislikes = $review->dislikes;
        $record->tags = $tags;

        return $record;
    }
}
