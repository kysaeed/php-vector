<?php

class Vector {

    static public function getCross($v1, $v2)
    {
echo '<pre>';
var_dump([$v1, $v2]);
echo '</pre>';

		$a = self::crossProduct(
			$v1,
			[$v1[0], $v2[0]]
		);
		$b = self::crossProduct(
			$v1,
			[$v2[1], $v1[0]]
		);

		$ab = $a + $b;
echo "ab = {$ab}<br />";
		if ($ab) {
			$length2  = ($a / $ab);
echo "length2 = {$length2}<br />";
			if (($length2 <= 0) || ($length2 > 1.0)) {
				return null;
			}
		} else {

			return null;
		}


		$a = self::crossProduct(
			[$v2[0], $v1[0]],
			$v2
		) /* / 2 */;

		$b = self::crossProduct(
			$v2,
			[$v2[0], $v1[1]]
		) /* / 2 */;

		$ab = ($a + $b);
		if (!$ab) {
			return null;
		}

		$crossVectorLengthBase = ($a / $ab);
		if (($crossVectorLengthBase < 0) || ($crossVectorLengthBase >= 1.0)) {
			return null;
		}

		$crossed = [
			'x' => $v1[0]['x'] + (($v1[1]['x'] - $v1[0]['x']) * $crossVectorLengthBase),
			'y' => $v1[0]['y'] + (($v1[1]['y'] - $v1[0]['y']) * $crossVectorLengthBase),
			'length' => $crossVectorLengthBase,
			'length2' => $length2,
		];

        return $crossed;
    }

	public static function crossProduct($v1, $v2)
	{
		return (
			($v1[1]['x'] - $v1[0]['x']) * ($v2[1]['y'] - $v2[0]['y']) -
			($v1[1]['y'] - $v1[0]['y']) * ($v2[1]['x'] - $v2[0]['x'])
		);
	}

};


function test()
{
    $v1 = [
        [
            'x' => 0.7,
            'y' => 34.7,
        ], [
            'x' => 99.3,
            'y' => 34.7,
        ]
    ];
    $v2 = [
        [
            'x' => 44.7,
            'y' => 34.7,
        ], [
            'x' => 55.3,
            'y' => 34.7,
        ]
    ];
    $p = Vector::getCross($v1, $v2);

    var_dump($p);
};



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP-Vector</title>
  </head>
  <body>
    
    <?php
        test();
    ?>
  </body>
</html>
