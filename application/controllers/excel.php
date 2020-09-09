<?php 

class excel extends controller
{
    public function export()
    {
        require_once 'Classes/PHPExcel.php';

        $excel = new PHPExcel();
        $allProducts = $this->model('productModel')->lists();
        $excel->getActiveSheet()->setTitle('Page1');
        $excel->getActiveSheet()->setCellValue("A1", "Product Name");
        $excel->getActiveSheet()->setCellValue("B1", "Product Category");
        $excel->getActiveSheet()->setCellValue("C1", "Product Property");
        $excel->getActiveSheet()->setCellValue("D1", "Add Date");

        $a = 2;
        foreach($allProducts as $key=>$value)
        {
            $properties = $this->showProperty(json_decode($value['properties'], true));
            $category = $this->model('categoryModel')->getData($value['category_id']);
            $excel->getActiveSheet()->setCellValue("A".$a, $value['name']);
            $excel->getActiveSheet()->setCellValue("B".$a, $category['name']);
            $excel->getActiveSheet()->setCellValue("C".$a, $properties);
            $excel->getActiveSheet()->setCellValue("D".$a, $value['date']);
            $a++;
        }

        $result = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
        $filename = rand(1,9000)."xlsx";

        $result->save($filename);
    }

    public function showProperty($array=[])
    {
        $returnArray = [];
        foreach($array as $key => $value)
        {
            $returnArray[] = $value['name'].":".$value['value'];
        }
        return implode(', ', $returnArray);

    }

    public function importForm()
    {   
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/import');
        $this->render('site/footer');
    }

    public function import()
    {
        // echo "<pre>";
        // print_r($_FILES);
        $tmp_name = $_FILES['file']['tmp_name'];
        require_once 'Classes/PHPExcel.php';

        $excel = new PHPExcel();
        $objPHPExcel = PHPExcel_IOFactory::load($tmp_name);

        foreach($objPHPExcel->getWorksheetIterator() as $worksheet)
        {
            $worksheetTitle = $worksheet->getTitle();
            $highestRow = $worksheet->getHighestRow(); // 10, 11
            $highestCol = $worksheet->getHighestColumn(); // A, B, C
            $highestColIndex = PHPExcel_Cell::columnIndexFromString($highestCol);
            
            for($row = 2; $row <= $highestRow; ++$row)
            {
                $cell = $worksheet->getCellByColumnAndRow(0, $row);
                $name = $cell->getValue();

                $cell2 = $worksheet->getCellByColumnAndRow(1, $row);
                $category = $cell2->getValue();

                $categoryId = $this->model('categoryModel')->getExcelId($category);

                $cell3 = $worksheet->getCellByColumnAndRow(2, $row);
                $properties =  $cell3->getValue();

                $propJson = $this->gatherProperties($properties);

                $cell4 = $worksheet->getCellByColumnAndRow(3, $row);
                $date = $cell4->getValue();
                
                $this->model('productModel')->createExcel($name, $categoryId, $propJson, $date);
                // for($col = 0; $col < $highestColIndex; ++$col)
                // {
                //     $cell = $worksheet->getCellByColumnAndRow($col, $row);
                //     $val = $cell->getValue();
                //     echo $val."<br/>";
                // }
                
               
            }
        }

        helper::flashData("status", "File send succesfully");
        helper::redirect(SITE_URL."/excel/importForm");

    }

    public function gatherProperties($array = [])
    { 
        $returnArray = [];
        $explode = explode(', ', $array);

        foreach($explode as $key => $value)
        {
            $exp = explode(':', $value);
            $returnArray[$key]['name'] = $exp[0];
            $returnArray[$key]['value'] = $exp[1];
        }

        return json_encode($returnArray);
    }

}


?>