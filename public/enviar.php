<?php
header('Content-Type: application/json');

if (empty($_POST)) {
	die(json_encode(["status" => false, "mensagem" => "Por favor, preencha todos os campos."]));
}

require '../vendor/autoload.php';

use Mailgun\Mailgun;

$dotenv = new Dotenv\Dotenv(__DIR__."/..");
$dotenv->load();

if ($_POST['track']) {
    error_log($_POST['track'], 3, './post.log');
}

$post = [
    "Nome" => $_POST["name"],
    "E-mail" => $_POST["mail"],
    "Telefone" => $_POST["tel"],
    "Municipio" => $_POST["mun"],
    "UF" => $_POST["uf"],
    "Mensagem" => $_POST["text"],
    "Endereço IP" => $_SERVER['REMOTE_ADDR'],
    "Navegador" => $_SERVER['HTTP_USER_AGENT'],
];

$body = "Segue dados do contato: <br /><br />";

foreach($post as $label => $value) {
    $body .= "<b>$label</b>: <i>".($value ? $value : "N/D")."</i><br />";
}

# Instantiate the client.
$key = getenv("MAILGUN_KEY");
$domain = getenv("MAILGUN_DOMAIN");
$from = getenv("CONTACT_FROM");
$to = getenv("CONTACT_TO");
$google_secrety_captcha = getenv("GOOGLE_SECRETY_CAPTCHA");

$mgClient = new Mailgun($key);

$emailAddress = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

function post_captcha($user_response, $google_secrety_captcha) {
    $fields_string = '';
    $fields = array(
        'secret' => $google_secrety_captcha,
        'response' => $user_response
    );
    foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}


$res = post_captcha($_POST['g-recaptcha-response'], $google_secrety_captcha);

if (!$res['success']) {

    die(json_encode([
        "status" => false,
        "mensagem" => "Ops! Erro ao validar o recaptcha.",
        "exception" => "Envio não autorizado"
    ]));

} else {

    try {

        $result = $mgClient->sendMessage("$domain", [
            'from'    => $from,
            'to'      => $to,
            'h:reply-to' => $emailAddress,
            'subject' => "[Busca Ativa Escolar] Contato via site - {$emailAddress}",
            'html'    => $body
        ]);

    } catch (\Exception $ex) {

        die(json_encode([
            "status" => false,
            "mensagem" => "Ops! Estamos sem sistema no momento.",
            "exception" => $ex->getMessage(),
        ]));

    }

    die(json_encode([
        "status" => true,
        "mensagem" => "Seu contato foi para análise, entraremos em contato assim que possível."
    ]));

}