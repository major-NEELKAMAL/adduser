<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Controller;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Regex ;

class UserslistController extends Controller
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for userslist
     */
    public function retrieveAction()
    {
       $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Userslist', $_POST);
            
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

       

        $userslist = Userslist::fetchAll();
        
        
        
        $paginator = new Paginator([
            'data' => $userslist,
            'limit'=> 10,
            'page' => $numberPage
        ]);

         $this->view->page = $paginator->getPaginate();
       
       $this->view->pick(['userslist/listingpage']);
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $this->view->pick(['userslist/addpage']);
    }

   

    /**
     * Creates a new userslist
     */
    public function listingpageAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "userslist",
                'action' => 'index'
            ]);

            return;
        }
        

        $userslist = new Userslist(); 
        $validation = new Phalcon\Validation();

        $validation->add('Firstname', new StringLength(array(
            'max' => 20,
            'min' => 3,
            'messageMaximum' => 'Firstname should have maximum 20 character',
            'messageMinimum' => 'Firstname should have minimum 3 character'
        )));
       
        $validation->add('Firstname', new Regex(array(
            'pattern' => '/^[a-zA-Z ]*$/',
            'message' => 'Firstname should only contain Alphabets'
        )));


         $validation->add('Lastname', new StringLength(array(
            'max' => 20,
            'min' => 3,
            'messageMaximum' => 'Lastname should have maximum 20 character',
            'messageMinimum' => 'Lastname should have minimum 3 character'
        )));
        $validation->add('Lastname', new Regex(array(
            'pattern' => '/^[a-zA-Z ]*$/',
            'message' => 'Lastname should only contain Alphabets'
        )));
        $validation->add('Email', new Email(array(
            'message' => 'Email is not valid'
        )));

        $validation->add('Skills', new Regex(array(
            'pattern' => '/^[a-zA-Z ]*$/',
            'message' => 'Skills should only contain Alphabets'
        )));
        
        $messages = $validation->validate($_POST);
        $email=0;
        $email=userslist::findFirst("Email='".$this->request->getPost("Email")."'");
        
        if (count($messages) || $email){
            foreach ($messages as $message) {
                 $this->flash->error($message);
            }
            if($email){      
                $this->flash->error("Email is already taken");
            }
            $this->dispatcher->forward([
                    'controller' => "userslist",
                    'action' => 'new'
            ]);     
        }
        else{
            $userslist->setFirstname($this->request->getPost("Firstname"));
            $userslist->setLastname($this->request->getPost("Lastname"));        
            $userslist->setEmail($this->request->getPost("Email"));
            $userslist->setGender($this->request->getPost("Gender"));
            $userslist->setEducation($this->request->getPost("Education"));
            $userslist->setSkills($this->request->getPost("Skills"));
            $userslist->save();
            $this->dispatcher->forward([
                'controller' => "userslist",
                 'action' => 'retrieve'
            ]);
        }
    }

}
