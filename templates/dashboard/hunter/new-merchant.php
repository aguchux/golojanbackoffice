<div class="section mt-2 text-center">
    <h1><img class="img-responsive" style="height: 130px;" src="<?= $assets ?>img/logo-icon.png" class="logo"><br />Back Office</h1>
    <h4>Create new account</h4>
</div>
<div class="section mb-5 p-2">

    <form action="/auth/forms/newmerchant" method="POST" autocomplete="off">
        <?= $Self->tokenize() ?>

        <div class="listview-title my-2 text-center">Sponsor's Account ID'</div>


        <div class="listview image-listview media inset mb-3 m-0 p-0 ">

            <div class="card-body pb-1">
                <div class="form-group basic">
                    <div class="input-wrapper">

                        <label class="label" for="sponsor_id">Sponsor's ID'</label>
                        <input type="text" style="font-size:200%;" readonly aria-readonly="true" class="form-control" pattern="\d*" id="sponsor_id" name="sponsor" placeholder="Your Sponsor's ID" value="<?= $UserInfo->accid ?>" tabindex="4" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>

                    </div>
                </div>
            </div>

        </div>

        <div class="card">
            <div class="card-body pb-1">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="firstname">First Name</label>
                        <input type="text" required class="form-control" id="firstname" name="firstname" placeholder="First Name" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="lastname">Last Name</label>
                        <input type="text" required class="form-control" id="lastname" name="lastname" placeholder="Last Name" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="businessname">Business Name</label>
                        <input type="text" required class="form-control" id="businessname" name="businessname" placeholder="Business Name" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Email Address</label>
                        <input type="email" required class="form-control xMonitoredInput" id="email" name="email" placeholder="email@example.com" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="mail-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="mobile">Telephone</label>
                        <input type="tel" required class="form-control xMonitoredInput mx-0" id="mobile" name="mobile" placeholder="Telephone" maxlength="10" autocomplete="off">
                        <i class="clear-input">
                            <ion-icon name="call-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="address">Address / Location</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address / Location" autocomplete="off"></textarea>
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="notes">Additional Notes</label>
                        <textarea class="form-control" name="notes" id="notes" placeholder="Additional Notes" autocomplete="off"></textarea>
                        <i class="clear-input">
                            <ion-icon name="person-outline"></ion-icon>
                        </i>
                    </div>
                </div>


            </div>
        </div>

        <div class="transparent mb-5 mt-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg" id="xRegisterButton">Create New Merchant</button>
        </div>


    </form>



</div>