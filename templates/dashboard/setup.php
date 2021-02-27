        <form action="/auth/forms/updatestore" method="POST" enctype="multipart/form-data">
            <?= $Self->tokenize() ?>
            <div class="section mt-5 px-4 text-center">
                <div class="avatar-section">
                    <a href="javascript:;" class="btn-link">
                        <img src="<?= $UserInfo->avatar ?>" alt="<?= $UserInfo->fullname ?>" class="imaged w100 rounded" id="UserInfoAvatar">
                        <input type="file" name="MagicUploader" id="MagicUpLogoloader" class="d-none">
                        <span class="button" id="MagicUploaderBtn">
                            <ion-icon name="camera-outline"></ion-icon>
                        </span>
                    </a>
                </div>
                <div class="text-primary text-center w-100">Upload Store Logo</div>
            </div>

            <div class="h4 mt-3 text-center">Store Identity</div>
            <ul class="listview image-listview text inset mb-4">

                <div class="card-body pb-1">
                    <div class="form-group basic">
                        <div class="input-wrapper">

                            <label class="label" for="name">Store Name</label>
                            <input type="text" required class="form-control form-control-lg" id="name" name="name" value="<?= $StoreInfo->name ?>" placeholder="Store Name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="xStoreURL">Store URL</label>
                            <input type="text" required class="form-control form-control-lg" id="xStoreURLTxt" name="url" value="<?= $StoreInfo->url ?>" placeholder="Store Url">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        <div class="my-2 p-0 text-successs"><strong> <span class="text-success" id="xStoreURLView">StoreURL</span>.golojan.com</strong></div>
                    </div>
                </div>
            </ul>


            <ul class="listview image-listview text inset mb-5">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Update Store</button>
            </ul>
        </form>