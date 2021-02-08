<div class="section mt-3 text-center">
    <div class="avatar-section">
        <a href="javascript:;" class="btn-link">
            <img src="/_store/imgs/paycrest.png" class="w-50">
        </a>
    </div>
</div>


<div class="section mb-5 p-2">

    <form action="/auth/forms/profile" method="POST">
        <?= $Self->tokenize() ?>
        <div class="listview-title mt-1">Basic Information</div>
        <div class="card">
            <div class="card-body pb-1">


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="fullname">Fullname</label>
                        <input type="text" required class="form-control" id="fullname" name="fullname" value="<?= $UserInfo->fullname ?>" placeholder="Full Name">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

            </div>
        </div>


        <div class="card mt-5">
            <img src="/_store/imgs/paybar.png" class="imaged w-100">
        </div>

        <div class="my-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Continue Payment</button>
        </div>


    </form>



</div>