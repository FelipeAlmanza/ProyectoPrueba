<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ViewEnrollments Controller
 *
 * @property \App\Model\Table\ViewEnrollmentsTable $ViewEnrollments
 *
 * @method \App\Model\Entity\ViewEnrollment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ViewEnrollmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Enrollments', 'Students', 'Subjects']
        ];
        $viewEnrollments = $this->paginate($this->ViewEnrollments);

        $this->set(compact('viewEnrollments'));
    }

    /**
     * View method
     *
     * @param string|null $id View Enrollment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
       //* cargamos el modelo para poder usar la funcion que programamos el en table*/ 
       $ViEnTable=$this->loadmodel('ViewEnrollments');
       $viewEnrollment = $ViEnTable->getViewEnrollment($id);
       $this->set('viewEnrollment', $viewEnrollment);
    }

}