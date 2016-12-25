	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">


		      <ul class="nav nav-tabs">
				  <li ><a href="#">Profile</a></li>
				  <li ><a href="#">Order List</a></li>
				  <li ><a href="{{ route('client.makeOrder') }}">Make Order</a></li>
			</ul>
		</div>

		<div class="col-md-offset-4 col-md-4">
			<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ route('user.logout')}}" ><span class="glyphicon glyphicon-user"></span>log out</a>
					</li>
		      </ul>
		      <p class="navbar-text navbar-right">Signed in as <strong>Client</strong></p>
		</div>

	</div>
</div>