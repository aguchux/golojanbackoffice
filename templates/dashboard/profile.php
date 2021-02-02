<div class="section mt-3 text-center">
    <div class="avatar-section">
        <a href="javascript:;" class="btn-link">
            <img src="<?= $UserInfo->avatar ?>" alt="<?= $UserInfo->fullname ?>" class="imaged w100 rounded">
            <input type="file" name="MagicUploader" id="MagicUploader" class="d-none">
            <span class="button" id="MagicUploaderBtn">
                <ion-icon name="camera-outline"></ion-icon>
            </span>
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


        <div class="listview-title mt-1">Change Password</div>
        <div class="card">
            <div class="card-body pb-1">


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password">New password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="re_password">Repeat password</label>
                        <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Repeat password">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


            </div>
        </div>


        <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Update Profile</button>
        </div>

    </form>



</div>