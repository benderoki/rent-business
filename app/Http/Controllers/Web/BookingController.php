<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingStoreRequest;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Rentable\RentableItem;
use App\Services\BookingService;
use App\Services\ClientMessageService;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index');
    }

    public function table()
    {
        $bookings = Booking::with('client', 'rentableItem');

        return Datatables::of($bookings)
            ->addColumn('actions', function (Booking $booking) {
                return view('bookings.actions', [
                   'booking' => $booking,
                ]);
            })
            ->addColumn('actual_cost', function (Booking $booking) {
                return $booking->actual_cost;
            })
            ->make();
    }

    public function create()
    {
        $clients = Client::get();
        $rentableItems = RentableItem::with('rentable')->get();

        return view('bookings.create', [
            'clients' => $clients,
            'rentableItems' => $rentableItems,
        ]);
    }

    public function store(BookingStoreRequest $request)
    {
        $booking = (new BookingService())->create($request->validated());

        return redirect()->route('web.bookings.index');
    }

    public function start(Booking $booking)
    {
        (new BookingService($booking))->start(now());

        return redirect()->route('web.bookings.index');
    }

    public function cancel(Booking $booking)
    {
        (new BookingService($booking))->cancel();

        return redirect()->route('web.bookings.index');
    }

    public function complete(Booking $booking)
    {
        (new BookingService($booking))->complete(now());

        return redirect()->route('web.bookings.index');
    }

    public function notifyAboutBooking(Booking $booking)
    {
        (new ClientMessageService())
            ->create($booking->client, ['message' => 'Your booking is active']);

        return redirect()->route('web.clients.show', ['client' => $booking->client]);
    }
}
