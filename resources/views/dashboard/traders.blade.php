@include('dashboard.header')





<div class="content-page">   
  <div class="content">
    <br>
    
<main class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body px-0 pt-0 pb-2">
              <br>
              <br>
              
              
             
              <div class="container">
                <div class="row">
                 
                 <div class="col-md-12">
      <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search...">
  </div>
  
                </div>
              </div>
              <div class="container p-0">
                @foreach($traders as $trader)
                <div class="card mb-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="trader-image">
                            <img src="{{asset('uploads/trader/'.$trader->image)}}" class="avatar avatar-sm me-3" alt="{{$trader->name}}">
                        </div>
                        <div class="trader-info flex-grow-1">
                            <a href="#"><h6 class="mb-0 font-weight-bold">{{$trader->name}}</h6></a>
                            <input type="hidden" name="copy_name" value="{{$trader->name}}">
                            <div class="d-flex flex-column">
                                <b class="text-xs mb-0" style="color:black;">{{$trader->win_rate}}% Win Rate</b>
                                <b class="text-xs mb-0" style="color:black;">{{$trader->profit_share}}% Profit Share</b>
                            </div>
                        </div>
                      
                      
                 
                      <!-- Example trader action buttons -->
                      
                      <div class="trader-action">
                          <div id="copyStatus{{$trader->id}}" class="copy-status" style="display: none;">Copying...</div>
                          <button type="button" name="copy" id="copyButton{{$trader->id}}" class="btn btn-success btn-sm" onclick="toggleCopyText('{{$trader->id}}')">Copy Now</button>
                          <button type="button" id="cancelButton{{$trader->id}}" class="cancel-button" style="display: none;" onclick="cancelCopy('{{$trader->id}}')">Cancel</button>
                      </div>
                     
                  
                      <script>
                          document.addEventListener("DOMContentLoaded", function() {
                              // Check if the text has been Copying and update the button text accordingly
                              updateButtonText();
                          });
                  
                          function toggleCopyText(traderId) {
                              const copyButton = document.getElementById("copyButton" + traderId);
                              const copyStatus = document.getElementById("copyStatus" + traderId);
                              const cancelButton = document.getElementById("cancelButton" + traderId);
                  
                              // Check if the text has been Copying
                              if (localStorage.getItem("isTextCopying_" + traderId)) {
                                  // If Copying, show "Copy Now" button and hide "Copying" status and "Cancel" button
                                  copyButton.style.display = "inline-block";
                                  copyStatus.style.display = "none";
                                  cancelButton.style.display = "none";
                                  localStorage.removeItem("isTextCopying_" + traderId);
                              } else {
                                  // If not Copying, hide "Copy Now" button and show "Copying" status and "Cancel" button
                                  copyButton.style.display = "none";
                                  copyStatus.style.display = "block";
                                  cancelButton.style.display = "inline-block";
                                  localStorage.setItem("isTextCopying_" + traderId, true);
                              }
                          }
                  
                          function cancelCopy(traderId) {
                              const copyButton = document.getElementById("copyButton" + traderId);
                              const copyStatus = document.getElementById("copyStatus" + traderId);
                              const cancelButton = document.getElementById("cancelButton" + traderId);
                              
                              // Revert to showing the "Copy Now" button and hiding the "Copying" status and "Cancel" button
                              copyButton.style.display = "inline-block";
                              copyStatus.style.display = "none";
                              cancelButton.style.display = "none";
                              localStorage.removeItem("isTextCopying_" + traderId);
                          }
                  
                          function updateButtonText() {
                              // Create an array of trader IDs (replace this with actual PHP code to generate IDs)
                              var traderIds = [
                                  @foreach($traders as $trader)
                                      "{{ $trader->id }}",
                                  @endforeach
                              ];
                  
                              // Iterate through trader IDs and update button text
                              traderIds.forEach(function(traderId) {
                                  const copyButton = document.getElementById("copyButton" + traderId);
                                  const copyStatus = document.getElementById("copyStatus" + traderId);
                                  const cancelButton = document.getElementById("cancelButton" + traderId);
                                  
                                  if (localStorage.getItem("isTextCopying_" + traderId)) {
                                      copyButton.style.display = "none";
                                      copyStatus.style.display = "block";
                                      cancelButton.style.display = "inline-block";
                                  } else {
                                      copyButton.style.display = "inline-block";
                                      copyStatus.style.display = "none";
                                      cancelButton.style.display = "none";
                                  }
                              });
                          }
                      </script>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{-- <script>
                function toggleCopyText(id) {
                    var button = document.getElementById('copyButton' + id);
                    // Implement your copy functionality here
                }
            </script> --}}

            <style>
              .cancel-button {
                  background-color: red;
                  color: white;
                  border: none;
                  padding: 5px 10px;
                  cursor: pointer;
                  margin-left: 5px;
              }
              .copy-status {
                  font-weight: bold;
                  color: green;
                  margin-bottom: 5px;
              }
          </style>
            
            <style>
                .card {
                    border: 1px solid #ddd;
                    border-radius: 8px;
                }
                .avatar-sm {
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                }
                .trader-info {
                    margin-left: 20px;
                }
                .btn-success {
                    background-color: #28a745;
                    border-color: #28a745;
                }
                .btn-sm {
                    padding: 5px 10px;
                }
                .card-body {
                    padding: 10px;
                }
                .card + .card {
                    margin-top: 8px;
                }
                .font-weight-bold {
                    font-weight: bold;
                }
            </style>
            
  
  
  
  
  
  
  
            {{-- <script>
              document.addEventListener("DOMContentLoaded", function() {
              // Check if the text has been Copying and update the button text accordingly
              updateButtonText();
          });
          
          function toggleCopyText(traderId) {
              // Check if the text has been Copying
              if (localStorage.getItem("isTextCopying_" + traderId)) {
                  // If Copying, change the button text to "Copy Now" and remove the flag
                  document.getElementById("copyButton" + traderId).innerHTML = "Copy Now";
                  localStorage.removeItem("isTextCopying_" + traderId);
              } else {
                  // If not Copying, change the button text to "Copying" and set the flag
                  document.getElementById("copyButton" + traderId).innerHTML = "Copying";
                  localStorage.setItem("isTextCopying_" + traderId, true);
              }
          }
          
          function updateButtonText() {
              // Check the current state and update the button text accordingly
              @foreach($traders as $trader)
                  if (localStorage.getItem("isTextCopying_{{ $trader->id }}")) {
                      document.getElementById("copyButton{{ $trader->id }}").innerHTML = "Copying";
                  } else {
                      document.getElementById("copyButton{{ $trader->id }}").innerHTML = "Copy Now";
                  }
              @endforeach
          }
          
          
          </script>
  
   --}}
  
  
  
  
  
   
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
      var ctx = document.getElementById("chart-bars").getContext("2d");
  
      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });
  
  
      var ctx2 = document.getElementById("chart-line").getContext("2d");
  
      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
  
      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors
  
      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
  
      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
  
      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6
  
            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    </script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
    <script src="../assets/js/copy.js"></script>
  
  <script>
    function filterTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.querySelector(".table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    
    document.getElementById("searchInput").addEventListener("keyup", filterTable);
  </script>
  
  
  
  
  
  </body>
  
  </html>
@include('dashboard.footer')