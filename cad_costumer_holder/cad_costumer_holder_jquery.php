
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["idcostumer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["docnumber" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["doctype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["firstname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idlodge" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["frequencytype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["holdertype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idholder" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idcostumer" + iSeqRow] && scEventControl_data["idcostumer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcostumer" + iSeqRow] && scEventControl_data["idcostumer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["docnumber" + iSeqRow] && scEventControl_data["docnumber" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["docnumber" + iSeqRow] && scEventControl_data["docnumber" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["doctype" + iSeqRow] && scEventControl_data["doctype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doctype" + iSeqRow] && scEventControl_data["doctype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["firstname" + iSeqRow] && scEventControl_data["firstname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["firstname" + iSeqRow] && scEventControl_data["firstname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastname" + iSeqRow] && scEventControl_data["lastname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastname" + iSeqRow] && scEventControl_data["lastname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idlodge" + iSeqRow] && scEventControl_data["idlodge" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idlodge" + iSeqRow] && scEventControl_data["idlodge" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["frequencytype" + iSeqRow] && scEventControl_data["frequencytype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["frequencytype" + iSeqRow] && scEventControl_data["frequencytype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["holdertype" + iSeqRow] && scEventControl_data["holdertype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["holdertype" + iSeqRow] && scEventControl_data["holdertype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idholder" + iSeqRow] && scEventControl_data["idholder" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idholder" + iSeqRow] && scEventControl_data["idholder" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idlodge" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idcostumer' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_idcostumer_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_cad_costumer_holder_idcostumer_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_cad_costumer_holder_idcostumer_onfocus(this, iSeqRow) });
  $('#id_sc_field_docnumber' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_docnumber_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_cad_costumer_holder_docnumber_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_cad_costumer_holder_docnumber_onfocus(this, iSeqRow) });
  $('#id_sc_field_doctype' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_doctype_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_cad_costumer_holder_doctype_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_cad_costumer_holder_doctype_onfocus(this, iSeqRow) });
  $('#id_sc_field_firstname' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_firstname_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_cad_costumer_holder_firstname_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_cad_costumer_holder_firstname_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastname' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_lastname_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_cad_costumer_holder_lastname_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_cad_costumer_holder_lastname_onfocus(this, iSeqRow) });
  $('#id_sc_field_idlodge' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_idlodge_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_cad_costumer_holder_idlodge_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_cad_costumer_holder_idlodge_onfocus(this, iSeqRow) });
  $('#id_sc_field_frequencytype' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_frequencytype_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_cad_costumer_holder_frequencytype_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_cad_costumer_holder_frequencytype_onfocus(this, iSeqRow) });
  $('#id_sc_field_holdertype' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_holdertype_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_cad_costumer_holder_holdertype_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_cad_costumer_holder_holdertype_onfocus(this, iSeqRow) });
  $('#id_sc_field_idholder' + iSeqRow).bind('blur', function() { sc_cad_costumer_holder_idholder_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_cad_costumer_holder_idholder_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_cad_costumer_holder_idholder_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_cad_costumer_holder_idcostumer_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_idcostumer();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_idcostumer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_idcostumer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_docnumber_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_docnumber();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_docnumber_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_docnumber_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_doctype_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_doctype();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_doctype_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_doctype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_firstname_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_firstname();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_firstname_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_firstname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_lastname_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_lastname();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_lastname_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_lastname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_idlodge_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_idlodge();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_idlodge_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_idlodge_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_frequencytype_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_frequencytype();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_frequencytype_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_frequencytype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_holdertype_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_holdertype();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_holdertype_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_holdertype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_cad_costumer_holder_idholder_onblur(oThis, iSeqRow) {
  do_ajax_cad_costumer_holder_validate_idholder();
  scCssBlur(oThis);
}

function sc_cad_costumer_holder_idholder_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_cad_costumer_holder_idholder_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idcostumer", "", status);
	displayChange_field("docnumber", "", status);
	displayChange_field("doctype", "", status);
	displayChange_field("firstname", "", status);
	displayChange_field("lastname", "", status);
	displayChange_field("idlodge", "", status);
	displayChange_field("frequencytype", "", status);
	displayChange_field("holdertype", "", status);
	displayChange_field("idholder", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idcostumer(row, status);
	displayChange_field_docnumber(row, status);
	displayChange_field_doctype(row, status);
	displayChange_field_firstname(row, status);
	displayChange_field_lastname(row, status);
	displayChange_field_idlodge(row, status);
	displayChange_field_frequencytype(row, status);
	displayChange_field_holdertype(row, status);
	displayChange_field_idholder(row, status);
}

function displayChange_field(field, row, status) {
	if ("idcostumer" == field) {
		displayChange_field_idcostumer(row, status);
	}
	if ("docnumber" == field) {
		displayChange_field_docnumber(row, status);
	}
	if ("doctype" == field) {
		displayChange_field_doctype(row, status);
	}
	if ("firstname" == field) {
		displayChange_field_firstname(row, status);
	}
	if ("lastname" == field) {
		displayChange_field_lastname(row, status);
	}
	if ("idlodge" == field) {
		displayChange_field_idlodge(row, status);
	}
	if ("frequencytype" == field) {
		displayChange_field_frequencytype(row, status);
	}
	if ("holdertype" == field) {
		displayChange_field_holdertype(row, status);
	}
	if ("idholder" == field) {
		displayChange_field_idholder(row, status);
	}
}

function displayChange_field_idcostumer(row, status) {
    var fieldId;
}

function displayChange_field_docnumber(row, status) {
    var fieldId;
}

function displayChange_field_doctype(row, status) {
    var fieldId;
}

function displayChange_field_firstname(row, status) {
    var fieldId;
}

function displayChange_field_lastname(row, status) {
    var fieldId;
}

function displayChange_field_idlodge(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idlodge__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idlodge" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idlodge");
	}
}

function displayChange_field_frequencytype(row, status) {
    var fieldId;
}

function displayChange_field_holdertype(row, status) {
    var fieldId;
}

function displayChange_field_idholder(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
	displayChange_field_idlodge("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_cad_costumer_holder_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'cad_costumer_holder')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "idlodge" == specificField) {
    scJQSelect2Add_idlodge(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idlodge(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idlodge_obj" : "#id_sc_field_idlodge" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idlodge_obj',
      dropdownCssClass: 'css_idlodge_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_idlodge) { displayChange_field_idlodge(iLine, "on"); } }, 150);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

