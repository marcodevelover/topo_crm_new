function number_round(sVal, nDec)
{
  nDec = nDec || 2;
  var n = parseFloat(sVal);
  var s = "0.00";

  if(!isNaN(n))
  {
    n = Math.round(n * Math.pow(10, nDec)) / Math.pow(10, nDec);
    s = String(n);
    s += (s.indexOf(".") == -1? ".": "") + String(Math.pow(10, nDec)).substr(1);
    s = s.substr(0, s.indexOf(".") + nDec + 1);
  }

  return s;
};

function number_truncate(sVal, nDec)
{
  nDec = nDec || 2;

  var numS = sVal.toString(),
      decPos = numS.indexOf('.'),
      substrLength = decPos == -1 ? numS.length : 1 + decPos + nDec,
      trimmedResult = numS.substr(0, substrLength),
      finalResult = isNaN(trimmedResult) ? 0 : trimmedResult;

  return parseFloat(finalResult);
};

function get_numeric(expr, decimals)
{
  expr = expr || 0;
  decimals = decimals || 3;
  expr = String(expr);
  expr = expr.replaceAll(',', '');
  expr = parseFloat(expr);
  response = number_truncate(expr, decimals);
  return response;
};