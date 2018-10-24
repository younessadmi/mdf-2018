<?php
$nb = 0;
$inputs = [
    [
        'input' => [
            '2',
            '00:01 E',
            '00:04 N',
        ],
        'output' => 'OK'
    ],
    [
        'input' => [
            '2',
            '00:01 O',
            '00:02 S',
        ],
        'output' => 'COLLISION'
    ],
    [
        'input' => [
            '2',
            '00:01 S',
            '00:02 N',
        ],
        'output' => 'OK'
    ],
    [
        'input' => [
            '27',
            '21:50 N',
            '04:58 S',
            '14:20 N',
            '01:10 E',
            '02:25 E',
            '19:57 E',
            '13:50 S',
            '14:43 O',
            '17:35 S',
            '00:35 O',
            '13:54 E',
            '19:29 N',
            '00:36 E',
            '02:07 N',
            '22:25 S',
            '10:37 N',
            '18:34 N',
            '14:05 S',
            '05:00 O',
            '00:20 E',
            '09:35 N',
            '16:51 E',
            '09:36 S',
            '19:15 O',
            '17:32 N',
            '15:32 E',
            '14:57 E',
        ],
        'output' => 'COLLISION'
    ],
    [
        'input' => [
            '46',
            '06:39 E',
            '13:59 O',
            '03:39 E',
            '08:08 S',
            '14:46 N',
            '09:14 S',
            '16:53 E',
            '01:41 E',
            '07:32 E',
            '20:19 O',
            '20:29 E',
            '03:55 E',
            '01:59 O',
            '17:48 O',
            '17:42 O',
            '01:26 O',
            '01:23 S',
            '19:01 S',
            '15:54 E',
            '16:02 S',
            '05:40 O',
            '18:00 S',
            '09:05 E',
            '04:41 S',
            '07:18 N',
            '17:17 O',
            '00:28 N',
            '13:22 N',
            '11:52 S',
            '14:14 S',
            '16:52 N',
            '15:38 O',
            '17:40 E',
            '06:25 S',
            '09:34 N',
            '20:44 N',
            '13:13 S',
            '07:53 S',
            '08:12 O',
            '11:52 E',
            '13:10 N',
            '12:08 S',
            '15:22 N',
            '12:30 E',
            '04:53 S',
            '10:44 E',
        ],
        'output' => 'COLLISION'
    ],
];


foreach ($inputs as $data) {
    $input = $data['input'];
    $output = $data['output'];
    
    $nb = array_shift($input);
    
    $res = [];
    foreach ($input as $i) {
        list($date, $direction) = explode(' ', $i);
        $res[] = [
            'date' => DateTime::createFromFormat('H:i', $date),
            'direction' => $direction
        ];
    }
    
    
    sort($res);
    
    $finalResult = 'OK';
    for($i=0; $i < $nb; $i++){
        for($j=$i+1; $j < $nb; $j++){
            if ($res[$i]['date']->add(new DateInterval('PT120S')) >= $res[$j]['date']
                && collision($res[$i]['direction'], $res[$j]['direction'])
            ) {
                $finalResult = 'COLLISION';
                break(2);
            }
        }
    }
    if($output != $finalResult) {
        die('Echec');
    }
}

echo 'Réussi';

function collision($a, $b) {
    if (($a == $b)
        || ($a == 'N' && $b == 'S')
        || ($a == 'S' && $b == 'N')
        || ($a == 'E' && $b == 'O')
        || ($a == 'O' && $b == 'E')
    ) {
        return false;
    }
    return true;
}

