<?php
// child dir to scan
$c_dir = '/simakand';

// views
$directory = 'ci3111/application/views' . $c_dir; // Change if needed

function scanFiles($dir)
{
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $fullPath = "$dir/$file";
            if (is_dir($fullPath)) {
                scanFiles($fullPath); // Recursively scan subdirectories
            } elseif (preg_match('/\.(php|html|js)$/', $file)) {
                $content = file_get_contents($fullPath);
                if (preg_match_all('/(href|src|action)=["\']([^"\']+)["\']/', $content, $matches)) {
                    foreach ($matches[2] as $match) {
                        echo "File: $fullPath → $match\n";
                    }
                }
            }
        }
    }
}

scanFiles($directory);

// controllers
$directory = 'ci3111/application/controllers' . $c_dir; // Scan the controllers directory

function scanControllers($dir)
{
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $fullPath = "$dir/$file";
            if (is_dir($fullPath)) {
                scanControllers($fullPath); // Recursively scan subdirectories
            } elseif (preg_match('/\.php$/', $file)) {
                $content = file_get_contents($fullPath);

                // Match redirect(), site_url(), base_url()
                if (preg_match_all('/\b(redirect|site_url|base_url)\(["\']([^"\']+)["\']/', $content, $matches)) {
                    foreach ($matches[2] as $match) {
                        echo "File: $fullPath → $match\n";
                    }
                }
            }
        }
    }
}

scanControllers($directory);

// models
$directory = 'ci3111/application/models' . $c_dir; // Scan the models directory

function scanModels($dir)
{
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $fullPath = "$dir/$file";
            if (is_dir($fullPath)) {
                scanModels($fullPath); // Recursively scan subdirectories
            } elseif (preg_match('/\.php$/', $file)) {
                $content = file_get_contents($fullPath);

                // Match base_url(), site_url()
                if (preg_match_all('/\b(site_url|base_url)\(["\']([^"\']+)["\']/', $content, $matches)) {
                    foreach ($matches[2] as $match) {
                        echo "File: $fullPath → $match\n";
                    }
                }
            }
        }
    }
}

scanModels($directory);

// helpers
$directory = 'ci3111/application/helpers' . $c_dir; // Scan the helpers directory

function scanHelpers($dir)
{
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $fullPath = "$dir/$file";
            if (is_dir($fullPath)) {
                scanHelpers($fullPath); // Recursively scan subdirectories
            } elseif (preg_match('/\.php$/', $file)) {
                $content = file_get_contents($fullPath);

                // Match base_url(), site_url()
                if (preg_match_all('/\b(site_url|base_url)\(["\']([^"\']+)["\']/', $content, $matches)) {
                    foreach ($matches[2] as $match) {
                        echo "File: $fullPath → $match\n";
                    }
                }
            }
        }
    }
}

scanHelpers($directory);
