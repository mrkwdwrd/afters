<section class="notification">
    @foreach ($notifications as $notification)
        <div class="notification__container">
            <div class="notification__content">{{ $notification->notification }}</div>
        </div>
    @endforeach
</section>
