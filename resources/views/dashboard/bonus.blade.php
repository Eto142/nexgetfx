@include('dashboard.header')
<!-- content @s -->
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-lg">
    <div class="nk-content-body">
      <div class="text-wrapper">
        <h2>BONUS PACKAGE</h2><br />
        <h5 class="title" data-di-id="#gen_howDoesItWork?">WHAT IS A BONUS PACKAGE, AND HOW DOES IT WORK?</h5><br />

        <p class="generalText">A bonus package simply refers to an option of earning more than the original returns
          generated (ROI). The bonus package enables subscribers and investors to earn a fixed percentage of the total
          amount generated from each trade cycle.</p>
        <p class="generalText">Our bonus packages spreads accross four(4) different categories outlined below:</p>



        <div class="snip1214">
          <div class="plan">
            <h3 class="plan-title">
              Basic
            </h3>
            <div class="plan-cost"><span class="plan-price">$5,000</span><br><span class="plan-type">Minimum:
                $3,000</span></div>
            <ul class="plan-features">
              <li><i class="ion-checkmark"> </i>30% bonus</li>


            </ul>
            <div class="plan-select"><a href="{{url('deposit')}}">Select Plan</a></div>
          </div>
          <div class="plan">
            <h3 class="plan-title">
              Silver
            </h3>
            <div class="plan-cost"><span class="plan-price">$20,000</span><br><span class="plan-type">Minimum:
                $7,000</span></div>
            <ul class="plan-features">
              <li><i class="ion-checkmark"> </i>45% bonus</li>


            </ul>
            <div class="plan-select"><a href="{{url('deposit')}}">Select Plan</a></div>
          </div>
          <div class="plan featured">
            <h3 class="plan-title">
              Premium
            </h3>
            <div class="plan-cost"><span class="plan-price">$30,000</span><br><span class="plan-type">Minimum:
                $15,000</span></div>
            <ul class="plan-features">
              <li><i class="ion-checkmark"> </i>50% bonus</li>


            </ul>
            <div class="plan-select"><a href="{{url('deposit')}}">Select Plan</a></div>
          </div>
          <div class="plan">
            <h3 class="plan-title">
              VIP
            </h3>
            <div class="plan-cost"><span class="plan-price">$40,000</span><br><span class="plan-type">Minimum:
                $20,000</span></div>
            <ul class="plan-features">
              <li><i class="ion-checkmark"> </i>65% bonus</li>


            </ul>
            <div class="plan-select"><a href="{{url('deposit')}}">Select Plan</a></div>
          </div>


        </div>
        <style>
          @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
          @import url(https://fonts.googleapis.com/css?family=Raleway:400,500,800);
          @import url(https://fonts.googleapis.com/css?family=Montserrat:800);


          .snip1214 {
            font-family: 'Raleway', Arial, sans-serif;
            color: #000000;
            text-align: center;
            font-size: 16px;
            width: 100%;
            max-width: 1000px;
            margin: 40px 10px;

          }

          .snip1214 .plan {
            margin: 0;
            width: 25%;
            position: relative;
            float: left;
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.1);

            margin-top: 70px;
          }

          .snip1214 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
          }

          .snip1214 header {
            position: relative;
          }

          .snip1214 .plan-title {
            position: relative;
            top: 0;
            font-weight: 800;
            padding: 5px 15px;
            margin: 0 auto;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            margin: 0;
            display: inline-block;
            background-color: #3a8dfe;
            color: #ffffff;
            text-transform: uppercase;
          }

          .snip1214 .plan-cost {
            padding: 0px 10px 20px;
          }

          .snip1214 .plan-price {
            font-family: 'Montserrat', Arial, sans-serif;
            font-weight: 800;
            font-size: 1.4em;
            color: #34495e;
          }

          .snip1214 .plan-type {
            opacity: 0.6;
          }

          .snip1214 .plan-features {
            padding: 0;
            margin: 0;
            text-align: center;
            list-style: outside none none;
            font-size: 0.8em;


          }

          .snip1214 .plan-features li {
            border-top: 1px solid #d2d7e2;
            padding: 10px 5%;
          }

          .snip1214 .plan-features li:nth-child(even) {
            background: rgba(0, 0, 0, 0.08);
          }

          .snip1214 .plan-features i {
            margin-right: 8px;
            opacity: 0.4;
          }

          .snip1214 .plan-select {
            border-top: 1px solid #d2d7e2;
            padding: 10px 10px 0;
          }

          .snip1214 .plan-select a {
            background-color: #000000;
            color: #ffffff;
            text-decoration: none;
            padding: 0.5em 1em;
            -webkit-transform: translateY(50%);
            transform: translateY(50%);
            font-weight: 800;
            text-transform: uppercase;
            display: inline-block;
          }

          .snip1214 .plan-select a:hover {
            background-color: #3a8dfe;
          }

          .snip1214 .featured {
            margin-top: -10px;
            background-color: #3a8dfe;
            color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            z-index: 1;
            margin-top: 70px;
          }

          .snip1214 .featured .plan-title,
          .snip1214 .featured .plan-price {
            color: #ffffff;
          }

          .snip1214 .featured .plan-cost {
            padding: 10px 10px 20px;
          }

          .snip1214 .featured .plan-features li {
            border-top: 1px solid rgba(255, 255, 255, 0.4);
          }

          .snip1214 .featured .plan-select {
            padding: 20px 10px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.4);
          }

          @media only screen and (max-width: 767px) {
            .snip1214 .plan {
              width: 50%;
            }

            .snip1214 .plan-title,
            .snip1214 .plan-select a {
              -webkit-transform: translateY(0);
              transform: translateY(0);
            }

            .snip1214 .plan-cost,
            .snip1214 .featured .plan-cost {
              padding: 20px 10px 20px;
            }

            .snip1214 .plan-select,
            .snip1214 .featured .plan-select {
              padding: 10px 10px 10px;
            }

            .snip1214 .featured {
              margin-top: 0;
            }
          }

          @media only screen and (max-width: 440px) {
            .snip1214 .plan {
              width: 100%;
            }
          }
        </style>
        <p class="generalText">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p class="generalText">To qualify for any of the outlined bonus categories above, kindly deposit an equivalent
          amount for any package of your choice. Deposits should be made to your live investment accounts.</p>
        <p class="generalText">FUND YOUR LIVE TRADING ACCOUNT WITH THE EQUIVALENT AMOUNT OF SELECTED PACKAGE</p>
      </div>
    </div>
  </div>
</div>
@include('dashboard.footer')