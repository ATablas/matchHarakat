# matchHarakat
This is a pure PHP library that has a function to check whether or not two strings match completely/partially in terms of diacritics.
The function used depends on another function for compatibility with UTF-8 strings.

How to use the library?
Simple include it in your PHP script as follows:<br>
require 'harakat_lib.php';

Then check the 2 strings matching as follows:<br>
<pre style="background-color:grey;">
if( harkatMatching($first_string, $second_string) )
{
  //do something
}
</pre>
