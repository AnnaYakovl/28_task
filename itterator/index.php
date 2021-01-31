<?php
 
class HtmlIterator implements Iterator
{
    
    public $fragmentToRemove = 'meta';
    private $newFile = "newFile.html";
    private $content = [];
    
    public function __construct($file)
    {
        $this->content = file($file);
    }

    public function current()
    {
       return current($this->content);
    }
    
    public function key()
    {
        return key($this->content);
    }
    
    public function next()
    {
        next($this->content);
    }
    
    public function rewind()
    {
        reset($this->content);
    }
    
    public function valid()
    {
        return current($this->content) !== false;
    } 
}
 
$html = new HtmlIterator('myFile.html');
 
foreach ($html as $key => $row) {
    if (strpos($row, $html->fragmentToRemove) === false)
    {
        $fp = fopen("newFile.html", "a");
        fwrite($fp, $row);
        fclose($fp);
    }
}

?>