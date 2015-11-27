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
        if (!is_dir(public_path('thumb'))) {
            mkdir(public_path('thumb'));
        }
        $pathFile = 'thumb/t'.md5($nameFile).'('.$h.'-'.$w.').png';
        if (!file_exists(public_path($pathFile))){
            Image::make(public_path($nameFile))
                ->fit($w,$h)
                ->encode('png', 95)
                ->save(public_path($pathFile),100);
        }
        return $pathFile;

    }

    function image_thumb_resize_canvas($nameFile,$w,$h = null, $position= 'center',$color = 'fff')
    {

        if ( !is_file( public_path($nameFile) ) ) return null;
        if (!is_dir(public_path('thumb'))) {
            mkdir(public_path('thumb'));
        }

        $pathFile = 'thumb/t'.md5($nameFile).'('.$h.'-'.$w.'-'.$position.'-'.$color.').png';
        //if (!file_exists(public_path($pathFile))){
            Image::make(public_path($nameFile))
                ->resize($w, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->resizeCanvas(null, $h,$position,false,$color)
                ->encode('png', 95)
                ->save(public_path($pathFile),100);
        //}
        return $pathFile;

    }
}