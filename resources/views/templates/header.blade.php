<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teste TecnoFit</title>
        <link rel="stylesheet" href="{{ url('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">
        <style>
            body, html {
                height: 100%;



            }
            .d-flex-wrapper {
                display: flex;
                flex-direction: column;
                min-height: 100vh;



            }
            .flex-grow-1 {
                flex-grow: 1;



            }
            .container {
                margin-top: 20px;


            }
            .card {
                border: 1px solid #ddd;
                border-radius: 0.375rem;
                padding: 20px;


            }
            .card-header {
                background-color: #f8f9fa;
                border-bottom: 1px solid #ddd;
                padding: 10px 20px;
                font-size: 1.25rem;
                font-weight: 500;


            }
            .dl-horizontal dt {
                width: 25%;
                float: left;
                clear: left;
                text-align: right;
                padding-right: 10px;
                font-weight: bold;


            }
            .dl-horizontal dd {
                margin-left: 0;
                margin-bottom: 10px;
                line-height: 1.5;


            }

        </style>
    </head>

    <body class="d-flex-wrapper">
    @include('templates.menu')

    <div class="container flex-grow-1 mt-5">
        @yield('content')
    </div>

    @include('templates.footer')

    <script src="{{ url("assets/js/jquery.js") }}"></script>
    <script src="{{ url("assets/js/index.js") }}"></script>
    <script src="{{ url('assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>

