<?php
// created: 2019-06-11 15:42:56
$dictionary["Document"]["fields"]["accounts_documents_1"] = array (
  'name' => 'accounts_documents_1',
  'type' => 'link',
  'relationship' => 'accounts_documents_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_DOCUMENTS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_documents_1accounts_ida',
);
$dictionary["Document"]["fields"]["accounts_documents_1_name"] = array (
  'name' => 'accounts_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_DOCUMENTS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_documents_1accounts_ida',
  'link' => 'accounts_documents_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["accounts_documents_1accounts_ida"] = array (
  'name' => 'accounts_documents_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
