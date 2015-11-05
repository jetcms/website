<?php

if (!function_exists('image_thumb_fit')) {
    /**
     * Adds one or more messages to the MessagesCollector
     *
     * @param  mixed ...$value
     * @return string
     */
    function image_thumb_fit($nameFile,$w,$h = null)
    {

        if ( !is_file( public_path($nameFile) ) ) return null;

        $pathFile = 'thumb/t'.md5($nameFile).'('.$h.'-'.$w.').png';
        if (!file_exists(public_path($pathFile))){
            Image::make(public_path($nameFile))
                ->fit($w,$h)
                ->encode('png', 95)
                ->save(public_path($pathFile),100);
        }
        return $pathFile;
    }
}