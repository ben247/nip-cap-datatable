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
    ('', 'WS_Aota', 12345, 'Dave', 'dave@email.com', 2018-06-08, 'https://drive.google.com/open?id=15bL-UHcP-crInLYVtIeofgZ0Mhh5uGO1'),
    ('', 'WS_Asalmagaru', 12346, 'Barry', 'baz@email.com', 2018-09-04, 'https://drive.google.com/open?id=15bL-UHcP-crInLYVtIeofgZ0Mhh5uGO1'),
    ('', 'WS_Asorok', 12347, 'Andy', 'andy@email.com', 2018-03-05, 'https://drive.google.com/open?id=15bL-UHcP-crInLYVtIeofgZ0Mhh5uGO1');

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

