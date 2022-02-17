<div class="user-dt">
							<div class="user-img">
								<img src="images/avatar/img-5.jpg" alt="">
								<div class="img-add">	
									<input type="file" id="file">
									<label for="file"><i class="uil uil-camera-plus"></i></label>
								</div>
							</div>
							<h4>{{ ucfirst(auth()->user()->name ?? '') }}</h4>
							<p>{{ auth()->user()->email ?? '' }}
								<!-- <a href="#"><i class="uil uil-edit"></i></a> -->
							</p>
							<!-- <div class="earn-points"><img src="images/Dollar.svg" alt="">Points : <span>20</span></div> -->
						</div>