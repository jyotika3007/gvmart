<div class="dashboard-left-links">

								<a href="{{ url('dashboard') }}" class="user-item @if(!empty($page) && $page=='dashboard'){{'active'}}@endif"><i class="uil uil-apps"></i>My Account</a>

								<a href="{{ url('myOrders') }}" class="user-item @if(!empty($page) && $page=='myOrders'){{'active'}}@endif"><i class="uil uil-box"></i>My Orders</a>

								<a href="{{ url('myBookings') }}" class="user-item @if(!empty($page) && $page=='myBookings'){{'active'}}@endif"><i class="uil uil-box"></i>My Service Bookings</a>

								<!-- <a href="{{ url('myRewards') }}" class="user-item @if(!empty($page) && $page=='myRewards'){{'active'}}@endif"><i class="uil uil-gift"></i>My Rewards</a> -->

								<!-- <a href="{{ url('myWallet') }}" class="user-item @if(!empty($page) && $page=='myWallet'){{'active'}}@endif"><i class="uil uil-wallet"></i>My Wallet</a> -->

								<a href="{{ url('myWishlist') }}" class="user-item @if(!empty($page) && $page=='myWishlist'){{'active'}}@endif"><i class="uil uil-heart"></i>Shopping Wishlist</a>

								<a href="{{ url('myAddress') }}" class="user-item @if(!empty($page) && $page=='myAddress'){{'active'}}@endif"><i class="uil uil-location-point"></i>My Address</a>

								<a href="{{ route('logout') }}" class="user-item"><i class="uil uil-exit"></i>Logout</a>

							</div>