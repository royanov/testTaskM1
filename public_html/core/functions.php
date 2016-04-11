<?php

function location302($url) {
    $url = nl2br(strip_tags($url));
    header("HTTP/1.1 302 Found", true, 302);
    header("Location: {$url}");
    echo "<html><head><title></title></head><body><h1>302 Moved Tempory</h1>";
    echo "<p>Document temporary moved to: <a href=\"{$url}\">{$url}</a></p></body></html>";
    exit();
}

function location303($url) {
    $url = nl2br(strip_tags($url));
    header("HTTP/1.1 303 See Other", true, 303);
    header("Location: {$url}");
    echo "<html><head><title></title></head><body><h1>303 See Other</h1>";
    echo "<p>Document temporary moved to: <a href=\"{$url}\">{$url}</a></p></body></html>";
    exit();
}

function isImage($fileType) {
    $allowedImageTypes = array("image/pjpeg", "image/jpeg", "image/jpg", "image/png", "image/x-png", "image/gif");

    if (!in_array($fileType, $allowedImageTypes)) {
        return false;
    }
    return true;
}

function mbCutString($str, $length, $postfix = '...', $encoding = 'UTF-8') {
    if (mb_strlen($str, $encoding) <= $length) {
        return $str;
    }

    $tmp = mb_substr($str, 0, $length, $encoding);
    return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
}
