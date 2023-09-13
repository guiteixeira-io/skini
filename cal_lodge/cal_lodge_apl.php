<?php
//
class cal_lodge_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id;
   var $title;
   var $description;
   var $start_date;
   var $start_time;
   var $end_date;
   var $end_time;
   var $recurrence;
   var $recurrence_1;
   var $period;
   var $period_1;
   var $category;
   var $category_1;
   var $id_api;
   var $id_event_google;
   var $recur_info;
   var $event_color;
   var $creator;
   var $reminder;
   var $__calend_all_day__;
   var $__calend_all_day___1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden   = array();
   var $Field_no_validate  = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = true;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['__calend_all_day__']))
          {
              $this->__calend_all_day__ = $this->NM_ajax_info['param']['__calend_all_day__'];
          }
          if (isset($this->NM_ajax_info['param']['category']))
          {
              $this->category = $this->NM_ajax_info['param']['category'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['end_date']))
          {
              $this->end_date = $this->NM_ajax_info['param']['end_date'];
          }
          if (isset($this->NM_ajax_info['param']['end_time']))
          {
              $this->end_time = $this->NM_ajax_info['param']['end_time'];
          }
          if (isset($this->NM_ajax_info['param']['event_color']))
          {
              $this->event_color = $this->NM_ajax_info['param']['event_color'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['id_api']))
          {
              $this->id_api = $this->NM_ajax_info['param']['id_api'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['period']))
          {
              $this->period = $this->NM_ajax_info['param']['period'];
          }
          if (isset($this->NM_ajax_info['param']['recur_info']))
          {
              $this->recur_info = $this->NM_ajax_info['param']['recur_info'];
          }
          if (isset($this->NM_ajax_info['param']['recurrence']))
          {
              $this->recurrence = $this->NM_ajax_info['param']['recurrence'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['start_date']))
          {
              $this->start_date = $this->NM_ajax_info['param']['start_date'];
          }
          if (isset($this->NM_ajax_info['param']['start_time']))
          {
              $this->start_time = $this->NM_ajax_info['param']['start_time'];
          }
          if (isset($this->NM_ajax_info['param']['title']))
          {
              $this->title = $this->NM_ajax_info['param']['title'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['cal_lodge']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['cal_lodge']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['cal_lodge']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['cal_lodge']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['cal_lodge']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_cal_lodge($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['cal_lodge']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['cal_lodge']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['cal_lodge']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['cal_lodge']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['cal_lodge']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['cal_lodge']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['cal_lodge']['nm_run_menu'] = 1;
      } 
      if (isset($this->nmgp_opcao) && 'igual_calendar' == $this->nmgp_opcao) {
          $this->nmgp_opcao = 'igual';
          $this->id = $this->__orig_id;
      }

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      if ('' == $this->nmgp_opcao && !$this->NM_ajax_flag)
      {
          $this->nmgp_opcao = 'calendar';
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['cal_lodge']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new cal_lodge_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['cal_lodge']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['cal_lodge']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['cal_lodge'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['cal_lodge']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['cal_lodge']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('cal_lodge') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['cal_lodge']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cal_lodge";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "cal_lodge")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_Lemon";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['title'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_title'] . '';
      $this->nm_new_label['start_date'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_start_date'] . '';
      $this->nm_new_label['start_time'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_start_time'] . '';
      $this->nm_new_label['end_date'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_end_date'] . '';
      $this->nm_new_label['end_time'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_end_time'] . '';
      $this->nm_new_label['recurrence'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_recurrence'] . '';
      $this->nm_new_label['period'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_period'] . '';
      $this->nm_new_label['category'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_category'] . '';
      $this->nm_new_label['id_api'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_id_api'] . '';
      $this->nm_new_label['recur_info'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_recur_info'] . '';
      $this->nm_new_label['event_color'] = '' . $this->Ini->Nm_lang['lang_calendar_fld_event_color'] . '';
      $this->nm_new_label['__calend_all_day__'] = '' . $this->Ini->Nm_lang['lang_per_allday'] . '';

      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;



      $_SESSION['scriptcase']['error_icon']['cal_lodge']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['cal_lodge'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['cal_lodge']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['cal_lodge'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['cal_lodge'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }

      $this->nmgp_botoes['first']   = "off";
      $this->nmgp_botoes['back']    = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last']    = "off";

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if (!isset($this->description)){$this->description = $this->nmgp_dados_form['description'];} 
          if (!isset($this->id_event_google)){$this->id_event_google = $this->nmgp_dados_form['id_event_google'];} 
          if (!isset($this->creator)){$this->creator = $this->nmgp_dados_form['creator'];} 
          if (!isset($this->reminder)){$this->reminder = $this->nmgp_dados_form['reminder'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("cal_lodge", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      if (!$this->NM_ajax_flag)
      {
          $_SESSION['scriptcase']['sc_tab_cores']['paleta']  = $this->Ini->Nm_lang['lang_othr_cplt_titl'];
          $_SESSION['scriptcase']['sc_tab_cores']['setacor'] = $this->Ini->Nm_lang['lang_othr_cplt_defn'];
          $_SESSION['scriptcase']['sc_tab_cores']['atualiz'] = $this->Ini->Nm_lang['lang_btns_colr_updt_hint'];
          $_SESSION['scriptcase']['sc_tab_cores']['cancela'] = $this->Ini->Nm_lang['lang_btns_colr_cncl_hint'];
      }
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'cal_lodge/cal_lodge_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'cal_lodge_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'cal_lodge_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'cal_lodge_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'cal_lodge/cal_lodge_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "cal_lodge_erro.class.php"); 
      }
      $this->Erro      = new cal_lodge_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['cal_lodge']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['cal_lodge']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['cal_lodge']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->title)) { $this->nm_limpa_alfa($this->title); }
      if (isset($this->recurrence)) { $this->nm_limpa_alfa($this->recurrence); }
      if (isset($this->period)) { $this->nm_limpa_alfa($this->period); }
      if (isset($this->category)) { $this->nm_limpa_alfa($this->category); }
      if (isset($this->id_api)) { $this->nm_limpa_alfa($this->id_api); }
      if (isset($this->recur_info)) { $this->nm_limpa_alfa($this->recur_info); }
      if (isset($this->event_color)) { $this->nm_limpa_alfa($this->event_color); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- start_date
      $this->field_config['start_date']                 = array();
      $this->field_config['start_date']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['start_date']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['start_date']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'start_date');
      //-- end_date
      $this->field_config['end_date']                 = array();
      $this->field_config['end_date']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['end_date']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['end_date']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'end_date');
      //-- start_time
      $this->field_config['start_time']                 = array();
      $this->field_config['start_time']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['start_time']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['start_time']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'start_time');
      //-- end_time
      $this->field_config['end_time']                 = array();
      $this->field_config['end_time']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['end_time']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['end_time']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'end_time');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- reminder
      $this->field_config['__calendar_recur_info__']                 = array();
      $this->field_config['__calendar_recur_info__']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['__calendar_recur_info__']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['__calendar_recur_info__']['date_display'] = 'ddmmaaaa';
      $this->field_config['__calendar_recur_info__']['symbol_grp']   = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['__calendar_recur_info__']['symbol_fmt']   = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->new_date_format('DT', '__calendar_recur_info__');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      $this->calendarConfigValues = array(
          'insert'           => 'on' == $this->nmgp_botoes['insert'],
          'update'           => 'on' == $this->nmgp_botoes['update'],
          'delete'           => 'on' == $this->nmgp_botoes['delete'],
          'eventColorPast'   => 'scCalendarEventPast',
          'eventColorToday'  => 'scCalendarEventOnDay',
          'eventColorFuture' => 'scCalendarEventFuture',
      );
      if ('calendar' == $this->nmgp_opcao)
      {
          $this->calendarOutputDisplay();
          exit;
      }
      elseif ('importGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleCalendarEvents();
         exit;
      }
      elseif ('importGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleDisplay();
         exit;
      }
      elseif ('exportGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarExportEventsToGoogle();
         exit;
      }
      elseif ('exportGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputExportEventsToGoogle();
         exit;
      }
      elseif ('calendar_fetch' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents();
          $this->calendarOutputJson($this->calendarNormalizeEvents($aEvents), true);
          exit;
      }
      elseif ('calendar_drop' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarDragDrop());
          exit;
      }
      elseif ('calendar_resize' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarResize());
          exit;
      }
      elseif ('calendar_print' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents('', true);
          $this->calendarOutputJson($this->calendarPrintEvents($this->calendarNormalizeEvents($aEvents)));
          exit;
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_title' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'title');
          }
          if ('validate_category' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'category');
          }
          if ('validate_id_api' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_api');
          }
          if ('validate_event_color' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'event_color');
          }
          if ('validate_start_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'start_date');
          }
          if ('validate_end_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_date');
          }
          if ('validate_start_time' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'start_time');
          }
          if ('validate_end_time' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_time');
          }
          if ('validate___calend_all_day__' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, '__calend_all_day__');
          }
          if ('validate_recurrence' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'recurrence');
          }
          if ('validate_period' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'period');
          }
          if ('validate_recur_info' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'recur_info');
          }
          cal_lodge_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = $this->__calend_all_day__;
              $this->__calend_all_day__ = ""; 
              if ($this->__calend_all_day___1 != "") 
              { 
                  foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->__calend_all_day__ .= ";";
                      } 
                      $this->__calend_all_day__ .= $dados___calend_all_day___1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              cal_lodge_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['cal_lodge']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  cal_lodge_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro, '', true, true); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          cal_lodge_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          cal_lodge_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "cal_lodge.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " cal_lodge") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__barraca-de-acampamento.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="cal_lodge_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="cal_lodge"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'title':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_title'] . "";
               break;
           case 'category':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_category'] . "";
               break;
           case 'id_api':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_id_api'] . "";
               break;
           case 'event_color':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_event_color'] . "";
               break;
           case 'start_date':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_start_date'] . "";
               break;
           case 'end_date':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_end_date'] . "";
               break;
           case 'start_time':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_start_time'] . "";
               break;
           case 'end_time':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_end_time'] . "";
               break;
           case '__calend_all_day__':
               return "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
               break;
           case 'recurrence':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_recurrence'] . "";
               break;
           case 'period':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_period'] . "";
               break;
           case 'recur_info':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_recur_info'] . "";
               break;
           case 'id':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_id'] . "";
               break;
           case 'description':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_description'] . "";
               break;
           case 'id_event_google':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_id_event_google'] . "";
               break;
           case 'creator':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_creator'] . "";
               break;
           case 'reminder':
               return "" . $this->Ini->Nm_lang['lang_calendar_fld_reminder'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_cal_lodge']) || !is_array($this->NM_ajax_info['errList']['geral_cal_lodge']))
              {
                  $this->NM_ajax_info['errList']['geral_cal_lodge'] = array();
              }
              $this->NM_ajax_info['errList']['geral_cal_lodge'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['bypass_required_time']['start_time'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['bypass_required_time']['end_time'] = true;
      }
      if ((!is_array($filtro) && ('' == $filtro || 'title' == $filtro)) || (is_array($filtro) && in_array('title', $filtro)))
        $this->ValidateField_title($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "title";

      if ((!is_array($filtro) && ('' == $filtro || 'category' == $filtro)) || (is_array($filtro) && in_array('category', $filtro)))
        $this->ValidateField_category($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "category";

      if ((!is_array($filtro) && ('' == $filtro || 'id_api' == $filtro)) || (is_array($filtro) && in_array('id_api', $filtro)))
        $this->ValidateField_id_api($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "id_api";

      if ((!is_array($filtro) && ('' == $filtro || 'event_color' == $filtro)) || (is_array($filtro) && in_array('event_color', $filtro)))
        $this->ValidateField_event_color($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "event_color";

      if ((!is_array($filtro) && ('' == $filtro || 'start_date' == $filtro)) || (is_array($filtro) && in_array('start_date', $filtro)))
        $this->ValidateField_start_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "start_date";

      if ((!is_array($filtro) && ('' == $filtro || 'end_date' == $filtro)) || (is_array($filtro) && in_array('end_date', $filtro)))
        $this->ValidateField_end_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "end_date";

      if ((!is_array($filtro) && ('' == $filtro || 'start_time' == $filtro)) || (is_array($filtro) && in_array('start_time', $filtro)))
        $this->ValidateField_start_time($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "start_time";

      if ((!is_array($filtro) && ('' == $filtro || 'end_time' == $filtro)) || (is_array($filtro) && in_array('end_time', $filtro)))
        $this->ValidateField_end_time($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "end_time";

      if ((!is_array($filtro) && ('' == $filtro || '__calend_all_day__' == $filtro)) || (is_array($filtro) && in_array('__calend_all_day__', $filtro)))
        $this->ValidateField___calend_all_day__($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "__calend_all_day__";

      if ((!is_array($filtro) && ('' == $filtro || 'recurrence' == $filtro)) || (is_array($filtro) && in_array('recurrence', $filtro)))
        $this->ValidateField_recurrence($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "recurrence";

      if ((!is_array($filtro) && ('' == $filtro || 'period' == $filtro)) || (is_array($filtro) && in_array('period', $filtro)))
        $this->ValidateField_period($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "period";

      if ((!is_array($filtro) && ('' == $filtro || 'recur_info' == $filtro)) || (is_array($filtro) && in_array('recur_info', $filtro)))
        $this->ValidateField_recur_info($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "recur_info";

      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['bypass_required_time']['start_time'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['bypass_required_time']['end_time'] = false;

      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
          $this->start_time = '';
          $this->end_time = '';
      }

//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_title(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['title'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['php_cmp_required']['title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['php_cmp_required']['title'] == "on")) 
      { 
          if ($this->title == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_calendar_fld_title'] . "" ; 
              if (!isset($Campos_Erros['title']))
              {
                  $Campos_Erros['title'] = array();
              }
              $Campos_Erros['title'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['title']) || !is_array($this->NM_ajax_info['errList']['title']))
                  {
                      $this->NM_ajax_info['errList']['title'] = array();
                  }
                  $this->NM_ajax_info['errList']['title'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->title) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_title'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['title']))
              {
                  $Campos_Erros['title'] = array();
              }
              $Campos_Erros['title'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['title']) || !is_array($this->NM_ajax_info['errList']['title']))
              {
                  $this->NM_ajax_info['errList']['title'] = array();
              }
              $this->NM_ajax_info['errList']['title'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'title';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_title

    function ValidateField_category(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['category'])) {
       return;
   }
               if (!empty($this->category) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']) && !in_array($this->category, $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['category']))
                   {
                       $Campos_Erros['category'] = array();
                   }
                   $Campos_Erros['category'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['category']) || !is_array($this->NM_ajax_info['errList']['category']))
                   {
                       $this->NM_ajax_info['errList']['category'] = array();
                   }
                   $this->NM_ajax_info['errList']['category'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'category';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_category

    function ValidateField_id_api(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['id_api'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->id_api) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_id_api'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_api']))
              {
                  $Campos_Erros['id_api'] = array();
              }
              $Campos_Erros['id_api'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_api']) || !is_array($this->NM_ajax_info['errList']['id_api']))
              {
                  $this->NM_ajax_info['errList']['id_api'] = array();
              }
              $this->NM_ajax_info['errList']['id_api'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_api';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_api

    function ValidateField_event_color(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['event_color'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->event_color) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'event_color';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_event_color

    function ValidateField_start_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->start_date, $this->field_config['start_date']['date_sep']) ; 
      if (isset($this->Field_no_validate['start_date'])) {
          return;
      }
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['start_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['start_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['start_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['start_date']['date_sep']) ; 
          if (trim($this->start_date) != "")  
          { 
              if ($teste_validade->Data($this->start_date, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_start_date'] . "; " ; 
                  if (!isset($Campos_Erros['start_date']))
                  {
                      $Campos_Erros['start_date'] = array();
                  }
                  $Campos_Erros['start_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['start_date']) || !is_array($this->NM_ajax_info['errList']['start_date']))
                  {
                      $this->NM_ajax_info['errList']['start_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['start_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['php_cmp_required']['start_date']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['php_cmp_required']['start_date'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "" . $this->Ini->Nm_lang['lang_calendar_fld_start_date'] . "" ; 
              if (!isset($Campos_Erros['start_date']))
              {
                  $Campos_Erros['start_date'] = array();
              }
              $Campos_Erros['start_date'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['start_date']) || !is_array($this->NM_ajax_info['errList']['start_date']))
                  {
                      $this->NM_ajax_info['errList']['start_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['start_date'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['start_date']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'start_date';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_start_date

    function ValidateField_end_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->end_date, $this->field_config['end_date']['date_sep']) ; 
      if (isset($this->Field_no_validate['end_date'])) {
          return;
      }
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['end_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['end_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['end_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['end_date']['date_sep']) ; 
          if (trim($this->end_date) != "")  
          { 
              if ($teste_validade->Data($this->end_date, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_end_date'] . "; " ; 
                  if (!isset($Campos_Erros['end_date']))
                  {
                      $Campos_Erros['end_date'] = array();
                  }
                  $Campos_Erros['end_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['end_date']) || !is_array($this->NM_ajax_info['errList']['end_date']))
                  {
                      $this->NM_ajax_info['errList']['end_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['end_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['end_date']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'end_date';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_end_date

    function ValidateField_start_time(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->start_time, $this->field_config['start_time']['time_sep']) ; 
      if (isset($this->Field_no_validate['start_time'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['start_time']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['start_time']['time_sep']) ; 
          if (trim($this->start_time) != "")  
          { 
              if ($teste_validade->Hora($this->start_time, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_start_time'] . "; " ; 
                  if (!isset($Campos_Erros['start_time']))
                  {
                      $Campos_Erros['start_time'] = array();
                  }
                  $Campos_Erros['start_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['start_time']) || !is_array($this->NM_ajax_info['errList']['start_time']))
                  {
                      $this->NM_ajax_info['errList']['start_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['start_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'start_time';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_start_time

    function ValidateField_end_time(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->end_time, $this->field_config['end_time']['time_sep']) ; 
      if (isset($this->Field_no_validate['end_time'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['end_time']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['end_time']['time_sep']) ; 
          if (trim($this->end_time) != "")  
          { 
              if ($teste_validade->Hora($this->end_time, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_end_time'] . "; " ; 
                  if (!isset($Campos_Erros['end_time']))
                  {
                      $Campos_Erros['end_time'] = array();
                  }
                  $Campos_Erros['end_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['end_time']) || !is_array($this->NM_ajax_info['errList']['end_time']))
                  {
                      $this->NM_ajax_info['errList']['end_time'] = array();
                  }
                  $this->NM_ajax_info['errList']['end_time'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'end_time';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_end_time

    function ValidateField___calend_all_day__(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['__calend_all_day__'])) {
       return;
   }
      if ($this->__calend_all_day__ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = array(); 
              foreach ($this->__calend_all_day__ as $ind => $dados___calend_all_day___1 ) 
              {
                  if ($dados___calend_all_day___1 != "") 
                  {
                      $this->__calend_all_day___1[] = $dados___calend_all_day___1;
                  } 
              } 
              $this->__calend_all_day__ = ""; 
              foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->__calend_all_day__ .= ";";
                   } 
                   $this->__calend_all_day__ .= $dados___calend_all_day___1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = '__calend_all_day__';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField___calend_all_day__

    function ValidateField_recurrence(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['recurrence'])) {
       return;
   }
      if ($this->recurrence == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'recurrence';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_recurrence

    function ValidateField_period(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['period'])) {
       return;
   }
      if ($this->period == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'period';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_period

    function ValidateField_recur_info(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['recur_info'])) {
          return;
      }
      $tmpRecurInfo = null;
      if ($this->nmgp_opcao != "excluir")
      {
          if (trim($this->recur_info) != "")
          {
              $tmpRecurInfo = json_decode($this->recur_info, true);
              if ('' != trim($tmpRecurInfo['endin']))
              {
                  nm_limpa_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_sep']);
                  $formatDate = $this->field_config['__calendar_recur_info__']['date_format'];
                  nm_limpa_data($formatDate, $this->field_config['__calendar_recur_info__']['date_sep']);
                  if ($teste_validade->Data($tmpRecurInfo['endin'], $formatDate, '', '') == false)
                  {
                      $hasError = true;
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_calendar_fld_recur_info'] . "; ";
                      if (!isset($Campos_Erros['recur_info']))
                      {
                          $Campos_Erros['recur_info'] = array();
                      }
                      $Campos_Erros['recur_info'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['recur_info']) || !is_array($this->NM_ajax_info['errList']['recur_info']))
                      {
                          $this->NM_ajax_info['errList']['recur_info'] = array();
                      }
                      $this->NM_ajax_info['errList']['recur_info'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  }
                  else
                  {
                      $this->recur_info = json_encode($tmpRecurInfo);
                  }
              }
          }
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'recur_info';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_recur_info

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['title'] = $this->title;
    $this->nmgp_dados_form['category'] = $this->category;
    $this->nmgp_dados_form['id_api'] = $this->id_api;
    $this->nmgp_dados_form['event_color'] = $this->event_color;
    $this->nmgp_dados_form['start_date'] = (strlen(trim($this->start_date)) > 19) ? str_replace(".", ":", $this->start_date) : trim($this->start_date);
    $this->nmgp_dados_form['end_date'] = (strlen(trim($this->end_date)) > 19) ? str_replace(".", ":", $this->end_date) : trim($this->end_date);
    $this->nmgp_dados_form['start_time'] = (strlen(trim($this->start_time)) > 19) ? str_replace(".", ":", $this->start_time) : trim($this->start_time);
    $this->nmgp_dados_form['end_time'] = (strlen(trim($this->end_time)) > 19) ? str_replace(".", ":", $this->end_time) : trim($this->end_time);
    $this->nmgp_dados_form['__calend_all_day__'] = $this->__calend_all_day__;
    $this->nmgp_dados_form['recurrence'] = $this->recurrence;
    $this->nmgp_dados_form['period'] = $this->period;
    $this->nmgp_dados_form['recur_info'] = $this->recur_info;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['description'] = $this->description;
    $this->nmgp_dados_form['id_event_google'] = $this->id_event_google;
    $this->nmgp_dados_form['creator'] = $this->creator;
    $this->nmgp_dados_form['reminder'] = $this->reminder;
    $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['start_date'] = $this->start_date;
      nm_limpa_data($this->start_date, $this->field_config['start_date']['date_sep']) ; 
      $this->Before_unformat['end_date'] = $this->end_date;
      nm_limpa_data($this->end_date, $this->field_config['end_date']['date_sep']) ; 
      $this->Before_unformat['start_time'] = $this->start_time;
      nm_limpa_hora($this->start_time, $this->field_config['start_time']['time_sep']) ; 
      $this->Before_unformat['end_time'] = $this->end_time;
      nm_limpa_hora($this->end_time, $this->field_config['end_time']['time_sep']) ; 
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->start_date) && 'null' != $this->start_date) || (!empty($format_fields) && isset($format_fields['start_date'])))
      {
          nm_volta_data($this->start_date, $this->field_config['start_date']['date_format']) ; 
          nmgp_Form_Datas($this->start_date, $this->field_config['start_date']['date_format'], $this->field_config['start_date']['date_sep']) ;  
      }
      elseif ('null' == $this->start_date || '' == $this->start_date)
      {
          $this->start_date = '';
      }
      if ((!empty($this->end_date) && 'null' != $this->end_date) || (!empty($format_fields) && isset($format_fields['end_date'])))
      {
          nm_volta_data($this->end_date, $this->field_config['end_date']['date_format']) ; 
          nmgp_Form_Datas($this->end_date, $this->field_config['end_date']['date_format'], $this->field_config['end_date']['date_sep']) ;  
      }
      elseif ('null' == $this->end_date || '' == $this->end_date)
      {
          $this->end_date = '';
      }
      if ((!empty($this->start_time) && 'null' != $this->start_time) || (!empty($format_fields) && isset($format_fields['start_time'])))
      {
          nm_volta_hora($this->start_time, $this->field_config['start_time']['date_format']) ; 
          nmgp_Form_Hora($this->start_time, $this->field_config['start_time']['date_format'], $this->field_config['start_time']['time_sep']) ;  
      }
      elseif ('null' == $this->start_time || '' == $this->start_time)
      {
          $this->start_time = '';
      }
      if ((!empty($this->end_time) && 'null' != $this->end_time) || (!empty($format_fields) && isset($format_fields['end_time'])))
      {
          nm_volta_hora($this->end_time, $this->field_config['end_time']['date_format']) ; 
          nmgp_Form_Hora($this->end_time, $this->field_config['end_time']['date_format'], $this->field_config['end_time']['time_sep']) ;  
      }
      elseif ('null' == $this->end_time || '' == $this->end_time)
      {
          $this->end_time = '';
      }
      if ($this->recur_info != '')
      {
          $tmpRecurInfo = json_decode($this->recur_info, true);
          if ($tmpRecurInfo['endin'] != '')
          {
              nm_volta_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format']);
              nmgp_Form_Datas($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format'], $this->field_config['__calendar_recur_info__']['date_sep']);
              $this->recur_info = json_encode($tmpRecurInfo);
          }
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['start_date']['date_format'];
      if ($this->start_date != "")  
      { 
          nm_conv_data($this->start_date, $this->field_config['start_date']['date_format']) ; 
          $this->start_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->start_date_hora = substr($this->start_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->start_date_hora = substr($this->start_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->start_date_hora = substr($this->start_date_hora, 0, -4);
          }
      } 
      if ($this->start_date == "" && $use_null)  
      { 
          $this->start_date = "null" ; 
      } 
      $this->field_config['start_date']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['end_date']['date_format'];
      if ($this->end_date != "")  
      { 
          nm_conv_data($this->end_date, $this->field_config['end_date']['date_format']) ; 
          $this->end_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->end_date_hora = substr($this->end_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->end_date_hora = substr($this->end_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->end_date_hora = substr($this->end_date_hora, 0, -4);
          }
      } 
      if ($this->end_date == "" && $use_null)  
      { 
          $this->end_date = "null" ; 
      } 
      $this->field_config['end_date']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['start_time']['date_format'];
      if ($this->start_time != "")  
      { 
          $this->start_time_hora = $this->start_time;
          $this->start_time = "1900-01-01";
          nm_conv_hora($this->start_time_hora, $this->field_config['start_time']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->start_time_hora = substr($this->start_time_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->start_time_hora = substr($this->start_time_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->start_time_hora = substr($this->start_time_hora, 0, -4);
          }
          $this->start_time = $this->start_time_hora;
      } 
      if ($this->start_time == "" && $use_null)  
      { 
          $this->start_time = "null" ; 
      } 
      $this->field_config['start_time']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['end_time']['date_format'];
      if ($this->end_time != "")  
      { 
          $this->end_time_hora = $this->end_time;
          $this->end_time = "1900-01-01";
          nm_conv_hora($this->end_time_hora, $this->field_config['end_time']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->end_time_hora = substr($this->end_time_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->end_time_hora = substr($this->end_time_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->end_time_hora = substr($this->end_time_hora, 0, -4);
          }
          $this->end_time = $this->end_time_hora;
      } 
      if ($this->end_time == "" && $use_null)  
      { 
          $this->end_time = "null" ; 
      } 
      $this->field_config['end_time']['date_format'] = $guarda_format_hora;
      if ($this->recur_info != '')
      {
          $tmpRecurInfo = json_decode($this->recur_info, true);
          if ($tmpRecurInfo['endin'] != '')
          {
              nm_conv_data($tmpRecurInfo['endin'], $this->field_config['__calendar_recur_info__']['date_format']);
              $this->recur_info = json_encode($tmpRecurInfo);
          }
      }
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_title();
          $this->ajax_return_values_category();
          $this->ajax_return_values_id_api();
          $this->ajax_return_values_event_color();
          $this->ajax_return_values_start_date();
          $this->ajax_return_values_end_date();
          $this->ajax_return_values_start_time();
          $this->ajax_return_values_end_time();
          $this->ajax_return_values___calend_all_day__();
          $this->ajax_return_values_recurrence();
          $this->ajax_return_values_period();
          $this->ajax_return_values_recur_info();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = cal_lodge_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- title
   function ajax_return_values_title($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("title", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->title);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['title'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- category
   function ajax_return_values_category($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("category", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->category);
              $aLookup = array();
              $this->_tmp_lookup_category = $this->category;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'] = array(); 
}
$aLookup[] = array(cal_lodge_pack_protect_string('') => str_replace('<', '&lt;',cal_lodge_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_start_date = $this->start_date;
   $old_value_end_date = $this->end_date;
   $old_value_start_time = $this->start_time;
   $old_value_end_time = $this->end_time;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_start_date = $this->start_date;
   $unformatted_value_end_date = $this->end_date;
   $unformatted_value_start_time = $this->start_time;
   $unformatted_value_end_time = $this->end_time;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idLodgeCategory, name, color FROM cad_lodge_category  ORDER BY name";

   $this->start_date = $old_value_start_date;
   $this->end_date = $old_value_end_date;
   $this->start_time = $old_value_start_time;
   $this->end_time = $old_value_end_time;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(cal_lodge_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', cal_lodge_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              if (isset($rs->fields[2]))
              {
                  $nmgp_def_dados .= $rs->fields[0] . "?#?N?#?" . $rs->fields[2] . "?@?"; 
              }
              else
              {
                  $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?"; 
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"category\"";
          if (isset($this->NM_ajax_info['select_html']['category']) && !empty($this->NM_ajax_info['select_html']['category']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['category']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->category == $sValue)
                  {
                      $this->_tmp_lookup_category = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['category'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['category']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['category']['valList'][$i] = cal_lodge_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['category']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['category']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['category']['labList'] = $aLabel;
          }
   }

          //----- id_api
   function ajax_return_values_id_api($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_api", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_api);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_api'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- event_color
   function ajax_return_values_event_color($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("event_color", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->event_color);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['event_color'] = array(
                       'row'    => '',
               'type'    => 'color_palette',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- start_date
   function ajax_return_values_start_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("start_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->start_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['start_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- end_date
   function ajax_return_values_end_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- start_time
   function ajax_return_values_start_time($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("start_time", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->start_time);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['start_time'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- end_time
   function ajax_return_values_end_time($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_time", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_time);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_time'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- __calend_all_day__
   function ajax_return_values___calend_all_day__($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("__calend_all_day__", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->__calend_all_day__);
              $aLookup = array();
              $this->_tmp_lookup___calend_all_day__ = $this->__calend_all_day__;

$aLookup[] = array(cal_lodge_pack_protect_string('Y') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_per_allday'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup___calend_all_day__'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['__calend_all_day__']) && !empty($this->NM_ajax_info['select_html']['__calend_all_day__']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['__calend_all_day__']);
          }
          $this->NM_ajax_info['fldList']['__calend_all_day__'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-__calend_all_day__',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['__calend_all_day__']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['__calend_all_day__']['valList'][$i] = cal_lodge_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['__calend_all_day__']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['__calend_all_day__']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['__calend_all_day__']['labList'] = $aLabel;
          }
   }

          //----- recurrence
   function ajax_return_values_recurrence($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("recurrence", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->recurrence);
              $aLookup = array();
              $this->_tmp_lookup_recurrence = $this->recurrence;

$aLookup[] = array(cal_lodge_pack_protect_string('Y') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_peri_yes'] . "")));
$aLookup[] = array(cal_lodge_pack_protect_string('N') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_peri_no'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_recurrence'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_recurrence'][] = 'N';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"recurrence\"";
          if (isset($this->NM_ajax_info['select_html']['recurrence']) && !empty($this->NM_ajax_info['select_html']['recurrence']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['recurrence']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->recurrence == $sValue)
                  {
                      $this->_tmp_lookup_recurrence = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['recurrence'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['recurrence']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['recurrence']['valList'][$i] = cal_lodge_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['recurrence']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['recurrence']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['recurrence']['labList'] = $aLabel;
          }
   }

          //----- period
   function ajax_return_values_period($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("period", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->period);
              $aLookup = array();
              $this->_tmp_lookup_period = $this->period;

$aLookup[] = array(cal_lodge_pack_protect_string('D') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_daily'] . "")));
$aLookup[] = array(cal_lodge_pack_protect_string('W') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_weekly'] . "")));
$aLookup[] = array(cal_lodge_pack_protect_string('M') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_monthly'] . "")));
$aLookup[] = array(cal_lodge_pack_protect_string('A') => str_replace('<', '&lt;',cal_lodge_pack_protect_string("" . $this->Ini->Nm_lang['lang_recu_annual'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_period'][] = 'D';
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_period'][] = 'W';
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_period'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_period'][] = 'A';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"period\"";
          if (isset($this->NM_ajax_info['select_html']['period']) && !empty($this->NM_ajax_info['select_html']['period']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['period']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->period == $sValue)
                  {
                      $this->_tmp_lookup_period = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['period'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['period']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['period']['valList'][$i] = cal_lodge_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['period']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['period']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['period']['labList'] = $aLabel;
          }
   }

          //----- recur_info
   function ajax_return_values_recur_info($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("recur_info", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->recur_info);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['recur_info'] = array(
                       'row'    => '',
               'type'    => 'recur_info',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Field_no_validate'] = array();
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']))
          {
               $sc_where_pos = " WHERE ((id < $this->id))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->id)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if ((!isset($this->Ini->nm_bases_access) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['title'] = $this->title;
      $NM_val_form['category'] = $this->category;
      $NM_val_form['id_api'] = $this->id_api;
      $NM_val_form['event_color'] = $this->event_color;
      $NM_val_form['start_date'] = $this->start_date;
      $NM_val_form['end_date'] = $this->end_date;
      $NM_val_form['start_time'] = $this->start_time;
      $NM_val_form['end_time'] = $this->end_time;
      $NM_val_form['__calend_all_day__'] = $this->__calend_all_day__;
      $NM_val_form['recurrence'] = $this->recurrence;
      $NM_val_form['period'] = $this->period;
      $NM_val_form['recur_info'] = $this->recur_info;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['description'] = $this->description;
      $NM_val_form['id_event_google'] = $this->id_event_google;
      $NM_val_form['creator'] = $this->creator;
      $NM_val_form['reminder'] = $this->reminder;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->category === "" || is_null($this->category))  
      { 
          $this->category = 0;
          $this->sc_force_zero[] = 'category';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->title_before_qstr = $this->title;
          $this->title = substr($this->Db->qstr($this->title), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->title = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->title);
          }
          if ($this->title == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->title = "null"; 
              $NM_val_null[] = "title";
          } 
          $this->description_before_qstr = $this->description;
          $this->description = substr($this->Db->qstr($this->description), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->description = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->description);
          }
          if ($this->description == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->description = "null"; 
              $NM_val_null[] = "description";
          } 
          if ($this->start_date == "")  
          { 
              $this->start_date = "null"; 
              $NM_val_null[] = "start_date";
          } 
          if ($this->start_time == "")  
          { 
              $this->start_time = "null"; 
              $NM_val_null[] = "start_time";
          } 
          if ($this->end_date == "")  
          { 
              $this->end_date = "null"; 
              $NM_val_null[] = "end_date";
          } 
          if ($this->end_time == "")  
          { 
              $this->end_time = "null"; 
              $NM_val_null[] = "end_time";
          } 
          $this->recurrence_before_qstr = $this->recurrence;
          $this->recurrence = substr($this->Db->qstr($this->recurrence), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->recurrence = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->recurrence);
          }
          if ($this->recurrence == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->recurrence = "null"; 
              $NM_val_null[] = "recurrence";
          } 
          $this->period_before_qstr = $this->period;
          $this->period = substr($this->Db->qstr($this->period), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->period = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->period);
          }
          if ($this->period == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->period = "null"; 
              $NM_val_null[] = "period";
          } 
          $this->id_api_before_qstr = $this->id_api;
          $this->id_api = substr($this->Db->qstr($this->id_api), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->id_api = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->id_api);
          }
          if ($this->id_api == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->id_api = "null"; 
              $NM_val_null[] = "id_api";
          } 
          $this->id_event_google_before_qstr = $this->id_event_google;
          $this->id_event_google = substr($this->Db->qstr($this->id_event_google), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->id_event_google = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->id_event_google);
          }
          if ($this->id_event_google == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->id_event_google = "null"; 
              $NM_val_null[] = "id_event_google";
          } 
          $this->recur_info_before_qstr = $this->recur_info;
          $this->recur_info = substr($this->Db->qstr($this->recur_info), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->recur_info = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->recur_info);
          }
          if ($this->recur_info == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->recur_info = "null"; 
              $NM_val_null[] = "recur_info";
          } 
          $this->event_color_before_qstr = $this->event_color;
          $this->event_color = substr($this->Db->qstr($this->event_color), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->event_color = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->event_color);
          }
          if ($this->event_color == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->event_color = "null"; 
              $NM_val_null[] = "event_color";
          } 
          $this->creator_before_qstr = $this->creator;
          $this->creator = substr($this->Db->qstr($this->creator), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->creator = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->creator);
          }
          if ($this->creator == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->creator = "null"; 
              $NM_val_null[] = "creator";
          } 
          $this->reminder_before_qstr = $this->reminder;
          $this->reminder = substr($this->Db->qstr($this->reminder), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->reminder = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->reminder);
          }
          if ($this->reminder == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->reminder = "null"; 
              $NM_val_null[] = "reminder";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 cal_lodge_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "title = '$this->title', start_date = #$this->start_date#, start_time = #$this->start_time#, end_date = #$this->end_date#, end_time = #$this->end_time#, recurrence = '$this->recurrence', period = '$this->period', category = $this->category, id_api = '$this->id_api', recur_info = '$this->recur_info', event_color = '$this->event_color'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "title = '$this->title', start_date = " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", start_time = " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", end_date = " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", end_time = " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", recurrence = '$this->recurrence', period = '$this->period', category = $this->category, id_api = '$this->id_api', recur_info = '$this->recur_info', event_color = '$this->event_color'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "title = '$this->title', start_date = " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", start_time = " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", end_date = " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", end_time = " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", recurrence = '$this->recurrence', period = '$this->period', category = $this->category, id_api = '$this->id_api', recur_info = '$this->recur_info', event_color = '$this->event_color'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "title = '$this->title', start_date = " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", start_time = " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", end_date = " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", end_time = " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", recurrence = '$this->recurrence', period = '$this->period', category = $this->category, id_api = '$this->id_api', recur_info = '$this->recur_info', event_color = '$this->event_color'"; 
              } 
              if (isset($NM_val_form['description']) && $NM_val_form['description'] != $this->nmgp_dados_select['description']) 
              { 
                  $SC_fields_update[] = "description = '$this->description'"; 
              } 
              if (isset($NM_val_form['id_event_google']) && $NM_val_form['id_event_google'] != $this->nmgp_dados_select['id_event_google']) 
              { 
                  $SC_fields_update[] = "id_event_google = '$this->id_event_google'"; 
              } 
              if (isset($NM_val_form['creator']) && $NM_val_form['creator'] != $this->nmgp_dados_select['creator']) 
              { 
                  $SC_fields_update[] = "creator = '$this->creator'"; 
              } 
              if (isset($NM_val_form['reminder']) && $NM_val_form['reminder'] != $this->nmgp_dados_select['reminder']) 
              { 
                  $SC_fields_update[] = "reminder = '$this->reminder'"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              else  
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  cal_lodge_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->title = $this->title_before_qstr;
              $this->description = $this->description_before_qstr;
              $this->recurrence = $this->recurrence_before_qstr;
              $this->period = $this->period_before_qstr;
              $this->id_api = $this->id_api_before_qstr;
              $this->id_event_google = $this->id_event_google_before_qstr;
              $this->recur_info = $this->recur_info_before_qstr;
              $this->event_color = $this->event_color_before_qstr;
              $this->creator = $this->creator_before_qstr;
              $this->reminder = $this->reminder_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->NM_ajax_info['calendarReload'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['title'])) { $this->title = $NM_val_form['title']; }
              elseif (isset($this->title)) { $this->nm_limpa_alfa($this->title); }
              if     (isset($NM_val_form) && isset($NM_val_form['recurrence'])) { $this->recurrence = $NM_val_form['recurrence']; }
              elseif (isset($this->recurrence)) { $this->nm_limpa_alfa($this->recurrence); }
              if     (isset($NM_val_form) && isset($NM_val_form['period'])) { $this->period = $NM_val_form['period']; }
              elseif (isset($this->period)) { $this->nm_limpa_alfa($this->period); }
              if     (isset($NM_val_form) && isset($NM_val_form['category'])) { $this->category = $NM_val_form['category']; }
              elseif (isset($this->category)) { $this->nm_limpa_alfa($this->category); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_api'])) { $this->id_api = $NM_val_form['id_api']; }
              elseif (isset($this->id_api)) { $this->nm_limpa_alfa($this->id_api); }
              if     (isset($NM_val_form) && isset($NM_val_form['recur_info'])) { $this->recur_info = $NM_val_form['recur_info']; }
              elseif (isset($this->recur_info)) { $this->nm_limpa_alfa($this->recur_info); }
              if     (isset($NM_val_form) && isset($NM_val_form['event_color'])) { $this->event_color = $NM_val_form['event_color']; }
              elseif (isset($this->event_color)) { $this->nm_limpa_alfa($this->event_color); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('title', 'category', 'id_api', 'event_color', 'start_date', 'end_date', 'start_time', 'end_time', '__calend_all_day__', 'recurrence', 'period', 'recur_info'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($this->google_calendar_insert) || !$this->google_calendar_insert)
          {
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      cal_lodge_pack_ajax_response();
                      exit;
                  }
              }
          }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (title, description, start_date, start_time, end_date, end_time, recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder) VALUES ('$this->title', '$this->description', #$this->start_date#, #$this->start_time#, #$this->end_date#, #$this->end_time#, '$this->recurrence', '$this->period', $this->category, '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "title, description, start_date, start_time, end_date, end_time, recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder) VALUES (" . $NM_seq_auto . "'$this->title', '$this->description', " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", '$this->recurrence', '$this->period', $this->category, '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "title, description, start_date, start_time, end_date, end_time, recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder) VALUES (" . $NM_seq_auto . "'$this->title', '$this->description', " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", '$this->recurrence', '$this->period', $this->category, '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "title, description, start_date, start_time, end_date, end_time, recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder) VALUES (" . $NM_seq_auto . "'$this->title', '$this->description', " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", '$this->recurrence', '$this->period', $this->category, '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "title, description, start_date, start_time, end_date, end_time, recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder) VALUES (" . $NM_seq_auto . "'$this->title', '$this->description', " . $this->Ini->date_delim . $this->start_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->start_time . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->end_time . $this->Ini->date_delim1 . ", '$this->recurrence', '$this->period', $this->category, '$this->id_api', '$this->id_event_google', '$this->recur_info', '$this->event_color', '$this->creator', '$this->reminder')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              cal_lodge_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          cal_lodge_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->title = $this->title_before_qstr;
              $this->description = $this->description_before_qstr;
              $this->recurrence = $this->recurrence_before_qstr;
              $this->period = $this->period_before_qstr;
              $this->id_api = $this->id_api_before_qstr;
              $this->id_event_google = $this->id_event_google_before_qstr;
              $this->recur_info = $this->recur_info_before_qstr;
              $this->event_color = $this->event_color_before_qstr;
              $this->creator = $this->creator_before_qstr;
              $this->reminder = $this->reminder_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              $this->sc_evento = "insert"; 
              $this->title = $this->title_before_qstr;
              $this->description = $this->description_before_qstr;
              $this->recurrence = $this->recurrence_before_qstr;
              $this->period = $this->period_before_qstr;
              $this->id_api = $this->id_api_before_qstr;
              $this->id_event_google = $this->id_event_google_before_qstr;
              $this->recur_info = $this->recur_info_before_qstr;
              $this->event_color = $this->event_color_before_qstr;
              $this->creator = $this->creator_before_qstr;
              $this->reminder = $this->reminder_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          cal_lodge_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if (isset($this->google_calendar_insert) && $this->google_calendar_insert)
      {
          return;
      }
      if (('insert' == $this->sc_evento && 1 != $GLOBALS["erro_incl"]) || 'delete' == $this->sc_evento)
      {
          $this->calendarOutputReload();
          exit;
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id, title, description, str_replace (convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20), str_replace (convert(char(10),start_time,102), '.', '-') + ' ' + convert(char(8),start_time,20), str_replace (convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20), str_replace (convert(char(10),end_time,102), '.', '-') + ' ' + convert(char(8),end_time,20), recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id, title, description, start_date, start_time, end_date, end_time, recurrence, period, category, id_api, id_event_google, recur_info, event_color, creator, reminder from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              else  
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->title = $rs->fields[1] ; 
              $this->nmgp_dados_select['title'] = $this->title;
              $this->description = $rs->fields[2] ; 
              $this->nmgp_dados_select['description'] = $this->description;
              $this->start_date = $rs->fields[3] ; 
              $this->nmgp_dados_select['start_date'] = $this->start_date;
              $this->start_time = $rs->fields[4] ; 
              $this->nmgp_dados_select['start_time'] = $this->start_time;
              $this->end_date = $rs->fields[5] ; 
              $this->nmgp_dados_select['end_date'] = $this->end_date;
              $this->end_time = $rs->fields[6] ; 
              $this->nmgp_dados_select['end_time'] = $this->end_time;
              $this->recurrence = $rs->fields[7] ; 
              $this->nmgp_dados_select['recurrence'] = $this->recurrence;
              $this->period = $rs->fields[8] ; 
              $this->nmgp_dados_select['period'] = $this->period;
              $this->category = $rs->fields[9] ; 
              $this->nmgp_dados_select['category'] = $this->category;
              $this->id_api = $rs->fields[10] ; 
              $this->nmgp_dados_select['id_api'] = $this->id_api;
              $this->id_event_google = $rs->fields[11] ; 
              $this->nmgp_dados_select['id_event_google'] = $this->id_event_google;
              $this->recur_info = $rs->fields[12] ; 
              $this->nmgp_dados_select['recur_info'] = $this->recur_info;
              $this->event_color = $rs->fields[13] ; 
              $this->nmgp_dados_select['event_color'] = $this->event_color;
              $this->creator = $rs->fields[14] ; 
              $this->nmgp_dados_select['creator'] = $this->creator;
              $this->reminder = $rs->fields[15] ; 
              $this->nmgp_dados_select['reminder'] = $this->reminder;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->category = (string)$this->category; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->title = "";  
              $this->nmgp_dados_form["title"] = $this->title;
              $this->description = "";  
              $this->nmgp_dados_form["description"] = $this->description;
              $this->start_date = "";  
              $this->start_date_hora = "" ;  
              $this->nmgp_dados_form["start_date"] = $this->start_date;
              $this->start_time = "";  
              $this->start_time_hora = "" ;  
              $this->nmgp_dados_form["start_time"] = $this->start_time;
              $this->end_date = "";  
              $this->end_date_hora = "" ;  
              $this->nmgp_dados_form["end_date"] = $this->end_date;
              $this->end_time = "";  
              $this->end_time_hora = "" ;  
              $this->nmgp_dados_form["end_time"] = $this->end_time;
              $this->recurrence = "";  
              $this->nmgp_dados_form["recurrence"] = $this->recurrence;
              $this->period = "";  
              $this->nmgp_dados_form["period"] = $this->period;
              $this->category = "";  
              $this->nmgp_dados_form["category"] = $this->category;
              $this->id_api = "";  
              $this->nmgp_dados_form["id_api"] = $this->id_api;
              $this->id_event_google = "";  
              $this->nmgp_dados_form["id_event_google"] = $this->id_event_google;
              $this->recur_info = "";  
              $this->nmgp_dados_form["recur_info"] = $this->recur_info;
              $this->event_color = "";  
              $this->nmgp_dados_form["event_color"] = $this->event_color;
              $this->creator = "";  
              $this->nmgp_dados_form["creator"] = $this->creator;
              $this->reminder = "";  
              $this->nmgp_dados_form["reminder"] = $this->reminder;
              $this->__calend_all_day__ = "";  
              $this->nmgp_dados_form["__calend_all_day__"] = $this->__calend_all_day__;
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }

          if (isset($this->sc_cal_click_date) && isset($this->sc_cal_click_time))
          {
              list($iTimestampIni, $iTimestampEnd) = $this->calendarInitTimestamp();

              $sTimeFormat1 = 'true' == $this->sc_cal_click_allday ? ''          : 'H:i:s';
              $sTimeFormat2 = 'true' == $this->sc_cal_click_allday ? ' 00:00:00' : ' H:i:s';

              $this->start_date = date('Y-m-d', $iTimestampIni);
              $this->start_time = date($sTimeFormat1, $iTimestampIni);
              $this->end_date = date('Y-m-d', $iTimestampEnd);
              $this->end_time = date($sTimeFormat1, $iTimestampEnd);
          }

          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              cal_lodge_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();

    if (('' == $this->start_time || '00:00:00' == $this->start_time) && ('' == $this->end_time || '00:00:00' == $this->end_time))
    {
        $this->__calend_all_day__ = 'Y';
    }

    include_once("cal_lodge_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("title", "category", "id_api", "event_color", "start_date", "end_date", "start_time", "end_time", "recurrence", "period", "recur_info"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("title", "category", "id_api", "event_color", "start_date", "end_date", "start_time", "end_time", "recurrence", "period", "recur_info"))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

    function calendarGetFullCalendarLocale($scLocale, $calendarType)
    {
        switch ($scLocale) {
            case 'cz':
                return 'cs';
            case 'pt_pt':
                if ('mini' == $calendarType) {
                    return 'pt-br';
                } else {
                    return 'pt-pt';
                }
            case 'thai':
                return 'th';
            default:
                return str_replace('_', '-', $scLocale);
        }
    }

    function calendarGetFullCalendarFirstDay($scFirstDay, $calendarType)
    {
        return $scFirstDay;
    }

   function calendarOutputDisplay()
   {
       if (isset($_SESSION['scriptcase']['reg_conf']['date_format']) && '' != $_SESSION['scriptcase']['reg_conf']['date_format'])
       {
           $iPosDay     = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'd');
           $iPosMonth   = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'm');
           $sCalDateCol = (false !== $iPosDay && false !== $iPosMonth && $iPosDay > $iPosMonth) ? 'M/D' : 'D/M';
       }
       else
       {
           $sCalDateCol = 'M/D';
       }

       $appReturn = '';
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_outra_jan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_outra_jan'] != 'cal_lodge')) {
           global $nm_url_saida, $nm_apl_dependente;
           if ((!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] == "R" || $this->aba_iframe) && ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] != "F") && ($nm_apl_dependente == 1)) {
               $appReturn = $nm_url_saida;
           }
           else {
           }
       }

       $iFirstDay = isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && '' != $_SESSION['scriptcase']['reg_conf']['date_week_ini'] ? array_search($_SESSION['scriptcase']['reg_conf']['date_week_ini'], array('SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA')) : false;
       $iFirstDay = false === $iFirstDay ? 0 : $iFirstDay;
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <title>cal_lodge</title>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__barraca-de-acampamento.ico">
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <script type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </script>
 <script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/packages/core/index.global.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/packages/core/locales-all.global.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/packages/moment/moment.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/dist/index.global.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/packages/moment/index.global.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar/packages/google-calendar/index.global.min.js"></script>
<?php
    $javascriptParams = array(
        'app_return' => $appReturn,
        'date_col' => $sCalDateCol,
        'first_day' => $iFirstDay,
        'url_google_import' => $url_importGoogle,
        'url_google_export' => $url_exportGoogle,
    );
    $this->calendarOutput_css();
    $this->calendarOutput_javascript($javascriptParams);
?>
</head>
<body class="scAppCalendarPage" style="">
<?php
    $this->calendarOutput_calendar();
    $this->calendarOutput_form();
?>
</body>
</html>
<?php
   } // calendarOutputDisplay

    function calendarOutput_css()
    {
?>
<style type="text/css">
@media (max-width: 1200px) {
    div.fc .fc-toolbar .fc-toolbar-title{
        display:none !important;
    }
}
@media (max-width: 1150px) {
    div.fc .fc-toolbar .fc-center{
        display:inline-block !important;
    }
    div.fc#calendar_mini button.fc-today-button,
    div.fc button.fc-today-button,
    div.fc button.fc-print-button,
    div.fc button.fc-importGoogle-button,
    div.fc button.fc-exportGoogle-button,
    div.fc button.fc-dayGridMonth-button,
    div.fc button.fc-timeGridWeek-button,
    div.fc button.fc-timeGridDay-button,
    div.fc button.fc-listMonth-button {
        background-repeat: no-repeat;
        background-size: 24px;
        background-position: center;
        text-indent: -9999px;
    }
    div.fc#calendar_mini button.fc-today-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_today.png)!important;
    }
    div.fc button.fc-today-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_today.png)!important;
    }
    div.fc button.fc-print-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_print.png)!important;
    }
    div.fc button.fc-importGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_down.png)!important;
    }
    div.fc button.fc-exportGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_up.png)!important;
    }
    div.fc button.fc-dayGridMonth-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_month.png)!important;
    }
    div.fc button.fc-timeGridWeek-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_week.png)!important;
    }
    div.fc button.fc-timeGridDay-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_day.png)!important;
    }
    div.fc button.fc-listMonth-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_list.png)!important;
    }
}

@media (max-width: 670px) {
    div.fc button.fc-print-button{
        display:none !important;
    }
}
@media (max-width: 853px) {
    div.fc .fc-toolbar .fc-toolbar-title{
        display:none !important;
    }
    div.fc button.fc-prev-button,
    div.fc button.fc-next-button{
        padding: 2px 5px !important;
    }
}
.fc-daygrid-day-events .fc-event-title {
    white-space: normal;
    word-break: break-word;
}
.fc-timegrid-col-events .fc-event-title {
    white-space: normal;
    word-break: break-word;
}
.fc-timegrid-event .fc-event-title {
     flex-grow:1;
     flex-shrink:1;
     font-weight:700;
     min-width:0;
     overflow:hidden
}
.fc-timegrid-event-harness .fc-event {
    overflow: hidden;
}
.fc-timegrid-event-harness .scCalendarEventPast {
    padding: 1px 3px !important;
}
.fc-timegrid-event-harness .scCalendarEventOnDay {
    padding: 1px 3px !important;
}
.fc-timegrid-event-harness .scCalendarEventFuture {
    padding: 1px 3px !important;
}
.fc-timegrid-event-harness .scCalendarEventPastFont:after {
    content: "";
}
.fc-timegrid-event-harness .scCalendarEventOnDayFont:after {
    content: "";
}
.fc-timegrid-event-harness .scCalendarEventFutureFont:after {
    content: "";
}
.fc-h-event .fc-event-title {
     font-weight:700;
}
.sc-cal-page-container {
    display: flex;
    flex-direction: row;
}
.sc-cal-side-container {
    display: flex;
    flex-direction: column;
    min-width: 300px;
    max-width: 300px;
}
.sc-cal-calendar-container {
    display: flex;
}
.sc-cal-button-container {
    display: flex;
    margin: 0 0 5px 0;
}
.sc-cal-categories-container {
    overflow: hidden;
    white-space: nowrap;
}
a#id_bcalendargoogleimport {
    white-space: nowrap;
}
a#id_bcalendargoogleexport {
    white-space: nowrap;
}
.sc-month-picker-nav {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 10px;
}
.sc-month-picker-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 10px;
}
.sc-month-picker-cell {
    display: inline-grid;
    flex-grow: 1;
    width: 30%;
}
.sc-month-picker-button {
    display: grid;
    border-radius: 25px;
    justify-items: center;
    padding: 10px;
    width: 75%;
}
.sc-month-picker-nav-button {
    font-size: 125%;
}
</style>
<?php
    } // calendarOutput_css

    function calendarOutput_javascript($javascriptParams)
    {
?>
<script type="text/javascript">
<?php
        $this->calendarOutput_javascriptGeneral($javascriptParams);
        $this->calendarOutput_javascriptDesktop();
        $this->calendarOutput_javascriptMobile();
        $this->calendarOutput_javascript_mainCalendar($javascriptParams);
        if (!isset($_SESSION['scriptcase']['device_mobile']) || !$_SESSION['scriptcase']['device_mobile'] || !$_SESSION['scriptcase']['display_mobile']) {
            $this->calendarOutput_javascript_miniCalendar($javascriptParams);
        }
?>
$(function() {
<?php
        $this->calendarOutput_javascriptOnReady($javascriptParams);
?>
});
</script>
<?php
    } // calendarOutput_javascript

    function calendarOutput_javascriptGeneral($javascriptParams)
    {
?>
function sc_session_redir(url_redir)
{
    if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
    {
        window.parent.sc_session_redir(url_redir);
    }
    else
    {
        if (window.opener && typeof window.opener.sc_session_redir === 'function')
        {
            window.close();
            window.opener.sc_session_redir(url_redir);
        }
        else
        {
            window.location = url_redir;
        }
    }
}

var scMainCalendar, scMiniCalendar, firstDateOfWeek, firstMonthOfWeek;
function calendarGoBack()
{
    document.F6.action = "<?php echo $javascriptParams['app_return']; ?>";
    document.F6.submit();
}
function calendar_reload()
{
    scMainCalendar.refetchEvents();
}
function calendar_print()
{
    $.ajax({
        url: "cal_lodge.php",
        type: "GET",
        dataType: "json",
        data: {
            nmgp_opcao: "calendar_print",
            category: getCategory(true),
            start: scMainCalendar.view.currentStart.toISOString(),
            end: scMainCalendar.view.currentEnd.toISOString()
        }
    }).done(function(data) {
        if ("html" == data.outputFormat) {
            var newWindow = window.open("");
            newWindow.document.write(data.printHtml);
            newWindow.document.close();
            newWindow.focus();
        } else {
            var newWindow = window.open(data.fileHtml);
        }
        //newWindow.print();
    });
}
function getEventTitle(info, fontClass)
{
    return '<div class="fc-event-title ' + fontClass + '">' + info.event._def.title + '</div>';
}
function getEventTime(info, fontClass)
{
    if (info.event._def.allDay) {
        return "";
    }
    let eventTime = getEventTime24H(info.event._instance.range.start);
    return '<div class="fc-event-time ' + fontClass + '">' + eventTime + '</div>';
}
function getEventTimeRange(info, fontClass)
{
    if (info.event._def.allDay) {
        return "";
    }
    let eventDuration = (info.event._instance.range.end - info.event._instance.range.start) / 1000 / 60,
        eventTimeStart = getEventTime24H(info.event._instance.range.start),
        eventTimeEnd = getEventTime24H(info.event._instance.range.end);
    if (eventDuration > 30) {
        return '<div class="fc-event-time ' + fontClass + '">' + eventTimeStart + ' - ' + eventTimeEnd  + '</div>' +
            '<div class="fc-event-title ' + fontClass + '">' + info.event._def.title + '</div>';
    } else {
        return '<div class="fc-event-time ' + fontClass + '">' + eventTimeStart + ' - ' + info.event._def.title  + '</div>';
    }
}
function getEventTimeAmPm(dateObj)
{
    if ("" == "<?php echo $_SESSION['scriptcase']['reg_conf']['time_simb_am'] ?>") {
        return getEventTime24H(dateObj);
    }
    let hours = dateObj.getUTCHours(), minutes = dateObj.getUTCMinutes(), suffix;
    if (hours > 12) {
        ampm = "<?php echo $_SESSION['scriptcase']['reg_conf']['time_simb_pm'] ?>";
        if (hours > 12) {
            hours -= 12;
        }
    } else {
        ampm = "<?php echo $_SESSION['scriptcase']['reg_conf']['time_simb_am'] ?>";
    }
    if (hours < 10) {
        hours = "0" + hours.toString();
    } else {
        hours = hours.toString();
    }
    if (minutes < 10) {
        minutes = "0" + minutes.toString();
    } else {
        minutes = minutes.toString();
    }
<?php
if ("left_with_space" == $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']) {
?>
    return ampm + " " + hours + ":" + minutes;
<?php
} elseif ("left_without_space" == $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']) {
?>
    return ampm + hours + ":" + minutes;
<?php
} elseif ("right_with_space" == $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']) {
?>
    return hours + ":" + minutes + " " + ampm;
<?php
} else {
?>
    return hours + ":" + minutes + ampm;
<?php
}
?>
}
function getEventTime24H(dateObj)
{
    let hours = dateObj.getUTCHours(), minutes = dateObj.getUTCMinutes();
    if (hours < 10) {
        hours = "0" + hours.toString();
    } else {
        hours = hours.toString();
    }
    if (minutes < 10) {
        minutes = "0" + minutes.toString();
    } else {
        minutes = minutes.toString();
    }
    return hours + ":" + minutes;
}
function getEventDescription(info, fontClass)
{
    if (info.event._def.extendedProps.description && info.event._def.extendedProps.description != '') {
        return '<div class="fc-event-description ' + fontClass + '" style="overflow: hidden; text-overflow: ellipsis"><span style="font-size: 80%;">' + info.event._def.extendedProps.description + '</span></div>';
    }
    return "";
}
function getEventFontClass(info)
{
    if (info.event._def.ui.classNames.includes("scCalendarEventPast")) {
        return "scCalendarEventPastFont";
    }
    if (info.event._def.ui.classNames.includes("scCalendarEventOnDay")) {
        return "scCalendarEventOnDayFont";
    }
    if (info.event._def.ui.classNames.includes("scCalendarEventFuture")) {
        return "scCalendarEventFutureFont";
    }
    return "";
}
function filterCategory(category)
{
    if ($("#id_calendar_category_" + category).hasClass('scCalendarCategoryItemActive')) {
        $("#id_calendar_category_" + category).removeClass('scCalendarCategoryItemActive');
    } else {
        $("#id_calendar_category_" + category).addClass('scCalendarCategoryItemActive');
    }
    refreshFilterCategories();
}
function refreshFilterCategories()
{
    var eventSource = scMainCalendar.getEventSources();
    eventSource[0].remove();
    setCategory();
    scMainCalendar.addEventSource('cal_lodge.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));
}
function setCategory()
{
    var selectedCategories = $(".scCalendarCategoryItemActive"), categoryList = new Array(), i;
    for (i = 0; i < selectedCategories.length; i++) {
        categoryList.push($(selectedCategories[i]).attr("id").substr(21));
    }
    $("#category_filter").val(categoryList.join(")SCCL)"))
}
function getCategory(isPrint)
{
    var categoryFilter = $("#category_filter");
    if (!categoryFilter.length) {
        return "";
    } else if (isPrint) {
        return categoryFilter.val();
    } else {
        return "&category=" + categoryFilter.val();
    }
}
function addNewEvent(sDate, sTime, allDay)
{
<?php
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
    addNewEvent_mobile(sDate, sTime, allDay);
<?php
        } else {
?>
    addNewEvent_desktop(sDate, sTime, allDay);
<?php
        }
?>
}
function editEvent(sEventId)
{
<?php
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
    editEvent_mobile(sEventId);
<?php
        } else {
?>
    editEvent_desktop(sEventId);
<?php
        }
?>
}
<?php
    } // calendarOutput_javascriptGeneral

    function calendarOutput_javascriptDesktop()
    {
?>
function addNewEvent_desktop(sDate, sTime, allDay)
{
    tb_show('', 'cal_lodge.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
function editEvent_desktop(sEventId)
{
    tb_show('', 'cal_lodge.php?nmgp_opcao=igual_calendar&id=' + sEventId + '&__orig_id=' + sEventId + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
<?php
    } // calendarOutput_javascriptDesktop

    function calendarOutput_javascriptMobile()
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $forced_mobile = (isset($_SESSION['scriptcase']['force_mobile']) && $_SESSION['scriptcase']['force_mobile']) ? 'true' : 'false';
            $sc_mobile_app_data = json_encode([
                'forceMobile' => $forced_mobile,
                'appType' => 'calendar',
                'improvements' => 1,
                'toolbarOrientation' => 'H',
                'mobilePanes' => 'true',
                'langs' => [],
            ]);
?>
</script>
    <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_mobile_app_data; ?>' />
    <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
    <script type="text/javascript" src="../_lib/lib/js/nm_calendar_mobile.js"></script>
    <link rel='stylesheet' href='../_lib/lib/css/nm_calendar_mobile.css' type='text/css'/>
<script>
var calendarMonth, calendarYear, currentYear = new Date().getFullYear(), yearThreshold = 100;
function addNewEvent_mobile(sDate, sTime, allDay)
{
    tb_show('', 'cal_lodge.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
function editEvent_mobile(sEventId)
{
    tb_show('', 'cal_lodge.php?nmgp_opcao=igual_calendar&id=' + sEventId + '&__orig_id=' + sEventId + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
function mobileMenuMonthClick()
{
    scMainCalendar.changeView('dayGridMonth');
}
function mobileMenuWeekClick()
{
    scMainCalendar.changeView('timeGridWeek');
}
function mobileMenuDayClick()
{
    scMainCalendar.changeView('timeGridDay');
}
function mobileMenuAgendaClick()
{
    scMainCalendar.changeView('listMonth');
}
function mobileMenuCategoriesClick()
{
}
function mobileMenuPrintClick()
{
    calendar_print();
}
function mobileMenuImportClick()
{
    tb_show('', 'cal_lodge.php?nmgp_opcao=importGoogle&nmgp_outra_jan=true&script_case_init=". $this->form_encode_input($this->Ini->sc_page) ."&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=150&width=400', '');
}
function mobileMenuExportClick()
{
    tb_show('', 'cal_lodge.php?nmgp_opcao=exportGoogle&nmgp_outra_jan=true&script_case_init=". $this->form_encode_input($this->Ini->sc_page) ."&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=280&width=450', '');
}
function monthPicker_show()
{
    monthPicker_getActualDate();
    monthPicker_hideMonthInterval();
    $("#sc-id-month-picker").show();
}
function monthPicker_getActualDate()
{
    let calendarDate = scMainCalendar.currentData.currentDate.toISOString();
    calendarMonth = calendarDate.substr(5, 2);
    calendarYear = calendarDate.substr(0, 4);
    $(".sc-nav-month").html(calendarYear);
}
function monthPicker_goToPrevious()
{
    if ($(".sc-nav-month").hasClass("sc-is-hidden")) {
        monthPicker_gotoPreviousYearBlock();
    } else {
        monthPicker_goToPreviousYear();
    }
}
function monthPicker_goToNext()
{
    if ($(".sc-nav-month").hasClass("sc-is-hidden")) {
        monthPicker_goToNextYearBlock();
    } else {
        monthPicker_goToNextYear();
    }
}
function monthPicker_goToPreviousYear()
{
    let thisYear = parseInt($(".sc-nav-month").html());
    $(".sc-nav-month").html(thisYear - 1);
    monthPicker_highlightMonth();
}
function monthPicker_goToNextYear()
{
    let thisYear = parseInt($(".sc-nav-month").html());
    $(".sc-nav-month").html(thisYear + 1);
    monthPicker_highlightMonth();
}
function monthPicker_gotoPreviousYearBlock()
{
    let middleYear = parseInt($("#sc-id-year-7").html()) - 12;
    if (middleYear + 6 > currentYear - yearThreshold) {
        monthPicker_populateYearList(middleYear);
    }
}
function monthPicker_goToNextYearBlock()
{
    let middleYear = parseInt($("#sc-id-year-7").html()) + 12;
    if (middleYear - 6 < currentYear + yearThreshold) {
        monthPicker_populateYearList(middleYear);
    }
}
function monthPicker_showMonthInterval()
{
    let thisYear = parseInt($(".sc-nav-month").html());
    monthPicker_populateYearList(thisYear);
    $(".sc-nav-month").addClass("sc-is-hidden").hide();
    $(".sc-nav-month-interval").show();
    $("#sc-id-month-list").hide();
    $("#sc-id-year-list").show();
}
function monthPicker_hideMonthInterval()
{
    monthPicker_highlightMonth();
    $(".sc-nav-month").removeClass("sc-is-hidden").show();
    $(".sc-nav-month-interval").hide();
    $("#sc-id-month-list").show();
    $("#sc-id-year-list").hide();
}
function monthPicker_goToDate(thisMonth)
{
    let thisYear = parseInt($(".sc-nav-month").html()), thisMoment;
    scMainCalendar.gotoDate(thisYear + "-" + thisMonth + "-01");
    history.back();
}
function monthPicker_goToYear(thisYear)
{
    $(".sc-nav-month").html(thisYear);
    monthPicker_hideMonthInterval();
}
function monthPicker_populateYearList(baseYear)
{
    let firstYear = baseYear - 6, i, lastYear, thisYear = parseInt(calendarYear);
    let selectedYear = $(".sc-month-picker-year").filter(".scButton_ok");
    if (selectedYear.length) {
        selectedYear.removeClass("scButton_ok").addClass("scButton_default");
    }
    for (i = 1; i <= 12; i++) {
        lastYear = firstYear + i - 1;
        $("#sc-id-year-" + i).html(lastYear);
        if (lastYear == thisYear) {
            $("#sc-id-year-" + i).removeClass("scButton_default").addClass("scButton_ok");
        }
    }
    $(".sc-nav-month-interval").html(firstYear + " - " + lastYear);
}
function monthPicker_highlightMonth()
{
    let selectedMonth = $(".sc-month-picker-month").filter(".scButton_ok");
    if (selectedMonth.length) {
        selectedMonth.removeClass("scButton_ok").addClass("scButton_default");
    }
    if ($(".sc-nav-month").html() == calendarYear) {
        $("#sc-id-month-" + calendarMonth).removeClass("scButton_default").addClass("scButton_ok");
    }
}
<?php
        }
    } // calendarOutput_javascriptMobile

    function calendarOutput_javascriptOnReady($javascriptParams)
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $this->calendarOutput_javascriptOnReady_mobile();
        }
    } // calendarOutput_javascriptOnReady

    function calendarOutput_javascript_miniCalendar($javascriptParams)
    {
?>
        document.addEventListener('DOMContentLoaded', function() {
            var miniCalendarEl = document.getElementById('calendar_mini');
            scMiniCalendar = new FullCalendar.Calendar(miniCalendarEl, {
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: '',
                },
                locale: "<?php echo $this->calendarGetFullCalendarLocale($_SESSION['scriptcase']['str_lang'], 'mini'); ?>",
                buttonText: {
                    today: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                },
                firstDay: <?php echo $this->calendarGetFullCalendarFirstDay($javascriptParams['first_day'], 'mini'); ?>,
                dateClick: function(info) {
                    scMainCalendar.gotoDate(info.dateStr);
                },
                aspectRatio: 1.2,
                initialView: 'dayGridMonth'
            });
            scMiniCalendar.render();
        });
<?php
    } // calendarOutput_javascript_miniCalendar

    function calendarOutput_javascript_mainCalendar($javascriptParams)
    {
        $googleButtons = '';
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $googleButtons = '';
        }
?>
        document.addEventListener('DOMContentLoaded', function() {
            var mainCalendarEl = document.getElementById('calendar');
            var googleButtons = '<?php echo $googleButtons ?>';
            scMainCalendar = new FullCalendar.Calendar(mainCalendarEl, {
                editable: <?php echo ($this->calendarConfigValues['update'] ? 'true' : 'false'); ?>,
                headerToolbar: {
                    left: 'prev,next today print' + googleButtons,
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth<?php if ('' != $javascriptParams['app_return']) { echo ' goBack'; } ?>'
                },
                buttonText: {
                    today: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                    month: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                    week: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                    day: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                    agenda: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                    print: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                    listMonth: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                },
                locale: "<?php echo $this->calendarGetFullCalendarLocale($_SESSION['scriptcase']['str_lang'], 'main'); ?>",
                customButtons: {
                    print: {
                        text: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                        click: function() {
                            calendar_print();
                        }
                    },
                    goBack: {
                        text: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_back"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                        click: function() {
                            calendarGoBack();
                        }
                    }
                },
                views: {
                    dayGridMonth: {
                        eventContent: function (arg) {
                            let eventFontClass = getEventFontClass(arg);
                            let eventHtml = getEventTime(arg, eventFontClass)
                                          + getEventTitle(arg, eventFontClass)
                                          + getEventDescription(arg, eventFontClass);
                            return {html: eventHtml};
                        }
                    },
                    timeGridWeek: {
                        eventContent: function (arg) {
                            let eventFontClass = getEventFontClass(arg);
                            let eventHtml = getEventTimeRange(arg, eventFontClass)
                                          + getEventDescription(arg, eventFontClass);
                            return {html: eventHtml};
                        },
                        slotLabelContent: function(arg) {
                            let timeString = '';
                            timeString += arg.date.getHours() + ':';
                            if (10 > arg.date.getMinutes()) {
                                timeString += '0' + arg.date.getMinutes();
                            } else {
                                timeString += arg.date.getMinutes();
                            }
                            return timeString;
                        }
                    },
                    timeGridDay: {
                        eventContent: function (arg) {
                            let eventFontClass = getEventFontClass(arg);
                            let eventHtml = getEventTimeRange(arg, eventFontClass)
                                          + getEventDescription(arg, eventFontClass);
                            return {html: eventHtml};
                        },
                        slotLabelContent: function(arg) {
                            let timeString = '';
                            timeString += arg.date.getHours() + ':';
                            if (10 > arg.date.getMinutes()) {
                                timeString += '0' + arg.date.getMinutes();
                            } else {
                                timeString += arg.date.getMinutes();
                            }
                            return timeString;
                        }
                    }
                },
                slotDuration: "00:30:00",
                snapDuration: "00:30:00",
                firstDay: <?php echo $this->calendarGetFullCalendarFirstDay($javascriptParams['first_day'], 'main'); ?>,
                weekNumberCalculation: "ISO",
                nextDayThreshold: "00:00:00",
                eventStartEditable: true,
                allDaySlot: true,
                allDayContent: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                events: 'cal_lodge.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false),
                eventClick: function(info) {
                    editEvent(info.event.id);
                },
                eventDidMount: function (arg) {
                    if ("" != arg.backgroundColor) {
                        $(arg.el).css({
                            backgroundColor: arg.backgroundColor,
                            borderColor: arg.backgroundColor
                        });
                    }
                },
                eventDrop: function(info) {
                    $.ajax({
                        url: 'cal_lodge.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'script_case_init': '<?php echo $this->Ini->sc_page ?>',
                            'nmgp_opcao': 'calendar_drop',
                            'sc_event_id': info.event.id,
                            'sc_day_delta': info.delta.days,
                            'sc_time_delta': (info.delta.milliseconds / 1000) / 60,
                            'sc_all_day': info.event.allDay,
                            'sc_fullcal_start': (info.event._start && info.event._start._d ? info.event._start._d.toISOString() : ''),
                            'sc_fullcal_end': (info.event._end && info.event._end._d ? info.event._end._d.toISOString() : '')
                        },
                        success: function(data) {
                            var bChanged = false;
                            if (typeof data['status'] !== "undefined" && false == data['status']) {
                                revertFunc();
                            } else {
                                if (typeof data['backgroundColor'] !== "undefined" && '' != data['backgroundColor']) {
                                    if (!info.event._def.ui.classNames.includes(data['backgroundColor'])) {
                                        bChanged = true;
                                    }
                                }
                                if (info.event._def.allDay || bChanged) {
                                    scMainCalendar.refetchEvents();
                                }
                            }
                            if (typeof data['message'] !== "undefined" && '' != data['message']) {
                                alert(data['message']);
                            }
                        }
                    });
                },
                eventResize: function(info) {
                    $.ajax({
                        url: 'cal_lodge.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'script_case_init': '<?php echo $this->Ini->sc_page ?>',
                            'nmgp_opcao': 'calendar_resize',
                            'sc_event_id': info.event.id,
                            'sc_day_delta': info.endDelta.days,
                            'sc_time_delta': (info.endDelta.milliseconds / 1000) / 60,
                            'sc_fullcal_start': (info.event._start && info.event._start._d ? info.event._start._d.toISOString() : ''),
                            'sc_fullcal_end': (info.event._end && info.event._end._d ? info.event._end._d.toISOString() : '')
                        },
                        success: function(data) {
                            if (false == data['status']) {
                                revertFunc();
                            }
                            if (typeof data['message'] !== "undefined" && '' != data['message']) {
                                alert(data['message']);
                            }
                        }
                    });
                },
                dateClick: function(info) {
<?php
        if ($this->calendarConfigValues['insert']) {
?>
                    var sDate = info.dateStr, sTime = '00:00:00', allDay = false;
                    if (sDate.indexOf('T') > 0) {
                        dateParts = info.dateStr.split('T');
                        sDate = dateParts[0], sTime = dateParts[1];
                        if (sTime.indexOf('-') > 0) {
                            sTime = sTime.split('-');
                            sTime = sTime[0];
                        }
                    } else if ('dayGridMonth' == info.view.type) {
                        sTime = '06:00:00';
                    } else {
                        allDay = true;
                    }
                    addNewEvent(sDate, sTime, allDay);
<?php
        }
?>
                },
                initialView: 'timeGridDay'
            });
            scMainCalendar.render();
        });
<?php
    } // calendarOutput_javascript_mainCalendar

    function calendarOutput_javascriptOnReady_mobile()
    {
?>
    bootstrapMobile();
    $("#sc-mobile-menu-month").on("click", function() {
        mobileMenuMonthClick();
    });
    $("#sc-mobile-menu-week").on("click", function() {
        mobileMenuWeekClick();
    });
    $("#sc-mobile-menu-day").on("click", function() {
        mobileMenuDayClick();
    });
    $("#sc-mobile-menu-agenda").on("click", function() {
        mobileMenuAgendaClick();
    });
    $("#sc-mobile-menu-categories").on("click", function() {
        mobileMenuCategoriesClick();
    });
    $("#sc-mobile-menu-print").on("click", function() {
        mobileMenuPrintClick();
    });
    $("#sc-mobile-menu-import").on("click", function() {
        mobileMenuImportClick();
    });
    $("#sc-mobile-menu-export").on("click", function() {
        mobileMenuExportClick();
    });
    $(".sc-nav-prev").on("click", function() {
        monthPicker_goToPrevious();
    });
    $(".sc-nav-next").on("click", function() {
        monthPicker_goToNext();
    });
    $(".sc-nav-month").on("click", function() {
        monthPicker_showMonthInterval();
    });
    $(".sc-month-picker-month").on("click", function() {
        monthPicker_goToDate($(this).attr("id").substr(12));
    });
    $(".sc-month-picker-year").on("click", function() {
        monthPicker_goToYear($(this).html());
    });
<?php
    } // calendarOutput_javascriptOnReady_mobile

    function calendarOutput_calendar()
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $this->calendarOutput_calendarMobile();
        } else {
            $this->calendarOutput_calendarDesktop();
        }
    } // calendarOutput_calendar

    function calendarOutput_calendarDesktop()
    {
?>
<div class="scCalendarBorder sc-cal-page-container">
<?php
        $this->calendarOutput_sideBar();
        $this->calendarOutput_mainCalendar();
?>
</div>
<?php
    } // calendarOutput_calendarDesktop

    function calendarOutput_calendarMobile()
    {
?>
<div class="scCalendarBorder sc-cal-page-container">
<?php
        $this->calendarOutput_mainCalendar();
?>
</div>
<?php
        $this->calendarOutput_categoriesFilter();
        $this->calendarOutput_monthPicker();
        $this->calendarOutput_mobileMenu();
    } // calendarOutput_calendarMobile

    function calendarOutput_mainCalendar()
    {
?>
<div class="sc-cal-calendar-container" style="flex-grow: 1">
    <div id="calendar" style="min-width: 260px; display:inline-block; margin-left:4px; vertical-align: top; flex-grow: 1;"></div>
</div>
<?php
    } // calendarOutput_mainCalendar

    function calendarOutput_sideBar()
    {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['under_dashboard']) {
?>
<style type="text/css">
BODY { margin: 0 !important }
</style>
<?php
        }
?>
<div class="sc-cal-side-container">
<?php
        $this->calendarOutput_googleCalendarButtons();
        $this->calendarOutput_miniCalendar();
        $this->calendarOutput_categoriesFilter();
?>
</div>
<?php
    } // calendarOutput_sideBar

    function calendarOutput_googleCalendarButtons()
    {
    } // calendarOutput_googleCalendarButtons

    function calendarOutput_miniCalendar()
    {
?>
    <div id="calendar_mini"></div>
<?php
    } // calendarOutput_miniCalendar

    function calendarOutput_categoriesFilter()
    {
?>
    <script type="text/javascript">$(function() { refreshFilterCategories(); });</script>
    <div class="scCalendarCategory">
        <div class="scCalendarCategoryTitle"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_categories"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></div>
        <input type="hidden" value="" id="category_filter" name="category_filter" />
        <div class="scCalendarCategoryItemsMoldura sc-cal-categories-container">
<?php
        $categoryLookup = $this->Form_lookup_category();
        foreach ($categoryLookup as $categoryData) {
            if (!empty($categoryData) && strpos($categoryData, '?#?') !== false) {
                $categoryParts = explode('?#?', $categoryData);
                if (!isset($categoryParts[3])) {
                    $categoryParts[3] = '';
                }
?>
            <div class="scCalendarCategoryItem scCalendarCategoryItemActive" onclick="filterCategory('<?php echo $categoryParts[1] ?>')" id="id_calendar_category_<?php echo $categoryParts[1] ?>">
                <div style="width:16px; height:16px; display: inline-block; margin: 0px 2px; border-style: solid; border-width: 1px; border-color: <?php echo $categoryParts[3] ?>; background-color: <?php echo $categoryParts[3] ?>;"></div>
                <?php echo $categoryParts[0] ?>
            </div>
<?php
            }
        }
?>
            <div class="scCalendarCategoryItem scCalendarCategoryItemActive" onclick="filterCategory('SCNULLCAT')" id="id_calendar_category_SCNULLCAT">
                <div style="width:16px; height:16px; display: inline-block; margin: 0px 2px; border-style: solid; border-width: 1px; border-color: #000; background-color: #fff;"></div>
                <?php echo $this->Ini->Nm_lang['lang_calendar_no_category']; ?>
            </div>
        </div>
    </div>
<?php
    } // calendarOutput_categoriesFilter

    function calendarOutput_monthPicker()
    {
?>
<div id="sc-id-month-picker" style="display: none">
    <div class="sc-month-picker-nav">
        <div>
            <span class="sc-nav-prev sc-month-picker-nav-button fas fa-arrow-left"></span>
        </div>
        <div>
            <span class="sc-nav-month"></span>
            <span class="sc-nav-month-interval" style="display: none"></span>
        </div>
        <div>
            <span class="sc-nav-next sc-month-picker-nav-button fas fa-arrow-right"></span>
        </div>
    </div>
    <div id="sc-id-month-list">
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-01" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-02" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-03" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-04" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-05" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-06" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-07" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-08" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-09" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-10" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-11" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-12" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
    </div>
    <div id="sc-id-year-list" style="display: none">
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-1" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-2" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-3" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-4" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-5" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-6" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-7" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-8" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-9" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-10" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-11" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-12" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
    </div>
</div>
<?php
    } // calendarOutput_monthPicker

    function calendarOutput_mobileMenu()
    {
?>
<div class="calendar-mobile-menu-overlay"></div>
<div class="calendar-mobile-menu">
    <div class="calendar-mobile-menu-toolbar"></div>
    <div class="calendar-mobile-menu-items">
        <div><span id="sc-mobile-menu-month" style="align-items: center">
            <span class="far fa-calendar-alt"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <div><span id="sc-mobile-menu-week" style="align-items: center">
            <span class="fas fa-columns"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <div><span id="sc-mobile-menu-day" style="align-items: center">
            <span class="far fa-calendar-times""></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <div><span id="sc-mobile-menu-agenda" style="align-items: center">
            <span class="fas fa-list"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <hr />
        <div><span id="sc-mobile-menu-categories" style="align-items: center">
            <span class="fas fa-filter"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_categories"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <hr />
        <div><span id="sc-mobile-menu-print" style="align-items: center">
            <span class="fas fa-print"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
    </div>
</div>
<?php
    } // calendarOutput_mobileMenu

    function calendarOutput_form()
    {
        $this->calendarOutput_formGeneral();
        $this->calendarOutput_formMobile();
    } // calendarOutput_form

    function calendarOutput_formGeneral()
    {
?>
<form name="F6" method="post" action="./" target="_self">
    <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
</form>
<?php
    } // calendarOutput_formGeneral

    function calendarOutput_formMobile()
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
<form name="F1" id="sc-ui-form" method="post" action="./" target="_self">
    <input type="hidden" name="nm_form_submit" value="1" />
    <input type="hidden" name="nmgp_url_saida" value="" />
    <input type="hidden" name="nmgp_opcao" id="sc-ui-nmgp_opcao" value="" />
    <input type="hidden" name="nmgp_parms" value="" />
    <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
    <input type="hidden" name="sc_cal_click_date" id="sc-ui-click-date" value="" />
    <input type="hidden" name="sc_cal_click_time" id="sc-ui-click-time" value="" />
    <input type="hidden" name="sc_cal_click_allday" id="sc-ui-click-allday" value="" />
    <input type="hidden" name="id" id="sc-ui-event-id" value="" />
</form>
<?php
        }
    } // calendarOutput_formMobile

   function calendarOutputJson($returnArray, $integerIndexes = false)
   {
       if (!isset($_GET['nmgp_opcao']) || ($_GET['nmgp_opcao'] != 'igual' && $_GET['nmgp_opcao'] != 'edit_novo'))
       {
            $Temp = ob_get_clean();
       }
       $returnFinal = array();
       foreach ($returnArray as $arrayKey => $arrayValue) {
           if ($integerIndexes) {
               $returnFinal[] = $arrayValue;
           } else {
               $returnFinal[$arrayKey] = $arrayValue;
           }
       }
       $oJson = new Services_JSON();
       echo $oJson->encode($returnFinal);
   } // calendarOutputJson

   function calendarOutputReload()
   {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title>cal_lodge</title>
 <script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></script>
 <script type="text/javascript">
  $(document).ready(function() {
    self.parent.calendar_reload();
    self.parent.tb_remove();
  });
 </script>
</head>
<body>
</body>
</html>
<?php
   } // calendarOutputReload

   function calendarFetchEvents($sId = '', $bPrintCalendar = false)
   {
       $aEvents = array_merge($this->calendarFetchNormalEvents($sId, $bPrintCalendar), $this->calendarFetchRecurrentEvents($sId));

       $categoryLookup = $this->Form_lookup_category();
       $categoryColors = array();
       foreach ($categoryLookup as $categoryData)
       {
           if (!empty($categoryData) && strpos($categoryData, '?#?') !== false)
           {
               $categoryParts = explode('?#?', $categoryData);
               if (isset($categoryParts[3]))
               {
                   $categoryColors[ $categoryParts[1] ] = $categoryParts[3];
               }
           }
       }

       foreach ($aEvents as $iEvent => $aEventData)
       {
           if ((!isset($aEventData['event_color']) || '' == $aEventData['event_color']) && isset($aEventData['category']) && '' != $aEventData['category'] && isset($categoryColors[ $aEventData['category'] ]))
           {
               $aEventData['event_color'] = $categoryColors[ $aEventData['category'] ];
           }
           if (isset($aEventData['event_color']))
           {
               $aEvents[$iEvent]['backgroundColor'] = $aEventData['event_color'];
               $aEvents[$iEvent]['borderColor']     = $aEventData['event_color'];
           }
           if ($aEventData['start'] < date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorPast'];
           }
           elseif ($aEventData['start'] > date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorFuture'];
           }
           else
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorToday'];
           }
       }

       return $aEvents;
   } // calendarFetchEvents

   function calendarFetchNormalEvents($sId, $bPrintCalendar = false, $filter = null)
   {
       $aSelect = $this->calendarFetchSelect(null !== $filter);

       $whereClause = $this->calendarWhere($sId, false, $bPrintCalendar, $filter);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName || 'description' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           $aEvents[] = $aEvent;

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchNormalEvents

   function calendarFetchRecurrentEvents($sId, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return array();
       }

       $aSelect = $this->calendarFetchSelect();

       $whereClause = $this->calendarWhere($sId, true, $bPrintCalendar);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $calendarDisplayStart = isset($_GET['start']) && '' != $_GET['start'] ? str_replace('-', '', $_GET['start']) : '';
       $calendarDisplayEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? str_replace('-', '', $_GET['end'])   : '';

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array('recur_info' => null);

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
               }
               elseif ('recur_info' == $sFldName)
               {
                   $aEvent[$sFldName] = json_decode($oRs->fields[$iSql]);
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           switch ($aEvent['period'])
           {
               case 'D':
                   $this->calendarRecurrentDay($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'W':
                   $this->calendarRecurrentWeek($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'M':
                   $this->calendarRecurrentMonth($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case 'A':
                   $this->calendarRecurrentYear($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;
           }

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchRecurrentEvents

   function calendarFetchSelect($googleInfo = false)
   {
       $aSelect = array();

       $aSelect['id'] = "id";

       $aSelect['title'] = "title";

       if (isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start'] = "convert(char(23),start_date,121)";
       }
       elseif (isset($this->Ini->nm_bases_sybase) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start'] = "str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20)";
       }
       else
       {
           $aSelect['start'] = "start_date";
       }

       if (isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end'] = "convert(char(23),end_date,121)";
       }
       elseif (isset($this->Ini->nm_bases_sybase) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end'] = "str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20)";
       }
       else
       {
           $aSelect['end'] = "end_date";
       }

       if (isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start_time'] = "convert(char(8),start_time,108)";
       }
       elseif (isset($this->Ini->nm_bases_sybase) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start_time'] = "str_replace(convert(char(10),start_time,102), '.', '-') + ' ' + convert(char(8),start_time,20)";
       }
       else
       {
           $aSelect['start_time'] = "start_time";
       }

       if (isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['end_time'] = "convert(char(8),end_time,108)";
       }
       elseif (isset($this->Ini->nm_bases_sybase) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['end_time'] = "str_replace(convert(char(10),end_time,102), '.', '-') + ' ' + convert(char(8),end_time,20)";
       }
       else
       {
           $aSelect['end_time'] = "end_time";
       }

       $aSelect['event_color'] = "event_color";

       $aSelect['category'] = "category";

       $aSelect['recurrence'] = "recurrence";
       $aSelect['period'] = "period";
       $aSelect['recur_info'] = "recur_info";

       if ($googleInfo) {
           $aSelect['google_calendar'] = "id_api";
           $aSelect['google_event'] = "id_event_google";
       }

       return $aSelect;
   } // calendarFetchSelect

   function calendarWhere($sId, $bRecur = false, $bPrintCalendar = false, $filter = null)
   {
       if ('' != $sId)
       {
           return " WHERE id = " . $sId;
       }

       $aWhere = array();

       if (null === $filter) {
           $sStart      = isset($_GET['start'])    && '' != $_GET['start']    ? $_GET['start']    : '';
           $sEnd        = isset($_GET['end'])      && '' != $_GET['end']      ? $_GET['end']      : '';
           $sCategory   = isset($_GET['category']) && '' != $_GET['category'] ? $_GET['category'] : '';

           if (!$bRecur) {
               if ('' != $sStart && '' != $sEnd)
               {
                   if (!$bPrintCalendar)
                   {
                       $s_Ini_StartFormat = date('Y-m-d', $this->calendarFullcalendarToTimestamp($sStart));
                       $s_Ini_EndFormat   = date('Y-m-d', $this->calendarFullcalendarToTimestamp($sEnd));
                   }
                   else
                   {
                       $s_Ini_StartFormat = $sStart;
                       $s_Ini_EndFormat   = $sEnd;
                   }
                   if (isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                   {
                       $aWhere[] = "convert(char(23),start_date,121) >= '" . $s_Ini_StartFormat . "' AND convert(char(23),start_date,121) <= '" . $s_Ini_EndFormat . "'";
                   }
                   elseif (isset($this->Ini->nm_bases_sybase) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
                   {
                       $aWhere[] = "str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20) >= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20) <= '" . $s_Ini_EndFormat . "'";
                   }
                   elseif (isset($this->Ini->nm_bases_access) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                   {
                       $aWhere[] = "start_date >= #" . $s_Ini_StartFormat . "# AND start_date <= #" . $s_Ini_EndFormat . "#";
                   }
                   else
                   {
                       $aWhere[] = "start_date >= '" . $s_Ini_StartFormat . "' AND start_date <= '" . $s_Ini_EndFormat . "'";
                   }

                   if (!$bPrintCalendar)
                   {
                       $s_Fin_StartFormat = date('Y-m-d', $this->calendarFullcalendarToTimestamp($sStart));
                       $s_Fin_EndFormat   = date('Y-m-d', $this->calendarFullcalendarToTimestamp($sEnd));
                   }
                   else
                   {
                       $s_Fin_StartFormat = $sStart;
                       $s_Fin_EndFormat   = $sEnd;
                   }
                   if (isset($this->Ini->nm_bases_mssql) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                   {
                       $aWhere[] = "convert(char(23),end_date,121) >= '" . $s_Fin_StartFormat . "' AND convert(char(23),end_date,121) <= '" . $s_Fin_EndFormat . "'";
                       $aWhere[] = "convert(char(23),start_date,121) <= '" . $s_Ini_StartFormat . "' AND convert(char(23),end_date,121) >= '" . $s_Fin_EndFormat . "'";
                   }
                   elseif (isset($this->Ini->nm_bases_sybase) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
                   {
                       $aWhere[] = "str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20) >= '" . $s_Fin_StartFormat . "' AND str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20) <= '" . $s_Fin_EndFormat . "'";
                       $aWhere[] = "str_replace(convert(char(10),start_date,102), '.', '-') + ' ' + convert(char(8),start_date,20) <= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),end_date,102), '.', '-') + ' ' + convert(char(8),end_date,20) >= '" . $s_Fin_EndFormat . "'";
                   }
                   elseif (isset($this->Ini->nm_bases_access) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                   {
                       $aWhere[] = "end_date >= #" . $s_Fin_StartFormat . "# AND end_date <= #" . $s_Fin_EndFormat . "#";
                       $aWhere[] = "start_date <= #" . $s_Ini_StartFormat . "# AND end_date >= #" . $s_Fin_EndFormat . "#";
                   }
                   else
                   {
                       $aWhere[] = "end_date >= '" . $s_Fin_StartFormat . "' AND end_date <= '" . $s_Fin_EndFormat . "'";
                       $aWhere[] = "start_date <= '" . $s_Ini_StartFormat . "' AND end_date >= '" . $s_Fin_EndFormat . "'";
                   }
               }
           } else {
               $aWhere[] = "recurrence = 'Y'";
           }

           $aFinal = array('(' . implode(') OR (', $aWhere) . ')');
           if ('' != $sCategory)
           {
               $categoryList  = explode(')SCCL)', $sCategory);
               $categoryRules = array();
               foreach ($categoryList as $categoryItem)
               {
                   if ('SCNULLCAT' == $categoryItem) {
                       $categoryRules[] = "(category = 0 OR category IS NULL)";
                   }
                   else {
                       $categoryRules[] = "category = {$categoryItem}";
                   }
               }
               $aFinal[] = '(' . implode(' OR ', $categoryRules) . ')';
           }
           else
           {
               return false;
           }

           if (!$bRecur) {
               $aFinal[] = "recurrence <> 'Y'";
           }
       }
       else {
           $aRules = array();
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_empty']) {
               $aRules[] = "id_api = ''";
           }
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_google']) {
               $aRules[] = "id_api = '" . $_POST['sc_calendar_id'] . "'";
           }

           $aFinal = !empty($aRules) ? array('(' . implode(') OR (', $aRules) . ')') : array();
       }

       $cWhere = array();
       $sc_where_filter = '';
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form'])
       {
           $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'])
       {
           if (empty($sc_where_filter))
           {
               $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'];
           }
           else
           {
               $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] . ")";
           }
       }
       $cWhere[] = $sc_where_filter;
       $wUsr     = $this->returnWhere($cWhere);
       if (!empty($wUsr))
       {
           $aFinal[] = substr(trim($wUsr), 5);
       }

       return empty($aFinal) ? '' : ' WHERE (' . implode(') AND (', $aFinal) . ')';
   } // calendarWhere

    function calendarRecurrentDay(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'daily')
        );
    } // calendarRecurrentDay

    function calendarRecurrentWeek(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'weekly')
        );
    } // calendarRecurrentWeek

    function calendarRecurrentMonth(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'monthly')
        );
    } // calendarRecurrentMonth

    function calendarRecurrentYear(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'yearly')
        );
    } // calendarRecurrentYear

    function calendarRecurrence(&$eventsToDisplay, $thisEvent, $params) {
        if (isset($thisEvent['recur_info'])) {
            switch ($thisEvent['recur_info']->endon) {
                case 'N': // never
                    $this->calendarRecurrenceNever($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'A': // after X occurrences
                    $this->calendarRecurrenceAfterOccurrences($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'I': // in X date
                    $this->calendarRecurrenceInDate($eventsToDisplay, $thisEvent, $params);
                    return;
            }
        }

        $this->calendarRecurrenceOnEvent($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrence

    function calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, $period) {
        $startTimestamp = $this->calendarStartToTimestamp($thisEvent);
        $startDate      = date('Ymd', $startTimestamp);
        $startTime      = date('His', $startTimestamp);

        $endTimestamp = $this->calendarEndToTimestamp($thisEvent);
        if (false === $endTimestamp) {
            $endTimestamp = $startTimestamp;
        }
        $endDate = date('Ymd', $endTimestamp);
        $endTime = date('His', $endTimestamp);

        $params = array(
            'displayStartDate' => $calendarDisplayStart,
            'displayEndDate'   => $calendarDisplayEnd,
            'startDate'        => $startDate,
            'startTime'        => $startTime,
            'endDate'          => $endDate,
            'testEndDate'      => $endDate,
            'endTime'          => $endTime,
            'period'           => $period,
            'repeat'           => !isset($thisEvent['recur_info']) ? 1  : $thisEvent['recur_info']->repeat,
            'endafter'         => !isset($thisEvent['recur_info']) ? '' : $thisEvent['recur_info']->endafter,
            'endin'            => !isset($thisEvent['recur_info']) ? '' : str_replace('-', '', $thisEvent['recur_info']->endin),
            'daysToAdd'        => array(),
            'forceEndToStart'  => false
        );

        if (isset($thisEvent['recur_info']) && 'weekly' == $period && '' != $thisEvent['recur_info']->repeatin) {
            $params['daysToAdd'] = explode(';', $thisEvent['recur_info']->repeatin);
        }

        return $params;
    } // calendarRecurrenceParams

    function calendarRecurrenceOnEvent(&$eventsToDisplay, $thisEvent, $params) {
        $params['endafter']        = 0;
        $params['forceEndToStart'] = true;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceOnEvent

    function calendarRecurrenceNever(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['displayEndDate'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceNever

    function calendarRecurrenceAfterOccurrences(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate'] = $params['displayEndDate'];

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceAfterOccurrences

    function calendarRecurrenceInDate(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['endin'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceInDate

    function calendarRecurrenceGetEvents(&$eventsToDisplay, $thisEvent, $params) {
        $params['displayStartDate'] = $this->calendarGetDateOnly($params['displayStartDate']);
        $params['displayEndDate']   = $this->calendarGetDateOnly($params['displayEndDate']);
        $params['startDate']        = $this->calendarGetDateOnly($params['startDate']);
        $params['endDate']          = $this->calendarGetDateOnly($params['endDate']);

        $thisStartDate  = $params['startDate'];
        $thisEndDate    = $params['testEndDate'];
        $periodCount    = 1;
        $skip           = 0;
        $occurences     = 0;
        $daysCorrection = array('SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6);

        while ($thisStartDate < $params['displayEndDate']) {
            if ($thisStartDate <= $params['endDate']) {
                $addEvent = true;

                if (1 < $params['repeat']) {
                    $skip++;

                    if (1 < $skip) {
                        if ($skip == $params['repeat']) {
                            $skip  = 0;
                        }

                        $addEvent = false;
                    }
                }

                if ($addEvent) {
                    // add date only
                    if (empty($params['daysToAdd'])) {
                        if ($params['startDate'] <= $thisStartDate && $params['displayStartDate'] <= $thisStartDate) {
                            $newEvent = $thisEvent;
                            $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($thisStartDate, $params['startTime']), $newEvent['allDay']);
                            if ($params['forceEndToStart']) {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisStartDate, $params['endTime']), $newEvent['allDay']);
                            }
                            else {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisEndDate, $params['endTime']), $newEvent['allDay']);
                            }

                            $eventsToDisplay[] = $newEvent;
                        }

                        $occurences++;

                        if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                            break;
                        }
                    }
                    // add specific week days based on date
                    else {
                        $diffToSunday = date('w', strtotime($thisStartDate));
                        $sundayDate   = $this->calendarRecurrentAddDay($thisStartDate, $diffToSunday * -1);

                        foreach ($params['daysToAdd'] as $newDay) {
                            $newDate = $this->calendarRecurrentAddDay($sundayDate, $daysCorrection[$newDay]);

                            if ($params['displayEndDate'] > $newDate && $newDate <= $params['endDate'] && $newDate >= $params['startDate']) {
                                if ($params['startDate'] <= $newDate && $params['displayStartDate'] <= $newDate) {
                                    $newEvent = $thisEvent;
                                    $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($newDate, $params['startTime']), $newEvent['allDay']);
                                    $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($newDate, $params['endTime']), $newEvent['allDay']);

                                    $eventsToDisplay[] = $newEvent;
                                }

                                $occurences++;

                                if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }

            $this->calendarRecurrenceAddPeriod($params['period'], $periodCount, $thisStartDate, $thisEndDate, $params['startDate'], $params['testEndDate']);

            $periodCount++;
        }
    } // calendarRecurrenceGetEvents

    function calendarGetDateOnly($date) {
        if (false !== strpos($date, 'T')) {
          $parts = explode('T', $date);
          return $parts[0];
        }

        return $date;
    } // calendarGetDateOnly

    function calendarRecurrenceAddPeriod($period, $periodCount, &$thisStart, &$thisEnd, $start, $end) {
        switch ($period) {
            case 'daily':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount);
                break;

            case 'weekly':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount * 7);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount * 7);
                break;

            case 'monthly':
                $thisStart = $this->calendarRecurrentAddMonth($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddMonth($end, $periodCount);
                break;

            case 'yearly':
                $thisStart = $this->calendarRecurrentAddYear($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddYear($end, $periodCount);
                break;
        }
    } // calendarRecurrenceAddPeriod

   function calendarRecurrentAddDay($sDate, $iAdd)
   {
       $iDate = $this->calendarGetMktime($sDate, '000000', $iAdd);

       return date('Ymd', $iDate);
   } // calendarRecurrentAddDay

   function calendarRecurrentAddMonth($sDate, $iAdd)
   {
       $iYear  = (integer) substr($sDate, 0, 4);
       $iMonth = (integer) substr($sDate, 4, 2) + $iAdd;
       $iDay   = (integer) substr($sDate, 6, 2);

       while (12 < $iMonth)
       {
           $iMonth -= 12;
           $iYear++;
       }

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 28 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (2 == $iMonth && $this->calendarIsLeapYear($iYear) && 29 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (in_array($iMonth, array(4, 6, 9, 11)) && 31 == $iDay)
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . '30';
       }
       else
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . substr($sDate, 6);
       }

       return $sDate;
   } // calendarRecurrentAddMonth

   function calendarRecurrentAddYear($sDate, $iAdd)
   {
       $iYear  = substr($sDate, 0, 4) + $iAdd;
       $iMonth = (integer) substr($sDate, 4, 2);
       $iDay   = (integer) substr($sDate, 6, 2);

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 29 == $iDay)
       {
           $sDate = $iYear . '0228';
       }
       else
       {
           $sDate = $iYear . substr($sDate, 4);
       }

       return $sDate;
   } // calendarRecurrentAddYear

   function calendarIsLeapYear(&$iYear)
   {
       if ($iYear % 4 != 0)
       {
           return false;
       }
       else
       {
           if ($iYear % 100 != 0)
           {
               return true;
           }
           else
           {
               if ($iYear % 400 != 0)
               {
                   return false;
               }
               else
               {
                   return true;
               }
           }
       }
   } // calendarIsLeapYear

   function calendarHandleEvents($aEvents)
   {
       foreach ($aEvents as $i => $aEventData)
       {
           if (false !== strpos($aEventData['start'], ' '))
           {
               $aTemp               = explode(' ', $aEventData['start']);
               $aEventData['start'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['start_time'], ' '))
           {
               $aTemp                    = explode(' ', $aEventData['start_time']);
               $aEventData['start_time'] = $aTemp[1];
           }
           if (8 < strlen($aEventData['start_time']))
           {
               $aEventData['start_time'] = substr($aEventData['start_time'], 0, 8);
           }
           if (false !== strpos($aEventData['end'], ' '))
           {
               $aTemp             = explode(' ', $aEventData['end']);
               $aEventData['end'] = $aTemp[0];
           }
           if (false !== strpos($aEventData['end_time'], ' '))
           {
               $aTemp                  = explode(' ', $aEventData['end_time']);
               $aEventData['end_time'] = $aTemp[1];
           }
           if (8 < strlen($aEventData['end_time']))
           {
               $aEventData['end_time'] = substr($aEventData['end_time'], 0, 8);
           }

           $aEvents[$i] = $aEventData;
       }

       return $aEvents;
   } // calendarHandleEvents

   function calendarNormalizeEvents($aEvents)
   {
       $aEvents = $this->calendarHandleEvents($aEvents);

       foreach ($aEvents as $i => $aEventData)
       {
           if ((isset($aEventData['id']) && '' == $aEventData['id']) || (isset($aEventData['title']) && '' == $aEventData['title']) || (isset($aEventData['start']) && '' == $aEventData['start']))
           {
               unset($aEvents[$i]);
           }
           else
           {

               $bStartTime = false;
               $bEndTime   = false;

               if (isset($aEventData['start_time']) && '' == $aEventData['start_time'])
               {
                   unset($aEventData['start_time']);
               }

               if (isset($aEventData['end']) && '' == $aEventData['end'])
               {
                   unset($aEventData['end']);
                   unset($aEventData['end_time']);
               }
               elseif (isset($aEventData['end_time']) && '' == $aEventData['end_time'])
               {
                   unset($aEventData['end_time']);
               }

               if ((isset($aEventData['start_time']) && ('' == $aEventData['start_time'] || '00:00:00' == $aEventData['start_time'])) && (isset($aEventData['end_time']) && ('' == $aEventData['end_time'] || '00:00:00' == $aEventData['end_time'])))
               {
                   unset($aEventData['start_time']);
                   unset($aEventData['end_time']);
               }


               if (isset($aEventData['start']) && isset($aEventData['start_time']))
               {
                   $aEventData['start'] .= ' ' . $aEventData['start_time'];
                   unset($aEventData['start_time']);
                   $bStartTime = true;
               }
               if (isset($aEventData['end']) && isset($aEventData['end_time']))
               {
                   $aEventData['end'] .= ' ' . $aEventData['end_time'];
                   unset($aEventData['end_time']);
                   $bEndTime = true;
               }

               if ($bStartTime)
               {
                   $aEventData['allDay'] = false;
               }
               else
               {
                   $aEventData['allDay'] = true;
               }

               if ($aEventData['allDay'] && isset($aEventData['end']) && '' != $aEventData['end'] && $aEventData['start'] < $aEventData['end'])
               {
                   $mktime = mktime(0, 0, 0,
                       (integer) substr($aEventData['end'], 5, 2),
                       ((integer) substr($aEventData['end'], 8, 2)) + 1,
                       (integer) substr($aEventData['end'], 0, 4));
                   $aEventData['end'] = date('Y-m-d', $mktime);
               }

               $aEvents[$i] = $aEventData;
           }
       }

       return $aEvents;
   } // calendarNormalizeEvents

   function calendarPrintEvents($aEvents)
   {
       $aEventHtml = array();
       $sPrintHtml = '';
       $sLastDay   = '';

       $sPrintHtml .= "<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\n";
       $sPrintHtml .= "<head>\n";
       $sPrintHtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar.css\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\n";
       $sPrintHtml .= "<style type=\"text/css\">\n";
       $sPrintHtml .= ".sc-ui-cal-time { padding-left: 20px }\n";
       $sPrintHtml .= ".sc-ui-cal-event { padding-left: 35px }\n";
       $sPrintHtml .= "</style>\n";
       $sPrintHtml .= "</head>\n";
       $sPrintHtml .= "<body>\n";

       $sPrintHtml .= "" . $this->Ini->Nm_lang['lang_events_order'] . "<hr style=\"border-style: solid; border-width: 1px 0 0 0\"/><br />\n";
       foreach ($this->calendarPrintSort($aEvents) as $aEventData)
       {
           $aStartInfo = explode(' ', $aEventData['start']);
           $aEndInfo   = explode(' ', $aEventData['end']);
           if (!isset($aStartInfo[1]))
           {
               $aStartInfo[1] = '';
           }
           if (!isset($aEndInfo[1]))
           {
               $aEndInfo[1] = '';
           }

           $sEventHtml = '';

           if ('' == $sLastDay || $aStartInfo[0] != $sLastDay)
           {
               $sEventHtml .= '<div class="scCalendarPrintDate">' . sc_convert_encoding($this->calendarPrintFormatDate($aStartInfo[0]), 'UTF-8', $_SESSION['scriptcase']['charset']) . "</div>\n";
               $sLastDay = $aStartInfo[0];
           }
           $sEventHtml .= '<div class="scCalendarPrintTime sc-ui-cal-time">';
           if ('' == $aStartInfo[1])
           {
               $sEventHtml .= sc_convert_encoding($this->Ini->Nm_lang['lang_per_allday'], 'UTF-8', $_SESSION['scriptcase']['charset']);
           }
           elseif ($aEventData['start'] == $aEventData['end'])
           {
               $sEventHtml .= $aStartInfo[1];
           }
           else
           {
               $sEventHtml .= $aStartInfo[1] . ' ' . sc_convert_encoding($this->Ini->Nm_lang['lang_othr_txto'], 'UTF-8', $_SESSION['scriptcase']['charset']) . ' ' . $aEndInfo[1];
           }
           $sEventHtml .= "</div>\n";
           $sEventHtml .= '<div class="scCalendarPrintEvent sc-ui-cal-event">';
           $sEventHtml .= $aEventData['title'];
           $sEventHtml .= "</div>\n";

           $aEventHtml[] = $sEventHtml;
       }

       $sPrintHtml .= implode('<br />', $aEventHtml);

       $sPrintHtml .= "</body>\n";
       $sPrintHtml .= "</html>\n";

       $sTmpFile  = $this->Ini->path_imag_temp . '/sc_cal_print' . md5(session_id() . microtime()) . '.html';
       $rHtmlFile = @fopen($this->Ini->root . $sTmpFile, 'w');
       if ($rHtmlFile)
       {
           @fwrite($rHtmlFile, $sPrintHtml);
           @fclose($rHtmlFile);
           return array('outputFormat' => 'file', 'fileHtml' => $sTmpFile);
       }
       else
       {
           return array('outputFormat' => 'html', 'printHtml' => $sPrintHtml);
       }
   } // calendarPrintEvents

   function calendarPrintSort($aEvents)
   {
       $aUnsortedEvents = array();
       $aSortedEvents   = array();

       foreach ($aEvents as $aEventData)
       {
           if (!isset($aUnsortedEvents[ $aEventData['start'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ] = array();
           }
           if (!isset($aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ] = array();
           }
           $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ][] = $aEventData;
       }

       ksort($aUnsortedEvents);
       foreach ($aUnsortedEvents as $aEventsEnd)
       {
           ksort($aEventsEnd);
           foreach ($aEventsEnd as $aEventList)
           {
               foreach ($aEventList as $aEventData)
               {
                   $aSortedEvents[] = $aEventData;
               }
           }
       }

       return $aSortedEvents;
   } // calendarPrintSort

   function calendarPrintFormatDate($sDate)
   {
       $aDateTime     = explode(' ', $sDate);
       $aDateParts    = explode('-', $aDateTime[0]);
       $iMktime       = mktime(0, 0, 0, $aDateParts[1], $aDateParts[2], $aDateParts[0]);
       $sFormatString = "l, F j";
       $sFormatted    = '';
       $bSlash        = false;

       for ($i = 0; $i < strlen($sFormatString); $i++)
       {
           $sFormatChar = $sFormatString[$i];
           if (!$bSlash && "\\" == $sFormatChar)
           {
               $bSlash = true;
           }
           elseif ($bSlash)
           {
               $bSlash      = false;
               $sFormatChar = "\\" . $sFormatString[$i];
           }
           if ($bSlash)
           {
               continue;
           }
           elseif ('D' == $sFormatChar || 'l' == $sFormatChar)
           {
               $sWeekDay = date('w', $iMktime);
               $sShort   = 'D' == $sFormatChar ? 'shrt_' : '';
               switch ($sWeekDay)
               {
                   case '0':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '1':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           elseif ('F' == $sFormatChar || 'M' == $sFormatChar)
           {
               $sShort = 'M' == $sFormatChar ? 'shrt_' : '';
               switch ($aDateParts[1])
               {
                   case '1':
                   case '01':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                   case '02':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                   case '03':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                   case '04':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                   case '05':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                   case '06':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '7':
                   case '07':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '8':
                   case '08':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '9':
                   case '09':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '10':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '11':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '12':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           else
           {
               $sFormatted .= date($sFormatChar, $iMktime);
           }
       }

       return $sFormatted;
   } // calendarPrintFormatDate

   function calendarUpdateEvent($sOp, $sId, $iDays, $iMinutes, $bAllDay, $fullcalendarStart, $fullcalendarEnd)
   {
       $aEvents = $this->calendarFetchEvents($sId);
       if (1 != sizeof($aEvents))
       {
           return array('status' => false, 'message' => 'Erro ao recuperar informacoes do evento');
       }
       $aEvent = $aEvents[0];

       $iStart = $this->calendarStartToTimestamp($aEvent);
       $iEnd   = $this->calendarEndToTimestamp($aEvent);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data inicial');
       }
       elseif (false === $iEnd)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data final');
       }

       if ('move' == $sOp) {
           $iStart += ($iDays * 86400) + ($iMinutes * 60);
       }
       $iEnd += ($iDays * 86400) + ($iMinutes * 60);

       $this->calendarTimestampToStart($aEvent, $iStart, $bAllDay);
       $this->calendarTimestampToEnd($aEvent, $iEnd, $bAllDay);

       if ('' == $aEvent['start'])
       {
           $aEvent['start'] = 'null';
       }
       if ('' == $aEvent['start_time'])
       {
           $aEvent['start_time'] = 'null';
       }
       if ('' == $aEvent['end'])
       {
           $aEvent['end'] = 'null';
       }
       if ('' == $aEvent['end_time'])
       {
           $aEvent['end_time'] = 'null';
       }

       if (isset($this->Ini->nm_bases_access) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET start_date = #" . $aEvent['start'] . "#, start_time = #" . $aEvent['start_time'] . "#, end_date = #" . $aEvent['end'] . "#, end_time = #" . $aEvent['end_time'] . "#" . $this->calendarWhere($sId);
       }
       elseif (isset($this->Ini->nm_bases_informix) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET start_date = EXTEND(start_date, YEAR TO DAY), end_date = EXTEND(end_date, YEAR TO DAY)" . $this->calendarWhere($sId);
       }
       else
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET start_date = '" . $aEvent['start'] . "', start_time = '" . $aEvent['start_time'] . "', end_date = '" . $aEvent['end'] . "', end_time = '" . $aEvent['end_time'] . "'" . $this->calendarWhere($sId);
       }

       $sSql = str_replace(array('#null#', "'null'"), array('null', 'null'), $sSql);

       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na atualizacao do evento');
       }

       $aReturn = array('status' => true, 'message' => '');

       if ($aEvent['start_only'] < date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorPast'];
       }
       elseif ($aEvent['start_only'] > date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorFuture'];
       }
       else
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorToday'];
       }

       return $aReturn;
   } // calendarUpdateEvent

   function calendarStartToTimestamp($aEvent)
   {
       if (!isset($aEvent['start']) || '' == $aEvent['start'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['start'], 0, 4);
       $iMonth = (integer) substr($aEvent['start'], 5, 2);
       $iDay   = (integer) substr($aEvent['start'], 8, 2);

       if (!isset($aEvent['start_time']) || '' == $aEvent['start_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['start_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['start_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['start_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarEndToTimestamp($aEvent)
   {
       if (!isset($aEvent['end']) || '' == $aEvent['end'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['end'], 0, 4);
       $iMonth = (integer) substr($aEvent['end'], 5, 2);
       $iDay   = (integer) substr($aEvent['end'], 8, 2);

       if (!isset($aEvent['end_time']) || '' == $aEvent['end_time'])
       {
           $iHour   = 0;
           $iMinute = 0;
           $iSecond = 0;
       }
       else
       {
           $iHour   = (integer) substr($aEvent['end_time'], 0, 2);
           $iMinute = (integer) substr($aEvent['end_time'], 3, 2);
           $iSecond = (integer) substr($aEvent['end_time'], 6, 2);
       }

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarEndToTimestamp

   function calendarFullcalendarToTimestamp($dateTime)
   {
       $iYear   = (integer) substr($dateTime, 0, 4);
       $iMonth  = (integer) substr($dateTime, 5, 2);
       $iDay    = (integer) substr($dateTime, 8, 2);
       $iHour   = (integer) substr($dateTime, 11, 2);
       $iMinute = (integer) substr($dateTime, 14, 2);
       $iSecond = (integer) substr($dateTime, 17, 2);

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarTimestampToStart(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['start_only'] = date('Y-m-d', $iTimestamp);
       $aEvent['start']      = date('Y-m-d', $iTimestamp);
       $aEvent['start_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToStart

   function calendarTimestampToEnd(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['end']      = date('Y-m-d', $iTimestamp);
       $aEvent['end_time'] = $bAllDay ? '' : date('H:i:s', $iTimestamp);
   } // calendarTimestampToEnd

   function calendarGetMktime($sDate, $sTime, $iAddDay = 0)
   {
       return mktime( (integer) substr($sTime, 0, 2),
                      (integer) substr($sTime, 2, 2),
                      (integer) substr($sTime, 4, 2),
                      (integer) substr($sDate, 4, 2),
                     ((integer) substr($sDate, 6, 2)) + $iAddDay,
                      (integer) substr($sDate, 0, 4));
   } // calendarGetMktime

   function calendarDragDrop()
   {
       return $this->calendarUpdateEvent('move', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, 'true' == $this->sc_all_day, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarResize()
   {
       return $this->calendarUpdateEvent('resize', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, false, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarRemoveTime(&$iTimestamp)
   {
       $iTimestamp = mktime(0, 0, 0, date('m', $iTimestamp), date('d', $iTimestamp), date('Y', $iTimestamp));
   } // calendarRemoveTime

   function calendarInitTimestamp()
   {
       $aDate = explode('-', $this->sc_cal_click_date);
       $aTime = 'true' == $this->sc_cal_click_allday ? array(0, 0, 0) : explode(':', $this->sc_cal_click_time);

       $iInit = mktime($aTime[0], $aTime[1], $aTime[2], $aDate[1], $aDate[2], $aDate[0]);
       $iEnd  = 'true' == $this->sc_cal_click_allday ? $iInit : $iInit + 7200;

       return array($iInit, $iEnd);
   } // calendarInitTimestamp

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_category()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'] = array(); 
    }

   $old_value_start_date = $this->start_date;
   $old_value_end_date = $this->end_date;
   $old_value_start_time = $this->start_time;
   $old_value_end_time = $this->end_time;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_start_date = $this->start_date;
   $unformatted_value_end_date = $this->end_date;
   $unformatted_value_start_time = $this->start_time;
   $unformatted_value_end_time = $this->end_time;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idLodgeCategory, name, color FROM cad_lodge_category  ORDER BY name";

   $this->start_date = $old_value_start_date;
   $this->end_date = $old_value_end_date;
   $this->start_time = $old_value_start_time;
   $this->end_time = $old_value_end_time;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              if (isset($rs->fields[2]))
              {
                  $nmgp_def_dados .= $rs->fields[0] . "?#?N?#?" . $rs->fields[2] . "?@?"; 
              }
              else
              {
                  $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?"; 
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['Lookup_category'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup___calend_all_day__()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_per_allday'] . "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_recurrence()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_peri_yes'] . "?#?Y?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_peri_no'] . "?#?N?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_period()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_recu_daily'] . "?#?D?#?S?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_recu_weekly'] . "?#?W?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_recu_monthly'] . "?#?M?#?N?@?";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_recu_annual'] . "?#?A?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              cal_lodge_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp" || $field == "title") 
          {
              $this->SC_monta_condicao($comando, "title", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "category") 
          {
              $data_lookup = $this->SC_lookup_category($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "category", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "SC_all_Cmp" || $field == "id_api") 
          {
              $this->SC_monta_condicao($comando, "id_api", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "event_color") 
          {
              $this->SC_monta_condicao($comando, "event_color", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "start_date") 
          {
              $this->SC_monta_condicao($comando, "start_date", $arg_search, $data_search, "DATE", false);
          }
          if ($field == "SC_all_Cmp" || $field == "end_date") 
          {
              $this->SC_monta_condicao($comando, "end_date", $arg_search, $data_search, "DATE", false);
          }
          if ($field == "SC_all_Cmp" || $field == "start_time") 
          {
              $this->SC_monta_condicao($comando, "start_time", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "end_time") 
          {
              $this->SC_monta_condicao($comando, "end_time", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "recurrence") 
          {
              $data_lookup = $this->SC_lookup_recurrence($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "recurrence", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "SC_all_Cmp" || $field == "period") 
          {
              $data_lookup = $this->SC_lookup_period($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "period", $arg_search, $data_lookup, "VARCHAR", false);
              }
          }
          if ($field == "SC_all_Cmp" || $field == "recur_info") 
          {
              $this->SC_monta_condicao($comando, "recur_info", $arg_search, $data_search, "VARCHAR", false);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_cal_lodge = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['total'] = $qt_geral_reg_cal_lodge;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          cal_lodge_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          cal_lodge_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $nm_numeric[] = "id";$nm_numeric[] = "category";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas["start_date"] = "date";$Nm_datas["start_time"] = "time";$Nm_datas["end_date"] = "date";$Nm_datas["end_time"] = "time";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_category($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT color, name, idLodgeCategory FROM cad_lodge_category WHERE (#cmp_icolor#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_recurrence($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_peri_yes'] . "";
       $data_look['N'] = "" . $this->Ini->Nm_lang['lang_peri_no'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_period($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['D'] = "" . $this->Ini->Nm_lang['lang_recu_daily'] . "";
       $data_look['W'] = "" . $this->Ini->Nm_lang['lang_recu_weekly'] . "";
       $data_look['M'] = "" . $this->Ini->Nm_lang['lang_recu_monthly'] . "";
       $data_look['A'] = "" . $this->Ini->Nm_lang['lang_recu_annual'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "cal_lodge_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['nm_run_menu'] = 2;
       $nmgp_saida_form = "cal_lodge_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       cal_lodge_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__barraca-de-acampamento.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_b.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_b.sc-unique-btn-2");
                break;
            case "update":
                return array("sc_b_upd_b.sc-unique-btn-3");
                break;
            case "delete":
                return array("sc_b_del_b.sc-unique-btn-4");
                break;
            case "0":
                return array("sys_separator.sc-unique-btn-5");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("sc_b_sai_b.sc-unique-btn-6", "sc_b_sai_b.sc-unique-btn-8", "sc_b_sai_b.sc-unique-btn-7");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
        </tr>
    </table>		 
 </div>
</div>

    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['run_iframe'] != "R") {
        } else {
            return false;
        }
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['cal_lodge']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ($this->scIsFieldNumeric($fieldName)) {
            $defaultOffIcon = 'asc' == $this->scGetDefaultFieldOrder($fieldName) ? "fas fa-sort-numeric-down" : "fas fa-sort-numeric-down-alt";
            if ('desc' == $sortRule) {
                return "<span class=\"fas fa-sort-numeric-down-alt sc-form-order-icon\"></span>";
            } elseif ('asc' == $sortRule) {
                return "<span class=\"fas fa-sort-numeric-down sc-form-order-icon\"></span>";
            } else {
                return "<span class=\"" . $defaultOffIcon . " sc-form-order-icon sc-form-order-icon-unused\"></span>";
            }
        } else {
            $defaultOffIcon = 'asc' == $this->scGetDefaultFieldOrder($fieldName) ? "fas fa-sort-alpha-down" : "fas fa-sort-alpha-down-alt";
            if ('desc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down-alt sc-form-order-icon\"></span>";
            } elseif ('asc' == $sortRule) {
                return "<span class=\"fas fa-sort-alpha-down sc-form-order-icon\"></span>";
            } else {
                return "<span class=\"" . $defaultOffIcon . " sc-form-order-icon sc-form-order-icon-unused\"></span>";
            }
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "id":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "category":
                return 'desc';
            case "start_date":
                return 'desc';
            case "end_date":
                return 'desc';
            case "start_time":
                return 'desc';
            case "end_time":
                return 'desc';
            case "id":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
