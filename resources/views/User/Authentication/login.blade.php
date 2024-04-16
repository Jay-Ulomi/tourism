<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>RegistrationForm_v2 by Colorlib</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="registration/css/style.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('registration/images/bg-registration-form-2.jpg');">
        <div class="inner">
            <form action="{{ route('userlogin') }}" method="POST">
                @csrf
                <h3>Login Form</h3>
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-wrapper">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms"> I accept the Terms of Use & Privacy Policy.
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
