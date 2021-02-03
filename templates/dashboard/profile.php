<<<<<<< HEAD
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Unclaimed Balance</span>
                        <h1 class="total"><?= $Core->Naira($Wallet->balance) ?></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-toggle="modal" data-target="#depositActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="/dashboard/withdraw" data-toggle="modal" data-target="#withdrawActionSheet">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            <strong>Send</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="app-cards.html">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>Cards</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-toggle="modal" data-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Exchange</strong>
                        </a>
                    </div>

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Open Balance</div>
                        <div class="value text-success"><?= $Core->Naira($Wallet->open) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Closed Balance</div>
                        <div class="value text-danger"><?= $Core->Naira($Wallet->closed) ?></div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Sales</div>
                        <div class="value"><?= $Core->Naira(0) ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Commission</div>
                        <div class="value"><?= $Core->Naira(0) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->
=======
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
>>>>>>> 071533444aa856bd5e2b44c650c351c977000fe7
