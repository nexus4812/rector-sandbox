<?php

class sample {

    private $array;

    public function a()
    {
        $array = $this->array['a'];
    }
}

?>
-----
<?php

class sample {

    private $array;

    public function a()
    {
        $array = isset($this->array['a']) ? $this->array['a'] : null;
    }
}

?>
