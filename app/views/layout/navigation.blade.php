		<ul class="navigation">
			<li><a href="{{ URL::route('home') }}">Home</a></li>

			<li><a href="#" target="_self">Menu</a>
				<ul>
					<li><a href="{{ URL::route('menu', array('type'=>'lunch')) }}">Take Away Lunch</a></li>
					<li><a href="{{ URL::route('menu', array('type'=>'dinner')) }}">Dinner</a></li>
				</ul>
			</li>
			<li><a href="{{ URL::route('contact')  }}" >Contact</a></li>
			<li><a href="{{ URL::route('catering') }}">Catering</a></li>

			<li><a href="{{ URL::route('booking') }}" >Booking</a></li>		
		</ul>
