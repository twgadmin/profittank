<!DOCTYPE html>
   <html lang="en">
   <head>
      <?php /* @include('frontend.layouts.compatibility') */ ?>
         <meta name="description" content="">
         <title>Business Form</title>
         <?php /* @include('frontend.layouts.style') */ ?>
         <style type="text/css">
            .carousel-item-next, .carousel-item-prev, .carousel-item.active {
                display: inherit;
            }
         </style>
   </head>
   <body>
        
          <body class="dashboard-page">
        <section class="dashboardSec">
            <div class="dashboardHead hding-2">
                <h2>Company Name <span>Profitablity & Operating Efficiency Score</span></h2>
            </div>

            <ul class="estimateList">
                <li>
                    <div class="estimateBox">
                        <h4>
                            <span>ESTIMATED</span>
                            <strong>NET PROFIT INCREASE</strong>
                            <b><img src="{!! asset('assets/frontend/calculator/images/icons/arrow.PNG') !!}" alt=""> $9,675</b>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="estimateBox">
                        <h4>
                            <span>ESTIMATED</span>
                            <strong>SALES EQUIVALENT</strong>
                            <b>$97</b>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="estimateBox">
                        <h4>
                            <span>ESTIMATED</span>
                            <strong>OLD PROFIT MARGIN</strong>
                            <b>$9,675</b>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="estimateBox">
                        <h4>
                            <span>ESTIMATED</span>
                            <strong>NEW PROFIT MARGIN</strong>
                            <b>100%</b>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="estimateBox">
                        <h4>
                            <span>ESTIMATED</span>
                            <strong>LIFETIME VALUE</strong>
                            <b><img src="assets/images/icons/arrow.PNG" alt="">$96,748</b>
                        </h4>
                    </div>
                </li>    
            </ul>

            <div class="table-and-charts">                        
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5>NET PROFIT INCREASE PER CHANNEL</h5>
                            
                            <ul>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>

                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>    
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                                <li><h6><span>Channel Name</span> <small>$0000</small></h6></li>
                            </ul>
                            <!-- <table class="table table-striped table-borderless">
                                <tbody>
                                    <tr>
                                        <td colspan="3">HIRING TAX CREDITS (WOTC)</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">EMPLOYEE RETENTION TAX CREDITS (ERTC)</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">R&D TAX CREDITS</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">COMMERCIAL PROPERTY</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">PROPERTY TAX</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">WORKERS COMPENSATION RECOVERY</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">HEALTH INSURANCE</td>
                                        <td>0 <button type="button" class="table-dropdown"><img src="assets/images/icons/caret.PNG" alt=""></button>
                                            <ul class="table-dropdown-list">
                                                <li>0 Yr. 2</li>
                                                <li>0 Yr. 3</li>
                                                <li>0 Yr. 4</li>
                                                <li>0 Yr. 5</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">PROFESSIONAL EMPLOYER ORGANIZATION (PEO)</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">PROCESS AUTOMATION</td>
                                        <td>$2,959,740</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">ELECTRONIC PAYMENTS</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">BUSINESS TELEPHONES</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">SHIPPING - SMALL PARCEL</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">SOLID WASTE & RECYLING</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">MEDICAL WASTE DISPOSAL</td>
                                        <td>0</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">UTILITIES</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
    
                        <div class="col-md-4">
                            <div class="charts">
                                <div class="chart-type">
                                    <canvas id="typeChart"></canvas>
                                    <span>by TYPE</span>
                                </div>

                                <div class="chart-type">
                                    <canvas id="timeChart"></canvas>
                                    <span>by Time</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-right">
                         <a href="#">More Details <span>
                            <img src="{!! asset('assets/frontend/calculator/images/icons/caret.PNG') !!}" alt=""></span>
                         </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <!-- scripts-->
       <?php /* @include('frontend.layouts.scripts') */ ?>
      <!-- scripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
      <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-doughnutlabel/2.0.3/chartjs-plugin-doughnutlabel.js"></script>
      <script>
        var ctx = document.getElementById("typeChart").getContext('2d');
        var typeChart = new Chart(ctx, {
        type: 'pie',
        
        data: {
          
            labels: ["Cash Benefit", "Tax Credit"],
    
            datasets: [{
                backgroundColor: [
                    "#5dbd1d",
                    "#42a2d4",
                ],
                data: [100, 0]
            }]
        },
        maintainAspectRatio: false,
        options: {
            responsive: true,
            legend: {
                position: "right",
                align: "center",
                display: true,
            },
            plugins: {
                tooltip: {enabled: false},
                labels: [

                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
            }
        },

        });    //type chart end

        var ctx = document.getElementById("timeChart").getContext('2d');
        var timeChart = new Chart(ctx, {
        type: 'pie',
        
        data: {
          
            labels: ["Year 1", "Year 2", "Year 3"],
    
            datasets: [{
                backgroundColor: [
                    "#5dbd1d",
                    "#3498db",
                    "#005991",
                ],
                data: [20, 30, 50]
            }]
        },
        maintainAspectRatio: false,
        options: {
            responsive: true,
            legend: {
                position: "right",
                align: "end",
                display: true,
                
            },
            plugins: {
                labels: [
                    
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
            }
        },

        });   //time chart end 
    </script>
   </body>
</html>