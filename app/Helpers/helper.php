<?php

use Illuminate\Support\Facades\File;

/**
 * this function upload image the first arg is the image file
 * the sceond  arg the folder name
 */
function uploadImage($image, $folder = '')
{
    $imageName = rand() . time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images/' . $folder), $imageName);
    return $imageName;
}

/**
 * delete file from server send the image name and name folder
 */
function deleteImage($imageName, $folder = '')
{
    file::delete(public_path('images/' . $folder . '/' . $imageName));
}
