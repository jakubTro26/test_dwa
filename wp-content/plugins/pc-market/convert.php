<?php

$fields = array("towar_id","kod","cku","do_usuniecia","czy_opakowanie","nazwa","skrot","typ_towaru","vat_id","pkwiu","sww_indeks","asortyment_id","jm_id","waga","wysokosc","szerokosc","glebokosc","il_w_zgrzewce","il_paleta","il_warstwa","il_kg_litrow","kod_CN","podlega_OO","podlega_MPP","status_do_zamowien","nowosc_od","nowosc_przez","koszty_transportu","koszty_przechowywania","koszty_inne","min_cena_sprzedazy_PCPOS","aktywny_w_SI","nazwa_w_SI","cena_zakupu","cena_detal","cena_hurtowa","cena_nocna","cena_dodatkowa","cena_detal_przed_prom","cena_hurtowa_przed_prom","cena_nocna_przed_prom","cena_dodatkowa_przed_prom","marza_suger","narzut_nocny","rabat_hurtowy","rabat_dodatkowy","status_ceny","opakowanie_id","ilosc_w_opakowaniu","czy_tandem","czy_karton","czy_artykul","artykul_id","kategoria_id","producent_id","dostawca_id","dost_id","opis1","opis2","opis3","opis4","notatki","uwagi_do_dostaw","nr_drukarki","folder_zdjec","plik_zdjecia","magazyn_id","stan_magazynu","stan_magazynu_min","stan_magazynu_max","blokada_stanu","rezerwacja_ilosci","magazyn_id","stan_magazynu","stan_magazynu_min","stan_magazynu_max","blokada_stanu","rezerwacja_ilosci","magazyn_id","stan_magazynu","stan_magazynu_min","stan_magazynu_max","blokada_stanu","rezerwacja_ilosci","kody_dodatkowe","parametry","data_aktualizacji");
$delimiter1 = ',';
$enclosure1 = '"';
global $kolumny;
$kolumny=array();
//rffg
global $rows;
global $data;
global $list;

global  $delimiter;
global $enclosure;
global $stan;
global $string_data;
$rows = array();
$data = array();
$list=array();

$delimiter = ',';
$enclosure = '"';
$stan=array();
//rffgf





function createCsv($axml, $af, $afields, $arows, $adata, $alist, $astan)
{


  
    
   

    foreach ($axml->children() as $item) {
        
        
        
        $hasChild = (count($item->children()) > 0) ? true : false;
        
        if (!$hasChild) {
            
             $string = $item->getName();
             $string_data = $item;
            


          
            
            // echo '<div>';
            // var_dump($string);
            // var_dump($string_data);
            // echo '</div>';
            //var_dump(!is_int(array_search($string,$stan)) );
         //ffffffgff
         
            foreach($afields as $field){
                
                
                
             if(($string==$field) && (!is_int(array_search($string,$astan)) )){
               
               
                    

                 array_push($arows,$string);
                 array_push($adata,$string_data);

                 var_dump($arows);
                 if($string=="data_aktualizacji"){

                   // var_dump($rows);
                   
                   
                    $alist=array();
                    array_push($alist,$arows);
                    array_push($alist,$adata);
                    
                        
    
                                      foreach ($alist as $pola) {
                                        
                          fputcsv($af, $pola, ',', '"');
                         }
    
                   
        
                    
                    $rows=array();
                    
                     $data=array();
                       
                  // $rows=array();
                   //$data=array();
                     
                  
                   
    
                }

                array_push($astan,$string);
                if($string==="data_aktualizacji"){
                    $astan=array();
                }



             }


            

            }
           

            
       

          

           
        } else {
            createCsv($axml, $af, $afields, $arows, $adata, $alist, $astan);
        }
        
    }
  
   
}

$filexml = '/home4/smakolyk/plik.xml';

//cwd wp_admin
if (file_exists($filexml)) {
    
    $xml = simplexml_load_file($filexml);
    $f = fopen('/home4/smakolyk/test.csv', 'w');
    
    array_push($kolumny,$fields);
    
    foreach ($kolumny as $pole) {
        fputcsv($f, $pole, $delimiter1, $enclosure1);
       }


    createCsv($xml, $f, $fields, $rows, $data, $list, $stan);
 
    
       

       


    fclose($f);
   
   

}

echo '
<script>
document.querySelector(".accept").style.display="block";
console.log("kuba");
</script>
';






?>