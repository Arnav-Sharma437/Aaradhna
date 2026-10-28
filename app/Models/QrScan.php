<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class QrScan extends Model
{
    use HasFactory;

    protected $table = 'qr_scans';

    protected $fillable = [
        'visitor_hash',
        'source',
        'campaign',
        'medium',
        'device_type',
        'platform',
        'browser',
        'user_agent',
        'referrer',
        'scanned_at',
    ];

    protected $casts = [
        'scanned_at' => 'datetime',
    ];

    /**
     * Scope to scans made today.
     */
    public function scopeToday($query)
    {
        return $query->whereDate('scanned_at', Carbon::today());
    }

    /**
     * Scope to scans within a given date range.
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        if ($startDate && $endDate) {
            $from = Carbon::parse($startDate)->startOfDay();
            $to = Carbon::parse($endDate)->endOfDay();
            return $query->whereBetween('scanned_at', [$from, $to]);
        }

        if ($startDate) {
            return $query->where('scanned_at', '>=', Carbon::parse($startDate)->startOfDay());
        }

        if ($endDate) {
            return $query->where('scanned_at', '<=', Carbon::parse($endDate)->endOfDay());
        }

        return $query;
    }

    /**
     * Scope by acquisition source.
     */
    public function scopeSource($query, ?string $source)
    {
        if (!empty($source) && $source !== 'all') {
            return $query->where('source', $source);
        }
        return $query;
    }

    /**
     * Return a masked, human-friendly visitor hash for admin tables.
     */
    public function getShortHashAttribute(): string
    {
        if (empty($this->visitor_hash)) {
            return '—';
        }
        return substr($this->visitor_hash, 0, 8) . '…' . substr($this->visitor_hash, -4);
    }

    /**
     * Defensive self-healing helper to ensure table exists in shared hosting / cPanel environments
     */
    public static function ensureTableExists(): void
    {
        try {
            if (!\Illuminate\Support\Facades\Schema::hasTable('qr_scans')) {
                \Illuminate\Support\Facades\Schema::create('qr_scans', function (\Illuminate\Database\Schema\Blueprint $table) {
                    $table->id();
                    $table->string('visitor_hash', 64)->index();
                    $table->string('source', 100)->default('packaging')->index();
                    $table->string('campaign', 100)->nullable()->index();
                    $table->string('medium', 100)->nullable();
                    $table->string('device_type', 50)->nullable()->index();
                    $table->string('platform', 50)->nullable();
                    $table->string('browser', 50)->nullable();
                    $table->text('user_agent')->nullable();
                    $table->string('referrer', 500)->nullable();
                    $table->timestamp('scanned_at')->useCurrent()->index();
                    $table->timestamps();
                });
            }
        } catch (\Throwable $e) {
            // Fail silently and let standard migration or logger handle it
        }
    }
}
