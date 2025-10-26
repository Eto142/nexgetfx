@include('dashboard.header')

<!-- content @s -->
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-lg">
    <video id="vid"
      style="top: 0; position:absolute;width: 1000px; overflow:hidden; margin-left: -100px; margin-top: -20px;"
      loop="true" autoplay="autoplay" muted>
      <source src="src1/crypto/bot.mp4" type="video/mp4">
    </video>
  </div>

  <style>
    @media only screen and (max-width: 600px) {
      #vid {
        width: 300px;

      }

    }
  </style>
  <br>
  <div>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    
     <script>
 @if(Auth::user()->bot_status=='1')
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("Bot Activated");

  @else
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  toastr.warning("Bot not activated yet, please activate");
  @endif
</script>
    

    
  <h2>Activate Bot</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Activate</button>
      <marquee style="color:white">
         @if(Auth::user()->bot_status=='1')
  
  QAI Protect Activated Sucessfully!
  	
  	 @else
 

  
 QAI Protect not activated yet, please Activate!

 
  @endif
  	
  	
</marquee>
  @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          @if($message = Session::get('success'))
                            <div class="alert alert-success">
                         <p>{{$message}}</p>
                            </div>
                         @endif
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Please deposit the fixed price of $3500 to purchase QAI Protect.</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
               @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          @if($message = Session::get('success'))
                            <div class="alert alert-success">
                         <p>{{$message}}</p>
                            </div>
                         @endif
  <form action="{{route('activate.bot')}}" method ="POST" enctype="multipart/form-data">
   {{ csrf_field()}}
    @if(Auth::user()->bot_status=='1')
 
  
  <div class="alert alert-success">
   QAI Protect Activated Sucessfully!
  	</div>
  	

  @else
 
 <div class="alert alert-primary">
  
 QAI Protect not activated yet, please Activate!
</div>
 
  @endif
  <label for="usr">Upload Proof of Payment</label>
  <input type="file" class="form-control" id="usr" name="image">
</div>
 <input type="submit" name="submit" value="submit">
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

    <script>
      // Function to show SweetAlert
  // resources/js/app.js


    // Function to show SweetAlert
    function showAlert() {
        Swal.fire({
            title: "To Activate QAI Protect Deposit $3500",
            html: '<input type="text" name="bot" style="color:blue;" id="inputField" class="swal2-input" placeholder="Your Input">',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Submit',
        }).then((result) => {
            if (result.isConfirmed) {
                var userInput = document.getElementById('inputField').value;

                // Make an AJAX request to submit the form data
                axios.post('/activate-bot', { userInput: userInput })
                    .then(response => {
                        Swal.fire("Submitted!", response.data.message, "success");
                    })
                    .catch(error => {
                        Swal.fire("Error", "An error occurred while submitting the form.", "error");
                        console.error('Error submitting form:', error);
                    });
            }
        });
    }

 
;


    </script>
  </div>
  @include('dashboard.footer')