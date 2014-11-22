<?php

class BookingController extends BaseController {
	
	
	public function getBooking ($date) {
		
		if(Request::ajax()) {
	
		$bookings = DB::Table('bookings')->where('date','=',$date)->get();
		//this route should returns json response
        return Response::json($bookings);
		}  
	}

	public function postBooking () {
	
		if(Request::ajax()) {
		
		$date = Input::get('date');
		$start = Input::get('start');
		$finish = Input::get('finish');
		$tableId = Input::get('tableId');

		$validation = Booking::validate(Input::all());
		
		if($validation->fails()) {
			return Redirect::route('catering')
				->withErrors($validation)
				->withInput(Input::all());
		} else {
		
		DB::table('bookings')->insert(
			array('date' => $date,
				  'start' => $start,
				  'finish' => $finish,
				  'tableId' => $tableId
				  ));
				  
		$booking = new Booking;
		
		$booking->date = $date;
		$booking->start = $start;
		$booking->finish = $finish;
		$booking->tableId = $tableId;

		return Response::json($booking);
		
		}
	}		
	}

	public function index () {
		return View::make('booking');
	}
	
	public function getIndex() {
		$message = ' not booked';
		return View::make('booking.index')
		->with('tables', Table::all())
		->with('message',$message);;

	}
	
	public function store() {
		
		//haven't done validation yet 
		$data = array(
			'name'	=> Input::get('name'),
			'date' => Input::get('date'),
			'time' => Input::get('time'),
			'number' => Input::get('number'),
			'phone' => Input::get('phone')
			);
		
		Mail::send('emails.welcome', $data, function($message)
		{
			$message->from('ian@cosgrove.net.nz', 'Site Admin');
			$message->to('ian@cosgrove.net.nz', 'Ian Cosgrove')->subject('Online booking!');
		});
		
		return View::make('booking.sent');
	}
	
	public function create ($tableId) {
		Return View::make('booking.create')
		->with('tableId',$tableId);
		
	}
	/*
	public function store () {
	
		$date = Input::get('date');
		$start = Input::get('start');
		$finish = Input::get('finish');
		$tableId = Input::get('tableId');
		$guestId = Input::get('guestId');
		$message = $tableId;
		
		$booking = DB::table('bookings')
		->where('start', $start)
		->where('finish', $finish)
		->select('bookings.id')->first();
		
		if($booking == null) {
		DB::table('bookings')->insert(
			array('date' => $date,
				  'start' => $start,
				  'finish' => $finish,
				  'finish' => $finish
				));
		$message = 'booked';
		}
		else{
			$message = 'that table is already booked at that time';
		}
		
		
		return Redirect::Route('booking')
		->with('message',$message);
	}
	
	public function james () {
	
		$hours = array("5:00pm - 6:00pm",
					   "6:00pm - 7:00pm", 
					   "7:00pm - 8:00pm",
					   "8:00pm - 9:00pm");
					   
		$date = Input::get('date');
		
		$bookings = DB::table('bookings')
		->where('date',$date)
		->select('bookings.id',
			     'bookings.start',
				 'bookings.finish'
				 )->get();
	
		return View::make('booking.new')
		->with('date',$date)
		->with('bookings',$bookings)
		->with('hours',$hours);
		
	}
	*/
}





?>