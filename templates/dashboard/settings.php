<div class="section mt-3 text-center">
    <div class="avatar-section">
        <form action="/auth/forms/profile" method="POST" enctype="multipart/form-data">
            <?= $Self->tokenize() ?>
            <a href="javascript:;" class="btn-link">
                <img src="<?= $UserInfo->avatar ?>" alt="<?= $UserInfo->fullname ?>" class="imaged w100 rounded" id="UserInfoAvatar">
                <input type="file" name="MagicUploader" id="MagicUploader" class="d-none">
                <span class="button" id="MagicUploaderBtn"><ion-icon name="camera-outline"></ion-icon></span>
            </a>
        </form>
    </div>
</div>

<div class="listview-title mt-1">Security & 2FA</div>
<ul class="listview image-listview text inset">

    <li>
        <div class="item">
            <div class="in">
                <div>
                    One Time Password
                    <div class="text-muted">
                        enable one-time-password
                    </div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="enable_otp" class="custom-control-input xNotix" value="1" id="enable_otp" <?=  $UserInfo->enable_otp?'checked':'' ?> />
                    <label class="custom-control-label" for="enable_otp"></label>
                </div>
            </div>
        </div>
    </li>

    <li>
        <div class="item">
            <div class="in">
                <div>
                    Device Protection
                    <div class="text-muted">
                        Monitor logins from suspected devices
                    </div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="device_protection" class="custom-control-input xNotix" value="1" id="device_protection" <?=  $UserInfo->device_protection?'checked':'' ?> />
                    <label class="custom-control-label" for="device_protection"></label>
                </div>
            </div>
        </div>
    </li>
    
</ul>



<div class="listview-title mt-1">Notifications</div>
<ul class="listview image-listview text inset">
    <li>
        <div class="item">
            <div class="in">
                <div>
                    SMS Notification
                    <div class="text-muted">
                        Enable SMS notification on account activities
                    </div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="sms_notix" class="custom-control-input xNotix" value="1" id="sms_notix" <?=  $UserInfo->sms_notix?'checked':'' ?> />
                    <label class="custom-control-label" for="sms_notix"></label>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="item">
            <div class="in">
                <div>
                Email Notification
                    <div class="text-muted">
                    Enable Email notification on account activities
                    </div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="email_notix" class="custom-control-input xNotix" value="1" id="email_notix"  <?=  $UserInfo->email_notix?'checked':'' ?> />
                    <label class="custom-control-label" for="email_notix"></label>
                </div>
            </div>
        </div>
    </li>

</ul>