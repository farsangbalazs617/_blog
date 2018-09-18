@extends('layouts.main')

@section('content')


    <section class="container my-5">
        <div class="mt-10">
            <h2 class="h1-responsive font-weight-bold my-5 text-center">Blog létrehozása</h2>

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
                <div class="col-lg-12 mb-5 order-md-last">
                    <form action="{{ url('home/myblogs/edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $blog->id }}">

                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input name="title" type="text" id="title" value="{{ $blog->title }}" class="form-control">
                            <label for="title">Cím:</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-pencil prefix grey-text"></i>
                            <textarea name="text" type="text" id="text" class="form-control md-textarea" rows="6">{{ $blog->text }}</textarea>
                            <label for="text">Szöveg:</label>
                        </div>


                        <div class="text-center mt-4">
                            <button class="btn btn-outline-warning" type="submit">Módosítás<i class="fa fa-edit-o ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop