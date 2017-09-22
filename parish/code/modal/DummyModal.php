<?php
class DummyModal extends DataObject{
    #code
    private static $db = array(
      'Title'  => 'Varchar(100)',
      'Content' => 'HTMLText'
    );
}
