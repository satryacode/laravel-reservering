<?php

namespace App\Http\Controllers;

use App\Repositories\Booking\BookingRepository as Booking;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Flight\FlightRepository;
use Auth;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * @var FlightRepository
     */
    private $flight;

    /**
     * @var CustomerRepository
     */
    private $customer;

    /**
     * @var Booking
     */
    private $booking;

    public function __construct(FlightRepository $flight, CustomerRepository $customer, Booking $booking)
    {
        $this->middleware('auth');
        $this->flight = $flight;
        $this->customer = $customer;
        $this->booking = $booking;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $customer = $this->customer->getById($id);

        return view('booking.flight.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $customer = $this->customer->getById($id);
        $flight = $this->flight->addBookingDetail($request, $id);
        \Session::flash('flash_message', 'New flight has been created');

        return redirect()->action('CustomerController@show', [$customer]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->booking->deleteByid($id);
        \Session::flash('flash_message', 'Booking has been deleted');

        return redirect()->back();
    }
}
