<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * VoucherHeaders Controller
 *
 * @property \App\Model\Table\VoucherHeadersTable $VoucherHeaders
 *
 * @method \App\Model\Entity\VoucherHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VoucherHeadersController extends AppController
{    
    public $components = array('RequestHandler');
    public function isAuthorized($user)
    {        
        $email = $this->Auth->user('email');
        $this->loadModel('Users');
            
        $role = $this->Users->find('all', ['conditions' => ['email'=>$email], 'fields' => ['role_id']])->first();
        $action = $this->request->getParam('action');
        //$role = 2;
        if (in_array($action, ['add', 'edit', 'delete'])) {
            if($role->role_id === 1){
                return true;
            }else{
                return false;                
            }
        }

        return false;          
    }
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['display', 'view', 'index']);        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {        
        $this->paginate = [
            'contain' => ['VoucherTypes', 'Sellers' => ['Persons'], 'Clients' => ['Persons'], 'VoucherDetails' => ['Products']]
        ];
        $voucherHeaders = $this->paginate($this->VoucherHeaders);

        $this->set(compact('voucherHeaders'));
    }

    /**
     * View method
     *
     * @param string|null $id Voucher Header id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {        
        

        $voucherHeader = $this->VoucherHeaders->get($id, [
            'contain' => ['VoucherTypes', 'Sellers' => ['Persons'], 'Clients' => ['Persons'], 'VoucherDetails' => ['Products']]
        ]);

        $this->set('voucherHeader', $voucherHeader);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voucherHeader = $this->VoucherHeaders->newEntity();
        if ($this->request->is('post')) {
            $voucherHeader = $this->VoucherHeaders->patchEntity($voucherHeader, $this->request->getData(), [
                'associated' => [
                    'VoucherDetails'
                ]
            ]);
            if ($this->VoucherHeaders->save($voucherHeader)) {
                $this->Flash->success(__('The voucher header has been saved.'));

                return $this->redirect(['controller' => 'VoucherDetails', 'action' => 'index']);
            }
            $this->Flash->error(__('The voucher header could not be saved. Please, try again.'));
        }
        $voucherTypes = $this->VoucherHeaders->VoucherTypes->find('list', ['limit' => 200]);
        $sellers = $this->VoucherHeaders->Sellers->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);
        $clients = $this->VoucherHeaders->Clients->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);

        $voucherDetails = $this->VoucherHeaders->VoucherDetails->find('list', ['limit' => 200]);
        $products = $this->VoucherHeaders->VoucherDetails->Products->find('list', ['limit' => 200]);

        $this->set(compact('voucherHeader', 'voucherTypes', 'sellers', 'clients', 'voucherDetails', 'products'));
        $this->set('_serialize', ['voucherHeader']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher Header id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voucherHeader = $this->VoucherHeaders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucherHeader = $this->VoucherHeaders->patchEntity($voucherHeader, $this->request->getData());
            if ($this->VoucherHeaders->save($voucherHeader)) {
                $this->Flash->success(__('The voucher header has been saved.'));

                return $this->redirect(['controller' => 'VoucherDetails', 'action' => 'add']);
            }
            $this->Flash->error(__('The voucher header could not be saved. Please, try again.'));
        }
        $voucherTypes = $this->VoucherHeaders->VoucherTypes->find('list', ['limit' => 200]);
        $sellers = $this->VoucherHeaders->Sellers->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);
        $clients = $this->VoucherHeaders->Clients->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);
        $this->set(compact('voucherHeader', 'voucherTypes', 'sellers', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher Header id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voucherHeader = $this->VoucherHeaders->get($id);
        if ($this->VoucherHeaders->delete($voucherHeader)) {
            $this->Flash->success(__('The voucher header has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
?>