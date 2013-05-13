<?php

class ListController {

    public function showList($status)
    {
        if($status)
        {
            echo 'lijst';
        } else
            echo 'geen lijst';
    }
          
}

?>
