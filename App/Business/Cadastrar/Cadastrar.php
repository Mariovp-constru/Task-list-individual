<?php

namespace App\Business\Cadastrar;

use App\Business\Business;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';


class Cadastrar
{
    use Business;
    public function insertTaskUser($post)
    {
        if (!empty($post)) {
            $titulo = $post['titulo'];
            $descricao = $post['descricao'];
            $prioridade = $post['prioridade'];
            
            if ($prioridade == 3) {
                $mail = new PHPMailer(true);
    
                    //Server settings
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'mail.enviarformularios.com.br';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'noreply@enviarformularios.com.br';                     //SMTP username
                    $mail->Password   = 'nd73n7329dn';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                    //Recipients
                    $mail->setFrom('noreply@enviarformularios.com.br', 'Mailer');
                    $mail->addAddress('mario.vale@construsitebrasil.com.br', 'Joe User');     //Add a recipient
                    $mail->addReplyTo('noreply@enviarformularios.com.br', 'Information');
    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Tarefa alta veio pra você';
                    $mail->Body    = '<b>Esta é uma tarefa altaa</b>';
                    $mail->AltBody = 'Tarefaa';
    
                    $mail->send();
            }
        }

        $data = array(
            'title_task' => $titulo,
            'description_task' => $descricao,
            'fk_id_prioridade_tasks_prioridade' => $prioridade,
        );

        
        return $this->repository->insertTasks($data);
    }
}
