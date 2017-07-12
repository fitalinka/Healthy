<?php

class Parse
{
    public static function parser()
    {
        $url = "http://www.calorizator.ru/product/all?page=63";
        $html = file_get_html($url);//получение кода страницы

        $array = array();
        $i = 0;
        foreach($html->find('.sticky-table>tr') as $row) {
            $array[$i]['name'] = $row->find('a', 1)->plaintext;
            $array[$i]['gramm'] = $row->find('td',2)->plaintext;
            $array[$i]['jur'] = $row->find('td',3)->plaintext;
            $array[$i]['ugl'] = $row->find('td',4)->plaintext;
            $array[$i]['kal'] = $row->find('td',5)->plaintext;
            $i++;
        }

//unset($array[0], $array[4], $array[5], $array[6]);

        foreach ($array as $value) {
     //self::ins($value);
        }

        echo "<pre>";
        print_r($array);
    }
    public static function ins($array){
      $db = DB::getConection();//подключение к бд из класса ДБ(папка компонентов)
      $sql = 'INSERT INTO products (name_products, bel, jyr, ygl, kal) VALUES (:name, :bel, :jyr, :ygl, :kal)';
      $rezult = $db->prepare($sql);//отправляет запрос в обработчик
      $rezult->bindParam(':name', $array['name'], PDO::PARAM_STR);//передаем параметры в запрос ..в метод
      $rezult->bindParam(':bel', $array['gramm']);
      $rezult->bindParam(':jyr', $array['jur']);
      $rezult->bindParam(':ygl', $array['ugl']);
      $rezult->bindParam(':kal', $array['kal']);
      $rezult->execute();
    }
}
