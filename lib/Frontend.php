<?php
/**
 * Consult documentation on http://agiletoolkit.org/learn 
 */
class Frontend extends ApiFrontend {
    public $welcome;
    function init(){
        parent::init();
        // Keep this if you are going to use database on all pages
        //$this->dbConnect();
       // $this->api->dbConnect() ;
        $this->requires('atk','4.2.1');

        // This will add some resources from atk4-addons, which would be located
        // in atk4-addons subdirectory.
        $this->addLocation('atk4-addons',array(
                    'php'=>array(
                        'mvc',
                        'misc/lib',
                        'filestore/lib',
                        )
                    ))
            ->setParent($this->pathfinder->base_location);
        
        $this->addLocation('.',array(
            "addons"=>'xavoc-addons'
        ));


//$this->api->dbConnect();
        // A lot of the functionality in Agile Toolkit requires jUI
        $this->add('jUI');

        // Initialize any system-wide javascript libraries here
        // If you are willing to write custom JavaScritp code,
        // place it into templates/js/atk4_univ_ext.js and
        // include it here
        $this->js()
            ->_load('atk4_univ')
            ->_load('ui.atk4_notify')
            ;


        $m=$this->add('boot/Menu',array('fixed_top'=>true),'Menu');  
        $m->addMenuItem('index','Home');
        // $m->addMenuItem('xbank','XBank');
        // $m->addMenuItem('agiletoolkit','AgileToolkit');
        // $m->addMenuItem('opensource','OpenSource');
        // $m->addMenuItem('publicservices','PublicServices');
        $m->addMenuItem('xcideveloper','xCIDeveloper');
        $m->addMenuItem('xjdatamapper','xjDataMapper');
        // $m->addMenuItem('xavocproducts','Products And Services');
        // $m->addMenuItem('publicservices','Public Services');
        // $m->addMenuItem('opensource','Open Source Contribution');
        $m->addMenuItem('aboutus','About Xavoc');
        $m->addMenuItem('contactus','Contact Us');
        $m->addMenuItem('trainings','Training@xavoc');
        // $m->addMenuItem('test2','Test Agile speed');


          
        //$this->add('H1', null, 'logo')->set("BVMSSS");
        $this->addLayout('UserMenu');
        
    }
    function layout_UserMenu(){
        if($this->auth->isLoggedIn()){
            $this->add('Text',null,'UserMenu')
                ->set('Hello, '.$this->auth->get('username').' | ');
            $this->add('HtmlElement',null,'UserMenu')
                ->setElement('a')
                ->set('Logout')
                ->setAttr('href',$this->getDestinationURL('logout'))
                ;
        }else{
            $this->add('HtmlElement',null,'UserMenu')
                ->setElement('a')
                ->set('Login')
                ->setAttr('href',$this->getDestinationURL('authtest'))
                ;
        }
    }
    function page_examples($p){
        header('Location: '.$this->pm->base_path.'examples');
        exit;
    }
}
