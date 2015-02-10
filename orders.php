<?

include_once('system/core.php');
$core = new TCore(NULL);
if ($core->connect->get_state()) {

    $orders = $core->sql->query("SELECT * FROM `dat_catalog_order` ORDER BY `date` DESC LIMIT 30");
    #print_r($orders['cell']);
    #echo "<pre>" . print_r($orders->cell, 1) . "</pre>";

    foreach ( $orders->cell as $order ) {

        $client = $order['client'];
        $data = $order['products'];

        if (substr($data, 0, 2) == "[{") {
        	$temp = explode("},", mb_substr($data, 1, mb_strlen($data)-2));
            #echo "<pre>" . print_r($temp, 1) . "</pre>";
        } else {
        	$array = data_decode($data);
        	$temp[] = $array;
            #echo "<pre>" . print_r($array, 1) . "</pre>";
        }
        $client = data_decode($client);
        #print_r($client);
        #print_r($data);

        echo "<h3>Заказ №{$order['id']}</h3>";
        echo "
<p>
    <b>Клиент:</b> {$client['last_name']} {$client['first_name']} {$client['middle_name']}<br/>
    <b>Телефон:</b> {$client['phone']}<br/>
    <b>e-mail:</b> {$client['e_mail']}<br/>
    <b>Адрес:</b> {$client['zip']}, {$client['city']}, {$client['address']}<br/>
    <b>Комментарий:</b> {$client['comment']}<br/>
    <b>Способ оплаты:</b> {$client['payment']}<br/>
    <b>Время/дата заказа:</b> " . date("H:i:s d.m.Y", strtotime($order['date'])) . "<br/>
</p>
";
        echo "<table border='1' cellspacing='0' cellpadding='5'>
        <thead style='text-align:center;font-weight:bold;'><td> id </td><td> артикул </td><td> название </td><td> цена </td><td> кол-во </td></thead>\n";
        $sum = 0;
    	foreach ($temp as $data) {
    		if (mb_substr($data, -1) != "}")
    		    $data .= "}";
    		$array = data_decode($data);
            #echo "<pre>" . print_r($array, 1) . "</pre>";
            $sum += $array['price'] * $array['count'];
            echo "
    <tr>
        <td> {$array['id']} </td>
        <td> {$array['article']} </td>
        <td> {$array['title']} </td>
        <td> {$array['price']} </td>
        <td> {$array['count']} </td>
    </tr>\n";
    	}
        echo "<tr><td colspan='3' align='right'>ИТОГО: </td><td> {$sum} </td><td>&nbsp;</td></tr></table><hr/>";

    }

}


function data_decode($data) {
    $array = json_decode($data, 1);
    foreach ($array as $key => $val) {
    	if (!is_numeric($val))
        	$array[$key] = base64_decode($val);
    }
    return $array;
}