<!DOCTYPE html>
<html>
<head>
    <title>System Monitoring</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Top 5 CPU Consumed Processes</h2>
    <table>
        <tr>
            <th>PID</th>
            <th>CPU Usage (%)</th>
            <th>Name</th>
        </tr>
        <?php
        // Function to get the top processes based on CPU usage
        function getTopCpuProcesses($limit = 5)
        {
            exec("ps -eo pid,%cpu,comm --sort=-%cpu | head -n $limit", $output);

            $processes = [];
            foreach ($output as $line) {
                $data = explode(' ', preg_replace('/\s+/', ' ', $line));
                $processes[] = [
                    'pid' => $data[0],
                    'cpu' => $data[1],
                    'name' => $data[2]
                ];
            }

            return $processes;
        }

        // Get top CPU-consumed processes
        $topCpuProcesses = getTopCpuProcesses(5);

        // Display the processes in the table
        foreach ($topCpuProcesses as $process) {
            echo "<tr>";
            echo "<td>{$process['pid']}</td>";
            echo "<td>{$process['cpu']}</td>";
            echo "<td>{$process['name']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Top 5 Memory Consumed Processes</h2>
    <table>
        <tr>
            <th>PID</th>
            <th>Memory Usage (%)</th>
            <th>Name</th>
        </tr>
        <?php
        // Function to get the top processes based on memory usage
        function getTopMemoryProcesses($limit = 5)
        {
            exec("ps -eo pid,%mem,comm --sort=-%mem | head -n $limit", $output);

            $processes = [];
            foreach ($output as $line) {
                $data = explode(' ', preg_replace('/\s+/', ' ', $line));
                $processes[] = [
                    'pid' => $data[0],
                    'memory' => $data[1],
                    'name' => $data[2]
                ];
            }

            return $processes;
        }

        // Get top memory-consumed processes
        $topMemoryProcesses = getTopMemoryProcesses(5);

        // Display the processes in the table
        foreach ($topMemoryProcesses as $process) {
            echo "<tr>";
            echo "<td>{$process['pid']}</td>";
            echo "<td>{$process['memory']}</td>";
            echo "<td>{$process['name']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
