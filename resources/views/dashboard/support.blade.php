@include('dashboard.header')
<div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>REFERRALS</h3>
                    </div>
                    <div class="row">
                        <p>There is no better way to spread the word about our products than straight from you. Refer your friends and earn
                        up to 10% on All your referral's deposits including all thier future Deposits</p>
                        <p style="color: greenyellow ;">You can refer users by sharring your referral link below</p>
                    <div class="input-group mb-3">
                    <input type="text"  id="myInput" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon2" value="" readonly>
                        <button class="btn btn-primary" type="button" id="button-addon2" onclick="copyAdr()">copy referral link</button>
                    </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                               <a href="{{('deposit')}}"><button type="button" class="btn btn-icon icon-left btn-info mb-2"><i class="fas fa-info-circle"></i>Start a new Investment plan</button></a>
                                <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Username</th>
                                                    <th>Referral Bonus</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                  

                                                <tr>
                                                   
                                                    <td></td>
                                                     <td></td>
                                                      <td>$</td>
                                                        <td></td>

                                                    

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
    function copyAdr(){
        var copyText = document.getElementById("myInput");
         copyText.select();


        /* Copy the text inside the text field */
        document.execCommand("copy");
         copyText.setSelectionRange(0, 99999);
         navigator.clipboard.writeText(copyText.value);

        }
</script>

    @include('dashboard.footer')