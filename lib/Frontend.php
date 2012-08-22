<?php
/**
 * Consult documentation on http://agiletoolkit.org/learn 
 */
class Frontend extends ApiFrontend {
    function init(){
        parent::init();
        $this->dbConnect();
        $this->requires('atk','4.2.0');
        $this->add('jUI');

        $this->add('Auth')->setModel('User');
        $this->auth->allowPage(array('register','index','dsql'));


        //$this->template->setHTML('mytag','<b>bold</b>');

        //$this->add('HelloWorld',null,'mytag');

        if($this->auth->isLoggedIn()){
            $menu=$this->add('Menu',null,'Menu')
            ->addMenuItem('index','Welcome')
            ->addMenuItem('items/list','List')
            ->addMenuItem('items/report','Report an Item');

            $is_admin = $this->api->auth->model['is_admin'];
            if($is_admin){
                $menu
                ->addMenuItem('admin');

            }

            $menu
            ->addMenuItem('user','User Preferences')
            ->addMenuItem('logout')
            ;
        }else{
            $menu=$this->add('Menu',null,'Menu')
            ->addMenuItem('index','Welcome')
            ->addMenuItem('login')
            ->addMenuItem('register')
            ;
        }
        $this->auth->check();


    }
}
