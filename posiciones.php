<?php
//EQUIPOS CON LOS RESULTADOS
$fixture = array(
    array('REY DE COPAS',10,'BUFALOS',0),
    array('NSM',0,'TITANES',0),
    array('LOS PULPOS',5,'KOGERMAS',5),
    array('PUMAS 93',5,'94 FC',4),
    array('GLADIADORES',2,'LBDP',2),
    array('GALACTICOS',0,'LOS AMIGOS',6),

    array('REY DE COPAS',0,'BUFALOS',5),
    array('NSM',3,'TITANES',5),
    array('LOS PULPOS',5,'KOGERMAS',0),
    array('PUMAS 93',0,'94 FC',4),
    array('GLADIADORES',12,'LBDP',2),
    array('GALACTICOS',7,'LOS AMIGOS',0),

    array('REY DE COPAS',3,'BUFALOS',0),
    array('NSM',3,'TITANES',3),
    array('LOS PULPOS',0,'KOGERMAS',0),
    array('PUMAS 93',0,'94 FC',4),
    array('GLADIADORES',1,'LBDP',3),
    array('GALACTICOS',0,'LOS AMIGOS',10),

    array('REY DE COPAS',3,'BUFALOS',0),
    array('NSM',3,'TITANES',3),
    array('LOS PULPOS',0,'KOGERMAS',0),
    array('PUMAS 93',0,'94 FC',4),
    array('GLADIADORES',1,'LBDP',3),
    array('GALACTICOS',0,'LOS AMIGOS',10),
    


    
   
);
//AQUI RECORRE EL ARRAY, PUNTO JUGADO, GANADO, EMPATE, PERDIDO, GOLES A FAVOR, GOLES EN CONTRA, DIFERENCIA DE GOLES, PUNTOS
$posiciones = array(
    array('REY DE COPAS'       ,0,0,0,0,0,0,0,0),
    array('BUFALOS'            ,0,0,0,0,0,0,0,0),
    array('PUMAS 93'           ,0,0,0,0,0,0,0,0),    
    array('NSM'                ,0,0,0,0,0,0,0,0),    
    array('LOS PULPOS'         ,0,0,0,0,0,0,0,0),
    array('GLADIADORES'        ,0,0,0,0,0,0,0,0),
    array('GALACTICOS'         ,0,0,0,0,0,0,0,0),
    array('LOS AMIGOS'         ,0,0,0,0,0,0,0,0),
    array('LBDP'               ,0,0,0,0,0,0,0,0),  
    array('94 FC'              ,0,0,0,0,0,0,0,0), 
    array('KOGERMAS'           ,0,0,0,0,0,0,0,0),
    array('TITANES'            ,0,0,0,0,0,0,0,0),


    
);


for ($i=0; $i<=count($fixture)-1; $i++) {
    
    $local = $fixture[$i][0];
    $visita = $fixture[$i][2];
    $goles_local = $fixture[$i][1];
    $goles_visita = $fixture[$i][3]; 
  
    
    $empate = false;
    if ($goles_local > $goles_visita) {
        $ganador = $local; 
        $perdedor = $visita;

    } else if ($goles_local < $goles_visita) {
        $ganador = $visita;
        $perdedor = $local;
                  
    } else {
        $empate = true;    
    }
    
    if ($empate) {       
        for ($r=0; $r<=count($posiciones)-1; $r++) {
            
            if (strcmp($local,$posiciones[$r][0])==0) {
                $posiciones[$r][1]++; // se suma un partido jugado
                $posiciones[$r][3]++; // partido empatado
                $posiciones[$r][5] += $goles_local; // goles a favor
                $posiciones[$r][6] += $goles_visita; // goles en contra
                $posiciones[$r][8]++; // suma un punto por empatar
                $posiciones[$r][7] += $goles_local - $goles_visita; // diferencias de goles 
            }
            
            if (strcmp($visita,$posiciones[$r][0])==0) {
                $posiciones[$r][1]++; // se suma un partido jugado
                $posiciones[$r][3]++; // Partido empatado
                $posiciones[$r][5] += $goles_visita; // goles a favor
                $posiciones[$r][6] += $goles_local; // goles en contra
                $posiciones[$r][8]++; // suma un punto por empatar
                $posiciones[$r][7] += $goles_local - $goles_visita; // diferencias de goles 
            }
                      
        }        
    } else {
            if ($ganador == $visita) {
            //if ($visita == $fixture[$i][2]) {
        for ($r=0; $r<=count($posiciones)-1; $r++) {
            
            if (strcmp($ganador,$posiciones[$r][0])==0) {
                $posiciones[$r][1]++; // se suma un partido jugado
                $posiciones[$r][2]++; // partido ganado
                $posiciones[$r][6] += $goles_local; // goles a favor
                $posiciones[$r][5] += $goles_visita; // goles en contra
                $posiciones[$r][8] += 3; // suma tres puntos por ganar
                if ((- $goles_local + $goles_visita) > 0){
                $posiciones[$r][7] += "+".(- $goles_local + $goles_visita); // diferencias de goles
                }
                else
                    {$posiciones[$r][7] += (- $goles_local + $goles_visita);}
                 
            }
            
            if (strcmp($perdedor,$posiciones[$r][0])==0) {
                $posiciones[$r][1]++; // se suma un partido jugado
                $posiciones[$r][4]++; // partido perdido
                $posiciones[$r][6] += $goles_visita; // goles a favor
                $posiciones[$r][5] += $goles_local; //goles les en contra
                
                if ((+ $goles_local - $goles_visita)>0){
                $posiciones[$r][7] += "+".($goles_local - $goles_visita); // diferencias de goles
                }
                else{$posiciones[$r][7] += ($goles_local - $goles_visita);}
                // no suma puntos por perder                                
            }
            }
        }
            else {
        for ($r=0; $r<=count($posiciones)-1; $r++) {
            
            if (strcmp($ganador,$posiciones[$r][0])==0) {
                $posiciones[$r][1]++; // se suma un partido jugado
                $posiciones[$r][2]++; // partido ganado
                $posiciones[$r][5] += $goles_local; // goles a favor
                $posiciones[$r][6] += $goles_visita; // goles en contra
                $posiciones[$r][8] += 3; // suma tres puntos por ganar
               
                if (($goles_local - $goles_visita)>0){
                $posiciones[$r][7] += "+".($goles_local - $goles_visita); // diferencias de goles
                }
                else{$posiciones[$r][7] += ($goles_local - $goles_visita);}
            }
            
            if (strcmp($perdedor,$posiciones[$r][0])==0) {
                $posiciones[$r][1]++; // se suma un partido jugado
                $posiciones[$r][4]++; // partido perdido
                $posiciones[$r][5] += $goles_visita; // goles a favor
                $posiciones[$r][6] += $goles_local; //goles les en contra

                if ((- $goles_local + $goles_visita)>0){
                $posiciones[$r][7] += "+".(- $goles_local + $goles_visita); // diferencias de goles
                }
                else{$posiciones[$r][7] += (- $goles_local + $goles_visita);}
                // no suma puntos por perder                                
            }
            }

        }           
    }
}


?>
<html>
<head>
<title>Tabla de Posiciones</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body {
    font-family: Verdana, Arial;    
}

th {
    text-align: left;  
}

td {
    padding-left: 5px;    
    
}

</style>
</head>
<body>
<table>
    <thead>
      
            <th>Equipo</th>
            <th>PJ</th>
            <th>G</th>
            <th>E</th>
            <th>P</th>
            <th>GF</th>
            <th>GC</th>
            <th>DG</th>
            <th>Pts.</th>
    </thead>
	<?php
		$o = 8;
		foreach ($posiciones as $clave => $fila) {
    		$puntos[$clave]  = $fila[$o];
   
    		#$golf[$clave] = $fila[7], $fila[8];
		}
			//array_multisort($puntos, SORT_DESC, $posiciones);

    		array_multisort($puntos, SORT_DESC, $posiciones);
			#array_multisort($pt, SORT_DESC, $posiciones);
			for ($i=0; $i<=count($posiciones)-1; $i++) {
    			echo '<tr>';
    			for ($r=0; $r<=count($posiciones[$i])-1; $r++)
        		echo '<td>'.$posiciones[$i][$r].'</td>';
                echo '</tr>';
			}
	?>
</table>
</body>
</html>