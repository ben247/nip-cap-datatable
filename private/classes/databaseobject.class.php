<?php

class DatabaseObject {

  static protected $database;
  static protected $table_name = "";
  static protected $columns = [];
  public $errors = [];

  static public function set_database($database) {
    self::$database = $database;
  }
    
  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
  } 
  // results into objects
  $object_array = [];
  while($record = $result->fetch_assoc()) {
    $object_array[] = static::instantiate($record);
  }
  $result->free();
  return $object_array;
  }
    
  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }

  static public function count_all() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  static public function find_by_system_name($system_name) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE system_name='" . self::$database->escape_string($system_name) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
    
  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  // dwssp
  static public function find_by_id_dwssp($id) {
    $sql = "SELECT * FROM " . static::$dwssp_table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  } 

  // inner join - SELECT * FROM t01a_water_system INNER JOIN t04_dwssp USING (system_name) ;
  // $sql .= " LEFT JOIN t04_dwssp ON t04_dwssp.system_name = t01a_water_system.system_name WHERE t01a_water_system.system_name = '" . self::$database->escape_string($system_name) . "'";
  static public function find_by_left_join($system_name) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= " LEFT JOIN t04_dwssp";
    $sql .= " ON t04_dwssp.system_id = t01a_water_system.system_name";
    $sql .= " LEFT JOIN t02_water_committee";
    $sql .= " ON t02_water_committee.system_id = t01a_water_system.system_name";
    $sql .= " LEFT JOIN t03_dqwt";
    $sql .= " ON t03_dqwt.system_id = t01a_water_system.system_name";
    $sql .= " WHERE t01a_water_system.system_name='" . self::$database->escape_string($system_name) . "'";
    $sql .= " GROUP BY t01a_water_system.system_name";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return ($obj_array);
    } else {
      return false;
    }
  }
    
  static protected function instantiate($record) {
    $object = new static;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }
    
  protected function validate() {
    $this->errors = [];
    // add custom validations
    return $this->errors;
  }

  // create dynamic attribute list
  public function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }
    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  public function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }   
    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }
    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  // properties which have database columns, excluding ID
  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
        $attributes[$column] = $this->$column;
      }
      return $attributes;
    }

  // sanitize using escape_string()
  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  // after deleting, the instance of the object will still exist
  // this can be usful..
  // echo $user->first_name . " was deleted. ";
  }
    
// ----- END OF ACTIVE RECORD CODE ------
}

?>