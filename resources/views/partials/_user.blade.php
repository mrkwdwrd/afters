<nav class="user">
    <ul>
        @if(auth()->user())
        <li  class="account"><a href="{!! url('/account') !!}" title="Your account">Account</a></li>
        <li class="logout"><a href="{!! url('/logout') !!}"  title="Logout">Logout</a></li>
        @else
        <li class="register"><a href="{!! url('/register') !!}" title="Create an account" >Register</a></li>
        <li class="login"><a href="{!! url('/login') !!}" title="Login to your account">Login</a></li>
        @endif
        <li class="checkout">
            <a href="{!! url('/cart') !!}" title="Checkout">Your Cart</a>
            @include('partials._cart')
        </li>
    </ul>
</nav>