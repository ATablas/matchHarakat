# matchHarakat

<div style="direction:rtl">
هذه مكتبة صغيرة مبنية على PHP والغرض منها التحقق من المطابقة الجزئية أو الكلية لسلسلتين نصيتين من ناحية الحركات.<br>
الدالة الرئيسية المستخدمة تعتمد على دالة أخرى موجودة في الملف نفسه، ضرورية للتطابق مع سلاسل UTF.<br></div>
This is a pure PHP library that has a function to check whether or not two strings match completely/partially in terms of diacritics.<br>
The function used depends on another function for compatibility with UTF-8 strings.<br>

<strong>How to use the library? كيف تستخدم المكتبة؟</strong>
<div style="text-direction:rtl">
  ببساطة ضمن الملف كما يلي:
 </div>
<br>Simply include it in your PHP script as follows:<br>
<pre style="background-color:grey;">require 'harakat_lib.php';</pre>

<div style="text-direction:rtl">
  ثم تأكد من أن السلسلتين النصيتين متطابقتان كما يلي:
</div>
Then check the 2 strings matching as follows:<br>
<pre style="background-color:grey;">
if( harkatMatching($first_string, $second_string) )
{
  //do something
}
</pre>
