<?php

namespace Plugo\Services\ImageUploader;

class ImageUploader {

    public function uploadPicture($picture, $folder = null){
        if(!file_exists('./images')){
            mkdir("./images");
        }

        $tmpPicutre = $picture['file']['tmp_name'];
        $pictureName = $picture['file']['name'];
        $tabExtension = explode('.', $pictureName);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpeg', 'jpg', 'png'];

        if(in_array($extension, $extensions)){
            $name = uniqid('', true) . '_' . $pictureName;
            if($folder != null){
                if(!file_exists('./images/' . $folder)){
                    mkdir("./images/" . $folder);
                }
                $fullPath = 'images/' . $folder . '/' . $name;
            }else{
                $fullPath = 'images/' . $name;
            }
            move_uploaded_file($tmpPicutre, './' . $fullPath);
            $result = true;
        }else{
            $result = false;
        }

        return $fullPath;
    }


}