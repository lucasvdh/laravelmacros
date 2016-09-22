<?php

use Carbon\Carbon;

Form::macro('datepicker', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "";
	if ($default === false) {
		$default = '';
	}
	elseif (Input::old($label) !== NULL) {
		$default = Input::old($label);
	}
	else {
		if ($default instanceOf Carbon || $default instanceOf DateTime) {
			$default = $default->format("d/m/Y");
		}
		elseif ($default == NULL || $default == 0) {
			$default = Carbon::today()->format("d/m/Y");
		}

		if ($default == NULL || $default == 0) {
			$default = Carbon::today()->format("d/m/Y");
		}
	}

	$params['class'] .= " date-picker";

	$input = '<div class="input-group"> ';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" data-inputmask="\'alias\': \'date\'"  ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= "> ";

	$input .= '<span class="input-group-addon"><i class="mdi mdi-calendar-today"></i></span></div>';

	return $input;
});

Form::macro('percentage', function ($label, $default = NULL, $params = []) {

	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "percentage";
	else
		$params['class'] .= " percentage";

	if ($default == NULL || $default == 0) {
		$default = 0;
	}

	$input = '<div class="input-group"> ';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= '><span class="input-group-addon">%</span></div>';

	return $input;
});

Form::macro('iban', function ($label, $default = NULL, $params = array()) {

	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "";

	// if($default == NULL || $default == 0) {
	// $default = '';
	// }

	$input = '<div class="input-group iban"> ';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= ">";
	$input .= '<span class="input-group-addon check"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>';
	$input .= "</div>";

	return $input;
});

Form::macro('postalCode', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "postcode";
	else
		$params['class'] .= " postcode";
	return Form::text($label, $default, $params);
});

Form::macro('houseNumber', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "house-number parse-address";
	else
		$params['class'] .= " house-number parse-address";
	return Form::text($label, $default, $params);
});

Form::macro('street', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "street";
	else
		$params['class'] .= " street";
	return Form::text($label, $default, $params);
});

Form::macro('city', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "city";
	else
		$params['class'] .= " city";
	return Form::text($label, $default, $params);
});

Form::macro('county', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "county";
	else
		$params['class'] .= " county";
	return Form::text($label, $default, $params);
});

Form::macro('amount', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "amount";
	else
		$params['class'] .= " amount";

	if ($default == NULL || $default == 0) {
		$default = 0;
	}

	$input = '<div class="input-group"> ';

	$input .= '<span class="input-group-addon"><i class="mdi mdi-currency-eur"></i></span>';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= "></div>";

	return $input;
});

Form::macro('integer', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "integer";
	else
		$params['class'] .= " integer";

	if ($default == NULL || $default == 0) {
		$default = 0;
	}

	$input = '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= ">";

	return $input;
});

Form::macro('distance', function ($label, $default = NULL, $params = []) {

	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "";

	if ($default == NULL || $default == 0) {
		$default = 0;
	}

	$input = '<div class="input-group"> ';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= '><span class="input-group-addon">KM</span>';

	$input .= '</div>';

	return $input;
});

Form::macro('licensePlate', function ($label, $default = NULL, $params = []) {
	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "";

	if ($default == NULL)
		$default = '';

	$input = '<div class="input-group license-plate"><span class="input-group-addon"><img src="/img/dutch_license_plate.png"></span>';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= '>';

	$input .= '</div>';

	return $input;
});

Form::macro('years', function ($label, $default = NULL, $params = []) {

	if (count($params) == 0 || !array_key_exists('class', $params)) {
		$params['class'] = 'integer';
	}
	else {
		$params['class'] .= ' integer';
	}

	if ($default == NULL || $default == 0) {
		$default = 0;
	}

	$input = '<div class="input-group"> ';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= '><span class="input-group-addon">Jaar</span>';

	$input .= '</div>';

	return $input;
});

Form::macro('months', function ($label, $default = NULL, $params = []) {

	if (count($params) == 0 || !array_key_exists('class', $params))
		$params['class'] = "";

	if ($default == NULL || $default == 0) {
		$default = 0;
	}

	$input = '<div class="input-group"> ';

	$input .= '<input name="' . $label . '" id="' . $label . '" type="text" ';

	if ($default !== NULL && strlen((string)$default) > 0)
		$input .= 'value="' . $default . '" ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= '><span class="input-group-addon">Maand(en)</span>';

	$input .= '</div>';

	return $input;
});

Form::macro('materialCheckbox', function ($name, $checked, $label, $value = '1', $params = []) {

	$input = '<div class="checkbox checkbox-primary"><label class="unselectable">';

	if ($value == NULL)
		$value = 'NULL';

	$input .= '<input type="checkbox" value="' . $value . '" name="' . $name . '" ';

	if ($checked)
		$input .= 'checked ';

	foreach ($params as $key => $value)
		$input .= $key . '="' . $value . '" ';

	$input .= '>';

	$input .= $label;

	$input .= '</label></div>';

	return $input;
});

Form::macro('form_group', function ($errors, $name) {
	$classes = "";
	if (isset($errors) && $errors != null && $errors->first($name) != null) {
		$classes = " has-error has-feedback";
	}
	return "<div class='form-group" . $classes . "'>";
});

Form::macro('form_errors', function ($errors, $name) {
	if (isset($errors) && $errors != null && $errors->first($name) != null) {
		return "<span class='mdi mdi-alert-box form-control-feedback' data-toggle='tooltip' data-placement='left' title='" . $errors->first($name) . "'></span>";
	}
});

Form::macro('form_group_close', function () {
	return "</div>";
});

/*
	Form::macro('back_button', function($href, $text = "", $loading = true, $_blank = false) {
		// Class
		$class = "btn btn-link";

		// Loading
		if($loading == true) {
			$class .= " loading";
		}

		// Target
		$target = "";
		if($_blank == true) {
			$target = "target='_blank' ";
		}

		// Return
		$input = "<a href='".$href."' class='".$class."'".$target.">";
		$input .= "<i class='fa fa-arrow-left'></i> ".$text."";
		$input .= "</a>";

		return $input;
	});
*/
