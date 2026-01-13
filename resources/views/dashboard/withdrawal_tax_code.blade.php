@include('dashboard.header')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
  /* 🔄 FULL PAGE LOADER */
  #page-loader {
    position: fixed;
    inset: 0;
    background: #0a0f24;
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
  }

  .loader-content {
    text-align: center;
    max-width: 420px;
  }

  .spinner {
    width: 60px;
    height: 60px;
    border: 6px solid rgba(255, 255, 255, 0.2);
    border-top: 6px solid deepskyblue;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: auto;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  #main-content {
    display: none;
  }

  .tax-note {
    background: rgba(255,255,255,0.05);
    border-left: 4px solid deepskyblue;
    padding: 12px;
    border-radius: 8px;
    font-size: 13px;
    color: #cfd6ff;
  }
</style>

<!-- 🔄 TAX VERIFICATION LOADER -->
<div id="page-loader">
  <div class="loader-content">
    <div class="spinner mb-3"></div>
    <h6 class="fw-bold text-info">Initializing Tax Verification</h6>
    <p class="small text-muted mt-2">
      Please wait while we securely connect to our compliance and taxation
      verification system. Do not refresh or close this page.
    </p>
  </div>
</div>

<!-- ✅ MAIN CONTENT -->
<div id="main-content">

  <div class="container my-5">
    <div class="card mx-auto shadow-lg border-0"
         style="border-radius: 20px; max-width: 450px; background: #0a0f24; color: #fff;">

      <div class="card-header text-center pb-0 p-4 border-0" style="background: transparent;">
        <h4 class="fw-bold text-info mb-2">💸 Withdrawal Tax Code Verification</h4>
        <p class="text-muted small mb-0">
          Mandatory tax authorization required before fund release
        </p>
      </div>

      <div class="card-body">

        @if ($errors->any())
    <div class="alert alert-danger text-center">
        {{ $errors->first() }}
    </div>
@endif


        <div class="tax-note mb-3">
          <strong>Regulatory Notice:</strong><br>
          In accordance with international financial regulations and anti-money
          laundering (AML) compliance standards, all withdrawals must undergo
          tax authorization verification prior to processing.
        </div>

        <p class="small text-muted">
          The withdrawal tax code is issued after the applicable withdrawal tax
          has been successfully processed. This verification ensures compliance
          with financial reporting and taxation policies.
        </p>

        <hr style="border-color: rgba(255,255,255,0.1);">

        <form action="{{ route('withdrawal.tax.code') }}" method="POST" class="mt-3">
          @csrf

          <div class="form-group mb-3">
            <label for="withdrawal_code" class="fw-bold mb-2">
              Official Withdrawal Tax Code
            </label>
            <input type="text"
                   name="withdrawal_tax_code"
                   id="withdrawal_code"
                   class="form-control text-center"
                   placeholder="Enter official tax code"
                   style="border-radius: 10px; background: #111933; color: #fff; border: 1px solid #1e2b4a;"
                   required>
          </div>

          <button type="submit"
                  class="btn btn-lg w-100 fw-bold"
                  style="background-color: deepskyblue; border-radius: 10px; color: white;">
            Confirm Tax Verification
          </button>
        </form>

        <div class="tax-note mt-4">
          <strong>Important:</strong><br>
          Failure to complete tax verification may result in delayed or
          restricted access to withdrawal funds in compliance with regulatory
          obligations.
        </div>

        <div class="text-center mt-4">
          <a href="{{ url('crypto') }}"
             class="btn btn-outline-info px-4 py-2 fw-bold"
             style="border-radius: 10px;">
            Return to Dashboard
          </a>
        </div>

      </div>
    </div>
  </div>

</div>

<script>
  // 🔄 Simulated tax verification redirect
  window.addEventListener('load', () => {
    setTimeout(() => {
      document.getElementById('page-loader').style.display = 'none';
      document.getElementById('main-content').style.display = 'block';
    }, 2200);
  });
</script>

@include('dashboard.footer')
