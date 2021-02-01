
        <div class="section mt-2 text-center">
            <h1><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"><br />Confirm OTP</h1>
            <h4>We sent OTP to your Mobile and Email address.</h4>
        </div>
        <div class="section mb-1 p-2">

            <form action="/auth/forms/otp" method="POST">
                <?= $Self->tokenize() ?>
                <div class="card bg-transparent">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <input type="text" required aria-required="true" class="form-control verification-input" id="otp" name="otp" placeholder="••••••" maxlength="<?= otp_code_digits ?>">
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div class="GOLOJAN_device_status text-muted"><img src="<?= $assets ?>img/busy.png"><span>Connecting...</span></div>
                    <div><a href="/auth/login" class="text-muted">Login to account</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Confirm OTP</button>
                </div>

            </form>
        </div>

