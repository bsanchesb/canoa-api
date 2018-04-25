<?php

namespace App\Controller;

use App\Controller\AppController;
use RestApi\Controller\ApiController;
use Cake\Network\Exception\NotFoundException;

class VehiclesController extends ApiController {
    


    public function index() {
        
        $this->request->allowMethod('get');
        $vehicles = $this->getTableLocator()->get('vehicles')->find('all')->toArray();
        $this->apiResponse['vehicles'] = $vehicles;
    }

    public function view($id = null) {
        $this->request->allowMethod('get');
        $vehicles = $this->getTableLocator()->get('vehicles')->find('all')->where(['id' => $id])->toArray();
        $this->apiResponse['vehicles'] = $vehicles;
    }

    public function add() {
        $this->request->allowMethod('post');
        $vehicles = $this->Vehicles->newEntity($this->request->getData());


        if ($vehicles->errors()) {
            $this->apiResponse['error'] = $vehicles->errors();
            return;
        }

        if ($this->request->is('post')) {
            $vehicles = $this->Vehicles->patchEntity($vehicles, $this->request->getData());
            $this->Vehicles->save($vehicles);
            $this->apiResponse['vehicles'] = $vehicles;
        }
    }

    public function edit($id = null) {
        $this->request->allowMethod('put');
        $vehicles = $this->Vehicles->findById($id)->firstOrFail();
        if ($this->request->is(['put'])) {
            $this->Vehicles->patchEntity($vehicles, $this->request->getData());
            if ($this->Vehicles->save($vehicles)) {
                $this->apiResponse['vehicles'] = $vehicles;
            }
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod(['delete']);
        $vehicles = $this->Vehicles->findById($id)->firstOrFail();
        if ($this->Vehicles->delete($vehicles)) {
            $this->apiResponse['vehicles'] = $vehicles;
        }
    }

}
