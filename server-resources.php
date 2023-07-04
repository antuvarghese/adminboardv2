<?php
//cors policy
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

// Logic to fetch CPU and memory usage data (replace with your implementation)
$cpuUsage = getCPUUsage();
$memoryUsage = getMemoryUsage();
$diskUsage = getDiskUsage();

// Return the server resources data as JSON response
header('Content-Type: application/json');
echo json_encode([
  'cpuUsage' => $cpuUsage,
  'memoryUsage' => $memoryUsage,
  'diskUsage' => $diskUsage,
]);

//function to get CPU usage
function getCPUUsage() {
  //code to get CPU usage
  $rem = shell_exec("vmstat 1 2 | tail -1 | awk '{print $15}'");
  $load = 100-$rem;
  return $load;

}

//function to get memory usage
function getMemoryUsage() {
  //code to get memory usage
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]/$mem[1]*100;
    $memory_usage = intval($memory_usage);
    return $memory_usage;
}

//function to get disk usage
function getDiskUsage() {
  //code to get memory usage
   $ds = shell_exec("df -H | grep -vE '^Filesystem|boot|udev|tmpfs|cdrom|loop*' | awk '{ print $5 }' | tr -d '%'");
   $ds = (string)trim($ds);
   return $ds;
}


?>
