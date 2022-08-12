@extends('layouts.app')

@section('css')
    <style>
        .ajax-loader {
            visibility: visible;
            background-color: rgba(255, 255, 255, 0.7);
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            height: 100%;
        }

        .ajax-loader img {
            position: relative;
            top: 30%;
            left: 10%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="ajax-loader">
            <img src="{{ asset('images/giphy.gif') }}" class="img-responsive" />
        </div>
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

                        {{ __('You are logged in!') }}
                    </div>
                    <br>

                </div>
            </div>
        </div>
        <br><br>
        <div>
            <div>
                <button onClick="refresh(event)">Refresh</button>
            </div>
            <div id="apidata">
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "api/data",
                type: "post",
                // data: {
                //     api_token: {{ Auth::user()->api_token }}
                // },
                beforeSend: function() {
                    $('.ajax-loader').css("visibility", "visible");
                },
                success: function(res) {
                    if (res.code === 200) {
                        $('.ajax-loader').css("visibility", "hidden");
                        $.each(res.data, function(index, value) {
                            $html = `<div>${index}...${value}</div>`
                            $("#apidata").append($html);
                        });
                    }

                }
            })
        })
    </script>
    <script>
        function refresh(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "api/data",
                type: "post",

                beforeSend: function() {
                    $('.ajax-loader').css("visibility", "visible");
                    $("#apidata").html("");
                },
                success: function(res) {

                    if (res.code === 200) {
                        $('.ajax-loader').css("visibility", "hidden");
                        $.each(res.data, function(index, value) {
                            $html = `<div>${index}...${value}</div>`
                            $("#apidata").append($html);
                        });
                    }

                }
            })
        }
    </script>
@endsection
