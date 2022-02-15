<header>

    <h1 class="logo display-1">Videogames "world" database</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @auth

    <div id="logged_status">
        <h1>Hello {{ Auth::user() -> name }}!</h1>
        @if (!Auth::user() -> email_verified_at)
        <h6>Please Confirm Your Email!</h6>
        @else
        <b>Account Validated</b>
        @endif
        <span class="blockquote-footer">You are registered from {{ date_format(Auth::user() -> created_at, 'jS F Y') }}</span>
        <hr>
        <a class="btn btn-secondary" href="{{ route('logout') }}">Logout</a>
    </div>

    @else
    
        <div id="user_forms">

            <h1>Login form</h1>
    
            <form action="{{ route('login') }}" method="POST">
    
                @method('POST')
                @csrf
    
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="E-mail"> <br>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password"> <br>
                <input class="btn btn-primary" type="submit" value="LOGIN">
    
            </form>
    
            <h2>If you aren't registered yet, you can do it here.</h2>
    
            <form action="{{ route('register') }}"  method="POST">
    
                @method('POST')
                @csrf
    
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Nome"> <br>
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="E-mail"> <br>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password"> <br>
                <label for="password_confirmation">Password confirm:</label>
                <input type="password" name="password_confirmation" placeholder="Password again"> <br>
                
                <input class="btn btn-success" type="submit" value="REGISTER">
    
            </form>
        </div>

    @endauth

</header>