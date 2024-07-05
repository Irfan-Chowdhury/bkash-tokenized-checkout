<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @stack('css')


    <title>@yield('title')</title>
  </head>
  <body class="container mt-2">

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                let errorMessages = @json($errors->all());
                htmlContent = "";
                errorMessages.forEach(function(errorMsg) {
                    htmlContent += '<p class="text-danger">' + errorMsg + '</p>';
                });
                console.log(htmlContent);
                displayErrorMessage(htmlContent);
            });
        </script>
    @endif

    @if(session()->has('success'))
        <script>
            $(document).ready(function() {
                displaySuccessMessage('{{ Session::get('success') }}');
            });
        </script>
    @endif

    <script type="text/javascript" src="{{ asset('vendor/bkash/js/alertMessages.js') }}"></script>
</body>
</html>
