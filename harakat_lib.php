<?php
//the following function was taken from this comment:
//https://www.php.net/manual/en/function.str-split.php#107658
function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

function harkatMatching($src, $elWithHarakat)
{
  $matching = false;
  $harakatArr = array('َ','ً','ُ','ٌ','ِ','ٍ','ْ','ّ');

  $src_Chars = str_split_unicode($src);

  $elWithHarakat_Chars = str_split_unicode($elWithHarakat);
  for($n=0,$i=0; $n<count($elWithHarakat_Chars); $n++)
  {
    //check if the current char is a harakah, then compare.
    if($i >= count($src_Chars) && !in_array($elWithHarakat_Chars[$n],$harakatArr)) //it means even with advancing the $n, there's at least 1 letter (not harakah) more there than here.
    {
      $matching = false;
      break;
    }
    elseif($i>=count($src_Chars)) //same, but this el's char is a harakah
    {
      continue;
    }
    if(in_array($src_Chars[$i], $harakatArr))
    {
      //check if the current char in element is harakah too, they must be the same then.
      if(in_array($elWithHarakat_Chars[$n], $harakatArr))
      {
        //are they the same?
        if($elWithHarakat_Chars[$n]==$src_Chars[$i])
        {
          $matching = true;
          $i++;
        }
        else {
          $matching = false;
          break;
        }
      }
      else
      {
        $i++;
        $n--;
      }
    }
    else //this is not a harakah in the src
    {
      if(in_Array($elWithHarakat_Chars[$n], $harakatArr))
      {
        $n++; //advance one char (to the next letter)
        if(in_array($elWithHarakat_Chars[$n], $harakatArr)) $n++; //sometimes 2 harakat are consecutive (shaddah + harakah)

        if($elWithHarakat_Chars[$n]==$src_Chars[$i])  //compare letters now
        {
          $matching = true;
          $i++;
        }
        else
        {
          $matching = false;
          break;
        }
      }
      else //also this el char is not a harakah
      {
        if($elWithHarakat_Chars[$n]==$src_Chars[$i])
        {
          $matching = true;
          $i++;
        }
        else {
          $matching= false;
          break;
        }
      }
    }
  }
  return $matching;
}
?>
