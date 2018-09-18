@extends('layouts.main')

@section('content')

    <div class="container mt-10">
        <div class="row">
            @forelse($blogs as $blog)
                @forelse($blog as $singleblog)

                    <div class="col-lg-12 col-xl-6 mb-4">

                        <div class="card">

                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="card-title"><a>{{ $singleblog->title }}</a></h4>
                                    </div>
                                    <div class="col-2">
                                        @forelse($labels as $label)
                                            @if($singleblog->id == $label->blog_id)
                                                <span class='badge badge-pill light mr-auto'><p class='text-dark p-0 m-0'>{{$label->label}}</p></span>
                                            @endif
                                        @empty
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">

                                <!-- Text -->
                                <p class="card-text">{{ $singleblog->text }}</p>

                            </div>
                            <div class="card-footer">
                                <p>Szerző: {{$singleblog->name}}</p>

                            </div>
                        </div>

                    </div>
                @empty
                @endforelse

            @empty

                <p class="text-center h4-responsive text-muted">Nincs a keresésnek megfelelő blog</p>

            @endforelse
        </div>
    </div>


@stop