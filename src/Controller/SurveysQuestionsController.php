<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SurveysQuestions Controller
 *
 * @property \App\Model\Table\SurveysQuestionsTable $SurveysQuestions
 */
class SurveysQuestionsController extends AppController
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
        $surveysQuestions = $this->paginate($this->SurveysQuestions);

        $this->set(compact('surveysQuestions'));
        $this->set('_serialize', ['surveysQuestions']);
    }

    /**
     * View method
     *
     * @param string|null $id Surveys Question id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $surveysQuestion = $this->SurveysQuestions->get($id, [
            'contain' => ['Surveys']
        ]);

        $this->set('surveysQuestion', $surveysQuestion);
        $this->set('_serialize', ['surveysQuestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $surveysQuestion = $this->SurveysQuestions->newEntity();
        if ($this->request->is('post')) {
            $surveysQuestion = $this->SurveysQuestions->patchEntity($surveysQuestion, $this->request->data);
            if ($this->SurveysQuestions->save($surveysQuestion)) {
                $this->Flash->success(__('The surveys question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The surveys question could not be saved. Please, try again.'));
            }
        }
        $surveys = $this->SurveysQuestions->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('surveysQuestion', 'surveys'));
        $this->set('_serialize', ['surveysQuestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Surveys Question id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $surveysQuestion = $this->SurveysQuestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $surveysQuestion = $this->SurveysQuestions->patchEntity($surveysQuestion, $this->request->data);
            if ($this->SurveysQuestions->save($surveysQuestion)) {
                $this->Flash->success(__('The surveys question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The surveys question could not be saved. Please, try again.'));
            }
        }
        $surveys = $this->SurveysQuestions->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('surveysQuestion', 'surveys'));
        $this->set('_serialize', ['surveysQuestion']);
    }

    /**
     * Ajax method to show modal with form for one single Question
     * @param null $id
     */
    public function editModal($id = null)
    {



        $surveysQuestion = $this->SurveysQuestions->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->autoRender = false;
            $surveysQuestion = $this->SurveysQuestions->patchEntity($surveysQuestion, $this->request->data);
            if ($this->SurveysQuestions->save($surveysQuestion)) {
                $message = [
                    'save_success' => true,
                    'message'=>__('The surveys question has been saved.')
                ];
            } else {
                $message = [
                    'save_success' => false,
                    'message'=>__('The surveys question could not be saved. Please, try again.')
                ];
            }
            $this->response->body(json_encode($message));
            return $this->response;
        }
        $this->viewBuilder()->layout('modal');
        $this->set('surveysQuestion', $surveysQuestion);
    }

    /**
     * Delete method
     *
     * @param string|null $id Surveys Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $surveysQuestion = $this->SurveysQuestions->get($id);
        if ($this->SurveysQuestions->delete($surveysQuestion)) {
            $this->Flash->success(__('The surveys question has been deleted.'));
        } else {
            $this->Flash->error(__('The surveys question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
