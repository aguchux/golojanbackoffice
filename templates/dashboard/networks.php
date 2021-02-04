<div class="section mt-3 text-center">
    <div class="avatar-section">
        <a href="javascript:;" class="btn-link">
            <img src="<?= $UserInfo->avatar ?>" alt="<?= $UserInfo->fullname ?>" class="imaged w100 rounded"><br /><?= "{$UserInfo->fullname}<br/>({$UserInfo->accid})" ?>
        </a>
    </div>
</div>

<hr />

<div class="section mt-3 text-center">

    <div class="row">

        <?php foreach ($Level1 as $level1) : $L1U = $Core->UserInfo($level1); ?>

            <div class="col-6">
                <div class="avatar-section">
                    <a href="javascript:;" class="btn-link">
                        <img src="<?= $L1U->avatar ?>" alt="<?= $L1U->fullname ?>" class="imaged w100 rounded"><br /><?= "{$L1U->fullname}<br/>({$L1U->accid})" ?>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

    <hr>
    <div class="row">

        <?php foreach ($Level2 as $level2) : $L2U = $Core->UserInfo($level2); ?>

            <div class="col-3">
                <div class="avatar-section">
                    <a href="javascript:;" class="btn-link">
                        <img src="<?= $L2U->avatar ?>" alt="<?= $L2U->fullname ?>" class="imaged w100 rounded"><br /><?= "{$L2U->fullname}<br/>({$L2U->accid})" ?>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <hr>

    <div class="row">

        <?php foreach ($Level3 as $level3) : $L3U = $Core->UserInfo($level3); ?>

            <div class="col-3">
                <div class="avatar-section">
                    <a href="javascript:;" class="btn-link">
                        <img src="<?= $L3U->avatar ?>" alt="<?= $L3U->fullname ?>" class="imaged w100 rounded"><br /><?= "{$L3U->fullname}<br/>({$L3U->accid})" ?>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <hr>

    <div class="row">

        <?php foreach ($Level4 as $level4) : $L4U = $Core->UserInfo($level4); ?>

            <div class="col-3">
                <div class="avatar-section">
                    <a href="javascript:;" class="btn-link">
                        <img src="<?= $L4U->avatar ?>" alt="<?= $L4U->fullname ?>" class="imaged w100 rounded"><br /><?= "{$L4U->fullname}<br/>({$L4U->accid})" ?>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>


    <hr>

<div class="row">

    <?php foreach ($Level5 as $level5) : $L5U = $Core->UserInfo($level5); ?>

        <div class="col-3">
            <div class="avatar-section">
                <a href="javascript:;" class="btn-link">
                    <img src="<?= $L5U->avatar ?>" alt="<?= $L5U->fullname ?>" class="imaged w100 rounded"><br /><?= "{$L5U->fullname}<br/>({$L5U->accid})" ?>
                </a>
            </div>
        </div>

    <?php endforeach; ?>

</div>


<hr>

<div class="row">

    <?php foreach ($Level6 as $level6) : $L6U = $Core->UserInfo($level6); ?>

        <div class="col-3">
            <div class="avatar-section">
                <a href="javascript:;" class="btn-link">
                    <img src="<?= $L6U->avatar ?>" alt="<?= $L6U->fullname ?>" class="imaged w100 rounded"><br /><?= "{$L6U->fullname}<br/>({$L6U->accid})" ?>
                </a>
            </div>
        </div>

    <?php endforeach; ?>

</div>

</div>