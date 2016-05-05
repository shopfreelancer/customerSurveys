<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersSurveys Controller
 *
 * @property \App\Model\Table\CustomersSurveysTable $CustomersSurveys
 */
class CustomersSurveysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Surveys']
        ];
        $customersSurveys = $this->paginate($this->CustomersSurveys);

        $this->set(compact('customersSurveys'));
        $this->set('_serialize', ['customersSurveys']);
    }

    /**
     * View method
     *
     * @param string|null $id Customers Survey id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersSurvey = $this->CustomersSurveys->get($id, [
            'contain' => [ 'CustomersSurveysAnswers' => [ 'SurveysQuestions' ],
                            'Surveys'
            ]
        ]);

        $this->set('customersSurvey', $customersSurvey);
        $this->set('_serialize', ['customersSurvey']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersSurvey = $this->CustomersSurveys->newEntity();
        if ($this->request->is('post')) {
            $customersSurvey = $this->CustomersSurveys->patchEntity($customersSurvey, $this->request->data);
            if ($this->CustomersSurveys->save($customersSurvey)) {
                $this->Flash->success(__('The customers survey has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customers survey could not be saved. Please, try again.'));
            }
        }
        $surveys = $this->CustomersSurveys->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('customersSurvey', 'surveys'));
        $this->set('_serialize', ['customersSurvey']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Survey id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersSurvey = $this->CustomersSurveys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersSurvey = $this->CustomersSurveys->patchEntity($customersSurvey, $this->request->data);
            if ($this->CustomersSurveys->save($customersSurvey)) {
                $this->Flash->success(__('The customers survey has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customers survey could not be saved. Please, try again.'));
            }
        }
        $surveys = $this->CustomersSurveys->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('customersSurvey', 'surveys'));
        $this->set('_serialize', ['customersSurvey']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Survey id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersSurvey = $this->CustomersSurveys->get($id);
        if ($this->CustomersSurveys->delete($customersSurvey)) {
            $this->Flash->success(__('The customers survey has been deleted.'));
        } else {
            $this->Flash->error(__('The customers survey could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
