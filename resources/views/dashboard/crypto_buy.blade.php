@include('dashboard.header')
<!-- main header @e -->
<div class="content-page">
    <div class="content">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('crypto_buy') }}">Buy</a>
                    </li>
                </ul>
            </div><!-- .buysell-nav -->
            <div class="text-center mb-4">
                <h2 class="title">Click on the button below to get your Crypto</h2>
            </div><!-- .buysell-title -->
            <div class="card">
                <div class="card-body">
                    <form action="#" class="buysell-form">
                        <div class="form-group">
                            <!-- Additional fields can be added here if needed -->
                        </div><!-- .form-group -->
                        <div class="form-group text-center">
                            <a href="https://www.localbitcoins.com/" class="btn btn-primary btn-lg btn-block mb-3">Buy from Localbitcoin</a>
                            <a href="https://www.bitcoin.com/" class="btn btn-primary btn-lg btn-block mb-3">Buy from Bitcoin.com</a>
                            <a href="https://www.binance.com/" class="btn btn-primary btn-lg btn-block mb-3">Buy from Binance</a>
                            <a href="https://www.crypto.com/" class="btn btn-primary btn-lg btn-block mb-3">Buy from Crypto.com</a>
                        </div><!-- .form-group -->
                    </form><!-- .buysell-form -->
                </div><!-- .card-body -->
            </div><!-- .card -->
        </div><!-- .col-lg-8 -->
    </div><!-- .row -->
</div><!-- .container -->

@include('dashboard.footer')
