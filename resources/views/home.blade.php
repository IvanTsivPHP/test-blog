@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    @include('layouts.post.preview')

                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
@endsection
