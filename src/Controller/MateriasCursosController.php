<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MateriasCursos Controller
 *
 * @property \App\Model\Table\MateriasCursosTable $MateriasCursos
 *
 * @method \App\Model\Entity\MateriasCurso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MateriasCursosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $materiasCursos = $this->paginate($this->MateriasCursos);

        $this->set(compact('materiasCursos'));
    }

    /**
     * View method
     *
     * @param string|null $id Materias Curso id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materiasCurso = $this->MateriasCursos->get($id, [
            'contain' => []
        ]);

        $this->set('materiasCurso', $materiasCurso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materiasCurso = $this->MateriasCursos->newEntity();
        if ($this->request->is('post')) {
            $materiasCurso = $this->MateriasCursos->patchEntity($materiasCurso, $this->request->getData());
            if ($this->MateriasCursos->save($materiasCurso)) {
                $this->Flash->success(__('The materias curso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materias curso could not be saved. Please, try again.'));
        }
        $this->set(compact('materiasCurso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materias Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materiasCurso = $this->MateriasCursos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materiasCurso = $this->MateriasCursos->patchEntity($materiasCurso, $this->request->getData());
            if ($this->MateriasCursos->save($materiasCurso)) {
                $this->Flash->success(__('The materias curso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materias curso could not be saved. Please, try again.'));
        }
        $this->set(compact('materiasCurso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materias Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materiasCurso = $this->MateriasCursos->get($id);
        if ($this->MateriasCursos->delete($materiasCurso)) {
            $this->Flash->success(__('The materias curso has been deleted.'));
        } else {
            $this->Flash->error(__('The materias curso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
