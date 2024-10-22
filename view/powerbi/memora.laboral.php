<?php
 
 $db = "fusalmosiif_db";
 $dbUser = "fusalmosiif_user";
 $dbPass = "u$.smHh~S@hY";
 $root = "https://sii.fusalmo.org/";
$net = new PDO("mysql:host=localhost;dbname=$db", $dbUser, $dbPass);
 

try {
    $query = "SELECT * FROM `m_l_sexo` as s1 
    inner join m_l_tipo_participante as s2  on s1.year_a = s2.id_year
    inner join m_l_desagregado_nnaj as s3 on s1.year_a = s3.id_year
    inner join m_l_atencion_trabajos as s4 on s1.year_a = s4.id_year
    inner join m_l_insertados_formacion_hacia_trabajo as s5 on s1.year_a = s5.id_year
    inner join m_l_servicio_comunidad as s6 on s1.year_a = s6.id_year
    inner join m_l_otros as s7 on s1.year_a = s7.id_year
    order by s1.year_a desc
    ";
    $usuarios = $net->prepare($query);
    $usuarios->execute();
 
    $results = [];
    while ($usuario = $usuarios->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $usuario;
    }
 
    // Convertir los resultados a JSON
    $json_data = json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
 
    // Establecer la cabecera para la descarga del archivo JSON
    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="usuarios.json"');
    header('Content-Length: ' . strlen($json_data));
 
    // Mostrar los datos JSON
    echo $json_data;
 
} catch (PDOException $e) {
    // Manejo de errores
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => $e->getMessage()]);
}
 
?>
