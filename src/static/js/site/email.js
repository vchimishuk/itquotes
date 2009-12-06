/*
 * Very-very simple email encoder/decoder.
 */

function encodeEmail(email)
{
	var res = "";

	for(var i = 0; i < email.length; i++) {
		res += String.fromCharCode(email.charCodeAt(i) - 14);
	}

	return res;
}

function decodeEmail(email)
{
	var res = "";

	for(var i = 0; i < email.length; i++) {
		res += String.fromCharCode(email.charCodeAt(i) + 14);
	}

	return res;
}
