@extends('homepage.app')

@section('content')

<section>
    <div class="gap2 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row merged20" id="page-contents">
                        <div class="col-lg-12">
                            <div class="central-meta">
                                <div class="title-block">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="align-left">
                                                <h5>{{ trans('homepage.follower') }}<span>{{ count($users) }}</span></h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row merged20">
                                                <div class="col-lg-7 col-lg-7 col-sm-7">
                                                    <form method="post">
                                                        <input type="text" >
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="central-meta padding30">
                                <div class="row">
                                    @foreach ($users as $user)
                                        @if ($user->follows != Null)
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="friend-box">
                                                    <figure>
                                                        <img src="{{ asset('bower_components/blog_template/images/resources/frnd-cover1.jpg') }}" alt="">
                                                    </figure>
                                                    <div class="frnd-meta">
                                                        @foreach ($user->images as $image)
                                                            <img class="list_image" src="{{ asset($image->image_url) }}"  alt="">
                                                        @endforeach
                                                        <div class="frnd-name">
                                                            <a href="#" title="">{{ $user->username }}</a>
                                                        </div>
                                                        <ul class="frnd-info">
                                                            <li><span>{{ trans('homepage.follower') }}:</span> {{ $total }}</li>
                                                            <li><span>{{ trans('homepage.post') }}:</span> {{ $user->total_story }}</li>
                                                        </ul>
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        @if (Auth::id()->follows->following_id == $user->id )
                                                            <button type="submit" action="{{ route('follow.destroy', $user->id)}}" class="btn btn-danger remove">{{ trans('homepage.unfollow') }}</button>
                                                        @else
                                                            <button type="submit" id="follow" action="{{ route('follow.add', $user->id)}}" class="btn btn-danger">{{ trans('homepage.follow') }}</button>
                                                            <button type="submit" id="unfollow" action="{{ route('follow.destroy', $user->id)}}" class="btn btn-danger remove">{{ trans('homepage.unfollow') }}</button>
                                                        @endif
                                                        <div class="more-opotnz">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                            <ul>
                                                                <li><a href="#" title="">{{ trans('homepage.hide_friend') }}</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="lodmore">
                                    <button class="btn-view btn-load-more"></button>
                                </div>
                            </div>
                        </div>	
                    </div>	
                </div>
            </div>
        </div>
    </div>	
</section>

@endsection