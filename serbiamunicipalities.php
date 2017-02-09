<?php

/**
 * Return a list of all the counties
 */

function serbiamunicipalities_listcounties() {
  $countryIso = 'RS';
  $counties = array(
    'Beograd' => array(
      'Grad Beograd',
      'Gradska opština Barajevo',
      'Gradska opština Voždovac',
      'Gradska opština Vračar',
      'Gradska opština Grocka',
      'Gradska opština Zvezdara',
      'Gradska opština Zemun',
      'Gradska opština Lazarevac',
      'Gradska opština Mladenovac',
      'Gradska opština Novi Beograd',
      'Gradska opština Obrenovac',
      'Gradska opština Palilula',
      'Gradska opština Rakovica',
      'Gradska opština Savski Venac',
      'Gradska opština Sopot',
      'Gradska opština Stari Grad',
      'Gradska opština Surčin',
      'Gradska opština Čukarica',
    ),
    'Severnobački upravni okrug' => array(
      'Bačka Topola',
      'Mali Iđoš',
      'Grad Subotica',
    ),
    'Srednjebanatski upravni okrug' => array(
      'Žitište',
      'Grad Zrenjanin',
      'Nova Crnja',
      'Novi Bečej',
      'Sečanj',
    ),
    'Severnobanatski upravni okrug' => array(
      'Ada',
      'Kanjiža',
      'Grad Kikinda',
      'Novi Kneževac',
      'Senta',
      'Čoka',
    ),
    'Južnobanatski upravni okrug' => array(
      'Alibunar',
      'Bela Crkva',
      'Grad Vršac',
      'Kovačica',
      'Kovin',
      'Opovo',
      'Grad Pančevo',
      'Plandište ',
    ),
    'Zapadnobački upravni okrug' => array(
      'Apatin',
      'Kula',
      'Odžaci',
      'Grad Sombor',
    ),
    'Južnobački upravni okrug' => array(
      'Bač ',
      'Bačka Palanka ',
      'Bački Petrovac',
      'Beočin',
      'Bečej',
      'Vrbas',
      'Žabalj',
      'Grad Novi Sad',
      'Srbobran',
      'Sremski Karlovci',
      'Temerin',
      'Titel',
    ),
    'Sremski upravni okrug' => array(
      'Inđija',
      'Irig',
      'Pećinci',
      'Ruma',
      'Grad Sremska Mitrovica',
      'Stara Pazova',
      'Šid',
    ),
    'Mačvanski upravni okrug' => array(
      'Bogatić',
      'Vladimirci',
      'Koceljeva',
      'Krupanj',
      'Grad Loznica',
      'Ljubovija',
      'Mali Zvornik',
      'Grad Šabac',
    ),
    'Kolubarski upravni okrug' => array(
      'Grad Valjevo',
      'Lajkovac',
      'Ljig',
      'Mionica',
      'Osečina',
      'Ub',
    ),
    'Zlatiborski upravni okrug' => array(
      'Arilje',
      'Bajina Bašta',
      'Kosjerić',
      'Nova Varoš',
      'Požega',
      'Priboj',
      'Prijepolje',
      'Sjenica',
      'Grad Užice',
      'Čajetina',
    ),
    'Podunavski upravni okrug' => array(
      'Velika Plana',
      'Grad Smederevo',
      'Smederevska Palanka',
    ),
    'Šumadijski upravni okrug' => array(
      'Aranđelovac',
      'Batočina',
      'Knić',
      'Grad Kragujevac',
      'Lapovo',
      'Rača',
      'Topola',
    ),
    'Pomoravski upravni okrug' => array(
      'Despotovac',
      'Grad Jagodina',
      'Paraćin',
      'Rekovac',
      'Svilajnac',
      'Ćuprija',
    ),
    'Moravički upravni okrug' => array(
      'Gornji Milanovac',
      'Ivanjica',
      'Lučani',
      'Grad Čačak',
    ),
    'Raški upravni okrug' => array(
      'Vrnjačka Banja',
      'Grad Kraljevo',
      'Grad Novi Pazar',
      'Raška',
      'Tutin',
    ),
    'Rasinski upravni okrug' => array(
      'Aleksandrovac',
      'Brus',
      'Varvarin',
      'Grad Kruševac',
      'Trstenik',
      'Ćićevac',
    ),
    'Braničevski upravni okrug' => array(
      'Gradska opština Požarevac',
      'Veliko Gradište',
      'Golubac',
      'Žabari',
      'Žagubica',
      'Kučevo',
      'Malo Crniće',
      'Petrovac na Mlavi',
    ),
    'Borski upravni okrug' => array(
      'Bor',
      'Kladovo',
      'Majdanpek',
      'Negotin',
    ),
    'Zaječarski upravni okrug' => array(
      'Boljevac',
      'Grad Zaječar',
      'Knjaževac',
      'Sokobanja',
    ),
    'Nišavski upravni okrug' => array(
      'Grad Niš',
      'Gradska opština Medijana',
      'Gradska opština Palilula',
      'Gradska opština Crveni Krst',
      'Gradska opština Pantelej',
      'Gradska opština Niška Banja',
      'Aleksinac',
      'Gađin Han',
      'Doljevac',
      'Merošina',
      'Ražanj',
      'Svrljig',
    ),
    'Toplički upravni okrug' => array(
      'Blace',
      'Žitobara',
      'Kuršumlija',
      'Prokuplje',
    ),
    'Pirotski upravni okrug' => array(
      'Babušnica',
      'Bela Palanka',
      'Dimitrovgrad',
      'Grad Pirot',
    ),
    'Jablanički upravni okrug' => array(
      'Bojnik',
      'Vlasotince',
      'Lebane',
      'Grad Leskovac',
      'Medveđa',
      'Crna Trava',
    ),
    'Pčinjski upravni okrug' => array(
      'Grad Vranje',
      'Bosilegrad',
      'Bujanovac',
      'Vladičin Han',
      'Preševo',
      'Surdulica',
      'Trgovište',
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
