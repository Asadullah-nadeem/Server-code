<div class="mt-4">
    <form method="post">
        <button type="submit" name="clear_cache" class="btn btn-danger">Clear Cache</button>
    </form>
    <?php
    if (isset($_POST['clear_cache'])) {
        $cacheDir = 'path/to/your/cache/directory'; // Set your cache directory path
        if (is_dir($cacheDir)) {
            $files = glob($cacheDir . '/*'); // Get all files in the cache directory
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file); // Delete the file
                }
            }
            echo '<div class="alert alert-success mt-2">Cache cleared successfully!</div>';
        } else {
            echo '<div class="alert alert-danger mt-2">Cache directory not found!</div>';
        }
    }
    ?>
</div>
