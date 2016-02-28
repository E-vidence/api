<?php
namespace Mvc\Core;

abstract class Model
{
  protected $appName = "default";
  protected $config = array();

  /**
   * Gets the Slim Application instance
   *
   * @return \Slim\Slim
   */
  protected function getApp() {
      return \Slim\Slim::getInstance($this->appName);
  }

  /**
   * Gets the configuration instance of the related Slim Application
   *
   * @return array
   */
  protected function getConfig() {
      return $this->config;
  }
  /**
   * Constructor
   *
   * @param array $config the configurations
   */
  public function __construct($config = array()) {
      $this->config = $this->getApp()->container['settings'];
      if ($config && is_array($config)) {
          $this->config = array_merge($config, $this->config);
      }
  }
  /**
   * Gets Database connection
   *
   * @param int $type the connection type
   *
   * @return \PDO
   */
  protected function getConnection()
  {

      $dbConfig = $this->config['pdo']['default'];
      $dbh = new \PDO(
          $dbConfig['dsn'],
          $dbConfig['username'],
          $dbConfig['password']
      );
      $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false); // disable prepared statements
      return $dbh;
  }

  /**
   * Gets Model instance
   *
   * @param array $config the configurations
   *
   * @return Model
   */
  public static function instance($config)
  {
      $className = get_called_class();
      return new $className($config);
  }
}
