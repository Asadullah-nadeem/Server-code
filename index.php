<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <style>
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .file-size {
            margin-left: auto;
            font-weight: bold;
        }
        .text {
            color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php include 'functions.php'; ?>
        <?php include 'available_storage.php'; ?>
        <?php include 'clear_cache.php'; ?>
        <div class="mt-4">
            <h1 class="text" style="font-weight: bold;">Server Information</h1>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Apache Version:</strong>
                    <span><?php echo apache_get_version(); ?></span>
                </li>
                <li class="list-group-item">
                    <strong>OpenSSL Version:</strong>
                    <span><?php echo OPENSSL_VERSION_TEXT; ?></span>
                </li>
                <li class="list-group-item">
                    <strong>PHP Version:</strong>
                    <span><?php echo phpversion(); ?></span>
                </li>
            </ul>
        </div>
        <h1 class="text" style="font-weight: bold;">Files in Directory</h1>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <?php
                    // Set the directory you want to display
                    $directory = '.';

                    // Open the directory
                    if (is_dir($directory)) {
                        if ($dh = opendir($directory)) {
                            // Loop through the files
                            while (($file = readdir($dh)) !== false) {
                                if ($file != '.' && $file != '..') {
                                    $icon = getFileIcon($file); // Get the file icon
                                    $fileSize = round(filesize($file) / 1024, 2); // Get file size in KB
                                    echo "<li class='list-group-item'>
                                            <span><i class='$icon'></i> <a href='$file'>$file</a></span>
                                            <span class='file-size'>$fileSize KB</span>
                                          </li>";
                                }
                            }
                            closedir($dh);
                        }
                    } else {
                        echo "<li class='list-group-item text-danger'>Directory not found.</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
