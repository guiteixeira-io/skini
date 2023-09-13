
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
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phonenumber" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zipcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zipstate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zipcity" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zipdistrict" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zipstreet" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zipnumber" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nationality" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
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
  if (scEventControl_data["name" + iSeqRow] && scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow] && scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phonenumber" + iSeqRow] && scEventControl_data["phonenumber" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phonenumber" + iSeqRow] && scEventControl_data["phonenumber" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zipcode" + iSeqRow] && scEventControl_data["zipcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zipcode" + iSeqRow] && scEventControl_data["zipcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zipstate" + iSeqRow] && scEventControl_data["zipstate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zipstate" + iSeqRow] && scEventControl_data["zipstate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zipcity" + iSeqRow] && scEventControl_data["zipcity" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zipcity" + iSeqRow] && scEventControl_data["zipcity" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zipdistrict" + iSeqRow] && scEventControl_data["zipdistrict" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zipdistrict" + iSeqRow] && scEventControl_data["zipdistrict" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zipstreet" + iSeqRow] && scEventControl_data["zipstreet" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zipstreet" + iSeqRow] && scEventControl_data["zipstreet" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zipnumber" + iSeqRow] && scEventControl_data["zipnumber" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zipnumber" + iSeqRow] && scEventControl_data["zipnumber" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nationality" + iSeqRow] && scEventControl_data["nationality" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nationality" + iSeqRow] && scEventControl_data["nationality" + iSeqRow]["change"]) {
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
  $('#id_sc_field_idcostumer' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_idcostumer_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_tar_costumer_checkin_idcostumer_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_tar_costumer_checkin_idcostumer_onfocus(this, iSeqRow) });
  $('#id_sc_field_docnumber' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_docnumber_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_tar_costumer_checkin_docnumber_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_tar_costumer_checkin_docnumber_onfocus(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_name_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_tar_costumer_checkin_name_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_tar_costumer_checkin_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_phonenumber' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_phonenumber_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_tar_costumer_checkin_phonenumber_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_tar_costumer_checkin_phonenumber_onfocus(this, iSeqRow) });
  $('#id_sc_field_zipcode' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_zipcode_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_tar_costumer_checkin_zipcode_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_tar_costumer_checkin_zipcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_zipstate' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_zipstate_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_tar_costumer_checkin_zipstate_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_tar_costumer_checkin_zipstate_onfocus(this, iSeqRow) });
  $('#id_sc_field_zipcity' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_zipcity_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_tar_costumer_checkin_zipcity_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_tar_costumer_checkin_zipcity_onfocus(this, iSeqRow) });
  $('#id_sc_field_zipdistrict' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_zipdistrict_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_tar_costumer_checkin_zipdistrict_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_tar_costumer_checkin_zipdistrict_onfocus(this, iSeqRow) });
  $('#id_sc_field_zipstreet' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_zipstreet_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_tar_costumer_checkin_zipstreet_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_tar_costumer_checkin_zipstreet_onfocus(this, iSeqRow) });
  $('#id_sc_field_zipnumber' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_zipnumber_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_tar_costumer_checkin_zipnumber_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_tar_costumer_checkin_zipnumber_onfocus(this, iSeqRow) });
  $('#id_sc_field_nationality' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_nationality_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_tar_costumer_checkin_nationality_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_tar_costumer_checkin_nationality_onfocus(this, iSeqRow) });
  $('#id_sc_field_frequencytype' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_frequencytype_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_tar_costumer_checkin_frequencytype_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_tar_costumer_checkin_frequencytype_onfocus(this, iSeqRow) });
  $('#id_sc_field_holdertype' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_holdertype_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_tar_costumer_checkin_holdertype_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_tar_costumer_checkin_holdertype_onfocus(this, iSeqRow) });
  $('#id_sc_field_idholder' + iSeqRow).bind('blur', function() { sc_tar_costumer_checkin_idholder_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_tar_costumer_checkin_idholder_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_tar_costumer_checkin_idholder_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_tar_costumer_checkin_idcostumer_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_idcostumer();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_idcostumer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_idcostumer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_docnumber_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_docnumber();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_docnumber_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_docnumber_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_name_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_name();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_phonenumber_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_phonenumber();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_phonenumber_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_phonenumber_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_zipcode_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_zipcode();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_zipcode_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_zipcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_zipstate_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_zipstate();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_zipstate_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_zipstate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_zipcity_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_zipcity();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_zipcity_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_zipcity_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_zipdistrict_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_zipdistrict();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_zipdistrict_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_zipdistrict_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_zipstreet_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_zipstreet();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_zipstreet_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_zipstreet_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_zipnumber_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_zipnumber();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_zipnumber_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_zipnumber_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_nationality_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_nationality();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_nationality_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_nationality_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_frequencytype_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_frequencytype();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_frequencytype_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_frequencytype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_holdertype_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_holdertype();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_holdertype_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_holdertype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_tar_costumer_checkin_idholder_onblur(oThis, iSeqRow) {
  do_ajax_tar_costumer_checkin_validate_idholder();
  scCssBlur(oThis);
}

function sc_tar_costumer_checkin_idholder_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_tar_costumer_checkin_idholder_onfocus(oThis, iSeqRow) {
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
	displayChange_field("name", "", status);
	displayChange_field("phonenumber", "", status);
	displayChange_field("zipcode", "", status);
	displayChange_field("zipstate", "", status);
	displayChange_field("zipcity", "", status);
	displayChange_field("zipdistrict", "", status);
	displayChange_field("zipstreet", "", status);
	displayChange_field("zipnumber", "", status);
	displayChange_field("nationality", "", status);
	displayChange_field("frequencytype", "", status);
	displayChange_field("holdertype", "", status);
	displayChange_field("idholder", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idcostumer(row, status);
	displayChange_field_docnumber(row, status);
	displayChange_field_name(row, status);
	displayChange_field_phonenumber(row, status);
	displayChange_field_zipcode(row, status);
	displayChange_field_zipstate(row, status);
	displayChange_field_zipcity(row, status);
	displayChange_field_zipdistrict(row, status);
	displayChange_field_zipstreet(row, status);
	displayChange_field_zipnumber(row, status);
	displayChange_field_nationality(row, status);
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
	if ("name" == field) {
		displayChange_field_name(row, status);
	}
	if ("phonenumber" == field) {
		displayChange_field_phonenumber(row, status);
	}
	if ("zipcode" == field) {
		displayChange_field_zipcode(row, status);
	}
	if ("zipstate" == field) {
		displayChange_field_zipstate(row, status);
	}
	if ("zipcity" == field) {
		displayChange_field_zipcity(row, status);
	}
	if ("zipdistrict" == field) {
		displayChange_field_zipdistrict(row, status);
	}
	if ("zipstreet" == field) {
		displayChange_field_zipstreet(row, status);
	}
	if ("zipnumber" == field) {
		displayChange_field_zipnumber(row, status);
	}
	if ("nationality" == field) {
		displayChange_field_nationality(row, status);
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

function displayChange_field_name(row, status) {
    var fieldId;
}

function displayChange_field_phonenumber(row, status) {
    var fieldId;
}

function displayChange_field_zipcode(row, status) {
    var fieldId;
}

function displayChange_field_zipstate(row, status) {
    var fieldId;
}

function displayChange_field_zipcity(row, status) {
    var fieldId;
}

function displayChange_field_zipdistrict(row, status) {
    var fieldId;
}

function displayChange_field_zipstreet(row, status) {
    var fieldId;
}

function displayChange_field_zipnumber(row, status) {
    var fieldId;
}

function displayChange_field_nationality(row, status) {
    var fieldId;
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
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_tar_costumer_checkin_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'tar_costumer_checkin')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
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

