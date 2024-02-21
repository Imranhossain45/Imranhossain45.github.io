<?php

use App\Models\Area;
use App\Models\Funds;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Variation;
use App\Models\MutualFund;
use Cloudinary\Cloudinary;
use App\Models\PhotoGallery;
use App\Models\Rating;
use App\Models\RequirementType;
use Illuminate\Http\UploadedFile;

function cloudUpload($image, $folder, $old)
{
    // Extracting the filename without the extension
    $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

    if ($old) {
        $token = explode('/', $old);
        $token2 = explode('.', $token[sizeof($token) - 1]);
        cloudinary()->destroy('newFolder/' . $folder . '/' . $token2[0]);
    }

    $response = cloudinary()->upload($image->getRealPath(), [
        'folder' => 'newFolder/' . $folder,
        'transformation' => [
            'quality' => 'auto',
        ]
    ]);

    // Extracting the original file extension
    $originalExtension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);

    // Combining the original filename, public ID, and original extension
    $fullUrl = env('CLOUIDINARY_BASE_URL') . $response->getPublicId() . '.' . 'webp';

    return $fullUrl;
}




if (!function_exists('mysql_escape')) {
    function mysql_escape($inp)
    {
        if (is_array($inp)) return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }
}
function getCategoryName($id)
{
    $category = Category::find($id);


    if ($category) {
        return $category->name;
    } else {
        // Handle the case where the category was not found.
        return '-';
    }
}
function getPhotoname($id)
{
    $data = PhotoGallery::find($id);
    return $data->title;
}
