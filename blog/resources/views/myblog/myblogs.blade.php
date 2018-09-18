@extends('layouts.main')

@section('content')


    <section class="container my-5">
        <div class="mt-10">
            <h2 class="h1-responsive font-weight-bold my-5 text-center">Saját blogjaim</h2>

            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p>{{ $errors->first() }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

                <div class="row">
                    @forelse($blogs as $blog)

                        <div class="col-lg-12 col-xl-6 mb-4">

                            <div class="card">

                                <div class="card-header">
                                    <div class="row">
                                    <div class="col-10">
                                        <h4 class="card-title"><a>{{ $blog->title }}</a></h4>
                                    </div>
                                    <div class="col-2">
                                        <form method="post">
                                        <a class="grow text-warning mr-2 fa fa-pencil" href="{{ url('home/myblogs/'.$blog->id) }}"></a>
                                        <a class="grow text-danger font-weight-bold fa fa-remove" href="{{ url('home/myblogs/delete/'.$blog->id) }}"></a>
                                        </form>
                                    </div>
                                    </div>

                                </div>
                                <div class="card-body">

                                    <!-- Text -->
                                    <p class="card-text">{{ $blog->text }}</p>

                                </div>
                            </div>

                        </div>

                    @empty

                        <p class="text-center h4-responsive text-muted">Nincs még blog bejegyzés</p>

                    @endforelse

                </div>

        </div>
    </section>

@stop