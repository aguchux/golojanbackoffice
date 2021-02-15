<!-- Wallet Card -->
<div class="section  mt-4">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title" style="line-height: normal;">Total in Commission</span>
                <h1 class="total"><?= $Core->ToMoney(340900) ?></h1>
            </div>
            <div class="right">
                <a href="#" data-toggle="modal" data-target="#InvitePerson" class="button bg-primary">
                    <img src="/_store/referral-ranks/r1.png" style="margin: 2px;" class="imaged w40 m-3" alt="R1"/>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Wallet Card -->

<div class="section mt-2 mb-2">
    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-stripped table-hovered">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Source</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($referral = mysqli_fetch_object($AccountReferrals)) :  ?>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>