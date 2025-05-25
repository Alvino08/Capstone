<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Riwayat;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
class SaveSummaryToRiwayat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $originalText;
    protected $summaryResult;

    /**
     * Create a new job instance.
     */
    public function __construct($userId, $originalText, $summaryResult)
    {
        $this->userId = $userId;
        $this->originalText = $originalText;
        $this->summaryResult = $summaryResult;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Riwayat::create([
            'user_id' => $this->userId,
            'original_text' => $this->originalText,
            'summary_result' => $this->summaryResult,
        ]);
    }
}
