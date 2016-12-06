<?php

/**
 * Return a list of all the counties
 */

function serbiamunicipalities_listcounties() {
  $countryIso = 'RS';
  $counties = array(
    'Nueva Segovia' => array(
      'Jalapa',
      'Santa María',
      'Macuelizo',
      'Dipilto',
      'Ocotal',
      'Mozonte',
      'San Fernando',
      'Ciudad Antigua',
      'El Jicaro',
      'Murra',
      'Quilali',
      'Wiwili-Nueva Segovia',
    ),
    'Madriz' => array(
      'Somoto',
      'Yalaguina',
      'Totogalpa',
      'Palacaguina',
      'Telpaneca',
      'San Juan del Rio Coco',
      'San Lucas',
      'Las Sabanas',
      'San José de Cusmapa',
    ),
    'Estelí' => array(
      'Pueblo Nuevo',
      'Condega',
      'San Juan de Limay',
      'Estelí',
      'San Nicolás',
      'La Trinidad',
    ),
    'Chinandega' => array(
      'San Pedro del Norte',
      'Santo Tomás del Norte',
      'Cinco Pinos',
      'San Francisco del Norte',
      'El Viejo',
      'Puerto Morazán',
      'Somotillo',
      'Villa Nueva',
      'Corinto',
      'El Realejo',
      'Chinandega',
      'Chichigalpa',
      'Posoltega',
    ),
    'León' => array(
      'Achuapa',
      'El Sauce',
      'Santa Rosa del Peñon',
      'Quezalguaque',
      'Telica',
      'Larreynaga',
      'El Jicaral',
      'León',
      'La Paz Centro',
      'Nagarote',
    ),
    'Managua' => array(
      'San Francisco Libre',
      'Tipitapa',
      'Mateare',
      'Villa el Carmen',
      'Managua',
      'Ticuantepe',
      'San Rafael del Sur',
      'Ciudad Sandino',
      'El Crucero',
    ),
    'Masaya' => array(
      'Nindirí',
      'Masaya',
      'Tisma',
      'La Concepción',
      'Masatepe',
      'Nandasmo',
      'Niquinohomo',
      'Catarina',
      'San Juan de Oriente',
    ),
    'Carazo' => array(
      'San Marcos',
      'Diriamba',
      'Dolores',
      'Jinotepe',
      'El Rosario',
      'La Paz de Carazo',
      'La Conquista',
      'Santa Teresa',
    ),
    'Granada' => array(
      'Granada',
      'Diriá',
      'Diriomo',
      'Nandaime',
    ),
    'Rivas' => array(
      'Belén',
      'Potosí',
      'Buenos Aires',
      'Moyogalpa',
      'Altagracia',
      'Tola',
      'Rivas',
      'San Jorge',
      'San Juan del Sur',
      'Cárdenas',
    ),
    'Chontales' => array(
      'Comalapa',
      'Juigalpa',
      'La Libertad',
      'Santo Domingo',
      'San Pedro de Lóvago',
      'Santo Tomás',
      'Acoyapa',
      'Villa Sandino',
      'San Francisco de Cuapa',
      'El Coral',
      'El Rama',
      'Muelle de los Bueyes',
      'Nueva Guinea',
    ),
    'Boaco' => array(
      'San José de los Remates',
      'Santa Lucia',
      'Boaco',
      'Camoapa',
      'Teustepe',
      'San Lorenzo',
    ),
    'Matagalpa' => array(
      'Rancho Grande',
      'Tuma la Dalia',
      'Rio Blanco',
      'San Isidro',
      'Sebaco',
      'Matagalpa',
      'San Ramón',
      'Matiguás',
      'Ciudad Dario',
      'Terrabona',
      'San Dionisio',
      'Esquipulas',
      'Muy Muy',
    ),
    'Jinotega' => array(
      'Wiwili-Jinotega',
      'El Cua',
      'Santa María de Pantasma',
      'San Sebastián de Yalí',
      'La Concordia',
      'San Rafael del Norte',
      'Jinotega',
      'San José de Bocay',
    ),
    'RAAN' => array(
      'Waspam',
      'Puerto Cabezas',
      'Prinzapolka',
      'Rosita',
      'Bonanza',
      'Siuna',
      'Waslala',
      'Mulukukú',
    ),
    'RAAS' => array(
      'Bocana de Paiwas',
      'La Cruz de Rio Grande',
      'Laguna de Perlas',
      'Kukra Hill',
      'Bluefields',
      'Corn Island',
      'La Desembocadura de Río Grande',
      'El Tortuguero',
      'El Ayote',
    ),
    'Río San Juan' => array(
      'El Almendro',
      'Morrito',
      'San Miguelito',
      'San Carlos',
      'El Castillo',
      'San Juan de Nicaragua',
    ),
  );

  return array($countryIso => $counties);
}

/**
 * Check and load counties
 */

function serbiamunicipalities_loadcounties() {

  $allCounties = serbiamunicipalities_listcounties();

  foreach ($allCounties as $countryIso => $counties) {
    static $dao = NULL;
    if (!$dao) {
      $dao = new CRM_Core_DAO();
    }

    // Get array of states.
    try {
      $result = civicrm_api3('Country', 'getsingle', array(
        'iso_code' => $countryIso,
        'api.Address.getoptions' => array(
          'field' => 'state_province_id',
          'country_id' => '$value.id',
          'sequential' => 0,
        ),
      ));
    }
    catch (CiviCRM_API3_Exception $e) {
      $error = $e->getMessage();
      CRM_Core_Error::debug_log_message(ts('API Error: %1', array(
        'domain' => 'org.ndi.serbiamunicipalities',
        1 => $error,
      )));
      return FALSE;
    }

    if (empty($result['api.Address.getoptions']['values'])) {
      return FALSE;
    }
    $states = $result['api.Address.getoptions']['values'];

    // go state-by-state to check existing counties

    foreach ($counties as $stateName => $state) {
      $id = array_search($stateName, $states);
      if ($id === FALSE) {
        continue;
      }

      $check = "SELECT name FROM civicrm_county WHERE state_province_id = $id";
      $results = CRM_Core_DAO::executeQuery($check);
      $existing = array();
      while ($results->fetch()) {
        $existing[] = $results->name;
      }

      // identify counties needing to be loaded
      $add = array_diff($state, $existing);

      $insert = array();
      foreach ($add as $county) {
        $countye = $dao->escape($county);
        $insert[] = "('$countye', $id)";
      }

      // put it into queries of 50 counties each
      for($i = 0; $i < count($insert); $i = $i+50) {
        $inserts = array_slice($insert, $i, 50);
        $query = "INSERT INTO civicrm_county (name, state_province_id) VALUES ";
        $query .= implode(', ', $inserts);
        CRM_Core_DAO::executeQuery($query);
      }
    }
  }

  return TRUE;
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function serbiamunicipalities_civicrm_install() {
  serbiamunicipalities_loadcounties();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function serbiamunicipalities_civicrm_enable() {
  serbiamunicipalities_loadcounties();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function serbiamunicipalities_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  serbiamunicipalities_loadcounties();
}
