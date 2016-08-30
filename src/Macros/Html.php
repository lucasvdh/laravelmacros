<?php

function is_class_method($type = "public", $method, $class)
{
	// $type = mb_strtolower($type);
	$refl = new ReflectionMethod($class, $method);
	switch ($type) {
		case "static":
			return $refl->isStatic();
			break;
		case "public":
			return $refl->isPublic();
			break;
		case "private":
			return $refl->isPrivate();
			break;
	}
}

Html::macro('agencyLogo', function ($name, array $attributes = [], $inline = false) {

	$words = explode(' ', $name);

	$url = 'https://ddat.nl/assets/img/agencies/' . strtolower($words[0]) . '.png';
	$headers = get_headers($url);
	$code = intval(substr($headers[0], 9, 3));
	if ($code !== 200) {
		$url = 'https://ddat.nl/assets/img/agencies/' . strtolower(implode('-', $words)) . '.png';
		$headers = get_headers($url);
		$code = intval(substr($headers[0], 9, 3));
		if ($code !== 200) {
			return $name;
		}
	}

	if ($inline) {
		$url = 'data:image/png;base64,' . base64_encode(file_get_contents($url));
	}

	$defaults = [
		'src' => $url,
	];

	$attributes = array_merge($defaults, $attributes);

	$result = '<img ';
	foreach ($attributes as $key => $value) {
		$result .= $key . '="' . $value . '" ';
	}
	$result .= '>';

	return $result;
});

Html::macro('plugin', function ($name) {

	$result = '';

	$css = glob(base_path() . '/httpdocs/assets/plugins/' . $name . '/css/*.css');
	foreach ($css as $resource) {
		$resource = substr($resource, strpos($resource, '/assets'));
		$result .= '<link media="all" type="text/css" rel="stylesheet" href="' . $resource . '">';
	}

	$js = glob(base_path() . '/httpdocs/assets/plugins/' . $name . '/js/*.js');
	foreach ($js as $resource) {
		$resource = substr($resource, strpos($resource, '/assets'));
		$result .= '<script src="' . $resource . '"></script>';
	}

	return $result;

});

Html::macro('info', function ($info, $title = NULL, array $attributes = []) {

	$default = [
		'tabindex' => '0',
		'style' => 'color:#0091cb;padding:4px;',
		'class' => 'pull-right',
		'role' => 'button',
		'data-html' => 'true',
		'data-toggle' => 'popover',
		'data-placement' => 'top',
		'data-container' => 'body',
		'data-trigger' => 'hover',
	];

	$attributes = $default + $attributes;

	if ($title == NULL) {
		unset($attributes['title']);
	}
	else {
		$attributes['title'] = $title;
	}
	$attributes['data-content'] = $info;

	$result = '<a ';
	foreach ($attributes as $key => $value) {
		$result .= $key . '="' . $value . '" ';
	}
	$result .= '><i class="mdi mdi-information"></i></a>';

	return $result;

});

Html::macro('monthly', function ($months) {
	$months = intval($months);
	if ($months >= 1 && $months <= 12) {
		switch ($months) {
			case 1:
				return 'Maand';
			case 3:
				return 'Kwartaal';
			case 6:
				return 'Half jaar';
			case 12:
				return 'Jaar';
			default:
				return $months . ' maanden';
		}
	}
	elseif ($months > 12) {
		$years = floor($months / 12);
		$months = $months % 12;
		return $years . ' jaar en ' . $months . ' maand(en)';
	}
	return '';
});

Html::macro('backButton', function ($url) {
	$result = '<a href="' . $url . '" class="btn btn-default btn-circle btn-back tooltip-toggle" data-toggle="tooltip" data-placement="top" title="Terug"><i class="mdi mdi-arrow-left"></i></a>';
	return $result;
});

Html::macro('licenseplate', function ($licenseplate, $inline = false) {
	$result = '<kenteken><img src="' . ($inline ? 'data:image/png;base64,' . base64_encode(file_get_contents(asset('/assets/img/dutch_license_plate.png'))) : asset('/assets/img/dutch_license_plate.png')) . '"><span>' . $licenseplate . '</span></kenteken>';
	return $result;
});

Html::macro('stars', function ($value) {
	$x = bcmul(bcdiv(5, 10, 5), $value, 5);
	$x = bcmul($x, 2, 5);
	$x = floor($x);
	$x = bcdiv($x, 2, 5);

	$output = '';

	for ($i = 0; $i < 5; $i++) {
		if (fmod($x, 1) == 0.5) {
			if ($i == floor($x)) {
				$output .= '<i class="mdi mdi-star-half"></i>';
			}
			else if ($i <= floor($x)) {
				$output .= '<i class="mdi mdi-star"></i>';
			}
			else {
				$output .= '<i class="mdi mdi-star-outline"></i>';
			}
		}
		else {
			if ($i <= ($x - 1)) {
				$output .= '<i class="mdi mdi-star"></i>';
			}
			else {
				$output .= '<i class="mdi mdi-star-outline"></i>';
			}
		}
	}

	return $output;
});

Html::macro('scoreToStars', function ($value) {

	$x = bcmul(bcdiv(5, 10000, 5), $value, 5);
	$x = bcmul($x, 2, 5);
	$x = floor($x);
	$x = bcdiv($x, 2, 5);

	$output = '';

	for ($i = 1; $i <= 5; $i++) {
		if (fmod($x, 1) == 0.5) {
			if ($i == floor($x)) {
				$output .= '<i class="fa fa-fw fa-star-half-o"></i>';
			}
			else if ($i < floor($x)) {
				$output .= '<i class="fa fa-fw fa-star"></i>';
			}
			else {
				$output .= '<i class="fa fa-fw fa-star-o"></i>';
			}
		}
		else {
			if ($i <= $x) {
				$output .= '<i class="fa fa-fw fa-star"></i>';
			}
			else {
				$output .= '<i class="fa fa-fw fa-star-o"></i>';
			}
		}
	}

	return $output;
});

Html::macro('amount', function ($value, $currency = '&euro;') {
	return $currency . ' ' . number_format(floatval($value), 2, ',', '.');
});

Html::macro('percentage', function ($value) {

	$value = floatval($value);

	$formatted = number_format($value, 2) . ' %';

	return $formatted;

});

/**
 * IF Not Null
 *
 */
Html::macro('ifnn', function ($value, $default = 'Onbekend') {
	if ($value == NULL)
		return $default;
	return $value;
});

/**
 * IF Not Empty
 *
 */
Html::macro('ifne', function ($value, $default = 'Onbekend', $class = null, $static = null) {
	if ($value === NULL || strlen($value) === 0 || $value === 0 || $value === "0")
		return $default;
	if ($class !== NULL && $static !== NULL)
		return $class::$static($value);
	return $value;
});

/**
 * IF Object Not Null
 *
 */
Html::macro('ifonn', function ($object, $attribute, $default = 'Onbekend', $class = null, $static = null) {
	if ($object == NULL)
		return $default;
	if ($class !== NULL && $static !== NULL)
		return $class::$static($object->{$attribute});
	return $object->{$attribute};
});
