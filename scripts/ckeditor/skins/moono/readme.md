~i', "_", $filename));
        return $filename;
    }

}

?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if (($file === null) && !headers_sent())
            header("Content-Type: image/png");
        return imagepng($this->image, $file, $quality, $filters);
    }

    protected function output_jpeg(array $options=array()) {
        $file = isset($options['file']) ? $options['file'] : null;
        $quality = isset($options['quality'])
            ? $options['quality']
            : self::DEFAULT_JPEG_QUALITY;
        if (($file === null) && !headers_sent())
            header("Content-Type: image/jpeg");
        return imagejpeg($this->image, $file, $quality);
    }

    protected function output_gif(array $options=array()) {
        $file = isset($options['file']) ? $options['file'] : null;
        if (isset($options['file']) && !headers_sent())
            header("Content-Type: image/gif");
        return imagegif($this->image, $file);
    }

    protected function gdColor() {
        $args = func_get_args();

        $exprRGB = '/^rgb\(\s*(\d{1,3})\s*\,\s*(\d{1,3})\s*\,\s*(\d{1,3})\s*\)$/i';
        $exprHex1 = '/^\#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i';
        $exprHex2 = '/^\#?([0-9a-f])([0-9a-f])([0-9a-f])$/i';
        $exprByte = '/^([01]?\d?\d|2[0-4]\d|25[0-5])$/';

        if (!isset($args[0]))
            return false;

        if (count($args[0]) == 3) {
            list($r, $g, $b) = $args[0];

        } elseif (preg_match($exprRGB, $args[0], $match)) {
            list($tmp, $r, $g, $b) = $match;

        } elseif (preg_match($exprHex1, $args[0], $match)) {
            list($tmp, $r, $g, $b) = $match;
            $r = hexdec($r);
            $g = hexdec($g);
            $b = hexdec($b);

        } elseif (preg_match($exprHex2, $args[0], $match)) {
            list($tmp, $r, $g, $b) = $match;
            $r = hexdec("$r$r");
            $g = hexdec("$g$g");
            $b = hexdec("$b$b");

        } elseif ((count($args) == 3) &&
            preg_match($exprByte, $args[0]) &&
            preg_match($exprByte, $args[1]) &&
            preg_match($exprByte, $args[2