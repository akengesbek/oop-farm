<?php
    //класс для коров
    class Cow
    {
        public $c_count = 0;    //подсчет
        public $c_name = [];    //уникальный номер
        public $milk = [];      //сколько молока дала
        public $m_count = 0;    //всего молока
        public $list = 1;       //для вывода трех лучших - худших
    }
    
    //класс для кур
    class Hen
    {
        public $h_count = 0;    //подсчет
        public $h_name = [];    //уникальный номер
        public $egg = 0;        //сколько яиц дала
        public $e_count = 0;    //всего яиц
    }

    //добавление коров в хлев
    $add_cow = new Cow();
    for($i = 1; $i < 11; $i++)
    {
        $add_cow->c_count += 1;                                                 //подсчет колличества коров
        $add_cow->c_name[$i - 1] = "cow" . $i;                                  //присваивание уникального номера
        $add_cow->milk[$i - 1] = mt_rand(8,120);                                //генерирование надоя
        $add_cow->m_count += $add_cow->milk[$i - 1];                            //подсчет всего молока
    }

    //общее колличество молока
    echo "Total milk - " . $add_cow->m_count . "\n\n";

    //рейтинг лучших коров
    echo "Best 3 cows list: \n";

    //ищем максимальное значение в массиве, печатаем его и удаляем этот элемент, передвигаем массив (повторяем три раза)
    while($add_cow->list <= 3)
    {
        $a = 0;
        while($a < sizeof($add_cow->milk))
        {
            if($add_cow->milk[$a] == max($add_cow->milk) && $add_cow->list <= 3)
            {
                echo $add_cow->list . ") " . $add_cow->c_name[$a] .' - ' . $add_cow->milk[$a] . "\n";
                array_splice($add_cow->milk, $a, 1);
                array_splice($add_cow->c_name, $a, 1); 
                $add_cow->list += 1;
            }
            $a++;
        }
    }

    $add_cow->list = 1;                 //обнуляем счетчик

    //рейтинг лучших коров
    echo "\nWorst 3 cows list: \n";

    //тот же принцип, только ищем минимальное значение в массиве
    while($add_cow->list <= 3)
    {
        $a = 0;
        while($a < sizeof($add_cow->milk))
        {
            if($add_cow->milk[$a] == min($add_cow->milk) && $add_cow->list <= 3)
            {
                echo $add_cow->list . ") " . $add_cow->c_name[$a] .' - ' . $add_cow->milk[$a] . "\n";
                array_splice($add_cow->milk, $a, 1);
                array_splice($add_cow->c_name, $a, 1); 
                $add_cow->list += 1;
            }
            $a++;
        }
    }

    //добавление кур в хлев, все как у коров только без рейтинга =(
    $add_hen = new Hen();
    for($i = 1; $i < 21; $i++)
    {
        $add_hen->h_count += + 1;
        $add_hen->h_name = "hen" . $i;
        $add_hen->egg = mt_rand(0,1);
        $add_hen->e_count += $add_hen->egg;
    }
    echo "\nTotal eggs - " . $add_hen->e_count . "\n";
?>