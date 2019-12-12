<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageUploadService
{
    /**
     * Save uploaded image on filesystem.
     *
     * @param UploadedFile $file
     * @param string       $dirName Dir name.
     *
     * @return string
     */
    public function upload(UploadedFile $file, string $dirName = '', string $filename = '')
    {
        $extension = $file->extension();
        $fileName = $this->generateRandomFilename();
        Storage::disk('uploads.images')->put("$dirName/$fileName.$extension", File::get($file));

        return "$dirName/$fileName.$extension";
    }
    /**
     * Gets image extension.
     *
     * @param string $name File name.
     *
     * @return string
     */
    private function getImageExtension(string $name) : string
    {
        return explode('.', $name)[1];
    }
    /**
     * Generates a random filename (useful for unique filenames). It includes
     * both the current timestamp, and a random part.
     *
     * @param int $maxLength The maximum length of the filename.
     *
     * @return string
     */
    private function generateRandomFilename($maxLength = 16) : string
    {
        $filename = time().'.'.md5(time().mt_rand());
        return substr($filename, 0, $maxLength);
    }
}
