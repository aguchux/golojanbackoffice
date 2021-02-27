<div class="section mt-3 text-center">
    <div class="avatar-section FlashGlow_<?= $UserInfo->accid ?>">
        <a href="javascript:;" style="position: relative;" class="xClickAble">
            <img src="<?= $UserInfo->avatar ?>" alt="<?= $UserInfo->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $UserInfo->accid ?>" data-sponsor="<?= $UserInfo->sponsor ?>">
            <p class="text-muted my-0 d-none" id="info_box_<?= $UserInfo->accid ?>"><?= "<strong>Email:</strong> {$UserInfo->email}<br/><strong>Mobile:</strong> {$UserInfo->mobile}<br/><strong>Joined:</strong> {$UserInfo->created}" ?></p>
            <p class="text-primary"><?= "{$UserInfo->fullname}<br/>({$UserInfo->accid})" ?></p>
        </a>
    </div>
</div>

<hr />

<?php if (count($Level1)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 1</h3>
            </div>
            <div class="row">

                <?php foreach ($Level1 as $level1) : $L1U = $Core->UserInfo($level1); ?>

                    <div class="col-6">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble" data-toggle="tooltip" data-html="true" title="<?= "<strong>Email:</strong> {$L1U->email}<br/><strong>Mobile:</strong> {$L1U->mobile}<br/><strong>Joined:</strong> {$L1U->created}" ?>">
                                <img src="<?= $L1U->avatar ?>" alt="<?= $L1U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L1U->accid ?>" data-sponsor="<?= $L1U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L1U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L1U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L1U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L1U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L1U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L1U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L1U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L1U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L1U->accid ?>"><?= "<strong>Email:</strong> {$L1U->email}<br/><strong>Mobile:</strong> {$L1U->mobile}<br/><strong>Joined:</strong> {$L1U->created}" ?></p>
                                <p class="text-primary"><?= "{$L1U->fullname}<br/>({$L1U->accid})" ?></p>
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>
<?php endif; ?>

<?php if (count($Level2)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 2</h3>
            </div>
            <div class="row">

                <?php foreach ($Level2 as $level2) : $L2U = $Core->UserInfo($level2); ?>

                    <div class="col-3">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L2U->avatar ?>" alt="<?= $L2U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L2U->accid ?>" data-sponsor="<?= $L2U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L2U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L2U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L2U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L2U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L2U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L2U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L2U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L2U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L2U->accid ?>"><?= "<strong>Email:</strong> {$L2U->email}<br/><strong>Mobile:</strong> {$L2U->mobile}<br/><strong>Joined:</strong> {$L2U->created}" ?></p>
                                <p class="text-primary"><?= "{$L2U->fullname}<br/>({$L2U->accid})" ?></p>
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (count($Level3)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 3</h3>
            </div>
            <div class="row">


                <?php foreach ($Level3 as $level3) : $L3U = $Core->UserInfo($level3); ?>

                    <div class="col-3">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L3U->avatar ?>" alt="<?= $L3U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L3U->accid ?>" data-sponsor="<?= $L3U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L3U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L3U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L3U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L3U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L3U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L3U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L3U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L3U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L3U->accid ?>"><?= "<strong>Email:</strong> {$L3U->email}<br/><strong>Mobile:</strong> {$L3U->mobile}<br/><strong>Joined:</strong> {$L3U->created}" ?></p>
                                <p class="text-primary"><?= "{$L3U->fullname}<br/>({$L3U->accid})" ?></p>
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>


<?php if (count($Level4)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 4</h3>
            </div>
            <div class="row">

                <?php foreach ($Level4 as $level4) : $L4U = $Core->UserInfo($level4); ?>

                    <div class="col-3">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L4U->avatar ?>" alt="<?= $L4U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L4U->accid ?>" data-sponsor="<?= $L4U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L4U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L4U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L4U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L4U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L4U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L4U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L4U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L4U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L4U->accid ?>"><?= "<strong>Email:</strong> {$L4U->email}<br/><strong>Mobile:</strong> {$L4U->mobile}<br/><strong>Joined:</strong> {$L4U->created}" ?></p>
                                <p class="text-primary"><?= "{$L4U->fullname}<br/>({$L4U->accid})" ?></p>
                           </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>


<?php if (count($Level5)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 5</h3>
            </div>
            <div class="row">

                <?php foreach ($Level5 as $level5) : $L5U = $Core->UserInfo($level5); ?>

                    <div class="col-3 FlashGlow">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L5U->avatar ?>" alt="<?= $L5U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L5U->accid ?>" data-sponsor="<?= $L5U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L5U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L5U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L5U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L5U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L5U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L5U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L5U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L5U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L5U->accid ?>"><?= "<strong>Email:</strong> {$L5U->email}<br/><strong>Mobile:</strong> {$L5U->mobile}<br/><strong>Joined:</strong> {$L5U->created}" ?></p>
                                <p class="text-primary"><?= "{$L5U->fullname}<br/>({$L5U->accid})" ?></p>
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (count($Level6)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 6</h3>
            </div>
            <div class="row">

                <?php foreach ($Level6 as $level6) : $L6U = $Core->UserInfo($level6); ?>

                    <div class="col-3 FlashGlow">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L6U->avatar ?>" alt="<?= $L6U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L6U->accid ?>" data-sponsor="<?= $L6U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L6U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L6U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L6U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L6U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L6U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L6U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L6U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L6U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L6U->accid ?>"><?= "<strong>Email:</strong> {$L6U->email}<br/><strong>Mobile:</strong> {$L6U->mobile}<br/><strong>Joined:</strong> {$L6U->created}" ?></p>
                                <p class="text-primary"><?= "{$L6U->fullname}<br/>({$L6U->accid})" ?></p>
                           </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (count($Level7)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 7</h3>
            </div>

            <div class="row">


                <?php foreach ($Level7 as $level7) : $L7U = $Core->UserInfo($level7); ?>

                    <div class="col-3 FlashGlow">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L7U->avatar ?>" alt="<?= $L7U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L7U->accid ?>" data-sponsor="<?= $L7U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L7U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L7U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L7U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L7U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L7U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L7U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L7U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L7U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L7U->accid ?>"><?= "<strong>Email:</strong> {$L7U->email}<br/><strong>Mobile:</strong> {$L7U->mobile}<br/><strong>Joined:</strong> {$L7U->created}" ?></p>
                                <p class="text-primary"><?= "{$L7U->fullname}<br/>({$L7U->accid})" ?></p>
                           </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (count($Level8)) : ?>
    <div class="section mt-3 text-center">
        <div class="card p-3">
            <div class="text-center">
                <h3 class="text-muted">Level 8</h3>
            </div>

            <div class="row">

                <?php foreach ($Level8 as $level8) : $L8U = $Core->UserInfo($level8); ?>

                    <div class="col-3 FlashGlow">
                        <div class="avatar-section">
                            <a href="javascript:;" class="xClickAble">
                                <img src="<?= $L8U->avatar ?>" alt="<?= $L8U->fullname ?>" class="imaged w100 rounded FlashGlow" id="<?= $L8U->accid ?>" data-sponsor="<?= $L8U->sponsor ?>" data-up1="<?= $Core->GetUpliner($L8U->accid, 1) ?>" data-up2="<?= $Core->GetUpliner($L8U->accid, 2) ?>" data-up3="<?= $Core->GetUpliner($L8U->accid, 3) ?>" data-up4="<?= $Core->GetUpliner($L8U->accid, 4) ?>" data-up5="<?= $Core->GetUpliner($L8U->accid, 5) ?>" data-up6="<?= $Core->GetUpliner($L8U->accid, 6) ?>" data-up7="<?= $Core->GetUpliner($L8U->accid, 7) ?>" data-up8="<?= $Core->GetUpliner($L8U->accid, 8) ?>">
                                <p class="text-muted my-0 d-none" id="info_box_<?= $L8U->accid ?>"><?= "<strong>Email:</strong> {$L8U->email}<br/><strong>Mobile:</strong> {$L8U->mobile}<br/><strong>Joined:</strong> {$L8U->created}" ?></p>
                                <p class="text-primary"><?= "{$L8U->fullname}<br/>({$L8U->accid})" ?></p>
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>



<div class="section mb-5 text-center"></div>