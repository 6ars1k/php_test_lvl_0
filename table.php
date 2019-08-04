<?php

class Table
{
    public $counter;
    public $a;
    function __construct(array $tabRow){
        $counter = $this->counter;
        $this->tabRow = $tabRow;
        $a = [];
        for ($i = 0; $i < count($tabRow); $i++)
        {
            $counter .= '    
                <table><thead>
                    <tr>
                        <th>Year</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Q1</th>
                        <th>Apr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Q2</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Q3</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                        <th>Q4</th>
                        <th>YTD</th>
                    </tr>';

            for($j = 0; $j < $tabRow[$i]; $j++)
            {
              $a = $a + $this->input($this->year() - $tabRow[$i] + $j + 1, $i);
                $counter .= $this->row($this->year() - $tabRow[$i] + $j + 1, $i,$a);
            }
            $counter .= '</thead></table>
                        <button type="submit" name="addRow" value="'. $i .'">Add row</button>';
        }

        echo $counter;
        $this->a = $a;
      $this->i = $i;
      $mRow = $this->year() - $tabRow[$i] - $j + 1;
      $this->mRow = $mRow;

    }
    public function row($mRow, $i, $valey)
    {
      return(
        '
            <tr>
                <td>'.$mRow.'</td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'1" value="'.$valey[$i.$mRow .'1'].'"></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'2" value="'.$valey[$i.$mRow .'2'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'3" value="'.$valey[$i.$mRow .'3'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'q1" value="'.$valey[$i.$mRow .'4'].'"  step=\'0.01\'></td>
                
                <td><input type=\'number\' name="'.$i.''.$mRow.'4" value="'.$valey[$i.$mRow .'5'].'"></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'5" value="'.$valey[$i.$mRow .'6'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'6" value="'.$valey[$i.$mRow .'7'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'q2" value="'.$valey[$i.$mRow .'8'].'" step=\'0.01\' ></td>
                
                <td><input type=\'number\' name="'.$i.''.$mRow.'7" value="'.$valey[$i.$mRow .'9'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'8" value="'.$valey[$i.$mRow .'10'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'9" value="'.$valey[$i.$mRow .'11'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'q3" value="'.$valey[$i.$mRow .'12'].'" step=\'0.01\' "></td>
                
                <td><input type=\'number\' name="'.$i.''.$mRow.'10" value="'.$valey[$i.$mRow .'13'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'11" value="'.$valey[$i.$mRow .'14'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'12" value="'.$valey[$i.$mRow .'15'].'" ></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'q4" value="'.$valey[$i.$mRow .'16'].'" step=\'0.01\'></td>
                <td><input type=\'number\' name="'.$i.''.$mRow.'ytd" value="'.$valey[$i.$mRow .'17'].'" step=\'0.01\'></td>
            </tr>
        '
        );
    }
    public function year(){
        return date('Y');
    }
    public function input($mRow,$i)
    {
      $valey = array(
        $i.$mRow.'1' => "{$_POST[''.$i.''.$mRow.'1']}",
        $i.$mRow.'2' => "{$_POST[''.$i.''.$mRow.'2']}",
        $i.$mRow.'3' => "{$_POST[''.$i.''.$mRow.'3']}",
        $i.$mRow.'4' => "{$_POST[''.$i.''.$mRow.'q1']}",
        $i.$mRow.'5' => "{$_POST[''.$i.''.$mRow.'4']}",
        $i.$mRow.'6' => "{$_POST[''.$i.''.$mRow.'5']}",
        $i.$mRow.'7' => "{$_POST[''.$i.''.$mRow.'6']}",
        $i.$mRow.'8' => "{$_POST[''.$i.''.$mRow.'q2']}",
        $i.$mRow.'9' => "{$_POST[''.$i.''.$mRow.'7']}",
        $i.$mRow.'10' => "{$_POST[''.$i.''.$mRow.'8']}",
        $i.$mRow.'11' => "{$_POST[''.$i.''.$mRow.'9']}",
        $i.$mRow.'12' => "{$_POST[''.$i.''.$mRow.'q3']}",
        $i.$mRow.'13' => "{$_POST[''.$i.''.$mRow.'10']}",
        $i.$mRow.'14' => "{$_POST[''.$i.''.$mRow.'11']}",
        $i.$mRow.'15' => "{$_POST[''.$i.''.$mRow.'12']}",
        $i.$mRow.'16' => "{$_POST[''.$i.''.$mRow.'q4']}",
        $i.$mRow.'17' => "{$_POST[''.$i.''.$mRow.'ytd']}"
      );
      return $valey;
    }

    public function validtable() {
      $a = $this->a;
      $i = $this->i;
      $valid = "valid";
      $tabRow = $this->tabRow;
      $mRow = $this->mRow;
      $chunkSize = count(array_filter($a)) / count($tabRow);
      $arr_chunk = array_chunk(array_filter($a), $chunkSize, TRUE);
      $arr_chunk_val = array_chunk(array_filter(array_values($a)), $chunkSize, TRUE);
      $last = [];
      $invalid = "invalid";
      $first_val = [];
      $last_val = [];
      $caunt_val_f = 0;
      foreach ($arr_chunk as $key => $value) {
        $first [] = array_key_first($value);
        $last [] = array_key_last($value);
        $caunt = count($first);
      }
      foreach ($arr_chunk_val as $key => $value) {
        $first_val [] = array_key_first($value);
        $last_val [] = array_key_last($value);
        $caunt_val_f = count($value);
        $caunt_val_l = count($last_val);
      }

      $caunt = count($first);
      $u = 0;
      $y = 0;
      for ($k = 1; $k < $caunt; $k++) {
        if ($first[$k] - $first[$k - 1] == 100000 or $first[$k] - $first[$k - 1] == 1000000) {
          $u = $u + 1;
        }
        if ($last[$k] - $last[$k - 1] == 100000 or $last[$k] - $last[$k - 1] == 1000000) {
          $y = $y + 1;
        }
      }
      if (isset($_POST['vali'])) {
        if (array_sum($a) == 0) {
          return $valid;
        }
        if ($i == 1 and array_sum($a) == 1) {
          return $valid;
        }

        for ($c = 0; $c < $caunt; $c++) {
          foreach ($a as $key => $value) {
            if ($first[$c] > key($a) and $last[$c] < key($a)) {
              return $invalid;
            }
          }
          if ($last_val[$c] - $first_val[$c] != $caunt_val_f - 1) {
            return $invalid;
          }
        }
        if (!($u == $caunt - 1 and $y == $caunt - 1)) {
          return $invalid;
        }
        if ($i == 1 and $last_val[$c] - $first_val[$c] == count(array_filter($a)) - 1) {
          return $valid;
        }
        foreach (array_filter($a) as $key => $value) {
          $val2 = FALSE;
          for ($tb = 0; $tb < count($tabRow); $tb++) {
            for ($y = $mRow; $y <= date("Y"); $y++) {
              $sq1 = $tb . $y . '4';
              $sq2 = $tb . $y . '8';
              $sq3 = $tb . $y . '12';
              $sq4 = $tb . $y . '16';
              $ytd = $tb . $y . '17';
              if ($key == $sq1) {
                $s1 = $tb . $y . '1';
                $s2 = $tb . $y . '2';
                $s3 = $tb . $y . '3';
                if ($a[$sq1] <= (((($a[$s1] + $a[$s2] + $a[$s3]) + 1) / 3) + 0.05) and $a[$sq1] >= (((($a[$s1] + $a[$s2] + $a[$s3]) + 1) / 3) - 0.05)) {
                  $val2 = TRUE;
                }
                else {
                  $val2 = FALSE;
                  break 3;
                }
              }
              if ($key == $sq2) {
                $s5 = $tb . $y . '5';
                $s6 = $tb . $y . '6';
                $s7 = $tb . $y . '7';
                if ($a[$sq2] <= (((($a[$s5] + $a[$s6] + $a[$s7]) + 1) / 3) + 0.05) and $a[$sq2] >= (((($a[$s5] + $a[$s6] + $a[$s7]) + 1) / 3) - 0.05)) {
                  $val2 = TRUE;
                }
                else {
                  $val2 = FALSE;
                  break 3;
                }
              }
              if ($key == $sq3) {
                $s1 = $tb . $y . '9';
                $s2 = $tb . $y . '10';
                $s3 = $tb . $y . '11';
                if ($a[$sq3] <= (((($a[$s1] + $a[$s2] + $a[$s3]) + 1) / 3) + 0.05) and $a[$sq3] >= (((($a[$s1] + $a[$s2] + $a[$s3]) + 1) / 3) - 0.05)) {
                  $val2 = TRUE;
                }
                else {
                  $val2 = FALSE;
                  break 3;
                }
              }
              if ($key == $sq4) {
                $s1 = $tb . $y . '13';
                $s2 = $tb . $y . '14';
                $s3 = $tb . $y . '15';
                if ($a[$sq4] <= (((($a[$s1] + $a[$s2] + $a[$s3]) + 1) / 3) + 0.05) and $a[$sq4] >= (((($a[$s1] + $a[$s2] + $a[$s3]) + 1) / 3) - 0.05)) {
                  $val2 = TRUE;
                }
                else {
                  $val2 = FALSE;
                  break 3;
                }
              }
              if ($key == $ytd) {
                if ($a[$ytd] <= (((($a[$sq1] + $a[$sq2] + $a[$sq3] + $a[$sq4]) + 1) / 4) + 0.05) and $a[$ytd] >= (((($a[$sq1] + $a[$sq2] + $a[$sq3] + $a[$sq4]) + 1) / 4) + 0.05)) {
                  $val2 = TRUE;
                }
                else {
                  $val2 = FALSE;
                  break 3;
                }
              }
            }
          }
        }
        if ($val2 == FALSE) {
          return $invalid;
        }

        return $valid;
      }
    }
}