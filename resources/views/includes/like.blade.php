<?php
$data = App\Http\Controllers\LikeController::getLikeViewData($like_item);
?>
<div class="laravel-like">
    <i id="{{ $like_item }}-like"
       class="icon {{ $data[$like_item.'likeDisabled'] }} {{ $data[$like_item.'likeIconOutlined'] }} laravelLike-icon heart up"
       data-item-id="{{ $like_item }}"
       data-vote="1">
    </i>
    <span id="{{ $like_item }}-total-like">{{ $data[$like_item.'total_like'] }}</span>
</div>
