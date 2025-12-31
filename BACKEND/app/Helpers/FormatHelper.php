<?php

if (!function_exists('formatBytes')) {
    /**
     * Format bytes ke human-readable format
     * 
     * @param int $bytes
     * @return string
     */
    function formatBytes($bytes) {
        if ($bytes === 0 || $bytes === null) return '0 Bytes';
        
        $k = 1024;
        $sizes = ['Bytes', 'KB', 'MB', 'GB'];
        $i = floor(log($bytes) / log($k));
        
        return round($bytes / pow($k, $i), 2) . ' ' . $sizes[$i];
    }
}
