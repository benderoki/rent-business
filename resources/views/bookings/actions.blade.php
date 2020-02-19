@if($booking->startable())
    <form method="POST" action="{{ route('web.bookings.start', ['booking' => $booking]) }}">
        <button class="btn btn-success" type="submit">
            @csrf
            Start
        </button>
    </form>
    <form method="POST" action="{{ route('web.bookings.notifyAboutBooking', ['booking' => $booking]) }}">
        <button class="btn btn-success" type="submit">
            @csrf
            Notify about booking
        </button>
    </form>
@endif
@if($booking->cancelable())
    <form method="POST" action="{{ route('web.bookings.cancel', ['booking' => $booking]) }}">
        <button class="btn btn-danger" type="submit">
            @csrf
            Cancel
        </button>
    </form>
@endif
@if($booking->completable())
    <form method="POST" action="{{ route('web.bookings.complete', ['booking' => $booking]) }}">
        <button class="btn btn-warning" type="submit">
            @csrf
            Complete
        </button>
    </form>
@endif
