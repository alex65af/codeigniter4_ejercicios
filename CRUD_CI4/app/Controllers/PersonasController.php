<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PersonasController extends ResourceController
{
    protected $modelName = 'App\Models\Personas';
    protected $format = 'json';
    /**         
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        $fileDir = WRITEPATH . 'uploads/' . $data['image'];
        $data['image'] = $fileDir;
        if (is_null($data)) {
            return $this->fail(['error' => 'Project does not exist'], 404);
        }
        return $this->respond($data, 200);
    }
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $file = $this->request->getFile('image');
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'image' => $newName,
            'correo' => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'estado_civil' => $this->request->getPost('estado_civil'),
            'hijos' => $this->request->getPost('hijos'),
            'intereses' => $this->request->getPost('intereses')
        ];
        if ($this->model->insert($data) === false) {
            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response, 409);
        }
        return $this->respond(['message' => 'Nuevo Registros'], 201);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond(['message' => 'Deleted Successfully'], 200);
    }
}
