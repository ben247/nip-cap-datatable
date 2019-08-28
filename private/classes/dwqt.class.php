<?php

class Dwqt extends SubTable {
    static protected $dwqt_table_name = 't03_dqwt';
    static protected $dwqt_db_columns = ['id', 'system_id', 'dwssp_id', 'facilitator_cd00a', 'email_cd00b', 'date_cd007', 'document'];

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->system_id = $args['system_id'] ?? '';
        $this->dwssp_id = $args['dwssp_id'] ?? '';
        $this->facilitator_cd00a = $args['facilitator_cd00a'] ?? '';
        $this->date_cd007 = $args['date_cd007'] ?? '';
        $this->document = $args['document'] ?? '';
    }
    
}

?>