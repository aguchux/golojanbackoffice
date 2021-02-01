<div class="section mt-2 text-center">
    <h1><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"><br />Back Office</h1>
    <h4>Create new account</h4>
</div>
<div class="section mb-5 p-2">

    <form action="/auth/forms/register" method="POST">
        <?= $Self->tokenize() ?>
        <div class="card">
            <div class="card-body pb-1">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="fullname">Full Name</label>
                        <input type="text" required class="form-control" id="fullname" name="fullname" placeholder="Your Fullname">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Email Address</label>
                        <input type="email" required class="form-control xMonitoredInput" id="email" name="email" placeholder="email@example.com">
                        <i class="clear-input">
                            <ion-icon name="mail-outline"></ion-icon>
                        </i>
                    </div>
                </div>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="mobile">Telephone</label>
                        <input type="tel" required class="form-control xMonitoredInput" id="mobile" name="mobile" placeholder="Your Telephone">
                        <i class="clear-input">
                            <ion-icon name="call-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password">Password</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="Your password">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-links mt-2">
            <div class="GOLOJAN_device_status text-muted"><span>Connecting...</span></div>
            <div><a href="/auth/login" class="text-muted">Registered? Login</a></div>
        </div>

        <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Create Account</button>
        </div>

    </form>



</div>