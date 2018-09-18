<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>

<!-- MENU -->


<nav class="navbar navbar-main navbar-expand-md navbar-dark fixed-top scrolling-navbar unique-color bg-warning">
    <div class="container">
        <a class="navbar-brand mr-4" href="{{ url('home') }}">
            <h3>Blog</h3>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-normal" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Felhasználó
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('home/myblogs') }}">Saját blogok kezelése</a>
                        <a class="dropdown-item" href="{{ url('home/addblog') }}">Blog felvétele</a>
                        <a class="dropdown-item" href="{{ url('home/logout') }}">Kijelentkezés</a>
                    </div>
                </li>
            </ul>

            <form class="form-inline  ml-2" method="get" action="{{ url('home/search') }}">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Keresés" aria-label="Search">
                </div>
            </form>
        </div>
    </div>
</nav>


<!-- MENU -->

@yield('content')

<!-- SCRIPTS -->

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>


<script>
    function Label(id, text, dbid) {
        this.id = id;
        this.text = text;
        this.dbid = dbid;

        this.show = function () {
            $("#chosenLabels").append("<span class='badge badge-pill light'><p class='text-dark p-0 m-0'>"+ this.text +"<a class='text-danger ml-1 fa fa-times' onclick='del(\""+this.id+"\")'></a></p></span>");
        }

        this.changeId = function(id){
            this.id = id;
        }

    }

    var labels = [];
    var index = 0;

    $("#labels").on("change paste keyup", function() {

        if($(this).val().length > 2) {

            $.ajax({
                url: "{{ url('home/addblog/showlabels') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}'
                    , tag: $(this).val()
                },
                success: function (response) {
                    $("#registeredLabels").html("");
                    for (var i = 0; i < Object.keys(response.labels).length; i++) {
                        $("#registeredLabels").append("<a  onclick='addExistLabel(\""+ response.labels[i].label+"\", \""+ response.labels[i].id + "\")'><span class='badge badge-pill grey lighten-2 mb-2'><p class='text-dark p-0 m-0'>" + response.labels[i].label + "</p></span></a>");
                    }
                },
                error: function () {
                    console.log("Hiba");
                }
            });

        }else{
            $("#registeredLabels").html("");
        }
    });

    function addLabel(e) {
        if(e.keyCode == 13){
            e.preventDefault();
            var input = $( "#labels" );
            labels.push(new Label(index,input.val(), -1));
            index++;
            input.val("");
            refresh();
            //var label = $( "#labels" ).val();
            //label = encodeURI(label);
        }
    }

    function addExistLabel(label, dbid) {
        var input = $("#labels");
        labels.push(new Label(index,label, dbid));
        index++;
        input.val("");
        refresh();

    }

    function sendLabels(){
        $.ajax({
            url: "{{ url('home/addblog/uploadlabels') }}",
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                labelarray: JSON.stringify(labels)
            },
            success: function () {
                console.log("siker")
            },
            error: function () {
                console.log("Hiba");
            }
        });
    }



    function refresh() {
        $("#chosenLabels").html("");
        for(var i = 0; i < labels.length; i++){
            labels[i].show();
        }
        $('#sender').html("<input name='alllabels' type='hidden' value='"+JSON.stringify(labels)+"'>");
    }


    function del(id){
        labels.splice(id, 1);
        for(var i = 0; i < labels.length; i++){
            labels[i].changeId(i);
        }
        refresh();
    }






</script>
</body>
</html>