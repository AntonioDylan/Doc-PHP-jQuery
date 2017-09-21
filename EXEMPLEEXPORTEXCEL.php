            // Récupérer l'instance de PHPExcel
            $export   = Oft_Export::factory('excel');
            $phpExcel = $export->getPhpExcel();

            // Quelques propriétées
            $phpExcel->getProperties()->setCreator("ANTONIO");
            $phpExcel->getProperties()->setLastModifiedBy("FXTN2309");
            $phpExcel->getProperties()->setTitle("SALARIES");
            //       $phpExcel->getProperties()->setSubject("Test de PHPExcel");
            //       $phpExcel->getProperties()->setDescription("Ecriture de données sur deux feuillets");

            $dates = $model_salarie->getExportSalaries($site);
      //      zend_debug::dump($dates);

            $cpt   = 0;

                 //       foreach ($dates as $date) { // pour chaque date il y a un onglet
                            if ($cpt > 0) {  //  on crée de nouveaux onglets
                                $phpExcel->createSheet($cpt);
                            }

                            $phpExcel->setActiveSheetIndex($cpt);

                            $totSiteK     = '=';
                            $totSiteL     = '=';
                            $listeEquipes = $model_salarie->getExportEquipe($site);

                            //***********************************
                            //*****  Définition des styles ******
                            //***********************************
                            $styleA1 = $phpExcel->getActiveSheet()->getStyle('A1:N1');
                            $styleA1->applyFromArray(
                                array(
                                    'font'        => array(
                                        'name'  => 'Arial',
                                        'size'  => 10,
                                        'bold'  => true,
                                        'color' => array(
                                            'argb' => 'FFFFFF'
                                        )
                                    ),
                                    'wrap'        => true,
                                    'shrinkToFit' => true,
                                    'alignment'   => array(
                                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                                    ),
                                    'fill'        => array(
                                        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                        'color' => array(
                                            'argb' => '47b3e9'
                                        )
                                    ),
                                    'borders'     => array(
                                        'allborders' => array(
                                            'style' => PHPExcel_Style_Border::BORDER_THIN
                                        )
                                    )
                                )
                            );

                            $styleA2 = $phpExcel->getActiveSheet()->getStyle('A2:M2');
                            $styleA2->applyFromArray(
                                array(
                                    'font'        => array(
                                        'name'  => 'Arial',
                                        'size'  => 10,
                                        'bold'  => true,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    ),
                                    'wrap'        => true,
                                    'shrinkToFit' => true,
                                    'alignment'   => array(
                                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                                    ),
                                    'fill'        => array(
                                        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                        'color' => array(
                                            'argb' => 'ceeefe'
                                        )
                                    ),

                                    'borders' => array(
                                        'allborders' => array(
                                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                                            'color' => array(
                                                'argb' => '47b3e9'
                                            )
                                        )
                                    )

                                )
                            );

                            $styleCentre = array(
                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                                ),
                                'borders'     => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => 'cccccc'
                                        )
                                    )
                                )
                            );

                            $styleLeft = array(
                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
                                ),
                                'borders'     => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => 'cccccc'
                                        )
                                    )
                                )
                            );

                            $styleNoir = array(
                                'font' => array(
                                    'bold'  => false,
                                    'color' => array('argb' => '000000'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                )
                            );

                            $styleJaune = array(
                                'font'    => array(
                                    'bold'  => false,
                                    'color' => array('argb' => '000000'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                ),
                                'borders' => array(
                                    'top'    => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    ),
                                    'bottom' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    )

                                ),

                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
                                ),
                                'fill'        => array(
                                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array(
                                        'argb' => 'fdf402'
                                    )
                                ),

                            );

                            $styleGris = array(
                                'font' => array(
                                    'bold'  => false,
                                    'color' => array('argb' => '000000'),
                                    'size'  => 9,
                                    'name'  => 'Verdana'
                                ),

                                'borders' => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    )
                                ),
                                'fill'    => array(
                                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array(
                                        'argb' => 'CCCCCC'
                                    )
                                ),

                            );

                            $styleGrisCentre = array(
                                'font' => array(
                                    'bold'  => false,
                                    'color' => array('argb' => '000000'),
                                    'size'  => 9,
                                    'name'  => 'Verdana'
                                ),

                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                                ),

                                'borders' => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    )
                                ),
                                'fill'    => array(
                                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array(
                                        'argb' => 'CCCCCC'
                                    )
                                ),

                            );

                            $styleGrisFonce = array(
                                'font'        => array(
                                    'bold'  => true,
                                    'color' => array('argb' => 'ceeefe'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                ),
                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
                                ),

                                'borders' => array(
                                    'top'    => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    ),
                                    'bottom' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    )

                                ),

                                'fill' => array(
                                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array(
                                        'argb' => '9a9a9a'
                                    )
                                ),

                            );

                            $styleBleuCiel = array(
                                'font'        => array(
                                    'bold'  => false,
                                    'color' => array('argb' => '000000'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                ),
                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
                                ),
                                'borders'     => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    )
                                ),
                                'fill'        => array(
                                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array(
                                        'argb' => 'ceeefe'
                                    )
                                ),

                            );

                            $styleBleuFonce = array(
                                'font'        => array(
                                    'bold'  => true,
                                    'color' => array('argb' => 'ffffff'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                ),
                                'wrap'        => true,
                                'shrinkToFit' => true,
                                'alignment'   => array(
                                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
                                ),
                                'borders'     => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => 'cccccc'
                                        )
                                    )
                                ),
                                'fill'        => array(
                                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array(
                                        'argb' => '547ede'
                                    )
                                ),

                            );

                            $styleBleu = array(
                                'font' => array(
                                    'bold'  => false,
                                    'color' => array('argb' => '020efc'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                )
                            );

                            $styleRouge = array(
                                'font' => array(
                                    'bold'  => false,
                                    'color' => array('argb' => 'ff0000'),
                                    'size'  => 10,
                                    'name'  => 'Verdana'
                                )
                            );

                            $tyleBordureNoire = array(
                                'borders' => array(
                                    'allborders' => array(
                                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                                        'color' => array(
                                            'argb' => '000000'
                                        )
                                    )
                                )
                            );

                            // ->freezePane('A2') permet de figer la ligne 1  (oui A2 = ligne 1 , ainsi de suite...)
                            // $phpExcel->getActiveSheet()->freezePane('A2');
                            // $phpExcel->getActiveSheet()->freezePane('A3');
                            //******************************************
                            //******* freeze la première colonne *******
                            //******************************************
                            $phpExcel->getActiveSheet()->freezePane('B3');

                            $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
                            $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                            $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
                            $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
                            $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
                            $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
                            $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
                            $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
                            $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
                            $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
                            $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
                            $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
                            $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
                            $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);

                            $phpExcel->getActiveSheet()->mergeCells('A1:N1');
                            $phpExcel->getActiveSheet()->setCellValue(
                                'A1',
                                'Extraction des Salariés du site de ' . $site . ' par équipe en date du : ' . date("d-m-Y")
                            );

                            $phpExcel->getActiveSheet()->setCellValue('A2', 'noms');
                            $phpExcel->getActiveSheet()->setCellValue('B2', 'prénoms');
                            $phpExcel->getActiveSheet()->setCellValue('C2', 'particularité');
                            $phpExcel->getActiveSheet()->setCellValue('D2', 'code ident');
                            $phpExcel->getActiveSheet()->setCellValue('E2', 'naissance');
                            $phpExcel->getActiveSheet()->setCellValue('F2', 'code métier');
                            $phpExcel->getActiveSheet()->setCellValue('G2', 'code cdr');
                            $phpExcel->getActiveSheet()->setCellValue('H2', 'statut');
                            $phpExcel->getActiveSheet()->setCellValue('I2', 'Orange');
                            $phpExcel->getActiveSheet()->setCellValue('J2', 'Site');
                            $phpExcel->getActiveSheet()->setCellValue('K2', 'EFFTP');
                            $phpExcel->getActiveSheet()->setCellValue('L2', 'EFF');
                            $phpExcel->getActiveSheet()->setCellValue('M2', 'grade');
                            $phpExcel->getActiveSheet()->setCellValue('N2', 'date et action');

                            $ligne = 3;

                            $phpExcel->getActiveSheet()->setCellValue("A$ligne", "Site de $site");
                            $phpExcel->getActiveSheet()->getStyle("A$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("B$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("D$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("E$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("F$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("G$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("H$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("I$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("M$ligne")->applyFromArray($styleJaune);
                            $phpExcel->getActiveSheet()->getStyle("N$ligne")->applyFromArray($styleJaune);

                            $ligne++;
                            $actifTotGen   = 0;
                            $utiliseTotGen = 0;

                            foreach ($listeEquipes as $nom) {

                                $equipe = $nom['equipe'];

                                $datas = $model_salarie->getExportSalariesByDate($site, $equipe, $date['date_creat']);

                                $phpExcel->getActiveSheet()->setCellValue("A$ligne", "Equipe " . $equipe);
                                $phpExcel->getActiveSheet()->getStyle("A$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("B$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("D$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("E$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("F$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("G$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("H$ligne")->applyFromArray($styleGrisFonce);
                               $phpExcel->getActiveSheet()->getStyle("I$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("M$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("N$ligne")->applyFromArray($styleGrisFonce);

                                $ligne++;
                                $actifTot   = 0;
                                $utiliseTot = 0;
                                $ligneDeb   = $ligne;
                                $ligneFin   = $ligne;


                                foreach ($datas as $data) {
                                    $phpExcel->getActiveSheet()->setCellValue("A$ligne", $data['nom']);
                                    $phpExcel->getActiveSheet()->getStyle("A$ligne")->applyFromArray($styleLeft);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("A$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("B$ligne", $data['prenom']);
                                    $phpExcel->getActiveSheet()->getStyle("B$ligne")->applyFromArray($styleLeft);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("B$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleRouge);
                                    $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleLeft);
                                    $phpExcel->getActiveSheet()->setCellValue(
                                        "C$ligne",
                                        $data['situation_particuliere'] . ' ' . $data['tps']
                                    );
                                    if ($data['utilise'] == '0') {
                                        if (trim($data['tps']) == 'TPS libere') {
                                            $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleBleuFonce);
                                        } else {
                                            $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleGris);
                                        }
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("D$ligne", $data['cuid']);
                                    $phpExcel->getActiveSheet()->getStyle("D$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("D$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("E$ligne", $data['naissance']);
                                    $phpExcel->getActiveSheet()->getStyle("E$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("E$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("F$ligne", $data['code_metier']);
                                    $phpExcel->getActiveSheet()->getStyle("F$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("F$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("G$ligne", $data['code_cdr']);
                                    $phpExcel->getActiveSheet()->getStyle("G$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("G$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("H$ligne", $data['statut']);
                                    $phpExcel->getActiveSheet()->getStyle("H$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("H$ligne")->applyFromArray($styleGris);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("I$ligne", $data['entree_groupe']);
                                    $phpExcel->getActiveSheet()->getStyle("I$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("I$ligne")->applyFromArray($styleGris);
                                    }


                                    $phpExcel->getActiveSheet()->setCellValue("J$ligne", $data['arrivee_site']);
                                    $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleGris);
                                    }


                                    $utilise = (str_replace(',', '.', $data['utilise']) * 100);

                                    //  pour definir une couleur de police
                                    //  $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleBleu);
                                    //  pour definir directement  une couleur de fond
                                    //   $phpExcel->getActiveSheet()->getStyle("J$ligne")->getFill()->getStartColor()->setRGB('FF6600');

                                    //  $phpExcel->getActiveSheet()->setCellValue("J$ligne", $utilise);
                                    if ($utilise != 0) {
                                        $phpExcel->getActiveSheet()->setCellValue("K$ligne", $utilise);
                                        $phpExcel->getActiveSheet()->getStyle("K$ligne")->getNumberFormat()
                                                 ->setFormatCode('[Blue][<100]#,##0.00;[Black][=100]#,##0.00');
                                        $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($styleCentre);
                                    } else {
                                        $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($styleGrisCentre);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("L$ligne", intval($data['actif']));
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($styleGrisCentre);
                                    } else {
                                        $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($styleCentre);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue("M$ligne", $data['grade']);
                                    $phpExcel->getActiveSheet()->getStyle("M$ligne")->applyFromArray($styleCentre);
                                    if ($data['utilise'] == '0') {
                                        $phpExcel->getActiveSheet()->getStyle("M$ligne")->applyFromArray($styleGrisCentre);
                                    }

                                    $phpExcel->getActiveSheet()->setCellValue(
                                        "N$ligne",
                                        str_replace('<br>', '', $data['action'])
                                    );
                                    $phpExcel->getActiveSheet()->getStyle("N$ligne")->applyFromArray($styleLeft);

                                    $ligne++;

                                    $actifTot += $data['actif'];
                                    $utiliseTot = ($utiliseTot + intval($utilise));
                                    $actifTotGen += $data['actif'];
                                    $utiliseTotGen = ($utiliseTotGen + intval($utilise));
                                }

                                $ligneFin = ($ligne - 1);
                                $phpExcel->getActiveSheet()->setCellValue("A$ligne", "Total " . $data['equipe']);
                                $phpExcel->getActiveSheet()->getStyle("A$ligne")->applyFromArray($styleBleuCiel);

                                $phpExcel->getActiveSheet()->getStyle("B$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("D$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("E$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("F$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("G$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("H$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("I$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleGrisFonce);

                                // $phpExcel->getActiveSheet()->setCellValue("K$ligne", ($utiliseTot / 100));
                                if ($ligneDeb <= $ligneFin) {
                                    $phpExcel->getActiveSheet()->setCellValue("K$ligne", "=SUM(K$ligneDeb:K$ligneFin)/100");
                                } else {
                                    $phpExcel->getActiveSheet()->setCellValue("K$ligne", '0');
                                }
                                $phpExcel->getActiveSheet()->getStyle("K$ligne")->getNumberFormat()->setFormatCode('#,##0.00');
                                $phpExcel->getActiveSheet()->getComment("K$ligne")->getText()->createTextRun(
                                    "Total du temps travaillé pour l'équipe " . $data['equipe']
                                );
                                $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($styleCentre);
                                $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($tyleBordureNoire);

                                //$phpExcel->getActiveSheet()->setCellValue("L$ligne", $actifTot);
                                if ($ligneDeb <= $ligneFin) {
                                    $phpExcel->getActiveSheet()->setCellValue("L$ligne", "=SUM(L$ligneDeb:L$ligneFin)/100");
                                } else {
                                    $phpExcel->getActiveSheet()->setCellValue("L$ligne", '0');
                                }

                                $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($styleCentre);
                                $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($tyleBordureNoire);
                                $phpExcel->getActiveSheet()->getComment("L$ligne")->getText()->createTextRun(
                                    "Total des salariés actifs pour l'équipe " . $data['equipe']
                                );

                                $phpExcel->getActiveSheet()->getStyle("M$ligne")->applyFromArray($styleGrisFonce);
                                $phpExcel->getActiveSheet()->getStyle("N$ligne")->applyFromArray($styleGrisFonce);

                                $totSiteK .= 'K' . $ligne . '+';
                                $totSiteL .= 'L' . $ligne . '+';

                                $ligne = $ligne + 2;
                            }

                            $phpExcel->getActiveSheet()->setCellValue("A$ligne", "Total site de $site");
                            $phpExcel->getActiveSheet()->getStyle("A$ligne")->applyFromArray($styleJaune);

                            $phpExcel->getActiveSheet()->getStyle("B$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("C$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("D$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("E$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("F$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("G$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("H$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("I$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("J$ligne")->applyFromArray($styleGrisFonce);

                            $totSiteK = substr($totSiteK, 0, -1);
                           $totSiteL = substr($totSiteL, 0, -1);
                            $phpExcel->getActiveSheet()->setCellValue("K$ligne", $totSiteK);
                            // $phpExcel->getActiveSheet()->setCellValue("K$ligne", ($utiliseTotGen / 100));


                            $phpExcel->getActiveSheet()->getStyle("K$ligne")->getNumberFormat()->setFormatCode('#,##0.00');
                            $phpExcel->getActiveSheet()->getComment("K$ligne")->getText()->createTextRun(
                                "Total du temps travaillé pour le site de $site."
                            );
                            $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($styleCentre);
                            $phpExcel->getActiveSheet()->getStyle("K$ligne")->applyFromArray($tyleBordureNoire);

                            $phpExcel->getActiveSheet()->setCellValue("L$ligne", $totSiteL);
                            // $phpExcel->getActiveSheet()->setCellValue("L$ligne", $actifTotGen);
                            $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($styleCentre);
                            $phpExcel->getActiveSheet()->getStyle("L$ligne")->applyFromArray($tyleBordureNoire);
                            $phpExcel->getActiveSheet()->getComment("L$ligne")->getText()->createTextRun(
                                "Total des salariés actifs pour le site de $site."
                            );

                            $phpExcel->getActiveSheet()->getStyle("M$ligne")->applyFromArray($styleGrisFonce);
                            $phpExcel->getActiveSheet()->getStyle("N$ligne")->applyFromArray($styleGrisFonce);

                            $ligne = $ligne + 2;

                            $mois  = traduitMois(substr($date['date_creat'], 3, 2));
                            $annee = substr($date['date_creat'], 6, 4);
                            $phpExcel->getActiveSheet()->setTitle($mois . '-' . $annee);

                    //        $cpt++;
                    //    } // Fin date changement d'onglet

                        // on active le premier onglet pour ouvrir dessus
                        $phpExcel->setActiveSheetIndex(0);

                        // Ecriture dans le répertoire par défaut
                        $export->write();

                        // Récupération du chemin vers le fichier
                        //ob_end_clean();
                        $filePath  = $export->getPath();
                        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');

                        // sauvegarde sur disque

                       $file = DATA_DIR . DS . 'export' . DS .  $nomSite['site'] .'_export_' . date("d-m-Y") . '.xlsx';

                        unlink($file);
                        $objWriter->save($file);
                        //////////////////////////////////////////////////////////////
                        //       Ouverture automatique du fichier Excel       //
                        //////////////////////////////////////////////////////////////


                        if (file_exists($file)) {
                            header('Content-Description: File Transfer');
                            header('Content-Type: application/octet-stream');
                            header('Content-Disposition: attachement; filename =' . basename($file));
                            header('Expires: 0');
                            header('Cache-Control: must-revalidate');
                            header('Pragma: public');
                            header('Content-length:' . filesize($file));
                            readfile($file);
                        }







