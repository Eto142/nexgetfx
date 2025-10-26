@include('dashboard.header')

<style>
    .card-hover:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<hr>

<center>
    <div class="content-page">   
        <div class="content">
            <h4>My Referrals</h4>
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11 col-md-12 mb-4">
                        <div class="card h-100 card-hover">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <h6 class="text-center font-weight-bold">Referral Program</h6>
                                <p class="text-center">Share your referral link with friends and earn rewards!</p>
                                <a href="" class="text-decoration-none text-primary">Your Referral Link: </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11 col-md-12 mb-4">
                        <div class="card h-100 card-hover">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h6 class="text-danger text-center font-weight-bold">No referrals yet</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>


@include('dashboard.footer')
