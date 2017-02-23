@extends('layouts.viewPostTemplate')

@section('title','View Posts #'. $id)

@section('content')
    <div class="row">
        <a href="/">Return to Home Page</a>
    </div>
    <div class="well well-lg">
        <h1>{{ $post->title }}</h1>
        <?php
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            if ($post->user_id == $user->id) {
                $authorName = $user->name;
            }
        }
        ?>
        <p>
            <em><small>Author: {{ $authorName }}</small></em><br>
            <em><small>Posted Date: {{ date_format($post->created_at, 'jS F Y g:ia') }}</small></em>
        </p>
        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
        <p>{{ $post->body }}</p>
    </div>
@endsection