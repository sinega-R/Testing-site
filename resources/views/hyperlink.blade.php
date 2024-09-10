@extends('include.app')
@section('title', 'Hyperlink')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12 pt-1">
            <div class="card p-1">
                <h5 class="p-1">Take me to dashboard</h5>
                <div class="card-body">
 <a href="{{ route('index')}}">Go to Dashboard</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 pt-1">
            <div class="card p-1">
                <h5 class="p-1">Find my destination</h5>
                <div class="card-body">
 <a href="{{ route('alert')}}">Find the URL without clicking me.</a>
                </div>
            </div>
        </div>
        {{-- ...row --}}
    </div>
    {{-- ..row2  --}}
    <div class="row pt-1">
        <div class="col-md-6 col-12 pt-1">
            <div class="card p-1">
                <h5 class="p-1">Duplicate Link</h5>
                <div class="card-body">
 <a href="{{ route('index')}}">Go to Dashboard</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 pt-1">
            <div class="card p-1">
                <h5 class="p-1">Am I broken link?</h5>
                <div class="card-body">
                    <a href="404.html">Find the URL without clicking me.</a>

                </div>

            </div>
        </div>
        {{-- ...row  --}}
    </div>
        {{-- ..row3  --}}
        <div class="row pt-1">
            <div class="col-md-6 col-12 pt-1">
                <div class="card p-1">
                    <h5 class="p-1">Count Links</h5>
                    <div class="card-body">
    <a href="{{ route('drag')}}">How many links in this page?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 pt-1">
                <div class="card p-1">
                    <h5 class="p-1">Count Layout Links</h5>
                    <div class="card-body">
                        <a href="{{route('window')}}">How many links in this layout?</a>

                    </div>

                </div>
            </div>
            {{-- ...row  --}}
        </div>

</div>

@endsection()
