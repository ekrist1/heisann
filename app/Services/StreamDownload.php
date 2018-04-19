<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;


class StreamDownload {

    public static function Download($file, $filename) {

        // Create temporary download link and redirect

        $adapter = Storage::disk('s3')->getAdapter();
        $client = $adapter->getClient();
        $client->registerStreamWrapper();
        $object = $client->headObject([
            'Bucket' => $adapter->getBucket(),
            'Key' => $file,
        ]);
        /*************************************************************************
         * Set headers to allow browser to force a download
         */
        header('Last-Modified: '.$object['LastModified']);
        header('Accept-Ranges: '.$object['AcceptRanges']);
        header('Content-Length: '.$object['ContentLength']);
        header('Content-Type: '.$object['ContentType']);
        header('Content-Disposition: attachment; filename='.$filename);
        /*************************************************************************
         * Stream file to the browser
         */
        // Open a stream in read-only mode

        $stream = fopen("s3://{$adapter->getBucket()}/{$file}", 'r');

        // Check if the stream has more data to read
        while (!feof($stream)) {
            // Read 1024 bytes from the stream
            echo fread($stream, 1024);
        }
        // Be sure to close the stream resource when you're done with it
        fclose($stream);
    }

}
