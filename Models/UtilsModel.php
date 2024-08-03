<?php
class UtilsModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actualizar()
    {
        $source = '/home/imporsuitpro/public_html/imporsuitpro.com/tienda';
        $destination = '.';
        $this->full_copy($source, $destination);
        echo json_encode("ok");
    }
    public function full_copy($source, $target)
    {
        if (is_dir($source)) {
            @mkdir($target);
            $d = dir($source);
            while (FALSE !== ($entry = $d->read())) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                $Entry = $source . '/' . $entry;
                if (is_dir($Entry)) {
                    $this->full_copy($Entry, $target . '/' . $entry);
                    continue;
                }
                copy($Entry, $target . '/' . $entry);
            }
            $d->close();
        } else {
            copy($source, $target);
        }
    }
}
