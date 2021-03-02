<div class="section mt-2 text-center">
    <h1><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"><br />Back Office</h1>
    <h4>2FA may be required to log in</h4>
</div>
<div class="section mb-5 p-2">

    <form action="/auth/forms/login" method="POST">
        <?= $Self->tokenize() ?>
        <div class="card">
            <div class="card-body pb-1">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="username">Email OR Account ID</label>
                        <input type="text" required class="form-control" id="username" name="username" placeholder="User ID" autocomplete="off" tabindex="1">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password">Password</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="Your password" autocomplete="off" tabindex="2">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-links mt-2">
            <div class="GOLOJAN_device_status text-muted"><span>Connecting...</span></div>
            <div><a href="/auth/reset" class="text-muted">Forgot Password?</a></div>
        </div>


        <div class="row mt-2">
            <div class="col-12 text-center">
                <a href="/auth/register" class="text-70">Not registered? Create account</a>
            </div>
        </div>


        <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
        </div>

    </form>



</div>