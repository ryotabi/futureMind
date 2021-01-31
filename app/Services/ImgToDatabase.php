<?php 

namespace App\Services;

use Intervention\Image\Facades\Image;


class ImgToDatabase {
    public static function ImgToDatabase($requestImg) {
        $imageFile = $requestImg;
        $filenameWithExt = $imageFile->getClientOriginalName();
        $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension = $imageFile->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $fileData = file_get_contents($imageFile->getRealPath());
        if($extension == 'jpg'){
            $data_url = 'data:image/jpg;base64,' . base64_encode($fileData);
        }
        if($extension == 'jpeg'){
            $data_url = 'data:image/jpg;base64,' . base64_encode($fileData);
        }
        if($extension == 'png'){
            $data_url = 'data:image/png;base64,' . base64_encode($fileData);
        }
        if($extension == 'gif'){
            $data_url = 'data:image/gif;base64,' . base64_encode($fileData);
        }
        $image = Image::make($data_url);
        $image->resize(150,150)->save(storage_path().'/app/public/images/'.$fileNameToStore);

        return $fileNameToStore;
    }
}