<?php
/* ctec_functions.php */
/* CTEC 227 Functions for Lab No. 5 */

// Function 1
function is_post_request() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// Function 2
function is_get_request() {
	return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// Function 3
function h($string="") {
	return htmlspecialchars($string, ENT_QUOTES);
}

// Function 4
function u($string="") {
	return urlencode($string);
}

// Function 5
function raw_u($string="") {
	return rawurlencode($string);
}

// Function 6
// is_blank('abcd')
// * validate data presence
// * uses trim() so empty spaces don't count
// * uses === to avoid false positives
// * better than empty() which considers "0" to be empty
function is_blank($value) {
	return !isset($value) || trim($value) === '';
}

// Function 7
// has_presence('abcd')
// * validate data presence
// * reverse of is_blank()
// * I prefer validation names with "has_"
function has_presence($value) {
	return !is_blank($value);
}

// Function 8
// has_length_greater_than('abcd', 3)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_greater_than($value, $min) {
	$length = strlen($value);
	return $length > $min;
}

// Function 9
// has_length_less_than('abcd', 5)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_less_than($value, $max) {
	$length = strlen($value);
	return $length < $max;
}

// Function 10
// has_length_exactly('abcd', 4)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_exactly($value, $exact) {
	$length = strlen($value);
	return $length == $exact;
}

// Function 11
// has_length('abcd', ['min' => 3, 'max' => 5])
// * validate string length
// * combines functions_greater_than, _less_than, _exactly
// * spaces count towards length
// * use trim() if spaces should not count
function has_length($value, $options) {
	if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
		return false;
	} elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
		return false;
	} elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
		return false;
	} else {
		return true;
	}
}

// Function 12
// has_inclusion_of( 5, [1,3,5,7,9] )
// * validate inclusion in a set
function has_inclusion_of($value, $set) {
	return in_array($value, $set);
}

// Function 13
// has_exclusion_of( 5, [1,3,5,7,9] )
// * validate exclusion from a set
function has_exclusion_of($value, $set) {
	return !in_array($value, $set);
}

// Function 14
// has_string('nobody@nowhere.com', '.com')
// * validate inclusion of character(s)
// * strpos returns string start position or false
// * uses !== to prevent position 0 from being considered false
// * strpos is faster than preg_match()
function has_string($value, $required_string) {
	return strpos($value, $required_string) !== false;
}

// Function 15
// has_valid_email_format('nobody@nowhere.com')
// * validate correct format for email addresses
// * format: [chars]@[chars].[2+ letters]
// * preg_match is helpful, uses a regular expression
//    returns 1 for a match, 0 for no match
//    http://php.net/manual/en/function.preg-match.php
function has_valid_email_format($value) {
	$email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
	return preg_match($email_regex, $value) === 1;
}

// Function 16
function display_errors($errors=array()) {
	$output = '';
	if(!empty($errors)) {
		$output .= "<div class=\"errors\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach($errors as $error) {
			$output .= "<li>" . h($error) . "</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}
