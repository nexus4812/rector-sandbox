<?php

$result = $array['key']['key2'];

?>
-----
<?php

$result = isset($array['key']['key2']) ? $array['key']['key2'] : null;

?>
