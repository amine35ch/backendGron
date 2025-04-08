<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IdentifySlowQueries extends Command
{
   protected $signature = 'gron:identify-slow-queries {threshold=1.0 : Execution time threshold in seconds}';

   protected $description = 'Identifies slow SQL queries within the current command execution scope';

   public function handle()
   {
      $threshold = (float) $this->argument('threshold');
      $this->info("Monitoring SQL queries slower than {$threshold}s...");

      // Enable query logging
      DB::connection()->enableQueryLog();

      // Simulate query load here if needed
      $this->info("⚠️ Reminder: Only queries run during this command execution will be logged.");

      // Optional: Run some test queries here (e.g., DB::table(...)->get();)

      // Run for X seconds to simulate some wait (optional)
      $wait = 5;
      $this->info("Waiting {$wait} seconds...");
      sleep($wait);

      // Retrieve and analyze the query log
      $queryLog = DB::getQueryLog();
      $slowQueries = [];

      foreach ($queryLog as $query) {
         $executionTime = $query['time'] / 1000; // ms to sec
         if ($executionTime >= $threshold) {
            $slowQueries[] = [
               'query' => $query['query'],
               'bindings' => $query['bindings'],
               'time' => $executionTime,
            ];
         }
      }

      usort($slowQueries, fn($a, $b) => $b['time'] <=> $a['time']);

      $total = count($queryLog);
      $slow = count($slowQueries);

      $this->info("Captured queries: {$total}");
      $this->info("Slow queries (≥ {$threshold}s): {$slow}");

      if ($slow > 0) {
         $this->table(['Query', 'Bindings', 'Time (s)'], array_map(fn($q) => [
            $q['query'],
            json_encode($q['bindings']),
            number_format($q['time'], 4)
         ], $slowQueries));

         $logPath = storage_path('logs/slow_queries_' . now()->format('Y-m-d_H-i-s') . '.json');
         file_put_contents($logPath, json_encode($slowQueries, JSON_PRETTY_PRINT));
         $this->info("Slow queries saved to: {$logPath}");

         Log::channel('daily')->info("Slow queries report saved: {$logPath}", $slowQueries);
      } else {
         $this->info("✅ No slow queries detected.");
      }

      return Command::SUCCESS;
   }
}
