@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h5 class="text-center p-4">Benvenuto fra noi {{ Auth::user()->name }}!</h5>
                    <div class="tenor-gif-embed" data-postid="5096213" data-share-method="host" data-aspect-ratio="1.77515" data-width="100%"><a href="https://tenor.com/view/applause-crowd-cheer-clap-hall-gif-5096213">Applause Crowd GIF</a>from <a href="https://tenor.com/search/applause-gifs">Applause GIFs</a></div>
                    <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection