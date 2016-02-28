<?php

namespace Simple\Controller;

use Mvc\Core\Controller;
use Simple\Model\UserModel;

class UserController extends Controller
{

    /**
     * Get users with filtering support,
     * Example urls,
     *  - http://api.e-vidence.local/users
     *  - http://api.e-vidence.local/users?fields=id,first_name
     *  - http://api.e-vidence.local/users?fields=id,first_name, last_name
     */
    public function actionGetUsers()
    {
        $fieldsStr = $this->getApp()->request()->get('fields', '');
        $fields = explode(',', $fieldsStr);
        foreach ($fields as $key => $field) {
            $field = trim($field);
            if (!$field) {
                unset($fields[$key]);
            }
            // TODO do safety check for fields
        }
        $userModel = new UserModel();
        if (!$result = $userModel->getAllUsers($fields)) {
            $result = array();
        }
        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
