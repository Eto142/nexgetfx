@include('dashboard.header')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container my-5">
  <div class="card mx-auto shadow-lg border-0" 
       style="border-radius: 20px; max-width: 420px; background: #0a0f24; color: #fff;">
       
    <div class="card-header text-center pb-0 p-4 border-0" style="background: transparent;">
      <h4 class="fw-bold text-info mb-2">💸 Withdrawal Code Verification</h4>
      <p class="text-muted small mb-0">Complete your payment and enter your withdrawal code below</p>
    </div>

    <div class="card-body text-center">

      @if (session('status'))
        <div class="alert alert-info" role="alert" style="border-radius: 10px;">
          {{ session('status') }}
        </div>
      @endif

      <div class="my-3">
        <h6 class="text-uppercase text-secondary mb-2">Transaction ID</h6>
        <div class="fw-bold fs-5 text-light">{{ $transaction_id }}</div>
      </div>

      <div class="my-3">
        <h6 class="text-uppercase text-secondary mb-2">Requested Withdrawal Amount</h6>
        <div class="fw-bold fs-5 text-light">
          ${{ number_format($withdraw_amount, 2) }}
        </div>
      </div>

      <div class="my-3">
        <h6 class="text-uppercase text-secondary mb-2"> Withdrawal Charge Amount</h6>
        <div class="fw-bold fs-4 text-success" style="letter-spacing: 0.5px;">
          ${{ number_format($admin_withdrawal_amount, 2) }}
        </div>
      </div>

      <hr style="border-color: rgba(255,255,255,0.1);">

      <p class="text-muted small mt-3">
        After payment, please enter your withdrawal code below to confirm your withdrawal.
      </p>

      {{-- 🔹 Withdrawal Code Input Form --}}
      <form action="{{ url('verify-withdrawal-code') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">

        <div class="form-group mb-3">
          <label for="withdrawal_code" class="fw-bold mb-2">Enter Withdrawal Code</label>
          <input type="text" name="withdrawal_code" id="withdrawal_code" 
                 class="form-control text-center"
                 placeholder="Enter your code here"
                 style="border-radius: 10px; background: #111933; color: #fff; border: 1px solid #1e2b4a;"
                 required>
        </div>

        <button type="submit" class="btn btn-lg w-100 fw-bold" 
                style="background-color: deepskyblue; border-radius: 10px; color: white;">
          Verify Code
        </button>
      </form>

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

<script>
  // Gentle animation for the admin-approved amount
  document.addEventListener('DOMContentLoaded', () => {
    const amountEl = document.querySelector('.text-success');
    if (amountEl) {
      amountEl.style.transition = 'transform 0.6s ease';
      setTimeout(() => {
        amountEl.style.transform = 'scale(1.1)';
        setTimeout(() => { amountEl.style.transform = 'scale(1)'; }, 400);
      }, 300);
    }
  });
</script>

@include('dashboard.footer')
