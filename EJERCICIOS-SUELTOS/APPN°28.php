<!-- Aplicación No 26 (Copiar archivos)
Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará
por la página) hacia otro archivo que será creado y alojado en
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso, mm
al mes, dd al día, hh hora, ii minutos y ss segundos. -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == UPLOAD_ERR_OK)
    {
        //aca la ruta del archivo de origen.
        $archivoOrigen = $_FILES["archivo"]["tmp_name"];

        $fechaActual = date('Y_m_d_H_i_s');
        $archivoDestino = "./DocumentosPHP/{$fechaActual}.txt";

                // Intenta copiar el archivo de origen al archivo de destino
                if (copy($archivoOrigen, $archivoDestino)) {
                    echo "El archivo se copió exitosamente a '{$archivoDestino}'.";
                } else {
                    echo "Hubo un error al copiar el archivo.";
                }
            } else {
                echo "Por favor, seleccione un archivo válido.";
            }
    
}
?>