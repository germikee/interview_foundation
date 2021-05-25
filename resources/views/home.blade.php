@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($token)
                <starred-repos token="{{ $token }}" :repositories="{{ json_encode($repositories ?? '') }}"></starred-repos>
            @else
                <add-github-token></add-github-token>
            @endif
        </div>
    </div>
</div>
@endsection
