@include('dashboard.header')

<br><br><br><br>

<center><b><h3>Trading Plans</h3></b></center>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="plan-container bg-gradient-primary">
        <h6>Starter</h6>
        <h4>$500.00 - $0</h4>
        <p>Mininum</p>
        <a href="{{url('deposit')}}" class="btn btn-sm btn-light btn-purchase">Purchase Plan</a>
        <p></p>
        <p></p>
        <p></p>
        <h6>Junior Traders Available To Copy</h6>
      </div>
    </div>
    <div class="col-md-3">
      <div class="plan-container bg-gradient-dark">
        <h6>Pro</h6>
        <h4>$3000.00 - $0</h4>
        <p>Mininum</p>
        <a href="{{url('deposit')}}" class="btn btn-sm btn-light btn-purchase">Purchase Plan</a>
        <p></p>
        <p></p>
        <h6>Pro Traders Available To Copy</h6>
      </div>
    </div>
    <div class="col-md-3">
      <div class="plan-container bg-gradient-warning">
        <h6>Master</h6>
        <h4>$6000.00 - $0</h4>
        <p>Mininum</p>
        <a href="{{url('deposit')}}" class="btn btn-sm btn-light btn-purchase">Purchase Plan</a>
        <p></p>
        <p></p>
        <h6>Master Traders Available To Copy</h6>
      </div>
    </div>
    <div class="col-md-3">
      <div class="plan-container bg-gradient-danger">
        <h6>Premium</h6>
        <h4>$10000.00 - $0</h4>
        <p>Mininum</p>
        <a href="{{url('deposit')}}" class="btn btn-sm btn-light btn-purchase">Purchase Plan</a>
        <p></p>
        <p></p>
        <h6>Expert Traders Available To Copy</h6>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  .plan-container {
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    padding: 40px; /* Increased padding for larger boxes */
    text-align: center;
    color: white;
    transition: transform 0.3s, box-shadow 0.3s;
    min-height: 320px; /* Ensure consistent height for boxes */
  }
  .plan-container:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }
  .bg-gradient-primary {
    background: linear-gradient(45deg, #007bff, #6610f2);
  }
  .bg-gradient-dark {
    background: linear-gradient(45deg, #343a40, #6c757d);
  }
  .bg-gradient-warning {
    background: linear-gradient(45deg, #ffc107, #fd7e14);
  }
  .bg-gradient-danger {
    background: linear-gradient(45deg, #dc3545, #ff073a);
  }
  .btn-purchase {
    margin-top: 20px; /* Increased margin for better spacing */
    border: 2px solid white;
    background-color: transparent;
    color: white;
    transition: background-color 0.3s, color 0.3s;
    font-size: 1rem; /* Adjusted button font size for readability */
    padding: 10px 20px; /* Adjusted button padding */
  }
  .btn-purchase:hover {
    background-color: white;
    color: black;
  }
  .container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }
  .plan-container {
    flex-basis: 23%; /* Adjusted to fit four boxes in a row */
    margin: 20px;
    padding: 20px;
    border-radius: 10px;
  }
  .plan {
    display: block;
    text-align: center;
    text-decoration: none;
    color: inherit;
  }
  .plan h4 {
    font-size: 1.8rem; /* Increased font size for better readability */
    margin-bottom: 20px; /* Increased margin for better spacing */
  }
  .plan h6 {
    font-size: 1.2rem; /* Adjusted font size for better readability */
    margin-bottom: 15px; /* Increased margin for better spacing */
  }
  .plan p {
    font-size: 1.2rem;
    margin-top: 40px; /* Increased margin for more space below the button */
  }
  .btn {
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1.2rem;
  }
  @media screen and (max-width: 768px) {
    .plan-container {
      flex-basis: 80%;
    }
  }
  @media screen and (min-width: 768px) and (max-width: 1200px) {
    .plan-container {
      flex-basis: 45%; /* Adjusted for two boxes in a row on tablets and small laptops */
    }
  }
</style>

@include('dashboard.footer')
