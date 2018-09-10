
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login </title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">


    <script src="{{('/js/jquery-3.3.1.min.js')}}"></script>


    <!-- Custom styles for this template -->
    <link href="{{asset('/css/signin.css')}}" rel="stylesheet">
  </head>

  <body class="text-center">

    <form method="POST" action="{{ route('login') }}" class="form-signin">
    @csrf
      <img class="mb-4" src="{{asset('PCC.png')}}" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input  name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                
      <label for="inputPassword" class="sr-only">Password</label>
      
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
        </label>
      </div>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html>
