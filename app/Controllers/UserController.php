<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Helpers\Validation;

class UserController extends BaseController {
    public function Index() {

        $model = new UserModel();

        $data['users'] = $model->getUsers();

        return view('user/index', $data);
    }

    public function Create() {
        $model = new UserModel();

        if($this->request->getMethod() === 'post' && $this->validate(Validation::$userCreate)) {
            $model->save([
                'name' => $this->request->getPost('user_name'),
                'email' => $this->request->getPost('user_email'),
                'password' => $this->request->getPost('user_password'),
                'fone' => $this->request->getPost('user_fone'),
                'address' => $this->request->getPost('user_cep'),
                'user_rg' => $this->request->getPost('user_rg')
            ]);

            return redirect()->to(\base_url('/users'));
        }

        return view('user/create');
    }

    public function Update($id) {
        $model = new UserModel();

        $data['user'] = $model->getUsers($id);

        if($this->request->getMethod() === 'post' && $this->validate(Validation::$userUpdate)) {

            $password = $data['user']['password'];
            $updatePassword = !empty($this->request->getPost('user_password')) && $password != $this->request->getPost('user_password');

            if($updatePassword) $password = $this->request->getPost('user_password');
            
            $model->update($id,[
                'name' => $this->request->getPost('user_name'),
                'email' => $this->request->getPost('user_email'),
                'password' => $password,
                'fone' => $this->request->getPost('user_fone'),
                'address' => $this->request->getPost('user_cep'),
                'user_rg' => $this->request->getPost('user_rg')
            ]);

            return redirect()->to(\base_url('/users'));
        }

        return view('user/update', $data);
    }

    public function Delete($id) {
        $model = new UserModel();

        $model->delete($id);

        return redirect()->to(\base_url('/users'));
    }

    public function searchAddress($cep) {
        $client = \Config\Services::curlrequest();

        $response = $client->request('GET', "https://viacep.com.br/ws/$cep/json/");

        return $this->response->setJSON($response->getBody());
    }
}