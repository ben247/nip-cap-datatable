<?php

class WaterSystem {

  // ----------START OF ACTIVE RECORD CODE----------
// tell the class what database it should be using
// static makes accessible without an instantiation
  static protected $database;
  static protected $db_columns = ['id', 'system_name', 'area_council', 'island', 'province', 'latitude', 'longitude', 'elevation', 'resource_type', 'system_type', 'improved', 'functionality', 'number_users'];

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
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM t01a_water_system";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM t01a_water_system ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = self::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  // create dynamic attribute list
  public function create() {
    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO t01a_water_system (";
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
    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }
    $sql = "UPDATE t01a_water_system SET ";
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
    foreach(self::$db_columns as $column) {
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

  // ----- END OF ACTIVE RECORD CODE ------

  public $system_name;
  public $id;
  public $area_council;
  public $island;
  public $province;
  public $latitude;
  public $longitude;
  public $elevation;
  public $resource_type;
  public $system_type;
  public $improved;
  public $functionality;
  public $number_users;

  public const AREA_COUNCIL = ['Canal - Fanafo', 'Central Area Council', 'Central Pentecost 2', 'East Efate', 'East Malo', 'Emau', 'Erakor', 'Eratap', 'Erromango', 'Eton', 'Futuna', 'Gaua', 'Makimae', 'Malorua', 'Middle Bush Tanna', 'NE Tanna', 'Nguna/Pele', 'North Efate', 'North Erromango', 'North Pentecost', 'North Santo', 'North Tanna', 'North Tongoa', 'North West Efate', 'Paama', 'Port Vila', 'South East Malekula', 'South Erromango', 'South Malekula', 'South Santo', 'South Tanna', 'South West Malekula', 'South West Tanna', 'Southern Area Council', 'Tongariki', 'Torres', 'Vanua Lava', 'Varisu', 'Vermali', 'Vermaul', 'West Malo', 'West Tanna', 'Whitesands', 'Yarsu'];

  public const ISLAND = ['AESE', 'AKHAMB', 'AMBAE', 'AMBRYM', 'ANEITYUM', 'ANIWA', 'AORE', 'ARAKI', 'ARSEO', 'ARTOKA (HAT)', 'ATCHIN', 'AVOKH', 'AWEI', 'BATGHUTONG', 'BOKISSA', 'BUNINGA', 'EFATE', 'EKAPUM', 'EMAE', 'EMAU', 'EPI', 'ERAKOR', 'ERATAP', 'ERROMANGO', 'ERUETI', 'FUTUNA', 'GAUA', 'HIDEAWAY', 'HIU', 'IFIRA', 'INYEUC (MYSTERY)', 'IRIRIKI', 'KAKULA', 'KHUNEVEO', 'KWAKEA', 'LAMEN', 'LATHI (SAKAO)', 'LATHU', 'LE THARIA', 'LE THARO', 'LELEPA', 'LEMBONG', 'LINUA', 'LOH', 'LOPEVI', 'MAEWO', 'MAKIRA', 'MALEKULA', 'MALO', 'MALOKILIKILI', 'MALPARAVU (OYSTER)', 'MATASO', 'MAVEA', 'MERE LAVA', 'MERIG', 'METOMA', 'MOSO', 'MOTA', 'MOTA LAVA', 'NGUNA', 'NORSUP', 'PAAMA', 'PELE', 'PENTECOST', 'RAH', 'RANO', 'RATUA', 'REEF', 'SAKAO (KHOTI)', 'SANTO', 'TANGISI', 'TANGOA', 'TANNA', 'TEGUA', 'THION', 'TOGA', 'TOMMAN', 'TONGARIKI', 'TONGOA', 'TUTUBA', 'ULIVEO', 'URELAPA', 'UREPARAPARA', 'URI', 'URIPIV', 'VALA', 'VANUA LAVA', 'VAO', 'VENUE', 'VOT TANDE', 'WALA'];

  public const PROVINCE = ['MALAMPA', 'PENAMA', 'SANMA', 'SHEFA', 'TAFEA', 'TORBA',];

  public const RESOURCE_TYPE = ['Surface', 'Rain', 'Ground', 'Gravity Feed'];

  public const SYSTEM_TYPE = ['Direct Gravity Feed', 'Indirect Gravity Feed', 'Rainwater Capture'];

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->system_name = $args['system_name'] ?? '';
    $this->id = $args['id'] ?? '';
    $this->area_council = $args['area_council'] ?? '';
    $this->island = $args['island'] ?? '';
    $this->province = $args['province'] ?? '';
    $this->latitude = $args['latitude'] ?? '';
    $this->longitude = $args['longitude'] ?? '';
    $this->elevation = $args['elevation'] ?? '';
    $this->resource_type = $args['resource_type'] ?? '';
    $this->system_type = $args['system_type'] ?? '';
    $this->improved = $args['improved'] ?? '';
    $this->functionality = $args['functionality'] ?? '';
    $this->number_users = $args['number_users'] ?? '';

    // Caution: allows private/protected properties to be set
    // foreach($args as $k => $v) {
    //   if(property_exists($this, $k)) {
    //     $this->$k = $v;
    //   }
    // }
  }

  public function name() {
    return "{$this->system_name} {$this->area_council} {$this->island}";
  }

}

?>
