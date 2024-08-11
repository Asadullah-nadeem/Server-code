<?php

function getFileIcon($file) {
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    switch ($extension) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            return 'far fa-file-image';
        case 'pdf':
            return 'far fa-file-pdf';
        case 'doc':
        case 'docx':
            return 'far fa-file-word';
        case 'xls':
        case 'xlsx':
            return 'far fa-file-excel';
        case 'ppt':
        case 'pptx':
            return 'far fa-file-powerpoint';
        case 'txt':
            return 'far fa-file-alt';
        case 'zip':
        case 'rar':
            return 'far fa-file-archive';
        default:
            return 'far fa-file';
    }
}
