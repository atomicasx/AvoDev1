<?php
// created: 2019-11-22 19:37:17
$viewdefs['Employees']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 
        array (
          'customCode' => '{if $DISPLAY_EDIT}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button" onclick="this.form.return_module.value=\'{$module}\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'EditView\'" type="submit" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}',
          'sugar_html' => 
          array (
            'type' => 'submit',
            'value' => '{$APP.LBL_EDIT_BUTTON_LABEL}',
            'htmlOptions' => 
            array (
              'title' => '{$APP.LBL_EDIT_BUTTON_TITLE}',
              'accessKey' => '{$APP.LBL_EDIT_BUTTON_KEY}',
              'class' => 'button',
              'onclick' => 'this.form.return_module.value=\'{$module}\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'EditView\';',
              'id' => 'edit_button',
              'name' => 'Edit',
            ),
            'template' => '{if $DISPLAY_EDIT}[CONTENT]{/if}',
          ),
        ),
        1 => 
        array (
          'customCode' => '{if $DISPLAY_DUPLICATE}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value=\'{$module}\'     ; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.isDuplicate.value=true; this.form.action.value=\'EditView\'" type="submit" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if}',
          'sugar_html' => 
          array (
            'type' => 'submit',
            'value' => '{$APP.LBL_DUPLICATE_BUTTON_LABEL}',
            'htmlOptions' => 
            array (
              'title' => '{$APP.LBL_DUPLICATE_BUTTON_TITLE}',
              'accessKey' => '{$APP.LBL_DUPLICATE_BUTTON_KEY}',
              'class' => 'button',
              'onclick' => 'this.form.return_module.value=\'{$module}\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.isDuplicate.value=true; this.form.action.value=\'EditView\';',
              'name' => 'Duplicate',
              'id' => 'duplicate_button',
            ),
            'template' => '{if $DISPLAY_DUPLICATE}[CONTENT]{/if}',
          ),
        ),
        2 => 
        array (
          'customCode' => '{if $DISPLAY_DELETE}<input title="{$APP.LBL_DELETE_BUTTON_LABEL}" accessKey="{$APP.LBL_DELETE_BUTTON_LABEL}" class="button" onclick="if( confirm(\'{$DELETE_WARNING}\') ) {ldelim} this.form.return_module.value=\'{$module}\'; this.form.return_action.value=\'index\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'delete\'; this.form.submit();{rdelim}" type="button" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}',
          'sugar_html' => 
          array (
            'type' => 'button',
            'value' => '{$APP.LBL_DELETE_BUTTON_LABEL}',
            'htmlOptions' => 
            array (
              'title' => '{$APP.LBL_DELETE_BUTTON_LABEL}',
              'accessKey' => '{$APP.LBL_DELETE_BUTTON_LABEL}',
              'class' => 'button',
              'onclick' => 'if( confirm(\'{$DELETE_WARNING}\') ) {ldelim} this.form.return_module.value=\'{$module}\'; this.form.return_action.value=\'index\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'delete\'; this.form.submit();{rdelim}',
              'name' => 'Delete',
              'id' => 'delete_button',
            ),
            'template' => '{if $DISPLAY_DELETE}[CONTENT]{/if}',
          ),
        ),
      ),
    ),
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'useTabs' => true,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 'employee_status',
      ),
      1 => 
      array (
        0 => 'name',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'user_name',
          'studio' => 
          array (
            'no_duplicate' => true,
            'editview' => false,
            'detailview' => true,
            'quickcreate' => false,
            'basic_search' => false,
            'advanced_search' => false,
          ),
          'label' => 'LBL_USER_NAME',
        ),
        1 => 
        array (
          'name' => 'user_hash',
          'studio' => 
          array (
            'no_duplicate' => true,
            'listview' => false,
            'searchview' => false,
          ),
          'label' => 'LBL_USER_HASH',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'photo',
          'label' => 'LBL_PHOTO',
        ),
        1 => '',
      ),
      4 => 
      array (
        0 => 'title',
        1 => 'phone_work',
      ),
      5 => 
      array (
        0 => 'department',
        1 => 'phone_mobile',
      ),
      6 => 
      array (
        0 => 'reports_to_name',
        1 => 'phone_other',
      ),
      7 => 
      array (
        0 => 'phone_fax',
      ),
      8 => 
      array (
        0 => 'phone_home',
      ),
      9 => 
      array (
        0 => 'messenger_type',
      ),
      10 => 
      array (
        0 => 'messenger_id',
      ),
      11 => 
      array (
        0 => 'address_country',
      ),
      12 => 
      array (
        0 => 'description',
      ),
      13 => 
      array (
        0 => 'email1',
      ),
    ),
  ),
);