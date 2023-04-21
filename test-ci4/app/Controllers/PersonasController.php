<?php

namespace App\Controllers;

use App\Models\PersonasModel;
use CodeIgniter\Controller;

class PersonasController extends Controller
{

    private $persona = '';
    public function __construct()
    {
        $this->persona = new PersonasModel();
    }

    public function index()
    {
        $session = session();
        $data['personas'] = $this->persona->orderBy('id', 'DESC')->findAll();
        return view('personas', $data);
    }

    public function registro()
    {
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'image' => $this->request->getVar('image'),
            'correo' => $this->request->getVar('correo'),
            'telefono' => $this->request->getVar('telefono'),
            'estado_civil' => $this->request->getVar('estado_civil'),
            'hijos' => $this->request->getVar('hijos'),
            'intereses' => $this->request->getVar('intereses'),
        ];

        // 'product' => $this->request->getVar('product'),
        // id nombre image correo telefono estado_civil hijos intereses
        $this->persona->insert($data);
        $session = session();
        $session->setFlashdata('msg', 'Persona Registrada Correctamente');
        return $this->response->redirect(site_url('/list'));
    }
}
