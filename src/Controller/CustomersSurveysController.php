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
     * Add method. Surveys and its children SurveysQuestions are the blueprint for CustomersSurveys and CustomersSurveysAnswers
     * every SurveysQuestion has a corresponding CustomersSurveysAnswer
     * to use a proper validation for every model child the nested object is built in the controller method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Surveys');
        $this->loadModel('CustomersSurveysAnswers');

        if ($this->request->is('get')){
            if($this->request['data']['customers_id']){
                return $this->redirect(['controller'=>'Customers','action' => 'surveys',$this->request['data']['customers_id']]);
            }
            return $this->redirect(['controller'=>'Customers','action' => 'index']);

        }

        // init call of method. we need to built nested object first
        if ($this->request->is('post') && !isset($this->request['data']['action'])){
            $customersId = $this->request['data']['customers_id'];
            $surveysId = $this->request['data']['surveys_id'];
        }

        if ($this->request->is('post') && isset($this->request['data']['action'])) {
            $customersId = $this->request['data']['CustomersSurveys']['customers_id'];
            $surveysId = $this->request['data']['CustomersSurveys']['surveys_id'];
        }

        $survey = $this->Surveys->get($surveysId,['contain'=>['SurveysQuestions']]);

        $data = [];

        foreach($survey->SurveysQuestions as $surveysQuestion){

            $data['CustomersSurveys']['CustomersSurveysAnswers'][] = ['surveys_questions_id' => $surveysQuestion->id];
        }

        $customersSurvey = $this->CustomersSurveys->newEntities($data, [
            'associated' => ['CustomersSurveysAnswers' =>
                ['fieldList' => 'surveys_questions_id', 'validate' => false,]
            ]]);

        // we need one main object with nested children, method return array of objects
        $customersSurvey = $customersSurvey[0];


        if ($this->request->is('post') && isset($this->request['data']['action'])) {
            $customersSurvey = $this->CustomersSurveys->patchEntity($customersSurvey, $this->request->data);
                if ($this->CustomersSurveys->save($customersSurvey)) {
                    $this->Flash->success(__('The customers survey has been saved.'));
                    return $this->redirect(['controller'=>'Customers','action' => 'surveys',$customersId]);
                } else {
                    $this->Flash->error(__('The customers survey could not be saved. Please, try again.'));
                }
        }

        $this->set('customersId', $customersId );
        $this->set(compact('customersSurvey', 'survey'));
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
            'contain' => [ 'CustomersSurveysAnswers' => [ 'SurveysQuestions' ], 'Surveys']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $customersSurvey = $this->CustomersSurveys->patchEntity($customersSurvey, $this->request->data , [
            'associated' => ['CustomersSurveysAnswers']
            ]);

            if ($this->CustomersSurveys->save($customersSurvey)) {
                $this->Flash->success(__('The customers survey has been saved.'));
               return $this->redirect(['controller'=>'Customers','action' => 'surveys',$customersSurvey->customers_id]);
            } else {
                $this->Flash->error(__('The customers survey could not be saved. Please, try again.'));
            }
        }

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
