<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        /*
        $this->paginate = [
            'contain' => ['Countries']
        ];
        */
       
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $conditionalFind = [];
        $customersTicketsStatus = null;

        if(isset($this->request->query['customersTicketsStatus']) && !empty($this->request->query['customersTicketsStatus'])){
            $customersTicketsStatus = (int) $this->request->query['customersTicketsStatus'];
            $conditionalFind['status'] = $customersTicketsStatus;
        }

        $this->paginate = [
            'CustomersTickets' => [
                'order' => [
                    'CustomersTickets.status' => "ASC",
                     'CustomersTickets.id' => "DESC"
                ],
                'fields' => ['CustomersTickets.id', 'CustomersTickets.status'],
                'limit' => 10,
            ],
        ];



        /**  @var App\Model\Entity\Customer **/
       /*
        $customer = $this->Customers->get($id, [
            'contain' => ['CustomersTickets']
        ]);
*/

        /**  @var Cake\ORM\ResultSet **/

/*
        $query  = $this->Customers->find()->contain(['CustomersTickets'])->where([
            'id' => $id,
        ]);
*/
/*
        $query  = $this->Customers->find()->where([
            'id' => $id,
        ]);
        $customers = $this->Paginator->paginate($query);
        $customer = $customers->first();
*/
        $customer  = $this->Customers->get($id);



        $this->loadModel('CustomersTickets');

        /**  @var Cake\ORM\ResultSet **/
        $query  = $this->CustomersTickets->find('all')->where([
            'customers_id' => $id,
            $conditionalFind
        ]);

        $customersTickets = $this->Paginator->paginate($query);

        $this->set('customersTickets',$customersTickets);


        $this->loadModel('CustomersSurveys');

        /**  @var Cake\ORM\ResultSet **/
        $query  = $this->CustomersSurveys->find('all')->where([
            'customers_id' => $id,
        ])->contain([ 'CustomersSurveysAnswers' =>[ 'SurveysQuestions' ], 'Surveys']);

        $customersSurveys = $this->Paginator->paginate($query);

        $this->set('customersSurveys',$customersSurveys);



        $this->set('customer',$customer);
        $this->set('_serialize', ['customer']);

        $this->set('customersTicketsStatus',$customersTicketsStatus );
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $countries = $this->Customers->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'countries'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * v@return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $countries = $customer->countriesList;
        $this->set(compact('customer', 'countries'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
