<?php

namespace Apps;

class mlm
{

    static public $accid;
    public function __construct()
    {
    }
}

class upgrade
{

    public $accid;
    public $level;
    public $nextlevel;
    public function __construct($accid)
    {
        $this->accid = $accid;
        $Core = new Core;
        $User = $Core->UserInfo($accid);
      
        $_level = $User->level;
        $next_level = $_level + 1;
        $this->level = $_level;
        $this->nextlevel = $next_level;

        


    }
}

class Commission
{


    public $order;

    public $accid;
    public $amount;

    private $bc = b2b_commission; //30%
    private $rc = referral_commission;
    private $mc = merchant_commisiion;

    private $sc;
    private $nc;

    private $bc_accid; //30%
    private $sc_accid;
    private $rc_accid;
    private $mc_accid;

    private $naccid_1;
    private $naccid_2;
    private $naccid_3;
    private $naccid_4;
    private $naccid_5;
    private $naccid_6;
    private $naccid_7;

    private $naccid_1_ammount;
    private $naccid_2_ammount;
    private $naccid_3_ammount;
    private $naccid_4_ammount;
    private $naccid_5_ammount;
    private $naccid_6_ammount;
    private $naccid_7_ammount;

    private $naccid_1_c;
    private $naccid_2_c;
    private $naccid_3_c;
    private $naccid_4_c;
    private $naccid_5_c;
    private $naccid_6_c;
    private $naccid_7_c;

    private $bc_amount;
    private $sc_amount;
    private $rc_amount;
    private $mc_amount;
    private $nc_amount;

    public function __construct($order)
    {
        $Core = new Core;
        $Order = $Core->OrderInfo($order);
        $this->order = $order;

        // Calculate Products//
        $productid = $Order->productid;
        $Product = $Core->Productinfo($productid);
        $bulk = $Product->bulkprice;
        // Calculate Products//

        $Payees = $Core->OrderCommissioners($order);
        $amount = $Order->amount;
        $freemoney = (float) $amount - $bulk;

        //Get Store Owner Level Info//
        $this->sc =  $Core->SalesLevelCommission($Payees->store_owner);
        //Get Store Owner Level Info//

        // Base Commission//
        $this->bc_accid = root_accid;
        $this->bc_amount =  round((($this->bc / 100) * $freemoney), 2);
        // Base Commission//

        //Referral Commission//
        $this->rc_accid = $Payees->store_owner_referrer;
        $this->rc_amount =  round((($this->rc / 100) * $freemoney), 2);
        //Referral Commission//

        //Merchant Commission//
        $this->mc_accid = $Payees->merchant_referrer;
        $this->mc_amount =  round((($this->mc / 100) * $freemoney), 2);
        //Merchant Commission//

        //Sales Commission//
        $this->sc_accid = $Payees->store_owner;
        $this->sc_amount =  round((($this->sc / 100) * $freemoney), 2);
        //Sales Commission//

        //Network Commission//
        $spentcommissions = $this->bc + $this->rc + $this->mc + $this->sc;
        $networkcommission = round(100 - $spentcommissions, 2);

        $this->nc =  round((($this->sc / 100) * $freemoney), 0);
        //Network Commission//

        $spentmoney = $this->bc_amount + $this->rc_amount + $this->mc_amount + $this->sc_amount;

        $networkmoney = $freemoney - $spentmoney;
        $this->nc_amount = $networkmoney;

        //Get Networkers//
        $this->naccid_1 = $Core->GetUpliner(1);
        if ($this->naccid_1 == 0) {
            $this->naccid_1 = root_accid;
            $this->naccid_1_c = level_1_upliner_commission;
        } else {
            $this->naccid_1_c = level_1_upliner_commission;
            $this->naccid_1_ammount =  round((($this->naccid_1_c / 100) * $networkmoney), 2);
        }

        $this->naccid_2 = $Core->GetUpliner(2);
        if ($this->naccid_2 == 0) {
            $this->naccid_2 = root_accid;
            $this->naccid_2_c = level_2_upliner_commission;
        } else {
            $this->naccid_2_c =  $Core->SalesLevelCommission($this->naccid_2);
            $this->naccid_2_ammount =  round((($this->naccid_2_c / 100) * $networkmoney), 2);
        }

        $this->naccid_3 = $Core->GetUpliner(3);
        if ($this->naccid_3 == 0) {
            $this->naccid_3 = root_accid;
            $this->naccid_3_c = level_3_upliner_commission;
        } else {
            $this->naccid_3_c =  level_3_upliner_commission;
            $this->naccid_3_ammount =  round((($this->naccid_3_c / 100) * $networkmoney), 2);
        }

        $this->naccid_4 = $Core->GetUpliner(4);
        if ($this->naccid_4 == 0) {
            $this->naccid_4 = root_accid;
            $this->naccid_4_c = level_4_upliner_commission;
        } else {
            $this->naccid_4_c = level_4_upliner_commission;
            $this->naccid_4_ammount =  round((($this->naccid_4_c / 100) * $networkmoney), 2);
        }

        $this->naccid_5 = $Core->GetUpliner(5);
        if ($this->naccid_5 == 0) {
            $this->naccid_5 = root_accid;
            $this->naccid_5_c = level_5_upliner_commission;
        } else {
            $this->naccid_5_c = level_5_upliner_commission;
            $this->naccid_5_ammount =  round((($this->naccid_5_c / 100) * $networkmoney), 2);
        }

        $this->naccid_6 = $Core->GetUpliner(6);
        if ($this->naccid_6 == 0) {
            $this->naccid_6 = root_accid;
            $this->naccid_6_c = level_6_upliner_commission;
        } else {
            $this->naccid_6_c = level_6_upliner_commission;
            $this->naccid_6_ammount =  round((($this->naccid_6_c / 100) * $networkmoney), 2);
        }

        $this->naccid_7 = $Core->GetUpliner(7);
        if ($this->naccid_7 == 0) {
            $this->naccid_7 = root_accid;
            $this->naccid_7_c = level_7_upliner_commission;
        } else {
            $this->naccid_7_c = level_7_upliner_commission;
            $this->naccid_7_ammount =  round((($this->naccid_7_c / 100) * $networkmoney), 2);
        }

        //Get Networkers//


        return true;
    }

    public function payout()
    {
        $this->payB2B($this->bc_accid, $this->bc_amount, $this->order);
        $this->payRC($this->rc_accid, $this->rc_amount, $this->order);
        $this->payMC($this->mc_accid, $this->mc_amount, $this->order);
        $this->paySC($this->sc_accid, $this->sc_amount, $this->order);

        $this->payNet($this->naccid_1, $this->naccid_1_ammount, $this->order);
        $this->payNet($this->naccid_2, $this->naccid_2_ammount, $this->order);
        $this->payNet($this->naccid_3, $this->naccid_3_ammount, $this->order);
        $this->payNet($this->naccid_4, $this->naccid_4_ammount, $this->order);
        $this->payNet($this->naccid_5, $this->naccid_5_ammount, $this->order);
        $this->payNet($this->naccid_6, $this->naccid_6_ammount, $this->order);
        $this->payNet($this->naccid_7, $this->naccid_7_ammount, $this->order);

        return true;
    }





    public function payB2B($accid, $amount, $order)
    {
        $Core = new Core;
        $paid = $Core->CreditWallet($accid, $amount);
        if ($paid) {

            //Send Mail//
            if ($Core->UserInfo($accid, "email_notix")) {
            }
            //Send Mail//

            //Send SMS//
            if ($Core->UserInfo($accid, "sms_notix")) {
            }
            //Send SMS//

        }
    }



    public function payRC($accid, $amount, $order)
    {
        $Core = new Core;
        $paid = $Core->CreditWallet($accid, $amount);
        if ($paid) {

            //Send Mail//
            if ($Core->UserInfo($accid, "email_notix")) {
            }
            //Send Mail//

            //Send SMS//
            if ($Core->UserInfo($accid, "sms_notix")) {
            }
            //Send SMS//

        }
    }
    public function payMC($accid, $amount, $order)
    {
        $Core = new Core;
        $paid = $Core->CreditWallet($accid, $amount);
        if ($paid) {

            //Send Mail//
            if ($Core->UserInfo($accid, "email_notix")) {
            }
            //Send Mail//

            //Send SMS//
            if ($Core->UserInfo($accid, "sms_notix")) {
            }
            //Send SMS//

        }
    }
    public function paySC($accid, $amount, $order)
    {
        $Core = new Core;
        $paid = $Core->CreditWallet($accid, $amount);
        if ($paid) {

            //Send Mail//
            if ($Core->UserInfo($accid, "email_notix")) {
            }
            //Send Mail//

            //Send SMS//
            if ($Core->UserInfo($accid, "sms_notix")) {
            }
            //Send SMS//

        }
    }



    public function payNet($accid, $amount, $order)
    {
        $Core = new Core;
        $level = $Core->UserInfo($accid, "level");
        if ($level <= 7) {
            $paid = $Core->CreditWallet($accid, $amount);
            if ($paid) {

                //Send Mail//
                if ($Core->UserInfo($accid, "email_notix")) {
                }
                //Send Mail//

                //Send SMS//
                if ($Core->UserInfo($accid, "sms_notix")) {
                }
                //Send SMS//

            }
        }
    }
}
