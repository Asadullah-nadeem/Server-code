<div class="mt-4">
    <h1 class="text" style="font-weight: bold;">Available Storage</h1>
    <div class="alert alert-info">
        <?php
        $freeSpace = disk_free_space("."); // Get free space in bytes
        $freeSpaceFormatted = round($freeSpace / (1024 * 1024), 2); // Convert to MB
        echo "Available Storage: {$freeSpaceFormatted} MB";
        ?>
    </div>
</div>
