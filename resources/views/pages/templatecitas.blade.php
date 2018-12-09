

<?php

    $mpdf = new \Mpdf\Mpdf(['default_font' => 'lucidaconsole']);

    /*
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
        'format' => 'Letter',
        'fontDir' => array_merge($fontDirs, [
            '/custom/font/directory',
        ]),
        'fontdata' => $fontData + [
            'draft'=>[
                'R' => "draft-b-regular-ita.otf",
            ]
        ],
        'default_font' => 'draft'
    ]);
        */


    $html="
        <!DOCTYPE html>
        <html>
            <head>
                <style>

                    @page  { sheet-size: 21.59cm 9.31cm; }
                        *{
                            margin:0;
                            padding:0;
                            box-sizing:border-box;
                        }

                        .titulo-cita{
                                color: black;
                                text-align:center;
                                font-size:1.2rem;
                                margin:0 auto;
                        }
                        .tblInfo{
                            margin:0 auto;
                            width:100%;   
                                              
                        }
                        .tbl-informacion{
                            margin:0 auto;                            
                            width:85%;                        
                        }
                        .banco{
                            text-align:center;
                            font-size:1rem;
                            margin:0 auto;
                            font-weight:bold;
                        }
                        .espacio{
                            line-heigth:3em;
                        }

                </style>
            </head>
            <body>

                
                <table class='tblInfo' > 
                    <tbody>
                        <tr>
                            <th>
                                <img src='img/logooficialisss.png' style='width:150px;'/>            
                            </th>
                            <th>
                                <h1 class='titulo-cita'>Hospital Medico Quirurgico y Oncológico</h1>
                                <p class='banco'>Banco de Sangre</p>
                                <p>012455</p>
                            </th>                            
                        </tr>    
                        <tr>
                            <th>
                            
                            </th>
                            <th>
                                <span style='font-size:11px;'>Contraseña de cita de banco de sangre</span>
                                
                            </th>
                        </tr>                    
                    </tbody>
                </table>
                <table class='tbl-informacion'>
                        <tr>
                            <th style='line-height:1em; text-align:left; font-size:14px;'>
                                Nombre donante:
                            </th>
                            <td style='line-height:1em; text-align:left; font-size:14px;'>
                                Kevin Antonio Guzman Diaz
                            </td>
                        </tr>
                        <tr>
                            <th style='line-height:1em; text-align:left; font-size:14px;'>
                                Dui donante:
                            </th>
                            <td style='line-height:1em; text-align:left; font-size:14px;'>
                                12345678-0
                            </td>
                        </tr>
                        <tr>
                            <th style='line-height:1em; text-align:left; font-size:14px;'>
                                Nombre paciente:
                            </th>                            
                            <td style='line-height:1em; text-align:left; font-size:14px;'>
                                Jorge Alberto De La Cruz Hernández
                            </td>
                        </tr>
                        <tr>
                            <th style='line-height:1em; text-align:left; font-size:14px;'>
                                Numero afiliacion:
                            </th>                            
                            <td style='line-height:1em; text-align:left; font-size:14px;'>
                                123456789
                            </td>
                        </tr>
                        <tr>
                            <th style='line-height:1.02em; text-align:left; font-size:14px;'>
                                Fecha:
                            </th>
                            <td style='line-height:1.02em; text-align:left; font-size:14px;'>
                                22/10/2018
                            </td>
                        </tr>

                </table>
            </body>
        </html>

    ";


    for($i=0;$i<3;$i++){
        $mpdf->WriteHTMl($html);
    }

    
    $mpdf->Output();
    exit;

?>

