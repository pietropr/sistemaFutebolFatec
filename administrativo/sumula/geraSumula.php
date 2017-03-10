<?
    include "../../settings/connection.php";
     
    $query = "SELECT * FROM membros WHERE id ";
    $executa_query = mysql_query($query);
    $contar = mysql_num_rows($executa_query);
            $html[0] = "
            <table border='1'>
            <tr>
                <td><b>ID</b></td>
                <td><b>Largada</b></td>
                <td><b>Tempo de Corrida</b></td>
                <td ><b>Início Trans. Corrida</b></td>
                <td><b>Término Trans. Corrida</b></td>
                <td><b>Total Trans. Corrida</b></td>
                <td><b>Tempo de Pedal</b></td>
                <td><b>Início Trans. Pedal</b></td>
                <td><b>Término Trans. Pedal</b></td>
                <td><b>Total Trans. Pedal</b></td>
           </tr>
           </table>";
        
 
    $i = 1;
    while($ret=mysql_fetch_array($executa_query)){
        $retorno_id = $ret['id'];
        $retorno_largada = $ret['largada'];
        $retorno_tempo_corrida = $ret['tempo_corrida'];
        $retorno_tran_ini_co = $ret['tran_ini_co'];
        $retorno_tran_fim_co = $ret['tran_fim_co'];
        $retorno_tempo_tran_co = $ret['tempo_tran_co'];
        $retorno_tempo_pedal = $ret['tempo_pedal'];
        $retorno_tran_ini_pedal = $ret['tran_ini_pedal'];
        $retorno_tran_fim_pedal = $ret['tran_fim_pedal'];
        $retorno_tempo_tran_pedal = $ret['tempo_tran_pedal'];
         
        if ($retorno_tempo_corrida !== NULL) {
            $html[$i] .= "<table border='1'>";
            $html[$i] .= "<tr>";
            $html[$i] .= "<td>$retorno_id</td>";
            $html[$i] .= "<td>$retorno_largada</td>";

            if ($i >= 1 && $i < 200) {
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tempo_corrida</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tran_ini_co</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tran_fim_co</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tempo_tran_co</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tempo_pedal</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tran_ini_pedal</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tran_fim_pedal</td>";
                $html[$i] .= "<td bgcolor='#3E4095'>$retorno_tempo_tran_pedal</td>";    
            }

            if ($i >= 200 && $i <400) {
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tempo_corrida</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tran_ini_co</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tran_fim_co</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tempo_tran_co</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tempo_pedal</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tran_ini_pedal</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tran_fim_pedal</td>";
                $html[$i] .= "<td bgcolor='#F27FA8'>$retorno_tempo_tran_pedal</td>";    
            }

            if ($i >= 400) {
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tempo_corrida</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tran_ini_co</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tran_fim_co</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tempo_tran_co</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tempo_pedal</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tran_ini_pedal</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tran_fim_pedal</td>";
                $html[$i] .= "<td bgcolor='#ffffff'>$retorno_tempo_tran_pedal</td>";    
            }
            $html[$i] .= "</tr>";
            $html[$i] .= "</table>";
        }     

    $i++;
    }
     

    $arquivo = 'dcbDualthon.xls';
        header ("Expires: Sun, 30 Nov 2016 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename={$arquivo}" );
        header ("Content-Description: PHP Generated Data" );
  
    for($i=0;$i<=$contar;$i++){  
        echo $html[$i];
        if ($i == 0) {
            echo "<table border='1'><tr><td colspan='10'><p align='center' style='font-size:16px'>HOMEM</p></td></tr></table>";
        }if ($i == 200) {
            echo "<table border='1'><tr><td colspan='10'><p align='center' style='font-size:16px' >MULHER</p></td></tr></table>";
        }if ($i == 400) {
            echo "<table border='1'><tr><td colspan='10'><p align='center' style='font-size:16px' >MISTO</p></td></tr></table>";
        }
     }
?>