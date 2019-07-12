<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Mailer\email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function isAuthorized($user)
    {        
        $email = $this->Auth->user('email');
        $this->loadModel('Users');
            
        $role = $this->Users->find('all', ['conditions' => ['email'=>$email], 'fields' => ['role_id']])->first();
        $action = $this->request->getParam('action');
        //$role = 2;
        if (in_array($action, ['add', 'edit', 'delete', 'register', 'verification'])) {
            if($role->role_id === 1){
                return true;
            }else{
                return false;                
            }
        }

        return true;
    }
    public function register()
    {
        if($this->request->is('post')){
            $userTable = TableRegistry::get('Users');
            $user = $userTable->newEntity();

            //$hasher = new DefaultPasswordHasher();
            $myname = 'Facturacion';
            $myemail = $this->request->getData('email');
            $myrole = 4;
            //$mypass = Security::hash($this->request->getData('password'), 'sha256', false);
            $mypass = $this->request->getData('password');
            $mytoken = Security::hash(Security::randomBytes(32));

            $user->email = $myemail;
            $user->role_id = $myrole;
            $user->password = $mypass;
            $user->token = $mytoken;

            if($userTable->save($user)){
                $this->Flash->set('Regiter successful, your confirmation email has been sent', ['element' => 'success']);

                // Sample SMTP configuration.
                Email::configTransport('gmail', [
                    'host' => 'ssl://smtp.gmail.com',
                    'port' => 465,
                    'username' => 'billmcquack.peru@gmail.com',
                    'password' => 'Billmcquack6',
                    'className' => 'Smtp'
                ]);

                $email = new Email('default');
                $email->transport('gmail');
                $email->emailFormat('html');
                $email->from('billmcquack.peru@gmail.com');
                $email->subject('Please confirm your email to activation your account');
                $email->to($myemail);
                $email->send('Hi,'.$myname.'<br/>Please confirm your email link below<br/><a href="http://198.23.255.30/~u20180584/facturacion/users/verification/'.$mytoken.'">Verification Email</a><br/>Thank you for joining us');
            }else{
                $this->Flash->set('Regiter failed, please try again', ['element' => 'error']);
            }
        }
    }
    public function verification($token)
    {
        $userTable = TableRegistry::get('Users');
        $verify = $userTable->find('all')->where(['token' => $token])->first();
        $verify->verification = 1;
        $verify->status = 1;
        $userTable->save($verify);
    }

    public function initialize()
    {
        //parent::initialize();
        //$this->Auth->allow(['logout', 'login', 'display', 'view', 'index', 'register', 'verification']);
        /*
        $email = $this->Auth->user('email');
        $this->loadModel('Users');
            
        $role = $this->Users->find('all', ['conditions' => ['email'=>$email], 'fields' => ['role_id']])->first();

        if($role->role_id === 1){
            $this->Auth->allow(['logout', 'display', 'view', 'index', 'add', 'edit', 'delete', 'register', 'verification']);
            //return true;
        }else{
            $this->Auth->allow(['logout', 'display', 'view', 'index', 'register', 'verification']);
            //return false;
        }*/

        /*
        $user = $this->Auth->user('email');
        $this->loadModel('Users');
            
        //$role = $this->Users->find('all', ['conditions' => ['email'=>$user], 'fields' => ['role_id']])->first();
        //$action = $this->request->getParam('action');
        if($role === 1){
            $this->Auth->allow(['logout', 'display', 'view', 'index', 'add', 'edit', 'register', 'verification']);
        }else{
            $this->Auth->allow(['logout', 'display', 'view', 'index', 'register', 'verification']);
        }*/

         parent::initialize();
        // Add the 'add' action to the allowed actions list.
        $this->Auth->allow(['logout', 'add']);
    }
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        //$this->set('loggedIn', false);
        $this->Auth->logout();
        return $this->redirect('/');
    }
    public function login()
    {
        if ($this->request->is('post')) { 
            // validate the user-entered Captcha code 
            $isHuman = captcha_validate($this->request->data['CaptchaCode']); 

            // clear previous user input, since each Captcha code can only be validated once 
            unset($this->request->data['CaptchaCode']); 
            $user = false;
            if ($isHuman) { 
                $user = $this->Auth->identify();
              // TODO: Captcha validation passed, perform protected action 
            } else { 

              // TODO: Captcha validation failed, show error message 
            } 
        
            //$email = $user->email;
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Persons']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
