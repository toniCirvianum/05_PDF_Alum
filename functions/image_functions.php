<?php

function checkImageProfile($image, $type = 'profile')
{
    // Errors al pujar la imatge
    if ($image['error'] !== UPLOAD_ERR_OK) {
        header("Location: ../views/register.php?error=image");
        exit;
    }

    // Mida de la imatge
    $maxSize = 5 * 1024 * 1024; //5MB

    if ($image['size'] > $maxSize) {
        header("Location: ../views/register.php?error=image_size");
        exit;
    }

    // Format d'iamtge
    $mimeType = mime_content_type($image['tmp_name']);

    $allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    if (!in_array($mimeType, $allowedTypes)) {
        header("Location: ../views/register.php?error=image_type");
        exit;
    }
    // Extensio del fitxer
    $extension = match ($mimeType) {
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    };

    // Geenrem el nom
    if ($type == 'profile') {
        $newName = uniqid("profile_") . "." . $extension;
    }
    if ($type == 'product') {
        $newName = uniqid("product_") . "." . $extension;
    }


    return $newName;
}
