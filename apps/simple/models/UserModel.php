<?php

namespace Simple\Model;

use Mvc\Core\Model;

class UserModel extends Model
{

      /**
       * Get all users with field filtering support,
       *
       * @param array $fields the fields to be return
       * @return array|static[]
       */
      public function getAllUsers($fields = array()) {
          // TODO: DAL(Database Access Layer) is recommended
          if ($fields && is_array($fields)) {
              // TODO: Implements dynamical fields security
              foreach ($fields as $key => $field) {
                  $fields[$key] = "''" . str_replace("''", "''", $field) . "''";
              }
              unset($key, $field);
              $fieldsStr = join(',', $fields);
          } else {
              $fieldsStr = '*';
          }
          $sql = 'SELECT ' . $fieldsStr . ' FROM users;';
          $sth = $this->getConnection()->query($sql);
          $sth->setFetchMode(\PDO::FETCH_ASSOC);
          return $sth->fetchAll();
      }

  }
