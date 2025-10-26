@include('dashboard.header')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-sub"><span>Account Wallet</span> </div><!-- .nk-block-head-sub -->
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Wallet / Assets</h2>
                        <div class="nk-block-des">
                            <p>Here is the list of your assets!</p>
                        </div>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="nk-block-tools gx-3">

                            <li><a href="{{('deposit')}}" class="btn btn-primary"><span>Deposit</span> <em
                                        class="icon ni ni-arrow-long-right"></em></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#pass"
                                    class="btn btn-dim btn-outline-light"><span>Withdraw</span> <em
                                        class="icon ni ni-arrow-long-right"></em></a></li>
                        </ul>
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="nk-block-head-sm">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">Crypto Accounts</h5>
                    </div>
                </div>
                <div class="row g-gs">
                    <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                        <div class="card card-bordered is-dark">
                            <div class="nk-wgw">
                                <div class="nk-wgw-inner">
                                    <a class="nk-wgw-name" href="#">
                                        <div class="nk-wgw-icon is-default">
                                            <em class="icon ni ni-sign-btc"></em>
                                        </div>
                                        <h5 class="nk-wgw-title title">Bitcoin Wallet</h5>
                                    </a>
                                    <div class="nk-wgw-balance">
                                        <div class="amount">{{$btc_balance}}<span
                                                class="currency currency-btc">BTC</span></div>
                                        <div class="amount-sm">{{$user_balance}}<span
                                                class="currency currency-usd">USD</span></div>
                                    </div>
                                </div>
                                <div class="nk-wgw-actions">
                                    <ul>
                                        <li><a href="{{('deposit')}}"><em
                                                    class="icon ni ni-arrow-down-left"></em><span>Deposit</span></a>
                                        </li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#pass"><em
                                                    class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                        <div class="card card-bordered">
                            <div class="nk-wgw">
                                <div class="nk-wgw-inner">
                                    <a class="nk-wgw-name" href="#">
                                        <div class="nk-wgw-icon">
                                            <em class="icon ni ni-sign-eth"></em>
                                        </div>
                                        <h5 class="nk-wgw-title title">Ethereum Wallet</h5>
                                    </a>
                                    <div class="nk-wgw-balance">
                                        <div class="amount">{{$eth_balance}}<span
                                                class="currency currency-eth">ETH</span></div>
                                        <div class="amount-sm">{{$user_balance}}<span
                                                class="currency currency-usd">USD</span></div>
                                    </div>
                                </div>
                                <div class="nk-wgw-actions">
                                    <ul>
                                        <li><a href="{{('deposit')}}"><em
                                                    class="icon ni ni-arrow-down-left"></em><span>Deposit</span></a>
                                        </li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#pass"><em
                                                    class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                        <div class="card card-bordered">
                            <div class="nk-wgw">
                                <div class="nk-wgw-inner">
                                    <a class="nk-wgw-name" href="#">
                                        <div class="nk-wgw-icon">
                                            <em class="icon ni ni-b-si"></em>
                                        </div>
                                        <h5 class="nk-wgw-title title">Escrow Account</h5>
                                    </a>
                                    <div class="nk-wgw-balance">
                                         <div class="amount">{{Auth::user()->currency}}{{Auth::user()->update_escrow}}<span
                                                class="currency currency-eth"></span></div>
                                        
                                        <div class="amount">Locked<span class="currency currency-nio"></span></div>
                                        <!--<div class="amount">40.509505<span class="currency currency-nio">NIO</span></div>-->
                                        <!--<div class="amount-sm">8,924.63<span class="currency currency-usd">USD</span></div>-->
                                    </div>
                                </div>
                                <!--<div class="nk-wgw-actions">-->
                                <!--    <ul>-->
                                <!--        <li><a href="{{('deposit')}}"><em class="icon ni ni-arrow-down-left"></em><span>Deposit</span></a></li>-->
                                <!--        <li><a href="crypto/withdraw.php"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>-->
                                <!--    </ul>-->
                                <!--</div>-->

                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head-sm">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title title">Fiat Accounts</h5>
                    </div>
                </div>
                <div class="row g-gs">
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-bordered">
                            <div class="nk-wgw">
                                <div class="nk-wgw-inner">
                                    <a class="nk-wgw-name" href="#">
                                        <div class="nk-wgw-icon is-default">
                                            <em class="icon ni ni-sign-usd"></em>
                                        </div>
                                        <h5 class="nk-wgw-title title">USD Account</h5>
                                    </a>
                                    <div class="nk-wgw-balance">
                                        <div class="amount">0.00<span class="currency currency-usd">USD</span></div>
                                        <div class="amount-sm">0.00<span class="currency currency-usd">USD</span></div>
                                    </div>
                                </div>
                                <div class="nk-wgw-actions">
                                    <ul>
                                        <li><a href="{{('deposit')}}"><em
                                                    class="icon ni ni-arrow-down-left"></em><span>Deposit</span></a>
                                        </li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#pass"><em
                                                    class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-bordered">
                            <div class="nk-wgw">
                                <div class="nk-wgw-inner">
                                    <a class="nk-wgw-name" href="#">
                                        <div class="nk-wgw-icon">
                                            <em class="icon ni ni-sign-eur"></em>
                                        </div>
                                        <h5 class="nk-wgw-title title">EUR Account</h5>
                                    </a>
                                    <div class="nk-wgw-balance">
                                        <div class="amount">Locked<span class="currency currency-eur"></span></div>
                                        <!--<div class="amount">12,495.90<span class="currency currency-eur">EUR</span></div>-->
                                        <!--<div class="amount-sm">12,495.90<span class="currency currency-usd">USD</span></div>-->
                                    </div>
                                </div>
                                <!--<div class="nk-wgw-actions">-->
                                <!--    <ul>-->
                                <!--        <li><a href="{{('deposit')}}"><em class="icon ni ni-arrow-down-left"></em><span>Deposit</span></a></li>-->
                                <!--        <li><a href="crypto/withdraw.php"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-bordered">
                            <div class="nk-wgw">
                                <div class="nk-wgw-inner">
                                    <a class="nk-wgw-name" href="#">
                                        <div class="nk-wgw-icon">
                                            <em class="icon ni ni-sign-chf"></em>
                                        </div>
                                        <h5 class="nk-wgw-title title">CHF Account</h5>
                                    </a>
                                    <div class="nk-wgw-balance">
                                        <div class="amount">Locked<span class="currency currency-eur"></span></div>
                                        <!--<div class="amount">12,495.90<span class="currency currency-eur">EUR</span></div>-->
                                        <!--<div class="amount-sm">12,495.90<span class="currency currency-usd">USD</span></div>-->
                                    </div>
                                </div>
                                <!--<div class="nk-wgw-actions">-->
                                <!--    <ul>-->
                                <!--        <li><a href="{{('deposit')}}"><em class="icon ni ni-arrow-down-left"></em><span>Deposit</span></a></li>-->
                                <!--        <li><a href="crypto/withdraw.php"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
<!-- TradingView Widget END -->

@include('dashboard.footer')