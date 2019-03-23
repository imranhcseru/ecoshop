@extends('userPanel.layout')
@section('content')
<br><br>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="userStatic/img/logo.png" class="brand_logo" alt="Logo">
            <h3>Register</h3>
        </div>
        <div class="col-md-9 register-right">
            <div class="row register-form">
                <h3 style="color:red;">
                    <?php 
                        $customer_password_warning = Session::get('customer_password_warning');
                        $customer_email_exist = Session::get('customer_email_exist');
                        if($customer_password_warning){
                            echo $customer_password_warning;
                            Session::put('customer_password_warning',null);
                        }
                        if($customer_email_exist){
                            echo $customer_email_exist;
                            Session::put('customer_email_exist',null);
                        }
                    ?>
                </h3>
                <form action = "/customerregister" method = "post">
                    {{csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name = "firstname"placeholder="First Name *" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"name = "email" placeholder="Your Email *" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"name = "password" placeholder="Password *" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"name = "con_password"  placeholder="Confirm Password *" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control"name = "lastname" placeholder="Last Name *" required />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="20" name="phonenumber" class="form-control" placeholder="Your Phone *" required />
                        </div>
                        <button  type="submit" class="btnRegister">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection