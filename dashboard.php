<?php 
    $currentPage = 'dashboard.php';
    include("header.php");

    ?> 

      <!-- content goes here -->

    <div class="container-fluid fill-100">
    <div class="row">

 <div class="col-md-6 mt-2 mb-3">
    <h2>Dashboard </h2>
</div>
    <div class="col-md-6 mt-2">

   <label class="mt-2 mr-3" style="float:right;"> Load:
   <?php 
   $out = "w | grep 'load average:' | awk {'print $10 $11 $12'}";
   echo shell_exec("$out"); 
   ?>
  </label>
</div>  
</div>
    <div class="container">

    <div class="row">
       
        <div class="col-md-8 shadow-5">
          <div class="text-center mt-3">
            <h5>Server Resources</h5>
          </div>
          <!--   -->

          <div class="card-body col-lg-4" style="float: left;">
              <div>
                  <canvas id="cpu-chart"></canvas>
              </div>
          </div>
          <div class="card-body col-lg-4" style="float: left;">
              <div >
                  <canvas id="memory-chart"></canvas>
              </div>
          </div>

          <div class="card-body col-lg-4" style="float: left;">
              <div>
                    <canvas id="disk-chart"></canvas>
              </div> 
          </div>   

          <!--   -->
                
          </div>



        <div class="shadow-5 desktop-space ms-info-block" style="padding:0;">
      
        <table class="table table-stripped table-dark">
  <thead>
    <tr class="text-center" style="height:60px;">
      <th colspan="3">System Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>IP <label class="float-right">:</label></td>
      <td>83.44.23.41</td>
    </tr>
    <tr>
      <td>Hostname <label class="float-right">:</label></td>
      <td>test-server</td>
    </tr>
    <tr>
      <td>OS version <label class="float-right">:</label></td>
      <td>Ubuntu 20.04</td>
    </tr>
    <tr>
      <td>uptime<label class="float-right">:</label></td>
      <td>121 days</td>
    </tr>
    
  </tbody>
</table>
      
      </div>
    </div>
</div>



<script>
    
  
    // Fetch CPU usage data from the PHP endpoint
    function fetchCPUUsage() {
      fetch('https://test.flexicloudhosting.com/server-resources.php') // Replace with the appropriate PHP endpoint
        .then(response => response.json())
        .then(data => {
          // Update the chart
          updatecpuChart(data.cpuUsage);
        })
        .catch(error => console.error('Error fetching CPU usage:', error));
    }

    // Initialize the chart
    function initializecpuChart() {
      var ctx = document.getElementById('cpu-chart').getContext('2d');

      window.cpuChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['CPU Usage'],
          datasets: [{
            data: [0, 100],
            backgroundColor: ['#00a9b5', 'rgba(100, 100, 100, 0.7)'],
            borderColor: ['#00a9b5',' rgba(100, 100, 100, 0.5)'],
            hoverBackgroundColor: ['#00a9b5', '#E0E0E0'],
          }],
        },
        options: {
          cutoutPercentage: 50,
          tooltips: { enabled: false },
          events: [], // Disable hover events
          animation: { duration: 0 },
          legend: { display: false }
        }
      });
    }

    // Update the chart with CPU usage data
      function updatecpuChart(cpuUsage) {
      var width = this.cpuChart.width,
        height = this.cpuChart.height,
        ctx = this.cpuChart.ctx;
      const remainingSpace = 100 - cpuUsage;
      window.cpuChart.data.datasets[0].data = [cpuUsage, remainingSpace];
      window.cpuChart.update();
      ctx.restore();
      var fontSize = (height / 120).toFixed(2);
      ctx.font = fontSize + "em verdana";
      ctx.textBaseline = "middle";
      ctx.fillStyle = "#00a9b5";

      var text = cpuUsage + "%",
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 1.8;

      ctx.fillText(text, textX, textY);
      ctx.save();
    }
    
   
    fetchCPUUsage();

    // Fetch CPU usage data initially and every 5 seconds
    setInterval(fetchCPUUsage, 5000);

    // Initialize the chart and make the initial fetch
    initializecpuChart();
    

  
    // Fetch CPU usage data from the PHP endpoint
    function fetchMemoryUsage() {
      fetch('https://test.flexicloudhosting.com/server-resources.php') // Replace with the appropriate PHP endpoint
        .then(response => response.json())
        .then(data => {
          // Update the chart
          updatememChart(data.memoryUsage);
        })
        .catch(error => console.error('Error fetching CPU usage:', error));
    }

    // Initialize the chart
    function initializememChart() {
      var ctx = document.getElementById('memory-chart').getContext('2d');
      window.memoryChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Memory Usage'],
          datasets: [{
            data: [0, 100],
            backgroundColor: ['#24ed9d', 'rgba(100, 100, 100, 0.7)'],
            borderColor: ['#24ed9d',' rgba(100, 100, 100, 0.5)'],
            hoverBackgroundColor: ['#FF6384', '#E0E0E0'],
          }],
        },
        options: {
          cutoutPercentage: 50,
          tooltips: { enabled: false },
          events: [], // Disable hover events
          animation: { duration: 0 },
          legend: { display: false }
        }
      });
    }

    // Update the chart with CPU usage data
      function updatememChart(memoryUsage) {
      var width = this.memoryChart.width,
        height = this.memoryChart.height,
        ctx = this.memoryChart.ctx;
      const remainingSpace = 100 - memoryUsage;
      window.memoryChart.data.datasets[0].data = [memoryUsage, remainingSpace];
      window.memoryChart.update();
      ctx.restore();
      var fontSize = (height / 120).toFixed(2);
      ctx.font = fontSize + "em verdana";
      ctx.textBaseline = "middle";
      ctx.fillStyle = "#24ed9d";

      var text = memoryUsage + "%",
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 1.8;

      ctx.fillText(text, textX, textY);
      ctx.save();
    }
    
   
    fetchMemoryUsage();

    // Fetch CPU usage data initially and every 5 seconds
    setInterval(fetchMemoryUsage, 5000);

    // Initialize the chart and make the initial fetch
    initializememChart();


    
  
      // Fetch CPU usage data from the PHP endpoint
      function fetchdiskUsage() {
        fetch('https://test.flexicloudhosting.com/server-resources.php') // Replace with the appropriate PHP endpoint
          .then(response => response.json())
          .then(data => {
            // Update the chart
            updatediskChart(data.diskUsage);
          })
          .catch(error => console.error('Error fetching CPU usage:', error));
      }
  
      // Initialize the chart
      function initializediskChart() {
        var ctx = document.getElementById('disk-chart').getContext('2d');
        window.diskChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Disk Usage'],
            datasets: [{
              data: [0, 100],
              backgroundColor: ['orange',' rgba(100, 100, 100, 0.7)'],
              borderColor: ['orange',' rgba(100, 100, 100, 0.5)'],
              hoverBackgroundColor: ['#FF6384', '#E0E0E0'],
            }],
          },
          options: {
            cutoutPercentage: 50,
            tooltips: { enabled: false },
            events: [], // Disable hover events
            animation: { duration: 0 },
            legend: { display: false }
          }
        });
      }
  
      // Update the chart with CPU usage data
        function updatediskChart(diskUsage) {
        var width = this.diskChart.width,
          height = this.diskChart.height,
          ctx = this.diskChart.ctx;
        const remainingSpace = 100 - diskUsage;
        window.diskChart.data.datasets[0].data = [diskUsage, remainingSpace];
        window.diskChart.update();
        ctx.restore();
        var fontSize = (height / 120).toFixed(2);
        ctx.font = fontSize + "em verdana";
        ctx.textBaseline = "middle";
        ctx.fillStyle = "orange";
  
        var text = diskUsage + "%",
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 1.8;
  
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
      
     
      fetchdiskUsage();
  
      // Fetch CPU usage data initially and every 5 seconds
      setInterval(fetchdiskUsage, 5000);
  
      // Initialize the chart and make the initial fetch
      initializediskChart();
      
    </script>

<hr>

<div class="container-fluid">

  <div class="row">
    <div class="col-lg-4 col-md-4 p-2">
      <a href="users.php">
        <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
          <span class="icon text-gray"><i class="fa fa-users"></i></span>
          <span class="text-gray text-center ml-2">USERS</span>
        </div>   
      </a>          
    </div>

    <div class="col-lg-4 col-md-4 p-2">
      <a href="websites.php"> 
        <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
            <span class="icon text-gray"><i class="fa fa-globe"></i></span>
            <span class="text-gray text-center ml-2">WEBSITES</span>
        </div>
      </a>
    </div>

    <div class="col-lg-4 col-md-4 p-2"> 
    <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
        <span class="icon text-gray"><i class="fa fa-cubes"></i></span>
        <span class="text-gray text-center ml-2">ACCOUNTS</span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-4 p-2">
      <a href="databases.php">
        <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
          <span class="icon text-gray"><i class="fa fa-database"></i></span>
          <span class="text-gray text-center ml-2">DATABASES</span>
        </div>  
      </a>      
    </div>    

    <div class="col-lg-4 col-md-4 p-2">   
      <a href="wordpress.php">
        <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
          <span class="icon text-gray"><i class="fab fa-wordpress"></i></span>
          <span class="text-gray text-center ml-2">WORDPRESS</span>
        </div>  
      </a>
    </div>

    <div class="col-lg-4 col-md-4 p-2">   
      <a href="php_console.php">   
        <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
          <span class="icon text-gray"><i class="fab fa-php"></i></span>
          <span class="text-gray text-center ml-2">PHP</span>
        </div>  
      </a>
    </div>

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-4 col-md-4 p-2">   
          <a href="config-editor.php">
            <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
              <span class="icon text-gray"><i class="fas fa-file"></i></span>
              <span class="text-gray text-center ml-2">CONFIG</span>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 p-2">                        
          <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
            <span class="icon text-gray"><i class="fas fa-upload"></i></span>
            <span class="text-gray text-center ml-2">FTP</span>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 p-2">   
        <a href="manage.php">
                 
          <div class="card-body bg-mgray d-flex justify-content-center pbox shadow-5">
            <span class="icon text-gray"><i class="fas fa-wrench"></i></span>
            <span class="text-gray text-center ml-2">MANAGE</span>
          </div>
    </a>
        </div>

      </div>
    </div>

<div class="container-fluid p-4">

</div>

</body>

</html>