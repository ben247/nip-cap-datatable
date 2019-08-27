CREATE TABLE t03_dqwt
(
  id INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
  system_id VARCHAR
(255),
  s1a_sampleid VARCHAR
(255),
  s1a1_samplesiteid VARCHAR
(255),
  s1b_samplesitename VARCHAR
(255),
  s1c_area_council VARCHAR
(255),
  s1d_island VARCHAR
(255),
  s1e_province VARCHAR
(255),
  s1f_date DATE,
  s2a_latitude DECIMAL
(11, 8) NOT NULL,
  s2b_longitude DECIMAL
(11, 8) NOT NULL,
  s2c_elevation INT
(11),
  s2d_flowrate INT
(11),
  s2e_description VARCHAR
(255),
  s3a_sourcetype VARCHAR
(255),
  s3b_specsourcetype VARCHAR
(255),
  s3c_systemtype VARCHAR
(255),
  s4a_conductivity VARCHAR
(255),
  s4b_turbidity VARCHAR
(255),
  s4c_ph VARCHAR
(255),
  s4d_tasteodor VARCHAR
(255),
  s4e_hardness VARCHAR
(255),
  s5a_fluoride VARCHAR
(255),
  s5b_arsenic VARCHAR
(255),
  s5c_copper VARCHAR
(255),
  s5d_lead VARCHAR
(255),
  s5e_iron VARCHAR
(255),
  s6a0_ecolitest VARCHAR
(255),
  s6a_ecoli VARCHAR
(255),
  s6b_totalcoli VARCHAR
(255),
  s6c_faecalcoli VARCHAR
(255),
  s7a_comments VARCHAR
(255),
  s8a_shared VARCHAR
(255)
  FOREIGN KEY
(system_id) REFERENCES t01a_water_system
(system_name)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- set existing column to auto-increment
ALTER TABLE users MODIFY id INTEGER NOT NULL AUTO_INCREMENT;

CREATE TABLE t02_water_committee
(
  id INT(11) NOT NULL
  AUTO_INCREMENT,
  system_id VARCHAR
  (255),
  wc_id INT
  (11),
  date_reg DATE,
  req_name VARCHAR
  (255),
  no_men INT
  (11),
  no_women INT
  (11),
  PRIMARY KEY
  (wc_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

  SELECT *
  FROM t01a_water_system LEFT JOIN t04_dwssp ON t04_dwssp.system_name = t01a_water_system.system_name
  WHERE t01a_water_system.system_name = 'WS_Aota'

  INSERT INTO 
t02_water_committee
  VALUES
    ('', 'WS_Aota', 12345, 2018-11-04, 'DATA', 'YES', 'NO'),
    ('', 'WS_Asalmagaru', 12346, 2018-11-04, 'DATA', 'YES', 'NO'),
    ('', 'WS_Asorok', 12347, 2018-11-04, 'DATA', 'YES', 'NO');

  CREATE TABLE t04_dwssp
  (
    id INT(11) NOT NULL
    AUTO_INCREMENT,
  system_name VARCHAR
    (255),
  dwssp_id VARCHAR
    (255),
  facilitator_cd00a VARCHAR
    (255),
  email_cd00b VARCHAR
    (255),
  date_cd007 DATE NOT NULL,
  document VARCHAR
    (255),
  PRIMARY KEY
    (dwssp_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

    -- inner join

    SELECT *
    FROM t01a_water_system INNER JOIN t04_dwssp USING (system_name) 
    ;

    -- reset table auto increment column id
    SET @autoid :=0;
    UPDATE t01a_water_system SET id = @autoid
    :=
    (@autoid+1);
    ALTER TABLE t01a_water_system AUTO_INCREMENT = 1;
    -- end

    DROP TABLE IF EXISTS t01a_water_system;
    CREATE TABLE t01a_water_system
    (
      id int
(11) NOT NULL
      AUTO_INCREMENT,
  system_name varchar
      (255) NOT NULL,
  area_council varchar
      (255) NOT NULL,
  island varchar
      (255) NOT NULL,
  province varchar
      (255) NOT NULL,
  latitude DECIMAL
      (11, 8) NOT NULL,
  longitude DECIMAL
      (11, 8) NOT NULL,
  water_resource varchar
      (255) NOT NULL,
  water_system varchar
      (255) NOT NULL,
  improved varchar
      (255) NOT NULL,
  elevation varchar
      (255) NOT NULL,
  functionality varchar
      (255) NOT NULL,
  number_users varchar
      (255) NOT NULL,
  PRIMARY KEY
      (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

      INSERT INTO 
bicycles
      VALUES
        (1, 'Trek', 'Emonda', 2017, 'Hybrid', 'Unisex', 'black', 1495.00, 1.50000, 5, ''),
        (2, 'Cannondale', 'Synapse', 2016, 'Road', 'Unisex', 'matte black', 1999.00, 1.00000, 5, '');

      DROP TABLE IF EXISTS t04_dwssp;
      CREATE TABLE t04_dwssp
      (
        id int
(11) NOT NULL
        AUTO_INCREMENT,
  system_name varchar
        (255) NOT NULL,
  dwssp_id varchar
        (255) NOT NULL,
  facilitator_cd00a varchar
        (255) NOT NULL,
  email_cd00b varchar
        (255) NOT NULL,
  date_cd007 varchar
        (255) NOT NULL,
  document varchar
        (255) NOT NULL,
  PRIMARY KEY
        (dwssp_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

