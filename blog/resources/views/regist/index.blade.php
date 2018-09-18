<!DOCTYPE html>
<html lang="{{ config('app.locale') }}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

<!-- LOGIN -->
<section class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 mt-5">

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="card card-body px-5">

                <form action="{{ url('doregist') }}" method="post">
                    @csrf
                    <p class="h4 text-center mb-4">Regisztráció</p>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text" aria-hidden="true"></i>
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name">Felhasználónév</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text" aria-hidden="true"></i>
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email">Email cím</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                        <label for="password">Jelszó</label>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-warning" type="submit">Regisztráció</button>
                    </div>
                    <div class="text-center mt-1">
                        <a class="nav-link font-weight-normal" href="{{ url('/') }}">Vissza</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<!-- /.LOGIN -->

<!-- SCRIPTS -->
<script src="https://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
</body>

</html>
