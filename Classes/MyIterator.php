<?php


class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);

        return $var;
    }

    public function key()
    {
        $var = key($this->var);

        return $var;
    }

    public function next()
    {
        $var = next($this->var);

        return $var;
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== null && $key !== false);

        return $var;
    }

}


$dataCSV    = file(__DIR__ . '/../cats.csv');
$myIterator = new MyIterator($dataCSV);
$foutput    = __DIR__ . '/../file.txt';

$outfile = fopen($foutput, "w") or die("Unable to open file!");

foreach ($myIterator as $row) {
    fwrite($outfile, var_export(explode(',', trim($row)), true));
}

fclose($outfile);
