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
            <h4>pricing</h4>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-11 col-md-12 mb-4">
                
                <a href="{{ url('plans') }}" class="text-decoration-none">
                    <div class="card h-100 card-hover">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h6 class="text-success text-center font-weight-bold">Trading Plans</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-11 col-md-12 mb-4">
                <a href="{{ url('miningplan') }}" class="text-decoration-none">
                    <div class="card h-100 card-hover">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h6 class="text-primary text-center font-weight-bold">Mining Plans</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
        </div>
    </div>
</center>


@include('dashboard.footer')
