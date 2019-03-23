@extends('userPanel.layout')
@section('content')
    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
                        <img src="userStatic/img/logo.png" class="brand_logo" alt="Logo">
                        <h6 style="color:red">
                            <?php
                                $customer_login_failed = Session::get('customer_login_failed');
                                if($customer_login_failed){
                                    echo($customer_login_failed);
                                    Session::put('customer_login_failed',null);
                                }
                            ?>
                        </h6>
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                    <form action = "/customerlogin" method = "POST">
                        {{csrf_field()}}
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text">Email</span>
							</div>
							<input type="text" name="email" class="form-control input_user"  placeholder="email" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text">Password</span>
							</div>
							<input type="password" name="password" class="form-control input_pass"  placeholder="password" required>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="button" class="btn login_btn">Login</button>
                        </div>
					</form>
				</div>
				
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href = "/customerregister" class="ml-2">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection