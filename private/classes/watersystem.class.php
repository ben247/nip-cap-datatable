<?php

class WaterSystem extends DatabaseObject {

// tell the class what database it should be using
// static makes accessible without an instantiation
  static protected $table_name = 't01a_water_system';
  static protected $db_columns = ['id', 'system_name', 'area_council', 'island', 'province', 'latitude', 'longitude', 'elevation', 'resource_type', 'system_type', 'improved', 'functionality', 'number_users'];

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

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->system_name)) {
      $this->errors[] = "System Name cannot be blank.";
    }
    return $this->errors;
  }

}

?>
