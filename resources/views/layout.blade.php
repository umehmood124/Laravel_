<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>@yield('title')</title>
      <script>
          // The function below will start the confirmation dialog
          function confirmAction(e) {

              let confirmAction = confirm("Are you sure you want to delete this customer?");
              if (confirmAction) {
                  // document.write("Successfully Deleted");
                  alert("User Deleted Successfully");
              } else {
                  e.preventDefault();
                  e.stopImmediatePropagation();
                  alert("Stop from deleting");
              }
          }
      </script>

  </head>
<body>

    @include('nav')
    @if(session()->has('message'))
        <div class="alert alert-success container" role="alert">
            {{session()->get('message')}}
        </div>
    @endif


{{--    <script>--}}
{{--        var msg = '{{Session::get('alert')}}';--}}
{{--        var exist = '{{Session::has('alert')}}';--}}
{{--        if(exist){--}}
{{--            prompt("Are you")--}}
{{--            alert(msg);--}}
{{--        }--}}
{{--    </script>--}}

    <div class="div mt-5">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
