<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Personas;

class PersonasController extends BaseController
{

  public function __construct(){
  }

  public function index()
  {
    //
    $personas = new Personas();
    $data['personas'] = $personas->findAll();
    return view('personas/index', $data);
  }

  public function create()
  {
    return view('personas/create');
  }

  public function store()
  {
    $request = service('request');
    //$fileImage = $this->request->getFile('image');
    $postData = $request->getPost();
    //$fileI = $request->getPost('image');

    if (isset($postData['submit'])) {
      ##Validation
      $input = $this->validate([
        'nombre' => 'required',
        'image' => 'required',
        'correo' => 'required',
        'telefono' => 'required',
        'estado_civil' => 'required',
        'hijos' => 'required',
        'intereses' => 'required'
      ]);
      if (!$input) {
        return redirect()->route('personas/create')->withInput()->with('validation', $this->validator);
      } else {
        $personas = new Personas();
        //Cargar imagen a la carperda "Upload" y subir el nombre de la imagen al Database 
        
        $file = $this->request->getFile('image');
        $name = $file->getName();
        $tempFile = $file->getTempName();
        $file->move(WRITEPATH, 'upload');

        // $targetDir = "upload/";
        // $file = $this->request->getFile('image');
        // $name = $file->getName();
        // $filetmp=$file->getTempName();
        // $fileName = $request->getFiles();
        // $targetFilePath = $targetDir . $fileName;
        // echo ('<script>console.log(' . json_encode($this->request->getFile('image'), JSON_HEX_TAG) . ')</script>');
        // //echo($fileImage);
        //echo($fileName);
        // echo($request->getTempName('image'));
        // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        // move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

        //Convertir el array de intereses en un solo String
        $intereses = isset($postData['intereses']) ? $postData['intereses'] : null;
        $arrayIntereses = null;
        $num_array = count($intereses);
        $contador = 0;
        if ($num_array > 0) {
          foreach ($intereses as $key => $value) {
            if ($contador != $num_array - 1)
              $arrayIntereses .= $value . ' ';
            else
              $arrayIntereses .= $value;
            $contador++;
          }
        }

        $data = [
          'nombre' => $postData['nombre'],
          'image' => $name,
          'correo' => $postData['correo'],
          'telefono' => $postData['telefono'],
          'estado_civil' => $postData['estado_civil'],
          'hijos' => $postData['hijos'],
          'intereses' => $arrayIntereses
        ];

        ##insert
        if ($personas->insert($data)) {
          session()->setFlashdata('message', 'Added Successfully!');
          session()->setFlashdata('alert-class', 'alert-success');
          return redirect()->route('personas/create');
        } else {
          session()->setFlashdata('message', 'Data not saved!');
          session()->setFlashdata('alert-class', 'alert-danger');
          return redirect()->route('personas/create')->withInput();
        }
      }
    }
  }

  public function edit($id = 0)
  {
    ##Select record By id
    $personas = new Personas();
    $persona = $personas->find($id);

    $data['persona'] = $persona;
    return view('personas/edit', $data);
  }

  public function update($id = 0)
  {
    $request = service('request');
    $postData = $request->getPost();

    if (isset($postData['submit'])) {
      $input = $this->validate([
        'nombre' => 'required',
        'image' => 'required',
        'correo' => 'required',
        'telefono' => 'required',
        'estado_civil' => 'required',
        'hijos' => 'required',
        'intereses' => 'required'
      ]);

      if (!$input) {
        return redirect()->route('personas/edit/', $id)->withInput()->with('validation', $this->validator);
      } else {
        $personas = new Personas();
        $intereses = isset($postData['intereses']) ? $postData['intereses'] : null;

        $arrayIntereses = null;
        $num_array = count($intereses);
        $contador = 0;

        if ($num_array > 0) {
          foreach ($intereses as $key => $value) {
            if ($contador != $num_array - 1)
              $arrayIntereses .= $value . ' ';
            else
              $arrayIntereses .= $value;
            $contador++;
          }
        }
        $data = [
          'nombre' => $postData['nombre'],
          'image' => $postData['image'],
          'correo' => $postData['correo'],
          'telefono' => $postData['telefono'],
          'estado_civil' => $postData['estado_civil'],
          'hijos' => $postData['hijos'],
          'intereses' => $arrayIntereses
        ];

        if ($personas->update($id, $data)) {
          session()->setFlashdata('message', 'Updated Successfully!');
          session()->setFlashdata('alert-class', 'alert-success');

          return redirect()->route('/');
        } else {
          session()->setFlashdata('message', 'Data not saved!');
          session()->setFlashdata('alert-class', 'alert-danger');

          return redirect()->route('personas/edit/' . $id)->withInput();
        }
      }
    }
  }

  public function delete($id = 0)
  {
    $personas = new Personas();

    ##Check Record
    if ($personas->find($id)) {
      $personas->delete($id);
      session()->setFlashdata('message', 'Deleted Successfully!');
      session()->setFlashdata('alert-class', 'alert-success');
    } else {
      session()->setFlashdata('message', 'Record not found!');
      session()->setFlashdata('alert-class', 'alert-danger');
    }
    return redirect()->route('/');
  }
}
