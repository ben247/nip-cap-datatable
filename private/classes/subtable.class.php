<?php

class SubTable extends WaterSystem {
    static protected $dwssp_table_name = 't04_dwssp';
    static protected $dwssp_db_columns = ['id', 'system_id', 'dwssp_id', 'facilitator_cd00a', 'email_cd00b', 'date_cd007', 'document'];

    // dwssp
    public $id;
    public $system_id;
    public $dwssp_id;
    public $facilitator_cd00a;
    public $email_cd00b;
    public $date_cd007;
    public $document;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->system_id = $args['system_id'] ?? '';
        $this->dwssp_id = $args['dwssp_id'] ?? '';
        $this->facilitator_cd00a = $args['facilitator_cd00a'] ?? '';
        $this->date_cd007 = $args['date_cd007'] ?? '';
        $this->document = $args['document'] ?? '';
    }
    // water committee
    public $wc_id;
    public $date_reg;
    public $req_name;
    public $no_men;
    public $no_women;
    
    //dwqt
    public $s1a_sampleid;
    public $s1a1_samplesiteid;
    public $s1b_samplesitename;
    public $s1c_area_council;
    public $s1d_island;
    public $s1e_province;
    public $s1f_date;
    public $s2a_latitude;
    public $s2b_longitude;
    public $s2c_elevation;
    public $s2d_flowrate;
    public $s2e_description;
    public $s3a_sourcetype;
    public $s3b_specsourcetype;
    public $s3c_systemtype;
    public $s4a_conductivity;
    public $s4b_turbidity;
    public $s4c_ph;
    public $s4d_tasteodor;
    public $s4e_hardness;
    public $s5a_fluoride;
    public $s5b_arsenic;
    public $s5c_copper;
    public $s5d_lead;
    public $s5e_iron;
    public $s6a0_ecolitest;
    public $s6a_ecoli;
    public $s6b_totalcoli;
    public $s6c_faecalcoli;
    public $s7a_comments;
    public $s8a_shared;
}

?>