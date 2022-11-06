
<nav class="container">
    <ul class="sections row">
        <li class="{!! $current === 'details' ? 'current' :  '' !!}">
            <a href="{!! url('/account/details') !!}" class="Update your account details">Account Details</a>
        </li>
        <li class="{!! $current === 'orders' ? 'current' :  '' !!}">
            <a href="{!! url('/account/orders') !!}" class="View your order history">Order History</a>
        </li>
        <li class="{!! $current === 'address' ? 'current' :  '' !!}">
            <a href="{!! url('/account/addresses') !!}" class="Updates your shipping and billing addresses">Addresses</a>
        </li>
        <li class="{!! $current === 'password' ? 'current' :  '' !!}">
            <a href="{!! url('/account/password') !!}" class="Change your password">Change Password</a>
        </li>
    </ul>
</nav>