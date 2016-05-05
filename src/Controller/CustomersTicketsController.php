<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersTickets Controller
 *
 * @property \App\Model\Table\CustomersTicketsTable $CustomersTickets
 */
class CustomersTicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers'],
        ];
        $customersTickets = $this->paginate($this->CustomersTickets);

        $this->set(compact('customersTickets'));
        $this->set('_serialize', ['customersTickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Customers Ticket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersTicket = $this->CustomersTickets->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('customersTicket', $customersTicket);
        $this->set('_serialize', ['customersTicket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersTicket = $this->CustomersTickets->newEntity();
        if ($this->request->is('post')) {
            $customersTicket = $this->CustomersTickets->patchEntity($customersTicket, $this->request->data);
            if ($this->CustomersTickets->save($customersTicket)) {
                $this->Flash->success(__('The customers ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customers ticket could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('customersTicket'));
        $this->set('_serialize', ['customersTicket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Ticket id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersTicket = $this->CustomersTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersTicket = $this->CustomersTickets->patchEntity($customersTicket, $this->request->data);
            if ($this->CustomersTickets->save($customersTicket)) {
                $this->Flash->success(__('The customers ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customers ticket could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('customersTicket'));
        $this->set('_serialize', ['customersTicket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Ticket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersTicket = $this->CustomersTickets->get($id);
        if ($this->CustomersTickets->delete($customersTicket)) {
            $this->Flash->success(__('The customers ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The customers ticket could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
