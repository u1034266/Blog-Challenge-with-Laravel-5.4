@extends('layouts.publicHomeTemplate')

@section('title','Public Home Page')

@section('content')

    {{--container for 10 posts in different categories--}}
    <div>
        <h2>All Recent Blogs</h2>

        @if(count($posts) == 0 && Auth::Check())
            <p><em>There are currenly no blogs to display. Please login and create a blog.</em></p>
        @else
            @foreach($posts as $post)
                {{--Note: Later Uncomment to show only active posts--}}
                @if(Auth::Check())
                    <div class="well well-lg">
                        <h3><a href="{{ route('posts.show', ['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
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
                            <em><small>Posted Date: {{ date_format($post->created_at, 'jS F Y g:ia') }}</small></em><br>
                            <em><small>Active: @if( $post->active == 1 ) <button class="btn btn-xs btn-success">Yes</button> @else <button class="btn btn-xs btn-danger">No</button> @endif</small></em>
                        </p>
                        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                        <p>{{ $post->body }}</p>
                    </div>
                @elseif(Auth::guest())
                    @if($post->active == 1)
                        <div class="well well-lg">
                            <h3><a href="{{ route('posts.show', ['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
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
                    @endif
                @endif
            @endforeach
        @endif

        <div class="row text-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection