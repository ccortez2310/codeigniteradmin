<?php

namespace App\Controllers;

use App\Models\CompaniesModel;

class Company extends BaseController
{
    public function index()
    {
        $model = new CompaniesModel();

        $data = [
            'companies' => $model->orderBy('id', 'DESC')->paginate(5),
            'pager' => $model->pager
        ];

        return view('companies/index', $data);
    }

    public function create()
    {
        return view('companies/create');
    }

    public function store()
    {

        $error = $this->validate([
            'name' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'El nombre de la empresa es requerido',
                    'min_length' => 'El nombre de la empresa debe tener al menos 5 caracteres',
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => 'La dirección de la empresa es requerida',
                    'min_length' => 'La dirección de la empresa debe tener al menos 15 caracteres',
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El teléfono de la empresa es requerido'
                ]
            ],
            'nit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El NIT de la empresa es requerido'
                ]
            ],
            'nrc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El NRC de la empresa es requerido'
                ]
            ],
            'business_line' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El giro de la empresa es requerido'
                ]
            ],
            'legal_representative' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'El representante legal de la empresa es requerido',
                    'min_length' => 'El nombre del representante debe tener al menos 8 caracteres',
                ]
            ],
        ]);

        if (!$error) {

            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());

        } else {
            $company = new CompaniesModel();

            $company->save([
                'name' => $this->request->getVar('name'),
                'address' => $this->request->getVar('address'),
                'phone' => $this->request->getVar('phone'),
                'nit' => $this->request->getVar('nit'),
                'nrc' => $this->request->getVar('nrc'),
                'business_line' => $this->request->getVar('business_line'),
                'legal_representative' => $this->request->getVar('legal_representative')
            ]);

            $session = \Config\Services::session();

            $session->setFlashdata('alert-type', 'alert-success');
            $session->setFlashdata('alert-title', 'Empresa Registrada');
            $session->setFlashdata('alert-message', 'Los datos de la empresa han sido registrados éxitosamente.');

            return $this->response->redirect(site_url('/companies'));
        }
    }

    public function edit($id = 0)
    {
        $model = new CompaniesModel();

        $company = $model->where('id', $id)->first();

        $data = [
            'company' => $company
        ];

        return view('companies/edit', $data);

    }

    public function update($id)
    {
        $error = $this->validate([
            'name' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'El nombre de la empresa es requerido',
                    'min_length' => 'El nombre de la empresa debe tener al menos 5 caracteres',
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => 'La dirección de la empresa es requerida',
                    'min_length' => 'La dirección de la empresa debe tener al menos 15 caracteres',
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El teléfono de la empresa es requerido'
                ]
            ],
            'nit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El NIT de la empresa es requerido'
                ]
            ],
            'nrc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El NRC de la empresa es requerido'
                ]
            ],
            'business_line' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El giro de la empresa es requerido'
                ]
            ],
            'legal_representative' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'El representante legal de la empresa es requerido',
                    'min_length' => 'El nombre del representante debe tener al menos 8 caracteres',
                ]
            ],
        ]);

        if (!$error) {

            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());

        } else {
            $company = new CompaniesModel();

            $data= [
                'name' => $this->request->getVar('name'),
                'address' => $this->request->getVar('address'),
                'phone' => $this->request->getVar('phone'),
                'nit' => $this->request->getVar('nit'),
                'nrc' => $this->request->getVar('nrc'),
                'business_line' => $this->request->getVar('business_line'),
                'legal_representative' => $this->request->getVar('legal_representative')
            ];

            $company->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('alert-type', 'alert-info');
            $session->setFlashdata('alert-title', 'Empresa Actualizada');
            $session->setFlashdata('alert-message', 'Los datos de la empresa han sido actualizados éxitosamente.');

            return $this->response->redirect(site_url('/companies'));
        }
    }

}
