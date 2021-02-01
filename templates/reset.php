
        <div class="section mt-2 text-center">
            <h1><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"><br />Reset Account</h1>
            <h4>Type your Email or Telephone to reset your password</h4>
        </div>
        <div class="section mb-1 p-2">

            <form action="/auth/forms/reset" method="POST">
                <?= $Self->tokenize() ?>
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="username">Email OR Telephone</label>
                                <input type="text" required class="form-control" id="username" name="username" placeholder="Your Email/Telephone">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="form-links mt-2">
                    <div class="GOLOJAN_device_status text-muted"><img src="<?= $assets ?>img/busy.png"><span>Connecting...</span></div>
                    <div><a href="/auth/login" class="text-muted">Login to account</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Account</button>
                </div>

            </form>
        </div>
        <div class="text-center">
            <em>A temporary password will be sent to you</em>
        </div>
