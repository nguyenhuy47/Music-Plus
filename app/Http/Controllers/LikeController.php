<?php

namespace App\Http\Controllers;


use App\Model\Like;
use App\Model\TotalLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function vote(Request $request)
    {
        /* Check if user is loged in*/
        if (!Auth::check()) {
            return response()->json(['flag' => 0]);
        }

        /* Prepare data */
        $userId = Auth::user()->id;
        $itemId = $request->item_id;
        $vote = $request->vote;

        /* Get item's current like, dislike total */
        $totalLike = TotalLike::where('item_id', $itemId)->first();

        /* Get user's vote on this item */
        $like = Like::where(['user_id' => $userId, 'item_id' => $itemId])->first();

        /* Check if users vote on this item exists */
        if ($like != null) {
            if ($like->vote == 1) {    // if previous vote was like
                $totalLike->total_like--;    // decrease item's total like by 1
                $totalLike->total_like = $totalLike->total_like == null ? 0 : $totalLike->total_like;    // set 0 if total like is null
                if ($vote == 1) {    // if current vote is like
                    $vote = 0;    // previous vote and current vote is same so discarde vote
                }
            }
        } else {
            $like = new Like;    // create new like object if previous vote not exists
        }

        /* Update vote data */
        $like->user_id = $userId;
        $like->item_id = $itemId;
        $like->vote = $vote;

        if ($vote == 1) {
            $totalLike->total_like++;    // increase total like if vote is like
        }

        $like->save();        // save like
        $totalLike->save();    //save total like,dislike

        return response()->json(['flag' => 1, 'vote' => $vote, 'totalLike' => $totalLike->total_like]);
    }

    public static function getLikeViewData($item)
    {
        $totalCount = TotalLike::where('item_id', $item)->first();
        if ($totalCount == NULL) {
            $totalCount = new TotalLike;
            $totalCount->item_id = $item;
            $totalCount->total_like = 0;

            $totalCount->save();
        }

        $yourVote = 0; // 0 = Not voted, 1 = Liked, -1 = Disliked
        if (Auth::check()) {
            $checkYourVote = Like::where([
                'user_id' => Auth::user()->id,
                'item_id' => $item
            ])->first();
            if ($checkYourVote != NULL) {
                $yourVote = $checkYourVote->vote;
            }
        }

        $likeDisabled = "";
        if (!Auth::check()) {
            $likeDisabled = "disabled";
        }

        $likeIconOutlined = $yourVote == 1 ? "" : "outline";

        return [
            $item . 'likeDisabled' => $likeDisabled,
            $item . 'likeIconOutlined' => $likeIconOutlined,
            $item . 'total_like' => $totalCount->total_like,
        ];
    }
}
