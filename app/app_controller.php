<?php
 
class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Session', 'Javascript');
    public $components = array('RequestHandler', 'Session');
    
    public $monthes = array(1 => 'січень', 'лютий', 'березень', 'квітень', 'травень', 'червень',
                                'липень', 'серпень', 'вересень', 'жовтень', 'листопад', 'грудень');
    public $genders = array('m' => 'чоловіча', 'f' => 'жіноча');

    public $settings = array();
    
    public function beforeFilter()
    {  
        parent::beforeFilter();
        
        $this->layout = 'admin_default';
        
        $this->set('monthes', $this->monthes);
    }
    
    public function getCurrentDatetime()
    {
        return date('Y-m-d H:i:s');
    }

    public function loadSettings()
    {
        if(empty($this->settings)) {
            $this->settings = ClassRegistry::init('Setting')->find('list', array('fields' => array('key', 'val')));
        }
    }

    public function settings($key)
    {
        if(empty($this->settings)) {
            $this->loadSettings();
        }
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }

    public function saveSettings($key, $val)
    {
        if(empty($this->settings)) {
            $this->loadSettings();
        }

        $this->loadModel('Setting');

        if(isset($this->settings[$key])) {
            $this->Setting->query("UPDATE `settings` SET `val`='$val' WHERE `key`='$key'");
        } else {
            $this->Setting->query("INSERT INTO `settings`(`key`,`val`) VALUES ('$key','$val');");
        }

        $this->settings[$key] = $val;
    }
    
}