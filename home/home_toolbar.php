<?php

if(isset($this->Ini->Nm_lang))
{
    $Nm_lang = $this->Ini->Nm_lang;
}
else
{
    $Nm_lang = $this->Nm_lang;
}


$this->nmgp_botoes['btn_1']  = 'on';
$this->arr_buttons['btn_1']['hint']             = "";
$this->arr_buttons['btn_1']['type']             = "button";
$this->arr_buttons['btn_1']['value']            = "Skini";
$this->arr_buttons['btn_1']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_1']['display_position'] = "text_right";
$this->arr_buttons['btn_1']['style']            = "default";
$this->arr_buttons['btn_1']['image']            = "";

$this->arr_buttons['btn_1']['has_fa']           = "true";

$this->arr_buttons['btn_1']['fontawesomeicon']  = "fas fa-campground";

$this->nmgp_botoes['btn_5']  = 'on';
$this->arr_buttons['btn_5']['hint']             = "Cadastros";
$this->arr_buttons['btn_5']['type']             = "button";
$this->arr_buttons['btn_5']['value']            = "Cadastros";
$this->arr_buttons['btn_5']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_5']['display_position'] = "text_right";
$this->arr_buttons['btn_5']['style']            = "default";
$this->arr_buttons['btn_5']['image']            = "";

$this->arr_buttons['btn_5']['has_fa']           = "true";

$this->arr_buttons['btn_5']['fontawesomeicon']  = "fas fa-database";

$this->nmgp_botoes['btn_6']  = 'on';
$this->arr_buttons['btn_6']['hint']             = "Acomodações";
$this->arr_buttons['btn_6']['type']             = "button";
$this->arr_buttons['btn_6']['value']            = "Acomodações";
$this->arr_buttons['btn_6']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_6']['display_position'] = "text_right";
$this->arr_buttons['btn_6']['style']            = "default";
$this->arr_buttons['btn_6']['image']            = "";

$this->arr_buttons['btn_6']['has_fa']           = "true";

$this->arr_buttons['btn_6']['fontawesomeicon']  = "fas fa-bed";

$this->nmgp_botoes['btn_7']  = 'on';
$this->arr_buttons['btn_7']['hint']             = "Hóspedes";
$this->arr_buttons['btn_7']['type']             = "button";
$this->arr_buttons['btn_7']['value']            = "Hóspedes";
$this->arr_buttons['btn_7']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_7']['display_position'] = "text_right";
$this->arr_buttons['btn_7']['style']            = "default";
$this->arr_buttons['btn_7']['image']            = "";

$this->arr_buttons['btn_7']['has_fa']           = "true";

$this->arr_buttons['btn_7']['fontawesomeicon']  = "fas fa-user-alt";

$this->nmgp_botoes['btn_2']  = 'on';
$this->arr_buttons['btn_2']['hint']             = "Usuário";
$this->arr_buttons['btn_2']['type']             = "button";
$this->arr_buttons['btn_2']['value']            = "Usuário";
$this->arr_buttons['btn_2']['display']          = "only_fontawesomeicon";
$this->arr_buttons['btn_2']['display_position'] = "text_right";
$this->arr_buttons['btn_2']['style']            = "default";
$this->arr_buttons['btn_2']['image']            = "";

$this->arr_buttons['btn_2']['has_fa']           = "true";

$this->arr_buttons['btn_2']['fontawesomeicon']  = "fas fa-user-circle";

$this->nmgp_botoes['btn_3']  = 'on';
$this->arr_buttons['btn_3']['hint']             = "";
$this->arr_buttons['btn_3']['type']             = "button";
$this->arr_buttons['btn_3']['value']            = "Alterar Senha";
$this->arr_buttons['btn_3']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_3']['display_position'] = "text_right";
$this->arr_buttons['btn_3']['style']            = "default";
$this->arr_buttons['btn_3']['image']            = "";

$this->arr_buttons['btn_3']['has_fa']           = "true";

$this->arr_buttons['btn_3']['fontawesomeicon']  = "fas fa-key";

$this->nmgp_botoes['btn_4']  = 'on';
$this->arr_buttons['btn_4']['hint']             = "";
$this->arr_buttons['btn_4']['type']             = "button";
$this->arr_buttons['btn_4']['value']            = "" . $Nm_lang['lang_exit'] . "";
$this->arr_buttons['btn_4']['display']          = "text_fontawesomeicon";
$this->arr_buttons['btn_4']['display_position'] = "text_right";
$this->arr_buttons['btn_4']['style']            = "default";
$this->arr_buttons['btn_4']['image']            = "";

$this->arr_buttons['btn_4']['has_fa']           = "true";

$this->arr_buttons['btn_4']['fontawesomeicon']  = "fas fa-sign-out-alt";


?>