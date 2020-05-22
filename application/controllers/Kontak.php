<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	// Database
	public function __construct()
	{
		parent::__construct();
	}

	// Main page kontak
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();

		$data = array(
			'title'		=> 'Kontak ' . $site->namaweb,
			'deskripsi'	=> 'Kontak ' . $site->namaweb,
			'keywords'	=> 'Kontak ' . $site->namaweb,
			'site'		=> $site,
			'isi'		=> 'kontak/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function sendmail()
	{
		$site 			= $this->konfigurasi_model->listing();
		$i = $this->input;

		$valid = $this->form_validation;
		$valid->set_rules('name', 'Nama Lengkap', 'required');
		$valid->set_rules('email', 'Email', 'required|valid_emails');
		$valid->set_rules('body', 'Pesan', 'required');

		if ($valid->run()) {

			$this->load->library('mailer');
			$mail = $this->mailer->load();

			//Server settings
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'anaufal879@gmail.com';                     // SMTP username
			$mail->Password   = 'Masuksaja';                               // SMTP password
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPDebug  = 2;

			//Recipients
			// $mail->From($i->post('email'));
			// $mail->FromName($i->post('name'));
			$mail->setFrom($i->post('email'), $i->post('name'));
			$mail->addAddress($site->email, 'TheCroc27');     // Add a recipient
			// $mail->addAddress($site->email);               // Name is optional
			$mail->addBCC($site->email_cadangan, 'Secondary');
			// $mail->addBCC('11171445@bsi.ac.id', 'Secondary2');
			$mail->addReplyTo($i->post('email'), $i->post('name'));
			// $mail->addCustomHeader("CC: $site->email_cadangan"); 
			// $mail->addBCC('bcc@example.com');			

			// Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->WordWrap = 50;
			$mail->Subject = $i->post('subject');
			$mail->Body		= '<br>';
			$mail->Body    .= $i->post('body');
			$mail->Body		.= '<br><br> Email ini dikirim dari ' . $site->namaweb;
			$mail->AltBody = $i->post('body');

			if (!$mail->send()) {
				$this->session->set_flashdata('error',  'Email Error:  ' . $mail->ErrorInfo);
			} else {
				$this->session->set_flashdata('success', 'Pesan telah dikirim, Terima Kasih telah menghubungi ' . $site->namaweb);
				// echo '
				// <script>
				// 	window.location.href = "' . base_url('kontak') .'";
				// </script>
				// ';
			}
		}

		$data = array(
			'title'		=> 'Kontak ' . $site->namaweb,
			'deskripsi'	=> 'Kontak ' . $site->namaweb,
			'keywords'	=> 'Kontak ' . $site->namaweb,
			'site'		=> $site,
			'isi'		=> 'kontak/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */
