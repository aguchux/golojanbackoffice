<div class="section mt-2 text-center">
    <h1><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"><br />Back Office</h1>
    <h4>Create new account</h4>
</div>
<div class="section mb-5 p-2">

    <form action="/auth/forms/register" method="POST" autocomplete="off">
        <?= $Self->tokenize() ?>
        <div class="card">
            <div class="card-body pb-1">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="fullname">Full Name</label>
                        <input type="text" required class="form-control" id="fullname" name="fullname" placeholder="Your Fullname" tabindex="1" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Email Address</label>
                        <input type="email" required class="form-control xMonitoredInput" id="email" name="email" placeholder="email@example.com" tabindex="2" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="mail-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="mobile">Telephone</label>
                        <input type="tel" required class="form-control xMonitoredInput" id="mobile" name="mobile" placeholder="Your Telephone" tabindex="3" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="call-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password">Password</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="Your password" tabindex="4">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

            </div>
        </div>

        <div class="listview-title my-2 text-center">Sponsor's Account ID'</div>

        <div class="listview image-listview media inset mb-2 m-0 p-0 ">
            
            <li id="SponsorInfo" class="d-none">
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Photos
                            <div class="text-muted">subtext</div>
                        </div>
                    </div>
                </a>
            </li>

            <div class="card-body pb-1">
                <div class="form-group basic">
                    <div class="input-wrapper">

                        <label class="label" for="sponsor_id">Your Sponsor's ID'</label>
                        <input type="text" style="font-size:200%;" class="form-control" pattern="\d*" id="sponsor_id" name="sponsor" placeholder="Your Sponsor's ID" tabindex="5" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
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