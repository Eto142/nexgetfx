

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    padding-bottom: 50px; /* Ensure content doesn't get hidden behind the bottom bar */
    position: relative; /* Needed for stacking context */
  }
  .bottom-navbar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: transparent; /* Hide background color */
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px 0;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1000; /* Ensure it appears on top */
  }
  .bottom-navbar a {
    color: #333;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    font-size: 12px;
    transition: color 0.3s;
  }
  .bottom-navbar a i {
    font-size: 18px;
    margin-bottom: 3px;
  }
  @media only screen and (max-width: 600px) {
    .bottom-navbar a span {
      display: none; /* Hide text on small screens */
    }
    .bottom-navbar a i {
      font-size: 22px; /* Increase icon size for better visibility */
    }
  }
</style>

<div class="bottom-navbar">
  <a href="{{url('home')}}">
    <i class="fas fa-chart-line"></i>
    <span>Trade</span>
  </a>
  <a href="{{url('market')}}">
    <i class="fas fa-chart-area"></i>
    <span>Markets</span>
  </a>
  <a href="{{url('mining')}}">
    <i class="fas fa-cog"></i>
    <span>Mining</span>
  </a>
  <a href="{{url('accounthistory')}}">
    <i class="fas fa-money-bill-wave"></i>
    <span>Deposits</span>
  </a>
  <a href="{{url('profile')}}">
    <i class="fas fa-user"></i>
    <span>Account</span>
  </a>
</div>



