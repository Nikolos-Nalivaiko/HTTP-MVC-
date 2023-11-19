<?php

namespace application\helper;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class Qr {

    public function generateQr($id, $url, $folder) {
        $text = $url;

        $qr_code = QrCode::create($text);

        $writer = new PngWriter;

        $result = $writer->write($qr_code);

        $file_name = $this->generatePrefix($id, $folder);

        $root_directory = $_SERVER['DOCUMENT_ROOT'];
        $upload_directory = $root_directory . '/HTTP-platform/public/'.$folder.'/';
        $file_destination = $upload_directory . $file_name;

        file_put_contents($file_destination , $result->getString());
        return $file_name;
    }

    private function generatePrefix($id, $folder) {
        $prefix = $folder.'-'.$id.'-';
        $randomNumber = mt_rand(1, 999999); 
        $identifier = $prefix . $randomNumber.'.png';
        return $identifier;
    }
}